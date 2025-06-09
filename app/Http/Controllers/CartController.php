<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CartDetail;
class CartController extends Controller
{
    private $cartDetailModel;
    public function __construct()
    {
        $this->cartDetailModel = new CartDetail();
    }
    // Lấy ra thông tin giỏ hàng của user
    public function index() {
        $user_id = session('user_id', '12');
        $carts = $this->cartDetailModel->getListCartById($user_id);
        // dd($carts);
        return view('cart.index', [
            'carts' => $carts
        ]);
    }
    // Thêm sản phẩm vào giỏ hàng
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
    // Cập nhật thông tin giỏ hàng
    public function update($product_id, $type) {
        $user_id = session('user_id', '12');
        if($type == 'plus') {
            $this->cartDetailModel->incrementQuantity($user_id,$product_id);
            return redirect()->back();
        } else if($type == 'minus') {
            $this->cartDetailModel->decrementQuantity($user_id,$product_id);
            return redirect()->back();
        } else if($type == 'delete') {
            $this->cartDetailModel->removeProductFromCart($user_id,$product_id);
            return redirect()->back();
        } else {
            return redirect()->back();
        }
    }
}
