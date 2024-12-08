<?php
namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table = 'products';  // Nama tabel
    protected $primaryKey = 'id';   // Kolom primary key
    protected $allowedFields = ['name', 'description', 'price', 'image'];  // Kolom yang boleh diubah
    protected $useTimestamps = true;  // Menggunakan timestamp (created_at, updated_at)

    // Aturan validasi untuk menambah/edit produk
    protected $validationRules = [
        'name' => 'required|min_length[3]|max_length[255]',
        'price' => 'required|decimal',
        'image' => 'permit_empty|valid_image'
    ];

    protected $validationMessages = [
        'name' => [
            'required' => 'Nama produk harus diisi.',
            'min_length' => 'Nama produk harus terdiri dari minimal 3 karakter.'
        ],
        'price' => [
            'required' => 'Harga produk harus diisi.',
            'decimal' => 'Harga produk harus berupa angka.'
        ]
    ];
}
