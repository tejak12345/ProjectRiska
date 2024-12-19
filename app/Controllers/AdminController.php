<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\ProductModel;
use App\Models\OrderModel;
use App\Models\UserModel;
use App\Models\ProjectModel;

class AdminController extends Controller
{
    // Halaman Dashboard Admin
    public function index()
    {
        // Instantiate the necessary models
        $productModel = new ProductModel();
        $orderModel = new OrderModel();
        $userModel = new UserModel();

        // Get the total number of products
        $totalProducts = $productModel->countAll();

        // Get the count of active users
        $activeUsersCount = $userModel->getActiveUsersCount();

        // Get recent orders (adjust the limit as needed)
        $recentOrders = $orderModel->orderBy('created_at', 'desc')->limit(5)->findAll();

        // Get admin details (fetching the first admin user from the database)
        $admin = $userModel->getAdmin(); // This assumes you have a method getAdmin() to fetch the admin data

        // Pass the data to the view
        return view('admin/dashboard', [
            'totalProducts' => $totalProducts,
            'activeUsersCount' => $activeUsersCount,
            'recentOrders' => $recentOrders,
            'admin' => $admin // Send admin data to the view
        ]);
    }




    // Manajemen Produk
    public function products()
    {
        // Instantiate the necessary models
        $productModel = new ProductModel();
        $userModel = new UserModel();  // Instantiate the UserModel correctly

        // Get all products
        $data['products'] = $productModel->findAll();

        // Get admin data
        $data['admin'] = $userModel->getAdmin();  // Get admin data

        // Pass the products and admin data to the view
        return view('admin/products/index', $data);
    }


    public function createProduct()
    {
        // Instantiate the necessary models
        $userModel = new UserModel(); // Instantiate the UserModel

        // Get admin data
        $admin = $userModel->getAdmin();  // Retrieve the admin data

        // Pass the admin data to the view along with the create product view
        return view('admin/products/create', ['admin' => $admin]);
    }


    public function storeProduct()
    {
        $model = new ProductModel();

        $image = $this->request->getFile('image');

        // Jika file gambar ada dan valid
        if ($image && $image->isValid()) {
            $imageName = $image->getRandomName(); // Nama acak untuk file gambar
            // Pindahkan gambar ke subfolder products di dalam folder uploads
            $image->move(ROOTPATH . 'public/img/products', $imageName); // Gambar disimpan di writable/uploads/products
        } else {
            $imageName = null;
        }

        // Data produk yang akan disimpan
        $data = [
            'name' => $this->request->getPost('name'),
            'price' => $this->request->getPost('price'),
            'description' => $this->request->getPost('description'),
            'image' => $imageName,
        ];


        $model->save($data);

        return redirect()->to('/admin/products');
    }


    public function listProducts()
    {
        $model = new ProductModel();
        $data['products'] = $model->findAll();
        return view('customer/products', $data);
    }

    public function editProduct($id)
    {
        $productModel = new ProductModel();
        $data['product'] = $productModel->find($id);

        return view('admin/products/edit', $data);
    }

    public function updateProduct($id)
    {
        $productModel = new ProductModel();

        $productModel->update($id, [
            'name' => $this->request->getPost('name'),
            'price' => $this->request->getPost('price'),
            'description' => $this->request->getPost('description'),
            'image' => $this->request->getPost('image'),
        ]);

        return redirect()->to('/admin/products');
    }

    public function deleteProduct($id)
    {
        $productModel = new ProductModel();
        $productModel->delete($id);

        return redirect()->to('/admin/products');
    }

    // Manajemen Pesanan
    public function orders()
    {
        $orderModel = new OrderModel();
        $userModel = new UserModel();

        // Ambil data pesanan
        $data['orders'] = $orderModel->findAll();

        // Ambil data admin
        $data['admin'] = $userModel->getAdmin(); // Ambil data admin

        // Kirim data pesanan dan data admin ke tampilan
        return view('admin/orders/index', $data);
    }

    public function viewOrder($id)
    {
        $orderModel = new OrderModel();
        $data['order'] = $orderModel->find($id);
        return view('admin/orders/view', $data);
    }

    public function updateOrder($id)
    {
        $orderModel = new OrderModel();

        $orderModel->update($id, [
            'status' => $this->request->getPost('status'),
        ]);

        return redirect()->to('/admin/orders');
    }

    // Logout
    public function logout()
    {
        session()->destroy();
        return redirect()->to('auth/login');
    }
}