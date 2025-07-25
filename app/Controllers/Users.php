<?php 
namespace App\Controllers;

use App\Models\usersModel;
use Michalsn\Uuid\UuidModel;

class Users extends BaseController
{
    public function index() // tampikan data users
    {
        $model = new usersModel();
        $data['users'] = $model->findAll(); // ambil data users
        $data['title'] = 'Users'; // set judul
        $data['active'] = 'Users'; // set active menu
        return view('Admin/Users/index', $data); // mengirim data ke view
    }
    public function simpan() // simpan data users
    { 
        $uuid = service('uuid'); // panggil library uuid
        $model = new usersModel(); // panggil model users
        // validasi username
         $validation =  \Config\Services::validation();
        $validation->setRules([
            'username' => [
                'label' => 'Username',
                'rules' => 'required|is_unique[users.username]',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'is_unique' => '{field} sudah ada'
                ]
            ],
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            session()->setFlashdata('error', 'Username sudah ada');
            return redirect()->back()->withInput();
        }
        $data = [ // set data
            'id_user' => $uuid->uuid4()->toString(), // generate uuid
            'username' => $this->request->getPost('username'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'nama_user' => $this->request->getPost('nama_user'),
            'role' => $this->request->getPost('role')
        ];
        // dd($data);
        session()->setFlashdata('success', 'Data Berhasil Disimpan'); // set flashdata
        $model->insert($data); // insert data ke tabel users
        return redirect()->to('/Users'); // redirect ke halaman users
    }
    
    public function ubah() // ubah data users
    {
        $model = new usersModel(); // panggil model users
        $id = $this->request->getPost('id_user'); // ambil id user
        $password = $this->request->getPost('password'); // ambil password
        $validation =  \Config\Services::validation();
        $validation->setRules([
            'username' => [
                'label' => 'Username',
                'rules' => 'required|is_unique[users.username,id_user,' . $id . ']',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'is_unique' => '{field} sudah ada'
                ]
            ],
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            session()->setFlashdata('error', 'Username sudah ada');
            return redirect()->back()->withInput();
        }
        if($password == ''){ // jika password kosong
            $data = [ // set data
                'username' => $this->request->getPost('username'),
                'nama_user' => $this->request->getPost('nama_user'),
                'role' => $this->request->getPost('role')
            ]; 
        }else{ // jika password diisi
            $data = [
                'username' => $this->request->getPost('username'),
                'password' => password_hash($password, PASSWORD_DEFAULT),
                'nama_user' => $this->request->getPost('nama_user'),
                'role' => $this->request->getPost('role')
            ];
        }
        session()->setFlashdata('success', 'Data Berhasil Diubah'); // set flashdata
        $model->update($id, $data); // update data users
        return redirect()->to('/Users'); // redirect ke halaman users
    }

    public function hapus($id) // hapus data users
    {
        $model = new usersModel(); // panggil model users
        $model->delete($id);  // hapus data users
        session()->setFlashdata('success', 'Data Berhasil Dihapus'); // set flashdata
        return redirect()->to('/Users'); // redirect ke halaman users
    }
}
?>