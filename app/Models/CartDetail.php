<?php

namespace App\Models;

use DB;
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
    public function getListCartById($cartId) {
        return DB::table($this->table)
        ->join('tblproduct', $this->table.'.product_id', '=', 'tblproduct.product_id')
        ->where($this->table.'.cart_id', $cartId)
        ->get();
    }

    public function incrementQuantity($cart_id, $product_id) {
        return DB::table($this->table)
        ->where('cart_id', $cart_id)
        ->where('product_id', $product_id)
        ->update( [
            'quantity' => DB::raw('quantity + 1')
        ]);
    }
    public function decrementQuantity($cart_id, $product_id) {
        return DB::table($this->table)
        ->where('cart_id', $cart_id)
        ->where('product_id', $product_id)
        ->update( [
            'quantity' => DB::raw('quantity - 1')
        ]);
    }
    public function removeProductFromCart($cart_id, $product_id) {
        return DB::table($this->table)
        ->where('cart_id', $cart_id)
        ->where('product_id', $product_id)
        ->delete();
    }
    public function getTotalPrice($cart_id) {
        return DB::table($this->table)
        ->where('cart_id', $cart_id)
        ->join('tblproduct', $this->table.'.product_id', '=', 'tblproduct.product_id')
        ->select(DB::raw('SUM(tblcart_details.quantity * tblproduct.product_price) as total'))
        ->value('total');
    }
}
