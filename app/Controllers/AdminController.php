<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\ProductModel;
use App\Models\OrderModel;
use App\Models\ConsultationModel;
use App\Models\ProjectModel;

class AdminController extends Controller
{
    // Halaman Dashboard Admin
    public function index()
    {
        return view('admin/dashboard');
    }

    // Manajemen Produk
    public function products()
    {
        $productModel = new ProductModel();
        $data['products'] = $productModel->findAll();
        return view('admin/products/index', $data);
    }

    public function createProduct()
    {
        return view('admin/products/create');
    }

    public function storeProduct()
    {
        $model = new ProductModel();

        $image = $this->request->getFile('image');

        // Jika file gambar ada dan valid
        if ($image && $image->isValid()) {
            $imageName = $image->getRandomName(); // Nama acak untuk file gambar
            // Pindahkan gambar ke subfolder products di dalam folder uploads
            $image->move(ROOTPATH . 'writable/uploads/products', $imageName); // Gambar disimpan di writable/uploads/products
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
        $data['orders'] = $orderModel->findAll();
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

    // Manajemen Konsultasi
    public function consultations()
    {
        $consultationModel = new ConsultationModel();
        $data['consultations'] = $consultationModel->findAll();
        return view('admin/consultations/index', $data);
    }

    public function createConsultation()
    {
        return view('admin/consultations/create');
    }

    public function storeConsultation()
    {
        $consultationModel = new ConsultationModel();

        // Validasi form input
        $validation = \Config\Services::validation();
        $validation->setRules([
            'date' => 'required',
            'description' => 'required',
        ]);

        if ($validation->withRequest($this->request)->run() === FALSE) {
            return redirect()->to('/admin/consultations/create')->withInput();
        }

        // Menyimpan konsultasi
        $consultationModel->save([
            'date' => $this->request->getPost('date'),
            'description' => $this->request->getPost('description'),
        ]);

        return redirect()->to('/admin/consultations');
    }

    // Manajemen Proyek
    public function projects()
    {
        $projectModel = new ProjectModel();
        $data['projects'] = $projectModel->findAll();
        return view('admin/projects/index', $data);
    }

    public function createProject()
    {
        return view('admin/projects/create');
    }

    public function storeProject()
    {
        $projectModel = new ProjectModel();

        // Validasi form input
        $validation = \Config\Services::validation();
        $validation->setRules([
            'name' => 'required',
            'status' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ]);

        if ($validation->withRequest($this->request)->run() === FALSE) {
            return redirect()->to('/admin/projects/create')->withInput();
        }

        // Menyimpan proyek
        $projectModel->save([
            'name' => $this->request->getPost('name'),
            'status' => $this->request->getPost('status'),
            'start_date' => $this->request->getPost('start_date'),
            'end_date' => $this->request->getPost('end_date'),
        ]);

        return redirect()->to('/admin/projects');
    }

    // Logout
    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}