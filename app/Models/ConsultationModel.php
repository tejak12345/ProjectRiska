<?php
namespace App\Models;

use CodeIgniter\Model;

class ConsultationModel extends Model
{
    protected $table = 'consultations';  // Nama tabel
    protected $primaryKey = 'id'; // Kolom primary key
    protected $allowedFields = ['user_id', 'consultation_date', 'status', 'notes']; // Kolom yang boleh diubah
    protected $useTimestamps = true;  // Menggunakan timestamp (created_at, updated_at)

    // Aturan validasi untuk menambah/edit konsultasi
    protected $validationRules = [
        'user_id' => 'required|integer',
        'consultation_date' => 'required|valid_date',
        'status' => 'required|in_list[Scheduled,InProgress,Completed]',
        'notes' => 'permit_empty|string|max_length[1000]'
    ];

    protected $validationMessages = [
        'status' => [
            'required' => 'Status konsultasi harus diisi.',
            'in_list' => 'Status konsultasi tidak valid.'
        ],
        'consultation_date' => [
            'valid_date' => 'Tanggal konsultasi tidak valid.'
        ]
    ];
}
