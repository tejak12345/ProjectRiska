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

    public function profil()
    {
        // Ambil data pengguna yang sedang login
        $session = session();
        $username = $session->get('username');

        // Cek jika tidak ada sesi login
        if (!$username) {
            return redirect()->to('auth/login'); // Redirect ke halaman login jika tidak ada sesi
        }

        // Ambil data user berdasarkan username
        $userModel = new UserModel();
        $user = $userModel->getUserByUsername($username);

        // Pastikan data pengguna ditemukan
        if (!$user) {
            return redirect()->to('auth/login'); // Redirect ke login jika user tidak ditemukan
        }

        // Kirim data ke view 'customer/profil.php'
        return view('customer/profil', ['user' => $user]);
    }

    public function updateProfil()
    {
        // Validasi input
        $rules = [
            'username' => 'required|min_length[3]|max_length[50]',
            'email'    => 'required|valid_email',
        ];

        if ($this->request->getVar('password')) {
            $rules['password'] = 'min_length[6]'; // Validasi password hanya jika diisi
        }

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $session = session();
        $username = $session->get('username');

        // Ambil data user yang ingin diperbarui
        $userModel = new UserModel();
        $user = $userModel->getUserByUsername($username);

        if (!$user) {
            return redirect()->to('auth/login'); // Redirect ke login jika user tidak ditemukan
        }

        // Data yang ingin diperbarui
        $data = [
            'username' => $this->request->getVar('username'),
            'email'    => $this->request->getVar('email'),
        ];

        // Tambahkan hash password jika ada password baru
        if ($this->request->getVar('password')) {
            $data['password'] = password_hash($this->request->getVar('password'), PASSWORD_DEFAULT);
        }

        // Update data pengguna
        $userModel->update($user['id'], $data);

        // Set flash message untuk menunjukkan keberhasilan
        session()->setFlashdata('success', 'Profil berhasil diperbarui.');

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