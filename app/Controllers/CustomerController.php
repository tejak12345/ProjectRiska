<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\ProductModel;
use App\Models\UserModel;

class CustomerController extends Controller
{

    // Menampilkan halaman dashboard customer
    public function index()
    {
        return view('customer/dashboard');  // Menampilkan halaman dashboard customer
    }
    public function produk()
    {
        return view('customer/produk');
    }
    public function detail($id)
    {
        // Simulasi pengambilan data produk berdasarkan $id
        $produk = [
            'id' => $id,
            'nama' => 'Leaflet Informasi Vaksin',
            'deskripsi' => 'Desain profesional untuk informasi vaksinasi yang informatif dan mudah dipahami.',
            'harga' => 150000,
            'gambar' => 'https://via.placeholder.com/500'
        ];

        return view('customer/detail', ['produk' => $produk]);
    }

    public function listProducts()
    {
        $model = new ProductModel(); // Pastikan Anda sudah membuat model ini
        $data['products'] = $model->findAll();
        return view('customer/produk', $data);
    }


    public function checkout($id)
    {
        // Simulasi pengambilan data produk berdasarkan $id
        $produk = [
            'id' => $id,
            'nama' => 'Leaflet Informasi Vaksin',
            'deskripsi' => 'Desain profesional untuk informasi vaksinasi',
            'harga' => 150000,
            'gambar' => 'https://via.placeholder.com/500'
        ];

        return view('customer/checkout', ['produk' => $produk]);
    }

    public function processCheckout()
    {
        // Validate input
        $rules = [
            'full_name' => 'required',
            'email' => 'required|valid_email',
            'phone' => 'required',
            'payment_method' => 'required'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Process the payment based on method
        $paymentMethod = $this->request->getPost('payment_method');

        // Here you would typically:
        // 1. Save order to database
        // 2. Process payment
        // 3. Send confirmation email
        // 4. etc.

        // For now, just redirect with success message
        return redirect()->to('/customer')->with('success', 'Pesanan berhasil! Terima kasih telah berbelanja.');
    }
    // Logout
    public function logout()
    {
        session()->destroy();
        return redirect()->to('auth/login');
    }

    public function profile()
    {
        $userModel = new UserModel();
        $username = session()->get("username");
        // dd($userId);
        // Ambil data pengguna
        $data['user'] = $userModel->where("username", $username)->first();

        if (!$data['user']) {
            return redirect()->to('/auth/login');
        }

        return view('customer/profile', $data);
    }
    public function updateProfile()
    {
        // Validasi input
        $validation = \Config\Services::validation();

        // Periksa apakah password baru dan konfirmasi cocok
        if ($this->request->getPost('new_password') != $this->request->getPost('confirm_password')) {
            session()->set('error', 'Password baru dan konfirmasi tidak cocok.');
            return redirect()->back(); // Kembali ke halaman yang sama
        }

        // Ambil data pengguna saat ini
        $username = session()->get('username'); // Pastikan ada sesi pengguna
        $userModel = new UserModel();

        // Ambil data pengguna berdasarkan username
        $user = $userModel->getUserByUsername($username);

        // Jika pengguna tidak ditemukan, redirect kembali dengan error
        if (!$user) {
            session()->set('error', 'Pengguna tidak ditemukan.');
            return redirect()->back(); // Kembali ke halaman yang sama
        }

        // Update data profil
        $updatedData = [
            'username' => $this->request->getPost('username'),
            'email' => $this->request->getPost('email'),
        ];

        // Jika ada password baru, tambahkan ke data update
        if ($this->request->getPost('new_password')) {
            $updatedData['password'] = password_hash($this->request->getPost('new_password'), PASSWORD_BCRYPT);
        }

        // Simpan data baru ke database
        $userModel->update($user['id'], $updatedData);  // Pastikan menggunakan ID untuk update

        // Menambahkan flashdata untuk notifikasi sukses
        session()->set('success', 'Profil berhasil diperbarui.');

        return redirect()->to('/profil'); // Sesuaikan dengan route
    }

    public function pesanan(){
        $username = session()->get("username");

        $userModel = new UserModel();
        $orderModel = new OrderModel();

        $user = $userModel->where("username",$username)->first();
        $orders = $orderModel->where("user_id",$user["id"])->all();
        // $query1 = $orderModel->select("product_id, SUM(total) as total_price, COUNT(*) as quantity")->where("user_id",$user["id"])->where("status","Pending")->groupBy("product_id")->get();
        // $query2 = $orderModel->select("product_id, SUM(total) as total_price, COUNT(*) as quantity")->where("user_id",$user["id"])->where("status","Completed")->groupBy("product_id")->get();
        // $query3 = $orderModel->select("product_id, SUM(total) as total_price, COUNT(*) as quantity")->where("user_id",$user["id"])->where("status","Cancelled")->groupBy("product_id")->get();
        // $query4 = $orderModel->select("product_id, SUM(total) as total_price, COUNT(*) as quantity")->where("user_id",$user["id"])->where("status","Processed")->groupBy("product_id")->get();
        
        // $orders["pendings"] = $query1->getResultArray();
        // $orders["completeds"] = $query2->getResultArray();
        // $orders["cancelleds"] = $query3->getResultArray();
        // $orders["Processeds"] = $query4->getResultArray();

        dd($orders["pendings"]->product_id);
        return view("/customer/pesanan",$orders);

    }
}