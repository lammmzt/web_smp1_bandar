<?php 
namespace App\Controllers;

use App\Models\pengumumanModel;

class Pengumuman extends BaseController
{
    public function index() // tampilkan data pengumuman
    {
        $model = new pengumumanModel();
        $data['pengumuman'] = $model->orderBy('created_at', 'DESC')->findAll(); // ambil data pengumuman
        $data['title'] = 'Pengumuman'; // set judul
        $data['active'] = 'Pengumuman'; // set active menu
        return view('Admin/Pengumuman/index', $data); // kirim data ke view
    }

    public function simpan() // simpan data pengumuman
    {
        $model = new pengumumanModel(); // panggil model pengumuman
        $type_media = $this->request->getPost('type_media'); // ambil type media
        $tag_pengumuman = $this->request->getPost('tag_pengumuman'); // ambil tag pengumuman
        $judul_pengumuman = $this->request->getPost('judul_pengumuman'); // ambil judul pengumuman

        $id_judul = str_replace([' ', "'", '"', '/', '\\'], '_', $judul_pengumuman); // ganti spasi, ' , " , / , \ dengan _
        $id_judul = strtolower($id_judul); // ubah ke hur
        $id_pengumuman = $id_judul.'-'.date('YmdHis'); // set id pengumuman
        
        // $img_thumbnail = $this->request->getFile('img_thumbnail'); // ambil thumbnail pengumuman
        // $img_thumbnail->move('Assets/img/thumbnail'); // pindahkan thumbnail
        if($type_media == '1'){ // jika type media video
            $data = [ // set data
                'id_pengumuman' => $id_pengumuman,
                'id_user' => session()->get('id_user'),
                'judul_pengumuman' => $this->request->getPost('judul_pengumuman'),
                'deskripsi_pengumuman' => $this->request->getPost('deskripsi_pengumuman'),
                'type_media' => $this->request->getPost('type_media'),
                'tag_pengumuman' => $this->request->getPost('tag_pengumuman'),
                'tipe_pengumuman' => $this->request->getPost('tipe_pengumuman'),
                'nama_media' => $this->request->getPost('link_media'),
                'status_pengumuman' => '1',
                // 'img_thumbnail' => $img_thumbnail->getName(),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ];
        }else{ // jika type media foto
            $file = $this->request->getFile('foto_media'); // ambil foto pengumuman
            $file->move('Assets/img/pengumuman'); // pindahkan foto
            $data = [ // set data
                'id_pengumuman' => $id_pengumuman,
                'id_user' => session()->get('id_user'),
                'judul_pengumuman' => $this->request->getPost('judul_pengumuman'),
                'deskripsi_pengumuman' => $this->request->getPost('deskripsi_pengumuman'),
                'type_media' => $this->request->getPost('type_media'),
                'tag_pengumuman' => $this->request->getPost('tag_pengumuman'),
                'tipe_pengumuman' => $this->request->getPost('tipe_pengumuman'),
                'nama_media' => $file->getName(),
                // 'img_thumbnail' => $img_thumbnail->getName(),
                'status_pengumuman' => '1',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ];
        }

        $model->insert($data); // insert data ke tabel pengumuman
         return $this->response->setJSON([
            'status' => '200',
            'data' => 'Data Pengumuman Berhasil Disimpan'
        ]);
    }

    public function ubah() // ubah data pengumuman
    {
        $model = new pengumumanModel(); // panggil model pengumuman
        $id = $this->request->getPost('id_pengumuman'); // ambil id pengumuman
        $type_media = $this->request->getPost('type_media'); // ambil type media
        $data_pengumuman = $model->find($id); // ambil data pengumuman
        if($type_media == '1'){ // jika type media video
            $data = [ // set data
                'judul_pengumuman' => $this->request->getPost('judul_pengumuman'),
                'deskripsi_pengumuman' => $this->request->getPost('deskripsi_pengumuman'),
                'type_media' => $this->request->getPost('type_media'),
                'tag_pengumuman' => $this->request->getPost('tag_pengumuman'),
                'nama_media' => $this->request->getPost('link_media'),
                'tipe_pengumuman' => $this->request->getPost('tipe_pengumuman'),
                'updated_at' => date('Y-m-d H:i:s')
            ];
        }else{ // jika type media foto
            $file = $this->request->getFile('foto_media'); // ambil foto pengumuman
            if($file != ''){ // jika ada foto
                $file->move('Assets/img/pengumuman'); // pindahkan foto
                $data = [ // set data
                    'judul_pengumuman' => $this->request->getPost('judul_pengumuman'),
                    'deskripsi_pengumuman' => $this->request->getPost('deskripsi_pengumuman'),
                    'type_media' => $this->request->getPost('type_media'),
                    'tag_pengumuman' => $this->request->getPost('tag_pengumuman'),
                    'tipe_pengumuman' => $this->request->getPost('tipe_pengumuman'),
                    'foto_media' => $file->getName(),
                    'updated_at' => date('Y-m-d H:i:s')
                ];
                if($data_pengumuman['nama_media'] != ''){ // jika foto pengumuman tidak kosong
                    unlink('Assets/img/pengumuman/'.$data_pengumuman['nama_media']); // hapus foto pengumuman
                }
            }else{ // jika tidak ada foto
                $data = [ // set data
                    'judul_pengumuman' => $this->request->getPost('judul_pengumuman'),
                    'deskripsi_pengumuman' => $this->request->getPost('deskripsi_pengumuman'),
                    'type_media' => $this->request->getPost('type_media'),
                    'tag_pengumuman' => $this->request->getPost('tag_pengumuman'),
                    'tipe_pengumuman' => $this->request->getPost('tipe_pengumuman'),
                    'updated_at' => date('Y-m-d H:i:s')
                ];
            }

        }

        $model->update($id, $data); // update data ke tabel pengumuman
        return $this->response->setJSON([
            'status' => '200',
            'data' => 'Data Pengumuman Berhasil Disimpan'
        ]);
        
    }

    public function update_views($id_pengumuman) // update views pengumuman
    {
        $model = new pengumumanModel(); // panggil model pengumuman
        $data_pengumuman = $model->find($id_pengumuman); // ambil data pengumuman
        $views = $data_pengumuman['views_pengumuman'] + 1; // tambah views
        $data = [ // set data
            'views_pengumuman' => $views
        ];
        $model->update($id_pengumuman, $data); // update data pengumuman
        return $this->response->setJSON([
            'status' => '200',
            'data' => 'Views Pengumuman Berhasil Ditambah'
        ]);
    }

    public function update_status() // update status pengumuman
    {
        $id_pengumuman = $this->request->getPost('id'); // ambil id pengumuman
        $status = $this->request->getPost('status'); // ambil status pengumuman
        $model = new pengumumanModel(); // panggil model pengumuman
        $data_pengumuman = $model->find($id_pengumuman); // ambil data pengumuman
        $data = [ // set data
            'status_pengumuman' => $status,
            'updated_at' => date('Y-m-d H:i:s')
        ];
        $model->update($id_pengumuman, $data); // update data pengumuman
        return $this->response->setJSON([
            'status' => '200',
            'data' => 'Status Pengumuman Berhasil Diubah'
        ]);
    }

    public function hapus($id_pengumuman) // hapus data pengumuman
    {
        $model = new pengumumanModel(); // panggil model pengumuman
        $data_pengumuman = $model->find($id_pengumuman); // ambil data pengumuman
        if($data_pengumuman['type_media'] == '2'){ // jika type media foto
            unlink('Assets/img/pengumuman/'.$data_pengumuman['nama_media']); // hapus foto pengumuman
        }
        $model->delete($id_pengumuman); // hapus data pengumuman
        session()->setFlashdata('success', 'Data Berhasil Dihapus'); // set flashdata
        return redirect()->to('/Pengumuman'); // redirect ke halaman pengumuman
    }

}
?>