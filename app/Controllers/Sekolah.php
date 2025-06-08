<?php 
namespace App\Controllers;

use App\Models\dataSekolahModel;
use Michalsn\Uuid\UuidModel;

class Sekolah extends BaseController
{
    public function index() // tampikan data sekolah
    {
        $model = new dataSekolahModel();
        $data['sekolah'] = $model->first(); // ambil data sekolah
        $data['title'] = 'Sekolah'; // set judul
        $data['active'] = 'Sekolah'; // set active menu
        return view('Admin/Sekolah/index', $data); // mengirim data ke view
    }

    public function ubah_logo(){
        $model = new dataSekolahModel();
        $id_data_sekolah = $this->request->getPost('id_data_sekolah');
        $file = $this->request->getFile('logo_sekolah');
        $data_sekolah = $model->find($id_data_sekolah);
        if($file){
            $file->move('Assets/img/logo_sekolah');
            $model->update($id_data_sekolah, ['logo_sekolah' => $file->getName()]);
            if($data_sekolah['logo_sekolah'] != ''){
                unlink('Assets/img/logo_sekolah/'.$data_sekolah['logo_sekolah']);
            }

            session()->setFlashdata('success', 'Logo Sekolah Berhasil Diubah');
            return redirect()->to(base_url('Sekolah'));
        }else{
            session()->setFlashdata('error', 'Logo Sekolah Gagal Diubah');
            return redirect()->to(base_url('Sekolah'));
        }
    }

    public function ubah_data_sekolah(){
        $model = new dataSekolahModel();
        $id_data_sekolah = $this->request->getPost('id_data_sekolah');
        $data_sekolah = $model->find($id_data_sekolah);
        $data = [
            'nama_sekolah' => $this->request->getPost('nama_sekolah'),
            'alamat_sekolah' => $this->request->getPost('alamat_sekolah'),
            'npsn_sekolah' => $this->request->getPost('npsn_sekolah'),
            'email_sekolah' => $this->request->getPost('email_sekolah'),
            'tlp_sekolah' => $this->request->getPost('tlp_sekolah'),
            'akreditasi_sekolah' => $this->request->getPost('akreditasi_sekolah'),
            'latitude_sekolah' => $this->request->getPost('latitude_sekolah'),
            'longitude_sekolah' => $this->request->getPost('longitude_sekolah'),
            'visi_sekolah' => $this->request->getPost('visi_sekolah'),
            'misi_sekolah' => $this->request->getPost('misi_sekolah'),
            'sejarah_sekolah' => $this->request->getPost('sejarah_sekolah'),
            'sambutan_kepala_sekolah' => $this->request->getPost('sambutan_kepala_sekolah'),
            'jumlah_siswa_sekolah' => $this->request->getPost('jumlah_siswa_sekolah'),
            'no_wa_sekolah' => $this->request->getPost('no_wa_sekolah')
        ];
        // dd($data);
        $model->update($id_data_sekolah, $data);
        return $this->response->setJSON([
            'status' => '200',
            'data' => 'Data Sekolah Berhasil Diubah'
        ]);
    }
}