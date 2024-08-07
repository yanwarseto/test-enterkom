<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\Exceptions\HTTPException;

class Home extends BaseController
{
    public function index(): string
    {
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
}
