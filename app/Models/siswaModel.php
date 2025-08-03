<?php 
namespace App\Models;

use CodeIgniter\Model;

class siswaModel extends Model
{
    protected $table = 'siswa';
    protected $primaryKey = 'id_siswa';
    protected $allowedFields = ['jumlah_siswa', 'tahun_ajaran','status_siswa', 'created_at', 'updated_at'];

    public function getSiswa($id = false)
    {
        if ($id === false) {
            return $this->orderBy('created_at', 'DESC')->findAll();
        }
        return $this->where(['id_siswa' => $id])->first();
    }
}
?>