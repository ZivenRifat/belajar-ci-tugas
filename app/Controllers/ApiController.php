<?php

namespace App\Controllers;

use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;
use Config\ApiConfig;

use App\Models\UserModel;
use App\Models\TransactionModel;
use App\Models\TransactionDetailModel;

class ApiController extends ResourceController
{
    protected $apiKey;
    protected $user;
    protected $transaction;
    protected $transaction_detail;

    public function __construct()
    {
        $this->apiKey = config(ApiConfig::class)->apiKey;
        $this->user = new UserModel();
        $this->transaction = new TransactionModel();
        $this->transaction_detail = new TransactionDetailModel();
    }

    public function index()
    {
        $data = [
            'results' => [],
            'status' => ["code" => 401, "description" => "Unauthorized"]
        ];

        $clientKey = $this->request->getHeaderLine('Key');

        if ($clientKey === $this->apiKey) {
            $penjualan = $this->transaction->findAll();

            foreach ($penjualan as &$pj) {
                $details = $this->transaction_detail->where('transaction_id', $pj['id'])->findAll();

                // Hitung total jumlah item dari detail transaksi
                $totalJumlah = 0;
                foreach ($details as $detail) {
                    $totalJumlah += $detail['jumlah'];
                }

                $pj['jumlah_item'] = $totalJumlah; // <- Tambahkan ini
                $pj['details'] = $details;
            }


            $data['status'] = ["code" => 200, "description" => "OK"];
            $data['results'] = $penjualan;
        }

        return $this->respond($data);
    }


    /**
     * Return the properties of a resource object.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function show($id = null)
    {
        //
    }

    /**
     * Return a new resource object, with default properties.
     *
     * @return ResponseInterface
     */
    public function new()
    {
        //
    }

    /**
     * Create a new resource object, from "posted" parameters.
     *
     * @return ResponseInterface
     */
    public function create()
    {
        //
    }

    /**
     * Return the editable properties of a resource object.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function edit($id = null)
    {
        //
    }

    /**
     * Add or update a model resource, from "posted" properties.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function update($id = null)
    {
        //
    }

    /**
     * Delete the designated resource object from the model.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function delete($id = null)
    {
        //
    }
}
