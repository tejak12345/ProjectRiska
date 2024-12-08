<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class Auth extends Controller
{
 
    // Menampilkan halaman login
    public function login()
    {
        return view('auth/login');  // Menampilkan tampilan login
    }

    // Proses login
    public function process()
    {
        $session = session();
        $model = new UserModel();

        // Ambil data dari form login
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');

        // Ambil user berdasarkan username
        $user = $model->where('username', $username)->first();

        // Verifikasi username dan password
        if ($user && password_verify($password, $user['password'])) {
            // Set session jika login berhasil
            $session->set(['logged_in' => true, 'username' => $username, 'role' => $user['role']]);

            // Redirect berdasarkan role
            if ($user['role'] === 'admin') {
                return redirect()->to('/admin/dashboard');  // Redirect ke dashboard admin
            } else {
                return redirect()->to('/customer');  // Redirect ke dashboard customer
            }
        } else {
            // Jika gagal, set flashdata untuk pesan error
            $session->setFlashdata('msg', 'Username atau Password salah');
            return redirect()->to('/auth/login');  // Redirect kembali ke halaman login
        }
    }


    // Menampilkan form registrasi
    public function register()
    {
        helper(['form']);
        $validation = \Config\Services::validation();
        return view('auth/register', [
            'validation' => $validation
        ]);
    }


    // Proses registrasi (POST)
    public function registerProcess()
    {
        helper(['form']); // Memastikan helper form di-load
        $validation = \Config\Services::validation();

        // Aturan validasi
        $validation->setRules([
            'username' => 'required|min_length[3]|max_length[20]|is_unique[users.username]',
            'email' => 'required|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[8]',
            'password_confirm' => 'required|matches[password]',
            'role' => 'required|in_list[admin,customer]' // Validasi untuk memilih role
        ]);

        if (!$this->validate($validation->getRules())) {
            // Jika validasi gagal, kembalikan ke form registrasi dengan pesan error
            return view('auth/register', [
                'validation' => $this->validator
            ]);
        }

        // Ambil data dari form
        $username = $this->request->getVar('username');
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        $role = $this->request->getVar('role'); // Ambil role yang dipilih
        $password_hash = password_hash($password, PASSWORD_DEFAULT);

        // Simpan ke database
        $userModel = new UserModel();
        $userModel->save([
            'username' => $username,
            'email' => $email,
            'password' => $password_hash,
            'role' => $role // Simpan role yang dipilih
        ]);

        session()->setFlashdata('msg', 'Registrasi berhasil, silakan login');
        return redirect()->to('auth/login'); // Redirect ke halaman login setelah registrasi berhasil
    }

}

