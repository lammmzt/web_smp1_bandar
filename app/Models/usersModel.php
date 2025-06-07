<?php 
namespace App\Models;

use CodeIgniter\Model;

class usersModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id_user';
    protected $allowedFields = ['id_user', 'username', 'password', 'nama_user', 'role'];

    public function getUsers($id = false)
    {
        if ($id === false) {
            return $this->findAll();
        } else {
            return $this->getWhere(['id_user' => $id]);
        }
    }
}

?>