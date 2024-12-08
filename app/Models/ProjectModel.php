<?php
namespace App\Models;

use CodeIgniter\Model;

class ProjectModel extends Model
{
    protected $table = 'projects';  // Nama tabel
    protected $primaryKey = 'id'; // Kolom primary key
    protected $allowedFields = ['user_id', 'title', 'description', 'start_date', 'end_date', 'status']; // Kolom yang boleh diubah
    protected $useTimestamps = true;  // Menggunakan timestamp (created_at, updated_at)

    // Aturan validasi untuk menambah/edit proyek
    protected $validationRules = [
        'user_id' => 'required|integer',
        'title' => 'required|min_length[3]|max_length[255]',
        'start_date' => 'required|valid_date',
        'end_date' => 'permit_empty|valid_date',
        'status' => 'required|in_list[NotStarted,InProgress,Completed]'
    ];

    protected $validationMessages = [
        'status' => [
            'required' => 'Status proyek harus diisi.',
            'in_list' => 'Status proyek tidak valid.'
        ],
        'start_date' => [
            'valid_date' => 'Tanggal mulai proyek tidak valid.'
        ]
    ];
}
