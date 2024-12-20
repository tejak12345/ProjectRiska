<?php

namespace App\Controllers;

use App\Models\UserModel;

class ProfilController extends BaseController
{
    public function index()
    {
        $userModel = new UserModel();
        $session = session();

        // Ambil data pengguna yang sedang login
        $username = $session->get('username');
        $user = $userModel->getUserByUsername($username);

        // Pastikan data pengguna ditemukan
        if ($user) {
            return view('customer/profil', ['user' => $user]); // Ubah path ke 'customer/profil'
        }

        return redirect()->to('/login'); // Jika pengguna tidak ditemukan, redirect ke login
    }

    public function update()
    {
        $userModel = new UserModel();
        $session = session();

        // Validasi input
        $rules = [
            'username' => 'required|min_length[3]|max_length[50]',
            'email'    => 'required|valid_email',
            'password' => 'required|min_length[6]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $username = $session->get('username');
        $data = [
            'username' => $this->request->getVar('username'),
            'email'    => $this->request->getVar('email'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
        ];

        // Update data pengguna
        $userModel->update($userModel->getUserByUsername($username)['id'], $data);

        return redirect()->to('/profil')->with('success', 'Profil berhasil diperbarui.');
    }
}