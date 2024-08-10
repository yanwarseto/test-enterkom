<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Bill extends BaseController
{
    public function index()
    {
        return view('bill');
    }
}