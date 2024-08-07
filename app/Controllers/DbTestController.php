<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\DetailMenuModel;

class DbTestController extends ResourceController
{
    protected $modelName = 'App\Models\DetailMenuModel';
    protected $format    = 'json';

    public function index()
    {
        try {
            $model = new DetailMenuModel();
            $data = $model->orderBy('nama_menu', 'desc')->findAll();

            return $this->respond($data);
        } catch (\Exception $e) {
            return $this->failServerError('An unexpected error occurred: ' . $e->getMessage());
        }
    }
}
