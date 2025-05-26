<?php

namespace App\Controllers;

use App\Database\Migrations\Product;
use App\Models\ProductModel;

class Home extends BaseController
{
    // Menampilkan halaman utama
    protected $product;

    function __construct(){
        helper('form');
        helper('number');
        $this->product = new ProductModel();
    }
    public function index()
    {
        $product =$this->product->findAll();
        $data['product'] = $product;
        return view('v_home', $data); // Pastikan view 'v_home' ada di folder Views

    }

    // Menampilkan halaman F.A.Q
    public function faq()
    {
        return view('v_faq'); // Pastikan view 'faq' ada di folder Views
    }

    // Menampilkan halaman Contact
    public function contact()
    {
        return view('v_contact'); // Pastikan view 'contact' ada di folder Views
    }
}
