<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;
    protected $table = 'tblorder';
    protected $primaryKey = 'order_id';

    public $timestamps = false;         //  bảng không có created_at/updated_at
    protected $fillable = [
        'user_id',
        'order_created_time',
        'order_address',
        'order_notes',
        'order_value',
        'order_phone',
        'order_status',
        'order_receiver',
        'order_payment',
        'order_code',
    ];
}
