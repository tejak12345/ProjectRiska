<?php
namespace App\Models;

use CodeIgniter\Model;

class OrderModel extends Model
{
    protected $table = 'orders';  // Nama tabel
    protected $primaryKey = 'id'; // Kolom primary key
    protected $allowedFields = ['user_id', 'product_id', 'quantity', 'total_price', 'status']; // Kolom yang boleh diubah
    protected $useTimestamps = true;  // Menggunakan timestamp (created_at, updated_at)

    // Aturan validasi untuk menambah/edit pesanan
    protected $validationRules = [
        'user_id' => 'required|integer',
        'product_id' => 'required|integer',
        'quantity' => 'required|integer',
        'total_price' => 'required|decimal',
        'status' => 'required|in_list[Pending,Processing,Shipped,Completed]'
    ];

    protected $validationMessages = [
        'status' => [
            'required' => 'Status pesanan harus diisi.',
            'in_list' => 'Status pesanan tidak valid.'
        ]
    ];
}
