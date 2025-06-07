<?php 
namespace App\Controllers;

use App\Models\dokumentasiModel;

class Dokumentasi extends BaseController
{
    public function index() // tampilkan data dokumentasi
    {
        $model = new dokumentasiModel();
        $data['dokumentasi'] = $model->getDokumentasi(); // ambil data dokumentasi
        $data['title'] = 'Dokumentasi'; // set judul
        $data['active'] = 'Dokumentasi'; // set active menu
        return view('Admin/Dokumentasi/index', $data); // kirim data ke view
    }

    public function simpan() // simpan data dokumentasi
    {
        $model = new dokumentasiModel(); // panggil model dokumentasi
        $file = $this->request->getFile('foto_dokumentasi'); // ambil foto dokumentasi
        if($file){ // jika ada foto
            $file->move('Assets/img/dokumentasi'); // pindahkan foto
            $data = [ // set data
                'judul_dokumentasi' => $this->request->getPost('judul_dokumentasi'),
                'foto_dokumentasi' => $file->getName()
            ];
        }
        session()->setFlashdata('success', 'Data Berhasil Disimpan'); // set flashdata
        $model->insert($data); // insert data ke tabel dokumentasi
        return redirect()->to('/Dokumentasi'); // redirect ke halaman dokumentasi
    }

    public function ubah() // ubah data dokumentasi
    {
        $model = new dokumentasiModel(); // panggil model dokumentasi
        $id = $this->request->getPost('id_dokumentasi'); // ambil id dokumentasi
        $file = $this->request->getFile('foto_dokumentasi'); // ambil foto dokumentasi
        $data_dokumentasi = $model->find($id); // ambil data dokumentasi
        if($file != ''){ // jika ada foto
            $file->move('Assets/img/dokumentasi'); // pindahkan foto
            $data = [ // set data
                'judul_dokumentasi' => $this->request->getPost('judul_dokumentasi'),
                'foto_dokumentasi' => $file->getName()
            ];
            if($data_dokumentasi['foto_dokumentasi'] != ''){ // jika foto dokumentasi tidak kosong
                unlink('Assets/img/dokumentasi/'.$data_dokumentasi['foto_dokumentasi']); // hapus foto dokumentasi
            }
        }else{ // jika tidak ada foto
            $data = [ // set data
                'judul_dokumentasi' => $this->request->getPost('judul_dokumentasi')
            ];
        }

        session()->setFlashdata('success', 'Data Berhasil Diubah'); // set flashdata
        $model->update($id, $data); // update data ke tabel dokumentasi
        return redirect()->to('/Dokumentasi'); // redirect ke halaman dokumentasi
    }

    public function hapus($id_dokumentasi) // hapus data dokumentasi
    {
        $model = new dokumentasiModel(); // panggil model dokumentasi
        $data_dokumentasi = $model->find($id_dokumentasi); // ambil data dokumentasi
        if($data_dokumentasi['foto_dokumentasi'] != ''){ // jika foto dokumentasi tidak kosong
            unlink('Assets/img/dokumentasi/'.$data_dokumentasi['foto_dokumentasi']); // hapus foto dokumentasi
        }
        $model->delete($id_dokumentasi); // hapus data dokumentasi
        session()->setFlashdata('success', 'Data Berhasil Dihapus'); // set flashdata
        return redirect()->to('/Dokumentasi'); // redirect ke halaman dokumentasi
    }
}

?>