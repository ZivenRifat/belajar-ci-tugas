<?php

namespace App\Controllers;

use App\Models\ProductCategoryModel;

class ProductCategoryController extends BaseController
{
    protected $category;

    public function __construct()
    {
        $this->category = new ProductCategoryModel();
    }

    public function index()
    {
        $categories = $this->category->findAll();
        $data['product_category'] = $categories;

        return view('v_product_category', $data);  // pastikan view ini sudah kamu buat (sesuai kode view sebelumnya)
    }

    public function create()
    {
        $dataForm = [
            'nama' => $this->request->getPost('nama'),
            'created_at' => date("Y-m-d H:i:s")
        ];

        $this->category->insert($dataForm);

        return redirect('product-category')->with('success', 'Kategori berhasil ditambah');
    }

    public function update($id)
    {
        $dataForm = [
            'nama' => $this->request->getPost('nama'),
            'updated_at' => date("Y-m-d H:i:s")
        ];

        $this->category->update($id, $dataForm);

        return redirect('product-category')->with('success', 'Kategori berhasil diubah');
    }

    public function delete($id)
    {
        $this->category->delete($id);

        return redirect('product-category')->with('success', 'Kategori berhasil dihapus');
    }
}
