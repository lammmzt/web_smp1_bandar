<?php 
namespace App\Models;

use CodeIgniter\Model;

class ekskulModel extends Model
{
    protected $table = 'ekskul';
    protected $primaryKey = 'id_ekskul';
    protected $allowedFields = ['nama_ekskul', 'deskripsi_ekskul', 'foto_ekskul'];

    public function getEkskul($id_ekskul = false)
    {
        if ($id_ekskul == false) {
            return $this
                ->orderBy('nama_ekskul', 'ASC')
                ->findAll();
        }

        return $this->where(['id_ekskul' => $id_ekskul])->first();
    }
}
?>