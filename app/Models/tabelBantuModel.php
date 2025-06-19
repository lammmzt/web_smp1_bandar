<?php 
namespace App\Models;

use CodeIgniter\Model;

class tabelBantuModel extends Model
{
    protected $table = 'tabel_bantu';
    protected $primaryKey = 'id_tabel_bantu';
    protected $allowedFields = ['nama_data_bantu', 'tipe_data_bantu', 'isi_data_bantu','status_data_bantu', 'created_at', 'updated_at'];

    public function gettabel_bantu($id = false)
    {
        if ($id == false) {
            return $this
                ->orderBy('nama_data_bantu', 'ASC')
                ->orderBy('created_at', 'DESC')
                ->findAll();
        }
        return $this->where(['id_tabel_bantu' => $id])->first();
    }

}