<?php

namespace App\Models;

use CodeIgniter\Model;

class DiskonModel extends Model
{
    protected $table = 'diskon'; // Nama tabel
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'tanggal',
        'nominal',
        'created_at',
        'updated_at',
    ];

    protected $useTimestamps = false; // Karena kita isi created_at/updated_at secara manual di seeder

    // Optional: method untuk ambil diskon hari ini
    public function getDiskonHariIni()
    {
        return $this->where('tanggal', date('Y-m-d'))->first();
    }
}
