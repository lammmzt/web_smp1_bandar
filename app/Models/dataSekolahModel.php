<?php 
namespace App\Models;

use CodeIgniter\Model;

class dataSekolahModel extends Model
{
    protected $table = 'data_sekolah';
    protected $primaryKey = 'id_data_sekolah';
    protected $allowedFields = ['id_data_sekolah', 'nama_sekolah', 'npsn_sekolah', 'alamat_sekolah', 'email_sekolah', 'tlp_sekolah', 'logo_sekolah', 'akreditasi_sekolah', 'latitude_sekolah', 'latitude_sekolah', 'longitude_sekolah', 'visi_sekolah', 'misi_sekolah', 'sejarah_sekolah', 'sambutan_kepala_sekolah', 'jumlah_siswa_sekolah'];
    
    public function getDataSekolah($id = false)
    {
        if($id === false){
            return $this->findAll();
        } else {
            return $this->getWhere(['id_data_sekolah' => $id]);
        }   
    }

}