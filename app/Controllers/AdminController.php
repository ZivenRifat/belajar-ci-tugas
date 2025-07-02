<?php
namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TransactionModel;

class AdminController extends BaseController
{
    protected $transaction;

    public function __construct()
    {
        $this->transaction = new TransactionModel();
    }

    private function isAdmin()
    {
        return session()->get('role') === 'admin';
    }

    public function pembelian()
    {
        if (!$this->isAdmin()) return redirect()->to('/');

        $data['transaksi'] = $this->transaction->findAll();
        return view('admin/v_pembelian', $data);
    }

    public function ubahStatus($id)
    {
        if (!$this->isAdmin()) return redirect()->to('/');

        $transaksi = $this->transaction->find($id);
        if ($transaksi) {
            $newStatus = $transaksi['status'] == 0 ? 1 : 0;
            $this->transaction->update($id, ['status' => $newStatus]);
            return redirect()->to('/admin/pembelian')->with('success', 'Status pesanan berhasil diubah.');
        }

        return redirect()->to('/admin/pembelian')->with('error', 'Data tidak ditemukan.');
    }
}

?>