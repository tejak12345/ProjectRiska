<?php
namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table = 'products';  // Nama tabel
    protected $primaryKey = 'id';   // Kolom primary key
    protected $allowedFields = ['name', 'description', 'price', 'image'];  // Kolom yang boleh diubah
    protected $useTimestamps = true;  // Menggunakan timestamp (created_at, updated_at)

    // Method untuk menghitung total produk
    public function getTotalProductCount()
    {
        return $this->countAll(); // Menghitung semua baris dalam tabel produk
    }

    public function getTopProducts($limit = 5)
    {
        return $this->select('products.name, products.price, SUM(order_items.quantity) as total_sales')
            ->join('order_items', 'order_items.product_id = products.id')
            ->groupBy('products.id')
            ->orderBy('total_sales', 'desc')
            ->limit($limit)
            ->findAll();
    }


}
