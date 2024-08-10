<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\Exceptions\HTTPException;

class Home extends BaseController
{
    protected $format = 'json';

    public function index(): string
    {
        $this->setCorsHeaders();

        $client = \Config\Services::curlrequest();

        try {
            $response = $client->get('http://localhost/test-enterkom/public/api/detailmenu');

            if ($response->getStatusCode() === 200) {
                $data['menuItems'] = json_decode($response->getBody(), true);
            } else {
                $data['menuItems'] = [];
            }
        } catch (HTTPException $e) {
            $data['menuItems'] = [];
            log_message('error', 'Failed to fetch menu items: ' . $e->getMessage());
        }
        return view('pesanan', $data);
    }

    public function saveOrder()
    {
        $this->setCorsHeaders();

        if ($this->request->getMethod() === 'options') {
            return $this->response->setStatusCode(200);
        }

        $orderData = $this->request->getJSON(true);
        // Basic validation
        if (empty($orderData) || !is_array($orderData)) {
            return $this->failValidationError('Invalid data');
        }

        // More detailed validation can be added here

        $db = \Config\Database::connect();
        $builder = $db->table('"PO"."detail_pesanan"');

        try {
            $db->transBegin(); // Start transaction

            foreach ($orderData as $item) {
                if (isset($item['uid_order'])) {
                    $insertData = [
                        'uid_order' => $item['uid_order'],
                        'nama_pesanan' => $item['nama_pesanan'],
                        'varian' => $item['varian'],
                        'quantity' => $item['quantity'],
                        'price' => $item['price'],
                        'uid_pesanan_master' => $item['uid_pesanan_master'],
                        'pidvarian' => $item['pidvarian'],
                        'no_meja' => $item['no_meja']
                    ];

                    $builder->insert($insertData);
                } else {
                    // Handle missing uid_order
                    log_message('error', 'Missing uid_order in item: ' . print_r($item, true));
                    // Consider returning a specific error response
                }
            }

            $db->transCommit(); // Commit transaction
            return $this->response->setJSON(['success' => true]);
        } catch (\Exception $e) {
            $db->transRollback(); // Rollback transaction on error
            log_message('error', 'Failed to save order data: ' . $e->getMessage());
            return $this->failServerError('Failed to save order data');
        }
    }


    private function setCorsHeaders()
    {
        $this->response->setHeader('Access-Control-Allow-Origin', '*');
        $this->response->setHeader('Access-Control-Allow-Methods', 'GET, POST, PATCH, PUT, DELETE, OPTIONS');
        $this->response->setHeader('Access-Control-Allow-Headers', 'Role, Content-Type, Origin');
        $this->response->setHeader('Access-Control-Allow-Credentials', 'true');
    }
}