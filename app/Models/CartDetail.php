<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CartDetail extends Model
{
    use HasFactory;
    protected $table = 'tblcart_details';
    public $incrementing = false;       // Không dùng auto-increment
    public $timestamps = false;         // Tùy, nếu bảng không có created_at/updated_at
    protected $fillable = ['cart_id', 'product_id', 'quantity'];
    // Override để hỗ trợ composite key khi save
    protected function setKeysForSaveQuery($query)
    {
        return $query->where('cart_id', $this->cart_id)
                     ->where('product_id', $this->product_id);
    }
}
