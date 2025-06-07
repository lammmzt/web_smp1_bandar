<?php 
namespace App\Controllers;  

use App\Models\staffModel;

class Staff extends BaseController
{
    public function index() // tampikan data staff
    {
        
        $model = new staffModel();
        $data['staff'] = $model->findAll(); // ambil data staff
        $data['title'] = 'Staff'; // set judul
        $data['active'] = 'Staff'; // set active menu
        return view('Admin/Staff/index', $data); // mengirim data ke view
    }
    public function simpan() // simpan data staff
    { 
        $model = new staffModel(); // panggil model staff
        $file = $this->request->getFile('foto_staff'); // ambil foto staff
        if($file){ // jika ada foto
            $file->move('Assets/img/staff'); // pindahkan foto
            $data = [ // set data
                'nama_staff' => $this->request->getPost('nama_staff'),
                'jabatan_staff' => $this->request->getPost('jabatan_staff'),
                'jenis_staff' => $this->request->getPost('jenis_staff'),
                'foto_staff' => $file->getName()
            ];
        }else{ // jika tidak ada foto
            $data = [ // set data
                'nama_staff' => $this->request->getPost('nama_staff'),
                'jabatan_staff' => $this->request->getPost('jabatan_staff')
            ];
        }
        // dd($data);
        session()->setFlashdata('success', 'Data Berhasil Disimpan'); // set flashdata
        $model->insert($data); // insert data ke tabel staff
        return redirect()->to('/Staff'); // redirect ke halaman staff
    }

    public function ubah() // ubah data staff
    {
        $model = new staffModel(); // panggil model staff
        $id = $this->request->getPost('id_staff'); // ambil id staff
        $file = $this->request->getFile('foto_staff'); // ambil foto staff
        $data_staff = $model->find($id); // ambil data staff
        if($file != ''){ // jika ada foto
            $file->move('Assets/img/staff'); // pindahkan foto
            $data = [ // set data
                'nama_staff' => $this->request->getPost('nama_staff'),
                'jabatan_staff' => $this->request->getPost('jabatan_staff'),
                'foto_staff' => $file->getName()
            ];
            if($data_staff['foto_staff'] != ''){ // jika foto staff tidak kosong
                unlink('Assets/img/staff/'.$data_staff['foto_staff']); // hapus foto staff
            }
        }else{ // jika tidak ada foto
            $data = [ // set data
                'nama_staff' => $this->request->getPost('nama_staff'),
                'jabatan_staff' => $this->request->getPost('jabatan_staff'),
                'jenis_staff' => $this->request->getPost('jenis_staff')
            ];
        }
        // dd($data);
        session()->setFlashdata('success', 'Data Berhasil Diubah'); // set flashdata
        $model->update($id, $data); // update data staff
        return redirect()->to('/Staff'); // redirect ke halaman staff
    }

    public function hapus($id) // hapus data staff
    {
        $model = new staffModel(); // panggil model staff
        $data_staff = $model->find($id); // ambil data staff
        if($data_staff['foto_staff'] != ''){ // jika foto staff tidak kosong
            unlink('Assets/img/staff/'.$data_staff['foto_staff']); // hapus foto staff
        }
        $model->delete($id);  // hapus data staff
        session()->setFlashdata('success', 'Data Berhasil Dihapus'); // set flashdata
        return redirect()->to('/Staff'); // redirect ke halaman staff
    }
}
?>