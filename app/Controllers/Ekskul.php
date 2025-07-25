<?php 
namespace App\Controllers;

use App\Models\ekskulModel;

class Ekskul extends BaseController
{
    public function index() // tampilkan data ekskul
    {
        $model = new ekskulModel();
        $data['ekskul'] = $model->findAll(); // ambil data ekskul
        $data['title'] = 'Ekskul'; // set judul
        $data['active'] = 'Ekskul'; // set active menu
        return view('Admin/Ekskul/index', $data); // kirim data ke view
    }
    public function simpan() // simpan data ekskul
    {
        $model = new ekskulModel(); // panggil model ekskul
        $file = $this->request->getFile('foto_ekskul'); // ambil foto ekskul
        $validation =  \Config\Services::validation();
        $validation->setRules([
            'nama_ekskul' => [
                'label' => 'Nama Ekskul',
                'rules' => 'required|is_unique[ekskul.nama_ekskul]',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'is_unique' => '{field} sudah ada'
                ]
            ],
        ]);
        if($file){ // jika ada foto
            $file->move('Assets/img/ekskul'); // pindahkan foto
            $data = [ // set data
                'nama_ekskul' => $this->request->getPost('nama_ekskul'),
                'deskripsi_ekskul' => $this->request->getPost('deskripsi_ekskul'),
                'foto_ekskul' => $file->getName()
            ];
        }else{ // jika tidak ada foto
            $data = [ // set data
                'nama_ekskul' => $this->request->getPost('nama_ekskul'),
                'deskripsi_ekskul' => $this->request->getPost('deskripsi_ekskul')
            ];
        }
        session()->setFlashdata('success', 'Data Berhasil Disimpan'); // set flashdata
        $model->insert($data); // insert data ke tabel ekskul
        return redirect()->to('/Ekskul'); // redirect ke halaman ekskul
    }

    public function ubah() // ubah data ekskul
    {
        $model = new ekskulModel(); // panggil model ekskul
        $id = $this->request->getPost('id_ekskul'); // ambil id ekskul
        $file = $this->request->getFile('foto_ekskul'); // ambil foto ekskul
        $data_ekskul = $model->find($id); // ambil data ekskul
        $validation =  \Config\Services::validation();
        $validation->setRules([
            'nama_ekskul' => [
                'label' => 'Nama Ekskul',
                'rules' => 'required|is_unique[ekskul.nama_ekskul,id_ekskul,'.$id.']',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'is_unique' => '{field} sudah ada'
                ]
            ],
        ]);
        if($file != ''){ // jika ada foto
            $file->move('Assets/img/ekskul'); // pindahkan foto
            $data = [ // set data
                'nama_ekskul' => $this->request->getPost('nama_ekskul'),
                'deskripsi_ekskul' => $this->request->getPost('deskripsi_ekskul'),
                'foto_ekskul' => $file->getName()
            ];
            if($data_ekskul['foto_ekskul'] != ''){ // jika foto ekskul tidak kosong
                unlink('Assets/img/ekskul/'.$data_ekskul['foto_ekskul']); // hapus foto ekskul
            }
        }else{ // jika tidak ada foto
            $data = [ // set data
                'nama_ekskul' => $this->request->getPost('nama_ekskul'),
                'deskripsi_ekskul' => $this->request->getPost('deskripsi_ekskul')
            ];
        }
        session()->setFlashdata('success', 'Data Berhasil Diubah'); // set flashdata
        $model->update($id, $data); // update data ekskul
        return redirect()->to('/Ekskul'); // redirect ke halaman ekskul
    }

    public function hapus($id_ekskul) // hapus data ekskul
    {
        $model = new ekskulModel(); // panggil model ekskul
        $data_ekskul = $model->find($id_ekskul); // ambil data ekskul
        if($data_ekskul['foto_ekskul'] != ''){ // jika foto ekskul tidak kosong
            unlink('Assets/img/ekskul/'.$data_ekskul['foto_ekskul']); // hapus foto ekskul
        }
        $model->delete($id_ekskul); // hapus data ekskul
        session()->setFlashdata('success', 'Data Berhasil Dihapus'); // set flashdata
        return redirect()->to('/Ekskul'); // redirect ke halaman ekskul
    }

    
}

?>