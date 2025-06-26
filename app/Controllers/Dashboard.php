<?php

namespace App\Controllers;
use App\Models\staffModel;
use App\Models\fasilitasModel;
use App\Models\ekskulModel;
use App\Models\prestasiModel;
use App\Models\aktifitasWebModel;
class Dashboard extends BaseController
{
    public function index(): string
    {
        $staffModel = new staffModel(); // panggil model staff
        $fasilitasModel = new fasilitasModel(); // panggil model fasilitas
        $ekskulModel = new ekskulModel(); // panggil model ekstrakurik
        $prestasiModel = new prestasiModel(); // panggil model prestasi
        $aktifitasWebModel = new aktifitasWebModel(); // panggil model aktifitas
        $data['title'] = 'Dashboard'; // set judul
        $data['active'] = 'Dashboard'; // set active menu
        $data['jml_staff'] = $staffModel->countAllResults(); // hitung jumlah staff
        $data['jml_fasilitas'] = $fasilitasModel->countAllResults(); // hitung jumlah fasilitas
        $data['jml_ekskul'] = $ekskulModel->countAllResults(); // hitung jumlah ekstrakurik
        $data['jml_prestasi'] = $prestasiModel->countAllResults(); // hitung jumlah prestasi    
        return view('Admin/Dashboard', $data); // mengirim data ke view
    
    }
}