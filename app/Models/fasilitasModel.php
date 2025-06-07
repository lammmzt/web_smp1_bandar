<?php 
namespace App\Models;

use CodeIgniter\Model;

class fasilitasModel extends Model
{
    protected $table = 'fasilitas';
    protected $primaryKey = 'id_fasilitas';
    protected $allowedFields = ['nama_fasilitas',  'foto_fasilitas', 'deskripsi_fasilitas'];

    public function getFasilitas($id_fasilitas = false)
    {
        if ($id_fasilitas == false) {
            return $this
            ->orderBy('nama_fasilitas', 'ASC')
            ->findAll();
        }

        return $this->where(['id_fasilitas' => $id_fasilitas])->first();
    }
}
?>