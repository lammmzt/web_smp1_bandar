<?php 

namespace App\Models;

use CodeIgniter\Model;

class dokumentasiModel extends Model
{
    protected $table = 'dokumentasi';
    protected $primaryKey = 'id_dokumentasi';
    protected $allowedFields = ['judul_dokumentasi', 'foto_dokumentasi', 'created_at', 'updated_at'];
    protected $useTimestamps = true;

    public function getDokumentasi($id_dokumentasi = false)
    {
        if ($id_dokumentasi == false) {
            return $this->orderBy('created_at', 'DESC')->findAll();
        }

        return $this->where(['id_dokumentasi' => $id_dokumentasi])->first();
    }
}
?>