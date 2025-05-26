<?php 
namespace App\Models;

use CodeIgniter\Model;

class ProductCategoryModel extends Model
{
    protected $table = 'product_category'; 
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'nama', 'created_at', 'updated_at'
    ];
    
    // Jika kamu pakai timestamps otomatis, bisa tambahkan ini:
    // protected $useTimestamps = true;
    // protected $createdField  = 'created_at';
    // protected $updatedField  = 'updated_at';
}
