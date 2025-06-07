<?php

namespace App\Controllers;
use App\Models\dataSekolahModel;
use App\Models\staffModel;
use App\Models\fasilitasModel;
use App\Models\ekskulModel;
use App\Models\prestasiModel;

class Web extends BaseController
{
    public function index(): string
    {
        $model = new dataSekolahModel();
        $staffModel = new staffModel();
        $fasilitasModel = new fasilitasModel();
        $ekskulModel = new ekskulModel();
        $prestasiModel = new prestasiModel();
        $data['data_fasilitas'] = $fasilitasModel->getFasilitas(); // ambil data fasilitas
        $data['data_sekolah'] = $model->first(); // ambil data sekolah
        $data['data_staff'] = $staffModel->getStaff(); // ambil data staff
        $data['data_ekskul'] = $ekskulModel->getEkskul(); // ambil data ekskul
        $data['data_prestasi'] = $prestasiModel->getPrestasi(); // ambil data prestasi
        $data['kepala_sekolah'] = $staffModel->where('jabatan_staff', 'Kepala Sekolah')->first(); // ambil data kepala sekolah
        $data['jumlah_tenaga_kependidikan'] = $staffModel->where('jenis_staff', 'Tenaga Kependidikan')->countAllResults(); // hitung jumlah tenaga kependidikan
        $data['jumlah_tenaga_pendidik'] = $staffModel->where('jenis_staff', 'Tenaga Pendidik')->countAllResults(); // hitung jumlah tenaga pendidik
        $data['title'] = 'SMP NEGERI 1 Bandar'; // set judul
        $data['active'] = 'Home'; // set active menu
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
        $data['active'] = 'Sejarah'; // set active menu
        return view('Landing/Visi', $data); // mengirim data ke view
    }
}