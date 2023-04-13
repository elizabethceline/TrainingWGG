<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\LoginControlModel;

class LoginControl extends BaseController
{
    private $model;

    public function __construct()
    {
        $this->model = new LoginControlModel();
    }

    public function index()
    {
        return view('login/index');
    }

    public function signup()
    {
        $data['title'] = 'Sign Up';

        if (isset($_POST['submit'])) {
            $validasi = [
                'nrp' => [
                    'rules' => 'min_length[9]|max_length[9]|is_unique[user.nrp]',
                    'errors' => [
                        'min_length' => 'NRP harus 9 karakter!',
                        'max_length' => 'NRP harus 9 karakter!',
                        'is_unique' => 'NRP yang ditambahkan, telah digunakan!'
                    ]
                ],
                'password' => [
                    'rules' => 'min_length[8]|max_length[20]',
                    'errors' => [
                        'min_length' => 'Password minimal 8 dan maksimal 20 karakter',
                        'max_length' => 'Password minimal 8 dan maksimal 20 karakter',
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
                    ->to(site_url('login/signup'))
                    ->with('error_val', $error_val)
                    ->withInput();
            }

            $this->model->signup_data([
                'nrp' => $this->request->getVar('nrp'),
                'password' => $this->request->getVar('password'),
            ]);

            if ($this->model->db->affectedRows() > 0)
                return redirect()
                    ->to(site_url('login/signup'))
                    ->with('msg_success', 'Sign up berhasil');

            return redirect()
                ->to(site_url('login/signup'))
                ->with('msg_success', 'Sign Up gagal');
        }

        return view('login/signup', $data);
    }

    public function validasi() 
    {
        $nrp = $_POST['nrp'];
        $password = $_POST['password'];
        $validasi = $this->model->validasi_data($nrp, $password);

        if($validasi)
            return redirect()
                ->to(site_url('home'))
                ->with('msg_success', 'Login berhasil');
        
        return redirect()
            ->to(site_url('login'))
            ->with('msg_error', 'Username/Password salah');
    }
}

