<?php 
namespace App\Controllers;

use App\Models\fasilitasModel;

class Fasilitas extends BaseController
{
    public function index() // tampilkan data ekskul
    {
        $model = new fasilitasModel();
        $data['fasilitas'] = $model->findAll(); // ambil data ekskul
        $data['title'] = 'Fasilitas'; // set judul
        $data['active'] = 'Fasilitas'; // set active menu
        return view('Admin/Fasilitas/index', $data); // kirim data ke view
    }

    public function simpan() // simpan data ekskul
    {
        $model = new fasilitasModel(); // panggil model ekskul
        $file = $this->request->getFile('foto_fasilitas'); // ambil foto ekskul
        if($file){ // jika ada foto
            $file->move('Assets/img/fasilitas'); // pindahkan foto
            $data = [ // set data
                'nama_fasilitas' => $this->request->getPost('nama_fasilitas'),
                'foto_fasilitas' => $file->getName(),
                'deskripsi_fasilitas' => $this->request->getPost('deskripsi_fasilitas')
            ];
        }else{ // jika tidak ada foto
            session()->setFlashdata('error', 'Foto Fasilitas Tidak Boleh Kosong'); // set flashdata error
            return redirect()->to('/Fasilitas'); // redirect ke halaman ekskul
        }
        $model->insert($data); // insert data ke tabel ekskul
        session()->setFlashdata('success', 'Data Berhasil Disimpan'); // set flashdata
        return redirect()->to('/Fasilitas'); // redirect ke halaman ekskul
    }

    public function ubah() // ubah data ekskul
    {
        $model = new fasilitasModel(); // panggil model ekskul
        $id = $this->request->getPost('id_fasilitas'); // ambil id ekskul
        $file = $this->request->getFile('foto_fasilitas'); // ambil foto ekskul
        $data_fasilitas = $model->find($id); // ambil data ekskul
        if($file != ''){ // jika ada foto
            $file->move('Assets/img/fasilitas'); // pindahkan foto
            $data = [ // set data
                'nama_fasilitas' => $this->request->getPost('nama_fasilitas'),
                'foto_fasilitas' => $file->getName(),
                'deskripsi_fasilitas' => $this->request->getPost('deskripsi_fasilitas')
            ];
            if($data_fasilitas['foto_fasilitas'] != ''){ // jika foto ekskul tidak kosong
                unlink('Assets/img/fasilitas/'.$data_fasilitas['foto_fasilitas']); // hapus foto ekskul
            }
        }else{ // jika tidak ada foto
            $data = [ // set data
                'nama_fasilitas' => $this->request->getPost('nama_fasilitas'),
                'deskripsi_fasilitas' => $this->request->getPost('deskripsi_fasilitas')
            ];
        }
        session()->setFlashdata('success', 'Data Berhasil Diubah'); // set flashdata
        $model->update($id, $data); // update data ke tabel ekskul
        return redirect()->to('/Fasilitas'); // redirect ke halaman ekskul
    }

    public function hapus($id_fasilitas) // hapus data ekskul
    {
        $model = new fasilitasModel(); // panggil model ekskul
        $data_fasilitas = $model->find($id_fasilitas); // ambil data ekskul
        if($data_fasilitas['foto_fasilitas'] != ''){ // jika foto ekskul tidak kosong
            unlink('Assets/img/fasilitas/'.$data_fasilitas['foto_fasilitas']); // hapus foto ekskul
        }
        $model->delete($id_fasilitas); // hapus data ekskul
        session()->setFlashdata('success', 'Data Berhasil Dihapus'); // set flashdata
        return redirect()->to('/Fasilitas'); // redirect ke halaman ekskul
    }

    
}
?>