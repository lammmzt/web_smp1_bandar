<?php

namespace App\Controllers;
use App\Models\dataSekolahModel;
use App\Models\staffModel;
use App\Models\fasilitasModel;
use App\Models\ekskulModel;
use App\Models\prestasiModel;
use App\Models\pengumumanModel;
class Web extends BaseController
{
    public function index(): string
    {
        $model = new dataSekolahModel();
        $staffModel = new staffModel();
        $fasilitasModel = new fasilitasModel();
        $ekskulModel = new ekskulModel();
        $prestasiModel = new prestasiModel();
        $pengumumanModel = new pengumumanModel();
        $data['data_fasilitas'] = $fasilitasModel->getFasilitas(); // ambil data fasilitas
        $data['data_sekolah'] = $model->first(); // ambil data sekolah
        $data['data_staff'] = $staffModel->getStaff(); // ambil data staff
        $data['data_ekskul'] = $ekskulModel->getEkskul(); // ambil data ekskul
        $data['data_pengumuman'] = $pengumumanModel->getPengumuman()->where(['tipe_pengumuman' => '1'])->orderBy('created_at', 'DESC')->limit(3)->findAll(); // ambil data pengumuman
        $data['data_berita'] = $pengumumanModel->getPengumuman()->where(['tipe_pengumuman' => '0'])->orderBy('created_at', 'DESC')->limit(3)->findAll(); // ambil data berita
        $data['data_prestasi'] = $prestasiModel->getPrestasi(); // ambil data prestasi
        $data['kepala_sekolah'] = $staffModel->where('jabatan_staff', 'Kepala Sekolah')->first(); // ambil data kepala sekolah
        $data['jumlah_tenaga_kependidikan'] = $staffModel->where('jenis_staff', 'Tenaga Kependidikan')->countAllResults(); // hitung jumlah tenaga kependidikan
        $data['jumlah_tenaga_pendidik'] = $staffModel->where('jenis_staff', 'Tenaga Pendidik')->countAllResults(); // hitung jumlah tenaga pendidik
        $data['title'] = 'SMP NEGERI 1 Bandar'; // set judul
        $data['active'] = 'Home'; // set active menu
        // dd($data);
        return view('Landing/Home', $data); // mengirim data ke view
    
    }

    public function Sejarah(): string
    {
        $model = new dataSekolahModel();
        $data['data_sekolah'] = $model->first(); // ambil data sekolah
        $data['title'] = 'Sejarah SMP NEGERI 1 Bandar'; // set judul
        $data['active'] = 'Sejarah'; // set active menu
        return view('Landing/Sejarah', $data); // mengirim data ke view
    }
    
    public function Visi(): string
    {
        $model = new dataSekolahModel();
        $data['data_sekolah'] = $model->first(); // ambil data sekolah
        $data['title'] = 'Sejarah SMP NEGERI 1 Bandar'; // set judul
        $data['active'] = 'Visi & Misi'; // set active menu
        return view('Landing/Visi', $data); // mengirim data ke view
    }

    public function Berita(): string
    {
        $model = new pengumumanModel();
        $modelSekolah = new dataSekolahModel();
        $cari = ''; // inisialisasi variabel cari
        if($this->request->getPost('cari')){ // jika ada pencarian
            $cari = $this->request->getPost('cari');
            if($cari != '') { // jika pencarian tidak kosong
                $data['data_berita'] = $model->getPengumuman()->like('judul_pengumuman', $cari)->where(['tipe_pengumuman' => '0'])->orderBy('created_at', 'DESC')->findAll(); // ambil data berita sesuai pencarian
            } else {
                $data['data_berita'] = $model->getPengumuman()->where(['tipe_pengumuman' => '0'])->orderBy('created_at', 'DESC')->findAll(); // ambil data berita
            }
        } else {
            $data['data_berita'] = $model->getPengumuman()->where(['tipe_pengumuman' => '0'])->orderBy('created_at', 'DESC')->findAll(); // ambil data berita
        }
        $data['data_berita_baru'] = $model->getPengumuman()->where(['tipe_pengumuman' => '0'])->orderBy('created_at', 'DESC')->findAll(); // ambil data berita
        $data['data_sekolah'] = $modelSekolah->first(); // ambil data sekolah
        $data['cari'] = $cari; // kirim data pencarian ke view
        $data['title'] = 'Berita SMP NEGERI 1 Bandar'; // set judul
        $data['active'] = 'Detaail Berita'; // set active menu
        return view('Landing/Berita/index', $data); // mengirim data ke view
    }

    public function DetailBerita($id_pengumuman): string
    {
        $model = new pengumumanModel();
        $modelSekolah = new dataSekolahModel();
        $data_detail = $model->where(['id_pengumuman' => $id_pengumuman])->first(); // ambil data berita berdasarkan id_pengumuman
        // update jumlah view berita
        $model->update($id_pengumuman, [
            'views_pengumuman' => $data_detail['views_pengumuman'] + 1 // tambah jumlah view
        ]);
        $data['data_berita'] = $model->getPengumuman()->where(['tipe_pengumuman' => '0'])->orderBy('created_at', 'DESC')->findAll(); // ambil data berita
        if(!$data['data_berita']) {
            return redirect()->to(base_url('Berita')); // jika tidak ada data berita, redirect ke halaman berita
        }
        $data['detail_berita'] = $model->getPengumuman()->where(['id_pengumuman' => $id_pengumuman])->first(); // ambil data berita berdasarkan slug
        $data['data_sekolah'] = $modelSekolah->first(); // ambil data sekolah
        $data['title'] = 'Detail Berita SMP NEGERI 1 Bandar'; // set judul
        $data['active'] = 'Berita'; // set active menu
        return view('Landing/Berita/detail', $data); // mengirim data ke view
    }
}