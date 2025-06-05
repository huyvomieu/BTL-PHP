<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
class OrderController extends Controller
{
    public function confirm(Request $request, $id) {
        $product = Product::find($id);
        $quantity = $request->input('quantity');
        $user_id = session('user_id', '12');  // Mặc định là 12 vì chưa làm phần login, logout

        $user = User::find($user_id);
        return view('order.confirm', [
            'product' => $product,
            'user' => $user,
            'quantity' => $quantity
        ]);
    }
}
