<?php

namespace App\Models;

use CodeIgniter\Model;

class LoginControlModel extends Model
{
    protected $table            = 'user';
    protected $primaryKey       = 'nrp';
    protected $returnType       = 'object';
    protected $allowedFields    = ['nrp', 'password'];

    public function tampilkan_data() {
        return $this
        ->db
        ->table($this->table)
        ->get()
        ->getResult();
    }

    public function signup_data($data) {
        return $this->insert($data);
    }

    public function validasi_data($nrp, $password) {
        return $this
        ->where('nrp', $nrp)
        ->where('password', $password)
        ->first();
    }
}
