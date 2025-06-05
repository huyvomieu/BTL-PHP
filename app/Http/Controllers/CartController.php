<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CartDetail;
class CartController extends Controller
{
    public function add($product_id, $quantity)
    {

        $user_id = session('user_id', '12');
        $detail = CartDetail::where('cart_id', $user_id)
            ->where('product_id', $product_id)
            ->first();

        if ($detail) {
            $detail->quantity += $quantity;
            $detail->save(); // Laravel sẽ dùng hàm setKeysForSaveQuery()
        } else {
            CartDetail::create([
                'cart_id' => $user_id,
                'product_id' => $product_id,
                'quantity' => $quantity,
            ]);
        }
        return redirect()->back();
    }
}
