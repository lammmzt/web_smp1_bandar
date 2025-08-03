<?php 
namespace App\Controllers;

use App\Models\siswaModel;

class Siswa extends BaseController
{
    public function index() // tampilkan data siswa
    {
        $model = new siswaModel();
        $data['siswa'] = $model->orderBy('created_at', 'DESC')->findAll(); // ambil data siswa
        $data['title'] = 'siswa'; // set judul
        $data['active'] = 'siswa'; // set active menu
        return view('Admin/Siswa/index', $data); // kirim data ke view
    }
    public function simpan() // simpan data siswa
    {
        $model = new siswaModel(); // panggil model siswa
        $validation =  \Config\Services::validation();
        // dd($this->request->getPost());
        $validation->setRules([
            'tahun_ajaran' => [
                'label' => 'Tahun Ajaran',
                'rules' => 'required|is_unique[siswa.tahun_ajaran]',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'is_unique' => '{field} sudah ada'
                ]
            ],
        ]);
        if (!$validation->withRequest($this->request)->run()) {
            session()->setFlashdata('error', 'Tahun Ajaran sudah ada');
            return redirect()->back()->withInput();
        }
        // ubah semua status_siswa mennjadi 0
        $model->where('status_siswa', '1')->update(null, ['status_siswa' => '0']);
        $data = [
            'tahun_ajaran' => $this->request->getPost('tahun_ajaran'),
            'jumlah_siswa' => $this->request->getPost('jumlah_siswa'),
            'status_siswa' => '1',
            'created_at' => date('Y-m-d H:i:s'),
        ];
        $model->save($data); // simpan data
        session()->setFlashdata('success', 'Data Berhasil Disimpan'); // set flashdata
        return redirect()->to('/Siswa'); // redirect ke halaman siswa
    }

    public function ubah() // ubah data siswa
    {
        $model = new siswaModel(); // panggil model siswa
        $id = $this->request->getPost('id_siswa'); // ambil id siswa
        $data_siswa = $model->find($id); // ambil data siswa
        $validation =  \Config\Services::validation();
        $validation->setRules([
            'tahun_ajaran' => [
                'label' => 'Tahun Ajaran',
                'rules' => 'required|is_unique[siswa.tahun_ajaran,id_siswa,'.$id.']',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'is_unique' => '{field} sudah ada'
                ]
            ],
        ]);
        if (!$validation->withRequest($this->request)->run()) {
            session()->setFlashdata('error', 'Tahun Ajaran sudah ada');
            return redirect()->back()->withInput();
        }
        $data = [
            'tahun_ajaran' => $this->request->getPost('tahun_ajaran'),
            'jumlah_siswa' => $this->request->getPost('jumlah_siswa'),
            'update_at' => date('Y-m-d H:i:s'),
        ];
        $model->update($id, $data); // update data siswa
        session()->setFlashdata('success', 'Data Berhasil Diubah'); // set flashdata
        return redirect()->to('/Siswa'); // redirect ke halaman siswa
    }

    public function hapus($id_siswa) // hapus data siswa
    {
        $model = new siswaModel(); // panggil model siswa
        $data_siswa = $model->find($id_siswa); // ambil data siswa

        $model->delete($id_siswa); // hapus data siswa
        session()->setFlashdata('success', 'Data Berhasil Dihapus'); // set flashdata
        return redirect()->to('/Siswa'); // redirect ke halaman siswa
    }

    public function updateStatus() // ubah status siswa
    {
        $id_siswa = $this->request->getPost('id_siswa');
        $model = new siswaModel(); // panggil model siswa
        // ubah semua status menjadi 0
        $model->where('status_siswa', '1')->update(null, ['status_siswa' => '0']);
        $data = [
            'status_siswa' => '1',
            'updated_at' => date('Y-m-d H:i:s')
        ];
        $model->update($id_siswa, $data); // update data siswa
        return $this->response->setJSON([
            'error' => false,
            'data' => 'Status Berhasil Diubah',
            'status' => '200'
        ]);
    }
    
}

?>