<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DiskonModel;

class DiskonController extends BaseController
{
    protected $diskon;

    public function __construct()
    {
        $this->diskon = new DiskonModel();
        helper(['form']);
    }

    private function isAdmin()
    {
        return session()->get('role') === 'admin';
    }

    public function index()
    {
        if (!$this->isAdmin()) return redirect()->to('/');

        return view('v_diskon', [
            'mode' => 'index',
            'diskon' => $this->diskon->findAll()
        ]);
    }

    public function create()
    {
        if (!$this->isAdmin()) return redirect()->to('/');

        return view('v_diskon', [
            'mode' => 'create'
        ]);
    }

    public function store()
    {
        if (!$this->isAdmin()) return redirect()->to('/');

        $rules = [
            'tanggal' => 'required|is_unique[diskon.tanggal]',
            'nominal' => 'required|numeric'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->diskon->save([
            'tanggal' => $this->request->getPost('tanggal'),
            'nominal' => $this->request->getPost('nominal'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        return redirect()->to('/diskon')->with('success', 'Data diskon berhasil ditambahkan!');
    }

    public function edit($id)
    {
        if (!$this->isAdmin()) return redirect()->to('/');

        $diskon = $this->diskon->find($id);
        if (!$diskon) {
            return redirect()->to('/diskon')->with('failed', 'Data tidak ditemukan.');
        }

        return view('v_diskon', [
            'mode' => 'edit',
            'diskon' => $diskon
        ]);
    }

    public function update($id)
    {
        if (!$this->isAdmin()) return redirect()->to('/');

        $rules = [
            'nominal' => 'required|numeric'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->diskon->update($id, [
            'nominal' => $this->request->getPost('nominal'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        return redirect()->to('/diskon')->with('success', 'Data diskon berhasil diubah!');
    }

    public function delete($id)
    {
        if (!$this->isAdmin()) return redirect()->to('/');

        $this->diskon->delete($id);
        return redirect()->to('/diskon')->with('success', 'Data diskon berhasil dihapus!');
    }
}
