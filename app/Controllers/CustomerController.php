<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\ProductModel;
use App\Models\UserModel;
use App\Models\OrderModel;

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
        return view('customer/checkout', ['produk' => $produk]);
    }

    public function processCheckout($id)
    {
        $userModel = new UserModel();
        $productModel = new ProductModel();
        $orderModel = new OrderModel();

        $validation = \Config\Services::validation();

        $validation->setRules($orderModel->validationRules);

        $product = $productModel->where("id",$id)->first();
        $user= $userModel->where("username", $this->request->getPost("username"))->first();

        $status = "Pending";

        $data = [
            "user_id" => (int) $user["id"],
            "customer_name" => $user["username"],
            "status" => $status,
            "total" =>  (int) $product["price"],
            "product_id" => (int) $product["id"],
            "metode_pembayaran" => $this->request->getPost("metode_pembayaran")
        ];



        if (!$product || !$user) {
            return redirect()->back()->with('error', 'Produk atau user tidak ditemukan.');
        }

        if(!$validation->run($data)){
            return view('customer/beli'.$id,[
                "validation" => $this->validator
            ]);
        };

        // Simpan data ke database
        try {
            $orderModel->save($data);
        } catch (\Exception $e) {
            return dd($e->getMessage()); // Debug jika ada error dari query database
        }

        session()->setFlashdata("success", "produk berhasil dibeli!");
        // For now, just redirect with success message
        return redirect()->to('/produk/beli/'.$id);
    }

    public function beli($id){
        $session=session();

        $productModel = new ProductModel();
        $userModel = new UserModel();
        $data["product"] = $productModel->where("id", $id)->first();
        $data["user"] = $userModel->where("username",$session->get("username"))->first();


        if(!$data){
            return view("customer/notfound");
        }

        return view("customer/beli",$data);
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

        // Redirect kembali ke halaman profil untuk menampilkan notifikasi sukses
        return redirect()->back();  // Kembali ke halaman profil yang sama
    }

    public function pesanan(){
        
    }
}