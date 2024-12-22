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

    public function upload($id){
        $orderModel = new OrderModel();
        $productModel = new ProductModel();

        $session = session();

        $data["produk"] = $orderModel->select("id, product_id, SUM(total) as total_price, COUNT(*) as quantity, metode_pembayaran, status")
        ->where("user_id", $session->get("user_id"))
        ->where("id", $id)
        ->first();

        $product = $productModel->where("id", $data["produk"]["product_id"])->first();

        // Cek apakah produk ditemukan
        if ($product) {
            $productName = $product["name"]; // Ambil nama produk jika ditemukan
            $productDesc = $product["description"] ;
            $productImg = $product["image"] ;
        } else {
            $productName = "Produk Tidak Ditemukan";  // Jika produk tidak ditemukan
            $productDesc = "Produk Tidak Ditemukan";
            $productImg = "produk Tidak Ditemukan";
        }

        // Menambahkan nama produk dan status ke dalam pesanan
        $data["produk"] += [
            "product_name" => $productName,
            "product_desc" => $productDesc,
            "product_img" => $productImg
        ];


        // dd($data["produk"]); 
        return view('customer/uploadBukti', $data);
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

        $kuantitas = $this->request->getPost("kuantitas");

        $total = ((int) $product["price"]) * $kuantitas;

        $data = [
            "user_id" => (int) $user["id"],
            "customer_name" => $user["username"],
            "status" => $status,
            "total" =>  $total,
            "product_id" => (int) $product["id"],
            "metode_pembayaran" => $this->request->getPost("metode_pembayaran"),
            "bukti_pembayaran" => "belum upload bukti",
            "kuantitas" => $kuantitas
        ];
        
        if (!$product || !$user) {
            return redirect()->back()->with('error', 'Produk atau user tidak ditemukan.');
        }

        
        
        if(!$validation->run($data)){
            // dd($this->validator->getErrors());
            return redirect()->to('/produk/beli/'.$id)->with("validator",$this->validator);
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

    public function pesanan()
    {
        $username = session()->get("username");

        $userModel = new UserModel();
        $orderModel = new OrderModel();
        $productModel = new ProductModel();

        $user = $userModel->where("username", $username)->first();

        
        // Ambil pesanan berdasarkan status masing-masing
        $orders["products"] = $orderModel->where("user_id", $user["id"])
        ->where("status", "Pending")
        ->get()
        ->getResultArray();
        
        // dd($orders["products"]);
        
        $orders["products_completed"] = $orderModel->where("user_id", $user["id"])
        ->where("status", "Completed")
        ->get()
        ->getResultArray();
        
        $orders["products_cancelleds"] = $orderModel->where("user_id", $user["id"])
        ->where("status", "Cancelled")
        ->get()
        ->getResultArray();
        
        $orders["products_processeds"] = $orderModel->where("user_id", $user["id"])
        ->where("status", "Processing")
        ->get()
        ->getResultArray();
        // Loop untuk menambahkan nama produk ke pesanan berdasarkan product_id
        foreach (['products', 'products_completed', 'products_cancelleds', 'products_processeds'] as $statusKey) {
            $i = 0;
            foreach ($orders[$statusKey] as $prod) {
                // Mencari produk berdasarkan product_id
                $product = $productModel->where("id", $prod["product_id"])->first();

                // Cek apakah produk ditemukan
                if ($product) {
                    $productName = $product["name"];  // Ambil nama produk jika ditemukan
                } else {
                    $productName = "Produk Tidak Ditemukan";  // Jika produk tidak ditemukan
                }

                // Menambahkan nama produk dan status ke dalam pesanan
                $orders[$statusKey][$i] += [
                    "product_name" => $productName,
                ];

                $i++;
            }
        }
        // dd($orders["products"]);


        // Kirim data pesanan ke view
        return view("/customer/pesanan", $orders);
    }

    public function kirimBukti($id){
        $orderModel = new OrderModel();
        
        $image = $this->request->getFile('bukti_pembayaran');
        $imageName = null;
        
        if (!($image && $image->isValid())) {
            return redirect()->to("/pesanan/uploadBukti/".$id)->with("error", "Foto tidak valid. pastikan gunakan format png/jpeg");
        }

        $imageName = $image->getRandomName();

        $updatedData = [
            "bukti_pembayaran" => $imageName,
            "status" => 'Processing'
        ];
        // dd($updatedData);

        try {
            // $orderID = $id;  
            $result = $orderModel->update(["id"=>$id],$updatedData);
            if($result == FALSE){
                dd($result);
            }
        } catch (\Exception $e) {
            // Handle error
            log_message('error', 'Error updating order: ' . $e->getMessage());
            return redirect()->to("/pesanan/uploadBukti/".$id)->with("error", "Terjadi kesalahan saat mengunggah bukti pembayaran");
        }
        
        $image->move(ROOTPATH . 'public/img/buktiPembayaran/', $imageName);
        // dd($orderModel->where("id", $id)->first());
        
        return redirect()->to("/pesanan")->with("success", "Bukti pembayaran berhasil diupload");
        
    }
}