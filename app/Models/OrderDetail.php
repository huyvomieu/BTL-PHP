<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderDetail extends Model
{
    use HasFactory;
    protected $table = 'tblorder_details';

    protected $fillable = ['order_id', 'product_id', 'quantity', 'order_code', 'purchase_price'];
}
