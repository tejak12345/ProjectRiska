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

    public function processCheckout($id)
    {

        // Process the payment based on method
        // $paymentMethod = $this->request->getPost('payment_method');

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
            // dd($this->validator->getErrors());
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
        return view('customer/profile', ['user' => $user]);
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

        return redirect()->to('/customer/profile'); // Sesuaikan dengan route
    }

    public function pesanan(){
        $username = session()->get("username");

        $userModel = new UserModel();
        $orderModel = new OrderModel();
        $productModel = new ProductModel();

        $user = $userModel->where("username",$username)->first();
        $orders["products"] = $orderModel->select("product_id, SUM(total) as total_price, COUNT(*) as quantity")->where("user_id",$user["id"])->where("status","Pending")->groupBy("product_id")->get()->getResultArray();
        $orders["products_completed"] = $orderModel->select("product_id, SUM(total) as total_price, COUNT(*) as quantity")->where("user_id",$user["id"])->where("status","Completed")->groupBy("product_id")->get()->getResultArray();
        $orders["products_cancelleds"] = $orderModel->select("product_id, SUM(total) as total_price, COUNT(*) as quantity")->where("user_id",$user["id"])->where("status","Cancelled")->groupBy("product_id")->get()->getResultArray();
        $orders["products_processeds"] = $orderModel->select("product_id, SUM(total) as total_price, COUNT(*) as quantity")->where("user_id",$user["id"])->where("status","Processed")->groupBy("product_id")->get()->getResultArray();
        // $products = $productModel->where("id",$orders);
        // dd($orders["products"]);
        $i = 0 ;

        foreach($orders["products"] as $prod){
            $productName = $productModel->where("id",$prod["product_id"])->first()["name"];
            // dd($productName);
            $prod += ["product_name" => $productName,"status" => "Pending"];
            // dd($prod);
            $orders["products"][$i] += $prod;
            $i++;
        };
        
        // dd($orders["products"]);
        // $query1 = $orderModel->select("product_id, SUM(total) as total_price, COUNT(*) as quantity")->where("user_id",$user["id"])->where("status","Pending")->groupBy("product_id")->get();
       
        
        // $orders["pendings"] = $query1->getResultArray();
        // $orders["completeds"] = $query2->getResultArray();
        // $orders["cancelleds"] = $query3->getResultArray();
        // $orders["Processeds"] = $query4->getResultArray();

        // dd($orders);
        return view("/customer/pesanan",$orders);

    }
}