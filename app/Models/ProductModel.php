<?php
namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table = 'products';  // Nama tabel
    protected $primaryKey = 'id';   // Kolom primary key
    protected $allowedFields = ['name', 'description', 'price', 'image'];  // Kolom yang boleh diubah
    protected $useTimestamps = true;  // Menggunakan timestamp (created_at, updated_at)

}