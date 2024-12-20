<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\ProductModel;
use App\Models\OrderModel;
use App\Models\UserModel;

class AdminController extends Controller
{
    // Halaman Dashboard Admin
    public function index()
    {
        $productModel = new ProductModel();
        $orderModel = new OrderModel();
        $userModel = new UserModel();

        $totalProducts = $productModel->countAll();
        $activeUsersCount = $userModel->getActiveUsersCount();
        $recentOrders = $orderModel->orderBy('created_at', 'desc')->limit(5)->findAll();
        $admin = $userModel->getAdmin();

        return view('admin/dashboard', [
            'totalProducts' => $totalProducts,
            'activeUsersCount' => $activeUsersCount,
            'recentOrders' => $recentOrders,
            'admin' => $admin
        ]);
    }

    // Manajemen Produk
    public function products()
    {
        $productModel = new ProductModel();
        $userModel = new UserModel();

        // Mendapatkan parameter search dan halaman dari query string
        $search = $this->request->getGet('search');
        $page = $this->request->getGet('page') ?? 1; // Default ke halaman pertama jika tidak ada parameter page

        // Batasan per halaman
        $perPage = 5;

        // Mencari produk berdasarkan search
        if ($search) {
            $products = $productModel
                ->like('name', $search)
                ->orLike('description', $search)
                ->paginate($perPage, 'default', $page);
            $totalProducts = $productModel->like('name', $search)->orLike('description', $search)->countAllResults();
        } else {
            $products = $productModel->paginate($perPage, 'default', $page);
            $totalProducts = $productModel->countAll();
        }

        // Menyediakan data untuk halaman
        $data = [
            'products' => $products,
            'admin' => $userModel->getAdmin(),
            'pager' => $productModel->pager,
            'search' => $search,
            'totalProducts' => $totalProducts,
        ];

        return view('admin/products/index', $data);
    }


    public function createProduct()
    {
        $userModel = new UserModel();
        $admin = $userModel->getAdmin();
        return view('admin/products/create', ['admin' => $admin]);
    }

    public function storeProduct()
    {
        $productModel = new ProductModel();

        $image = $this->request->getFile('image');
        $imageName = null;

        if ($image && $image->isValid()) {
            $imageName = $image->getRandomName();
            $image->move(ROOTPATH . 'public/img/products', $imageName);
        }

        $data = [
            'name' => $this->request->getPost('name'),
            'price' => $this->request->getPost('price'),
            'description' => $this->request->getPost('description'),
            'image' => $imageName,
        ];

        $productModel->save($data);
        return redirect()->to('/admin/products')->with('success', 'Product added successfully.');
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
        $product = $productModel->find($id); // Ambil data produk lama

        $image = $this->request->getFile('image');
        $imageName = $product['image']; // Default gunakan gambar lama

        if ($image && $image->isValid()) {
            $imageName = $image->getRandomName();
            $image->move(ROOTPATH . 'public/img/products', $imageName);

            // Hapus gambar lama jika ada
            if (!empty($product['image']) && file_exists(ROOTPATH . 'public/img/products/' . $product['image'])) {
                unlink(ROOTPATH . 'public/img/products/' . $product['image']);
            }
        }

        $data = [
            'name' => $this->request->getPost('name'),
            'price' => $this->request->getPost('price'),
            'description' => $this->request->getPost('description'),
            'image' => $imageName,
        ];

        $productModel->update($id, $data);
        return redirect()->to('/admin/products')->with('success', 'Product updated successfully.');
    }

    public function deleteProduct($id)
    {
        $productModel = new ProductModel();
        $product = $productModel->find($id);

        // Hapus gambar dari direktori jika ada
        if (!empty($product['image']) && file_exists(ROOTPATH . 'public/img/products/' . $product['image'])) {
            unlink(ROOTPATH . 'public/img/products/' . $product['image']);
        }

        $productModel->delete($id);
        return redirect()->to('/admin/products')->with('success', 'Product deleted successfully.');
    }

    // Manajemen Pesanan
    public function orders()
    {
        $orderModel = new OrderModel();
        $userModel = new UserModel();

        $data['orders'] = $orderModel->findAll();
        $data['admin'] = $userModel->getAdmin();

        return view('admin/orders/index', $data);
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('auth/login');
    }
}
