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
        

        return view('customer/checkout', ['produk' => $produk]);
    }

    public function processCheckout()
    {
        // Validate input
        // $rules = [
        //     'full_name' => 'required',
        //     'email' => 'required|valid_email',
        //     'payment_method' => 'required'
        // ];

        // if (!$this->validate($rules)) {
        //     return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        // }

        // Process the payment based on method
        // $paymentMethod = $this->request->getPost('payment_method');

        $username = $this->request->getPost("username");
        $metode_pembayaran = $this->request->getPost("metode_pembayaran");
        
        $productModel = new ProductModel();
        $userModel = new UserModel();
        $product["product"] = $productModel->where("id",$id)->fist();
        $product["users"] = $userModel->where("username", $username);

        if($metode_pembayaran == "Transfer Bank"){
            
        }

        // Here you would typically:
        // 1. Save order to database
        // 2. Process payment
        // 3. Send confirmation email
        // 4. etc.

        // For now, just redirect with success message
        return redirect()->to('/customer')->with('success', 'Pesanan berhasil! Terima kasih telah berbelanja.');
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
}