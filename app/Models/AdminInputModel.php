<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminInputModel extends Model
{
    protected $table            = 'admin';
    protected $primaryKey       = 'nrp';
    protected $returnType       = 'object';
    protected $allowedFields    = ['nrp', 'nama', 'status'];

    public function tampilkan_data() {
        return $this
        ->db
        ->table($this->table)
        ->get()
        ->getResult();
    }

    // SELECT * FROM 'admin'

    public function tambah_data($data) {
        return $this->insert($data);
    }

    public function fetch_data($nrp) {
        return $this
        ->where('nrp', $nrp)
        ->first();
    }

    public function edit_data($data) {
        return $this
        ->set([
            'nama' => $data['nama'],
        ])
        ->where('nrp', $data['nrp'])
        ->update();
    }

    public function nonaktifkan_data($nrp) {
        return $this
        ->set([
            'status' => 'Non-Aktif'
        ])
        ->where('nrp', $nrp)
        ->update();
    }

    public function aktifkan_data($nrp) {
        return $this
        ->set([
            'status' => 'Aktif'
        ])
        ->where('nrp', $nrp)
        ->update();
    }

    // public function hapus_data($nrp)
    // {
    //     return $this
    //     ->where('nrp', $nrp) 
    //     -> delete();
    // }
}
