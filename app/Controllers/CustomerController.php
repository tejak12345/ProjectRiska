<?php
namespace App\Controllers;

use CodeIgniter\Controller;

class CustomerController extends Controller
{
    // Menampilkan halaman dashboard customer
    public function index()
    {
        return view('customer/dashboard');  // Menampilkan halaman dashboard customer
    }
}
