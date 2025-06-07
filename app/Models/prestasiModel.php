<?php 

namespace App\Models;

use CodeIgniter\Model;

class prestasiModel extends Model
{
    protected $table = 'prestasi';
    protected $primaryKey = 'id_prestasi';
    protected $allowedFields = ['judul_prestasi', 'tanggal_prestasi', 'deskripsi_prestasi','foto_prestasi'];
    public function getPrestasi($id_prestasi = false)
    {
        if ($id_prestasi == false) {
            return $this->orderBy('tanggal_prestasi', 'DESC')->findAll();
        }

        return $this->where(['id_prestasi' => $id_prestasi])->first();
    }
}
?>