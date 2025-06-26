<?php 
namespace App\Controllers;

use App\Models\tabelBantuModel;

class TabelBantu extends BaseController
{
    public function index() // tampilkan data pengumuman
    {
        $model = new tabelBantuModel();
        $data['tabel_bantu'] = $model->orderBy('created_at', 'DESC')->findAll(); // ambil data tabel_bantu
        $data['title'] = 'Tabel Bantu'; // set judul
        $data['active'] = 'TabelBantu'; // set active menu
        return view('Admin/TabelBantu/index', $data); // kirim data ke view
    }

    public function simpan() // simpan data pengumuman
    {
        $model = new tabelBantuModel(); // panggil model pengumuman
        $nama_data_bantu = $this->request->getPost('nama_data_bantu'); // ambil nama data bantu
        if (empty($nama_data_bantu)) { // cek apakah nama data bantu kosong
            return $this->response->setJSON([
                'status' => '400',
                'data' => 'Nama Data Bantu Tidak Boleh Kosong'
            ]);
        }
        $cek_data_bantu = $model->where('nama_data_bantu', $nama_data_bantu)->first(); // cek apakah nama data bantu sudah ada
        if ($cek_data_bantu) { // jika sudah ada
            return $this->response->setJSON([
                'status' => '400',
                'data' => 'Nama Data Bantu Sudah Ada'
            ]);
        }
        $tipe_data_bantu = $this->request->getPost('tipe_data_bantu'); // ambil tipe data bantu
        if ($tipe_data_bantu == 'Video') { // jika tipe data bantu adalah file
            $file = $this->request->getFile('video'); // ambil file
            if ($file->isValid() && !$file->hasMoved()) { // cek apakah file valid dan belum dipindah
                $isi_data_bantu = $file->getRandomName(); // buat nama file acak
                $file->move('Assets/tabel_bantu/', $isi_data_bantu); // pindahkan file ke folder Assets/video/
            } else {
                return $this->response->setJSON([
                    'status' => '400',
                    'data' => 'File tidak valid atau sudah dipindah'
                ]);
            }
        }elseif ($tipe_data_bantu == 'Foto') { // jika tipe data bantu adalah foto
            $file = $this->request->getFile('foto'); // ambil file
            if ($file->isValid() && !$file->hasMoved()) { // cek apakah file valid dan belum dipindah
                $isi_data_bantu = $file->getRandomName(); // buat nama file acak
                $file->move('Assets/tabel_bantu/', $isi_data_bantu); // pindahkan file ke folder Assets/gambar/
            } else {
                return $this->response->setJSON([
                    'status' => '400',
                    'data' => 'File tidak valid atau sudah dipindah'
                ]);
            }
        } elseif ($tipe_data_bantu == 'Link') { // jika tipe data bantu adalah Link
            $isi_data_bantu = $this->request->getPost('link_media'); // ambil link
        } elseif($tipe_data_bantu == 'Editor Teks') { // jika tipe data bantu adalah Teks
            $isi_data_bantu = $this->request->getPost('teksEditors'); // ambil teks
        } elseif ($tipe_data_bantu == 'Textarea') { // jika tipe data bantu adalah Teks
            $isi_data_bantu = $this->request->getPost('textarea'); // ambil teks
        } else {
            return $this->response->setJSON([
                'status' => '400',
                'data' => 'Tipe data bantu tidak valid'
            ]);
        }
        $data = [ // set data
            'nama_data_bantu' => $this->request->getPost('nama_data_bantu'),
            'tipe_data_bantu' => $tipe_data_bantu,
            'isi_data_bantu' => $isi_data_bantu,
            'status_data_bantu' =>'1', // set status data bantu aktif
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ];

        $model->insert($data); // insert data ke tabel pengumuman
         return $this->response->setJSON([
            'status' => '200',
            'data' => 'Data Pengumuman Berhasil Disimpan'
        ]);
    }

    public function ubah() // update data pengumuman
    {
        $model = new tabelBantuModel(); // panggil model pengumuman
        $id_tabel_bantu = $this->request->getPost('id_tabel_bantu'); // ambil id pengumuman
        $dataBantu = $model->find($id_tabel_bantu); // ambil data pengumuman
        if (!$dataBantu) { // jika data pengumuman tidak ditemukan
            return $this->response->setJSON([
                'status' => '404',
                'data' => 'Data Tidak Ditemukan'
            ]);
        }
        $nama_data_bantu = $this->request->getPost('nama_data_bantu'); // ambil nama data bantu
        if (empty($nama_data_bantu)) { // cek apakah nama data bantu kosong
            return $this->response->setJSON([
                'status' => '400',
                'data' => 'Nama Data Bantu Tidak Boleh Kosong'
            ]);
        }
        if($nama_data_bantu != $dataBantu['nama_data_bantu']) { // jika nama data bantu diubah
            $cek_data_bantu = $model->where('nama_data_bantu', $nama_data_bantu)->first(); // cek apakah nama data bantu sudah ada
            if ($cek_data_bantu) { // jika sudah ada
                return $this->response->setJSON([
                    'status' => '400',
                    'data' => 'Nama Data Bantu Sudah Ada'
                ]);
            }
        }

        if($dataBantu['tipe_data_bantu'] == 'Video') { // jika tipe data bantu adalah video atau foto
            $file = $this->request->getFile('video'); // ambil file
            if ($file->isValid() && !$file->hasMoved()) { // cek apakah file valid dan belum dipindah
                $isi_data_bantu = $file->getRandomName(); // buat nama file acak
                $file->move('Assets/tabel_bantu/', $isi_data_bantu); // pindahkan file ke folder Assets/video/
                if (file_exists('Assets/tabel_bantu/' . $dataBantu['isi_data_bantu'])) { // cek apakah file lama ada
                    unlink('Assets/tabel_bantu/' . $dataBantu['isi_data_bantu']); // hapus file lama
                }
            } else {
                $isi_data_bantu = $dataBantu['isi_data_bantu']; // jika file tidak valid atau sudah dipindah, gunakan isi lama
            }
        } elseif ($dataBantu['tipe_data_bantu'] == 'Foto') { // jika tipe data bantu adalah foto
            $file = $this->request->getFile('foto'); // ambil file
            if ($file->isValid() && !$file->hasMoved()) { // cek apakah file valid dan belum dipindah
                $isi_data_bantu = $file->getRandomName(); // buat nama file acak
                $file->move('Assets/tabel_bantu/', $isi_data_bantu); // pindahkan file ke folder Assets/gambar/
                if (file_exists('Assets/tabel_bantu/' . $dataBantu['isi_data_bantu'])) { // cek apakah file lama ada
                    unlink('Assets/tabel_bantu/' . $dataBantu['isi_data_bantu']); // hapus file lama
                }
            } else {
                $isi_data_bantu = $dataBantu['isi_data_bantu']; // jika file tidak valid atau sudah dipindah, gunakan isi lama
            }
            
        } elseif ($dataBantu['tipe_data_bantu'] == 'Link') { // jika tipe data bantu adalah Link
            $isi_data_bantu = $this->request->getPost('link'); // ambil link
        } elseif ($dataBantu['tipe_data_bantu'] == 'Editor Teks') { // jika tipe data bantu adalah Teks
            $isi_data_bantu = $this->request->getPost('teksEditors'); // ambil teks
        } elseif ($dataBantu['tipe_data_bantu'] == 'Textarea') { // jika tipe data bantu adalah Teks
            $isi_data_bantu = $this->request->getPost('textarea'); // ambil teks
        } else {
            return $this->response->setJSON([
                'status' => '400',
                'data' => 'Tipe data bantu tidak valid'
            ]);
        }
        $data = [ // set data
            'nama_data_bantu' => $nama_data_bantu,
            'isi_data_bantu' => $isi_data_bantu,
            'status_data_bantu' => $dataBantu['status_data_bantu'], // tetap menggunakan status lama
            'updated_at' => date('Y-m-d H:i:s')
        ];
        $model->update($id_tabel_bantu, $data); // update data pengumuman
        return $this->response->setJSON([
            'status' => '200',
            'data' => 'Data Pengumuman Berhasil Diubah'
        ]);
    }

    public function update_status() // update status pengumuman
    {
        $id_pengumuman = $this->request->getPost('id'); // ambil id pengumuman
        $status = $this->request->getPost('status'); // ambil status pengumuman
        $model = new tabelBantuModel(); // panggil model pengumuman
        $dataBantu = $model->find($id_pengumuman); // ambil data pengumuman
        $data = [ // set data
            'status_data_bantu' => $status,
            'updated_at' => date('Y-m-d H:i:s')
        ];
        $model->update($id_pengumuman, $data); // update data pengumuman
        return $this->response->setJSON([
            'status' => '200',
            'data' => 'Status Berhasil Diubah'
        ]);
    }

    public function hapus($id_pengumuman) // hapus data pengumuman
    {
        $model = new tabelBantuModel(); // panggil model pengumuman
        $dataBantu = $model->find($id_pengumuman); // ambil data pengumuman
        if (!$dataBantu) { // jika data pengumuman tidak ditemukan
            session()->setFlashdata('error', 'Data Tidak Ditemukan'); // set flashdata error
            return redirect()->to('/TabelBantu'); // redirect ke halaman pengumuman
        }
        if ($dataBantu['tipe_data_bantu'] == 'Video' || $dataBantu['tipe_data_bantu'] == 'Foto') { // jika tipe data bantu adalah video atau foto
            $file_path = 'Assets/tabel_bantu/' . $dataBantu['isi_data_bantu']; // set path file
            if (file_exists($file_path)) { // cek apakah file ada
                unlink($file_path); // hapus file
            }
        }
        $model->delete($id_pengumuman); // hapus data pengumuman
        session()->setFlashdata('success', 'Data Berhasil Dihapus'); // set flashdata
        return redirect()->to('/TabelBantu'); // redirect ke halaman pengumuman
    }

}
?>