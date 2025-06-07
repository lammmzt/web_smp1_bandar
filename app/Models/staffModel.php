<?php 
namespace App\Models;

use CodeIgniter\Model;

class staffModel extends Model
{
    protected $table = 'staff';
    protected $primaryKey = 'id_staff';
    protected $allowedFields = ['nama_staff', 'jabatan_staff', 'jenis_staff', 'foto_staff'];

    public function getStaff($id = false)
    {
        if ($id == false) {
            return $this
                ->orderBy('jenis_staff', 'ASC')
                ->orderBy('nama_staff', 'ASC')
                ->findAll();
        }
        return $this->where(['id_staff' => $id])->first();
    }

}