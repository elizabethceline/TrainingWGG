<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AdminInputModel;

class AdminInput extends BaseController
{
    private $model;

    public function __construct()
    {
        $this->model = new AdminInputModel();
    }
    public function index()
    {
        $data['title'] = 'Kelola Admin';
        $data['data_admin'] = $this->model->tampilkan_data();

        return view('admin/index', $data);
    }

    public function tambah()
    {
        $data['title'] = 'Tambah Admin';

        if (isset($_POST['submit'])) {
            $validasi = [
                'nrp' => [
                    'rules' => 'min_length[9]|max_length[9]|is_unique[admin.nrp]',
                    'errors' => [
                        'min_length' => 'NRP harus 9 karakter!',
                        'max_length' => 'NRP harus 9 karakter!',
                        'is_unique' => 'NRP yang ditambahkan, telah digunakan!'
                    ]
                ],
                'nama' => [
                    'rules' => 'min_length[3]|max_length[30]',
                    'errors' => [
                        'min_length' => 'Nama minimal 3 dan maksimal 30 karakter',
                        'max_length' => 'Nama minimal 3 dan maksimal 30 karakter',
                    ]
                ]
            ];

            $error = false;
            $error_val = [];

            if (!$this->validate($validasi)) {
                $error = true;
                $error_val = $this->validator->getErrors();
            }

            if ($error) {
                return redirect()
                    ->to(site_url('admin/tambah'))
                    ->with('error_val', $error_val)
                    ->withInput();
            }

            // Tambah data ke tabel 'admin'
            $this->model->tambah_data([
                'nrp' => $this->request->getVar('nrp'),
                'nama' => $this->request->getVar('nama'),
            ]);

            if ($this->model->db->affectedRows() > 0)
                return redirect()
                    ->to(site_url('admin'))
                    ->with('msg_success', 'Data berhasil ditambahkan');

            return redirect()
                ->to(site_url('admin'))
                ->with('msg_success', 'Data gagal ditambahkan');
        }

        return view('admin/tambah', $data);
    }

    public function sunting($nrp)
    {
        $data['title'] = 'Edit Admin';

        $data['fetch_data'] = $this->model->fetch_data($nrp);

        if ($this->request->getPost('submit') == 'ya') {
            $validasi = [
                'nama' => [
                    'rules' => 'min_length[3]|max_length[30]',
                    'errors' => [
                        'min_length' => 'Nama minimal 3 dan maksimal 30 karakter',
                        'max_length' => 'Nama minimal 3 dan maksimal 30 karakter',
                    ]
                ]
            ];

            $error = false;
            $error_val = [];

            if (!$this->validate($validasi)) {
                $error = true;
                $error_val = $this->validator->getErrors();
            }

            if ($error) {
                return redirect()
                    ->to(site_url('admin'))
                    ->with('error_val', $error_val)
                    ->withInput();
            }

            $update_data = $this->model->edit_data([
                'nrp' => $nrp,
                'nama' => $this->request->getVar('nama')
            ]);

            if ($update_data)
                return redirect()
                    ->to(site_url('admin'))
                    ->with('msg_success', 'Berhasil menyunting data');

            return redirect()
                ->to(site_url('admin'))
                ->with('msg_error', 'Data gagal disunting');
        }
        return view('admin/sunting', $data);
    }

    public function nonaktifkan()
    {
        $nrp = $this->request->getVar('nrp_nonaktif');
        $nonaktifkan_data = $this->model->nonaktifkan_data($nrp);

        if ($nonaktifkan_data)
            return redirect()
                ->to(site_url('admin'))
                ->with('msg_success', 'Berhasil menonaktifkan admin');

        return redirect()
            ->to(site_url('admin'))
            ->with('msg_error', 'Status Admin gagal dinonaktifkan');
    }
    
    public function aktifkan($nrp)
    {
        $nrp = $this->request->getVar('nrp_aktif');
        $aktifkan_data = $this->model->aktifkan_data($nrp);

        if ($aktifkan_data)
            return redirect()
                ->to(site_url('admin'))
                ->with('msg_success', 'Berhasil mengaktifkan admin');

        return redirect()
            ->to(site_url('admin'))
            ->with('msg_error', 'Status Admin gagal diaktifkan');
    }
    
    // public function hapus()
    // {
    //     if($this->request->getPost('hapus_data') == 'ya') 
    //     {
    //         $nrp = $this->request->getVar('nrp_delete');
    //         $hapus_data = $this->model->hapus_data($nrp);

    //         if($hapus_data)
    //             return redirect()
    //             ->to(site_url('admin/'))
    //             ->with('msg_success', 'Data berhasil dihapus');

    //         return redirect()
    //         ->to(site_url('admin/'))
    //         ->with('msg_error', 'Data gagal dihapus');
    //     }
    // }
}

