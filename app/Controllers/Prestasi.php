<?php 
namespace App\Controllers;

use App\Models\prestasiModel;

class Prestasi extends BaseController
{
    public function index() // tampilkan data prestasi
    {
        $model = new prestasiModel();
        $data['prestasi'] = $model->getPrestasi(); // ambil data prestasi
        $data['title'] = 'Prestasi'; // set judul
        $data['active'] = 'Prestasi'; // set active menu
        return view('Admin/Prestasi/index', $data); // kirim data ke view
    }

    public function simpan() // simpan data prestasi
    {
        $model = new prestasiModel(); // panggil model prestasi
        $file = $this->request->getFile('foto_prestasi'); // ambil foto prestasi
        if($file){ // jika ada foto
            $file->move('Assets/img/prestasi'); // pindahkan foto
            $data = [ // set data
                'judul_prestasi' => $this->request->getPost('judul_prestasi'),
                'foto_prestasi' => $file->getName(),
                'tanggal_prestasi' => $this->request->getPost('tanggal_prestasi'),
                'deskripsi_prestasi' => $this->request->getPost('deskripsi_prestasi'),
            ];
        }
        session()->setFlashdata('success', 'Data Berhasil Disimpan'); // set flashdata
        $model->insert($data); // insert data ke tabel prestasi
        return redirect()->to('/Prestasi'); // redirect ke halaman prestasi
    }

    public function ubah() // ubah data prestasi
    {
        $model = new prestasiModel(); // panggil model prestasi
        $id = $this->request->getPost('id_prestasi'); // ambil id prestasi
        $file = $this->request->getFile('foto_prestasi'); // ambil foto prestasi
        $data_prestasi = $model->find($id); // ambil data prestasi
        if($file != ''){ // jika ada foto
            $file->move('Assets/img/prestasi'); // pindahkan foto
            $data = [ // set data
                'judul_prestasi' => $this->request->getPost('judul_prestasi'),
                'tanggal_prestasi' => $this->request->getPost('tanggal_prestasi'),
                'foto_prestasi' => $file->getName(),
                'deskripsi_prestasi' => $this->request->getPost('deskripsi_prestasi'),
            ];
            if($data_prestasi['foto_prestasi'] != ''){ // jika foto prestasi tidak kosong
                unlink('Assets/img/prestasi/'.$data_prestasi['foto_prestasi']); // hapus foto prestasi
            }
        }else{ // jika tidak ada foto
            $data = [ // set data
                'judul_prestasi' => $this->request->getPost('judul_prestasi')
            ];
           
        }
         $model->update($id, $data); // update data ke tabel prestasi
        session()->setFlashdata('success', 'Data Berhasil Diubah'); // set flashdata
        return redirect()->to('/Prestasi'); // redirect ke halaman prestasi
    }

    public function hapus($id_prestasi) // hapus data prestasi
    {
        $model = new prestasiModel(); // panggil model prestasi
        $data_prestasi = $model->find($id_prestasi); // ambil data prestasi
        if($data_prestasi['foto_prestasi'] != ''){ // jika foto prestasi tidak kosong
            unlink('Assets/img/prestasi/'.$data_prestasi['foto_prestasi']); // hapus foto prestasi
        }
        $model->delete($id_prestasi); // hapus data prestasi
        session()->setFlashdata('success', 'Data Berhasil Dihapus'); // set flashdata
        return redirect()->to('/Prestasi'); // redirect ke halaman prestasi
    }

}

           
?>