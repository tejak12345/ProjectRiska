<?php
namespace App\Controllers;

use CodeIgniter\Controller;

class Leaflet extends Controller
{

    // Halaman utama (landing page)
    public function index()
    {
        return view('home');
    }
}
