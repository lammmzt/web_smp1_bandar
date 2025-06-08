<?php 
namespace App\Models;

use CodeIgniter\Model;

class pengumumanModel extends Model
{
    protected $table = 'pengumuman';
    protected $primaryKey = 'id_pengumuman';
    protected $allowedFields = ['id_pengumuman', 'id_user', 'judul_pengumuman', 'deskripsi_pengumuman', 'type_media', 'tag_pengumuman','nama_media', 'created_at', 'updated_at', 'views_pengumuman','status_pengumuman','img_thumbnail', 'tipe_pengumuman'];

    public function getPengumuman($id_pengumuman = false)
    {
        if($id_pengumuman == false){
            return $this
            ->select('pengumuman.*, users.nama_user')
            ->join('users', 'users.id_user = pengumuman.id_user')
            ->where(['pengumuman.status_pengumuman' => '1']);
        }
        return $this
        ->select('pengumuman.*, users.nama_user')
        ->join('users', 'users.id_user = pengumuman.id_user')
        ->where(['id_pengumuman' => $id_pengumuman])
        ->first();
    }

}

?>