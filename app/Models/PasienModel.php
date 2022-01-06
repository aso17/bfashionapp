<?php

namespace App\Models;

use CodeIgniter\Model;

class PasienModel extends Model
{
    protected $table = "tb_pasien";
    protected $primaryKey = 'idPasien';
    protected $allowedFields = ['nama_lengkap', 'umur', 'jenisKelamin', 'alamat_ktp', 'tgl_daftar', 'keterangan'];
}