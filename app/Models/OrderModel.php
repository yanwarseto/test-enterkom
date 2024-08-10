<?php

namespace App\Models;

use CodeIgniter\Model;

class OrderModel extends Model
{
    protected $table = '"PO".detail_pesanan';
    protected $primaryKey = 'uid_order';
    protected $allowedFields = ['uid_order', 'nama_pesanan', 'varian', 'quantity', 'price', 'uid_pesanan_master', 'pidvarian', 'no_meja'];
}