<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
    public function index(): string
    {
        $data['title'] = 'Dashboard'; // set judul
        $data['active'] = 'Dashboard'; // set active menu
        return view('Admin/Dashboard', $data); // mengirim data ke view
    
    }
}