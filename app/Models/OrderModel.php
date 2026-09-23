<?php

namespace App\Models;

use CodeIgniter\Model;

class OrderModel extends Model
{
    protected $table            = 'orders';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $allowedFields    = [
        'order_code',
        'customer_name',
        'customer_phone',
        'customer_address',
        'order_items',
        'total_amount',
        'discount',
        'payment_method',
        'notes',
        'status',
    ];
    protected $useTimestamps    = true;
    protected $createdField     = 'created_at';
    protected $updatedField     = '';
}
