<?php
namespace App\Models;
namespace App\Models;

use CodeIgniter\Model;

class OrderModel extends Model
{
    protected $table = 'orders'; // Tabel untuk pesanan
    protected $primaryKey = 'id'; // Kolom primary key
    protected $allowedFields = ['order_id', 'customer_name', 'status', 'total', 'created_at'];

    // Mendapatkan pesanan terbaru
    public function getRecentOrders($limit = 5)
    {
        return $this->orderBy('created_at', 'desc')->limit($limit)->findAll();
    }
}

