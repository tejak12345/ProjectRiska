<?php
namespace App\Models;
namespace App\Models;

use CodeIgniter\Model;

class OrderModel extends Model
{
    protected $table = 'orders'; // Tabel untuk pesanan
    protected $primaryKey = 'id'; // Kolom primary key
    protected $allowedFields = ['user_id', 'customer_name', 'status', 'total', 'created_at','product_id','metode_pembayaran','bukti_pembayaran',"kuantitas"];

    // Mendapatkan pesanan terbaru
    public function getRecentOrders($limit = 5)
    {
        return $this->orderBy('created_at', 'desc')->limit($limit)->findAll();
    }

    // Aturan validasi untuk menambah/edit konsultasi
    protected $validationRules = [
        'user_id' => 'required|integer',
        'customer_name' => 'required|string|max_length[255]',
        'status' => 'required|string|in_list[Completed, Pending, Cancelled, Processing]',
        'total' => 'required|integer',
        'product_id' => 'required|integer',
        'metode_pembayaran' => 'required|string|in_list[Cash,Transfer Bank]',
        'bukti_pembayaran' => 'required|string',
        'kuantitas' => 'required|integer'
    ];


}

