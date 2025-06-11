<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\OrderSuccessMail;
use App\Models\OrderDetail;
use DB;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\CartDetail;
use App\Models\Order;
use Illuminate\Support\Facades\Mail;
class OrderController extends Controller
{
    public function confirm(Request $request, $id)
    {
        $product = Product::find($id);
        $quantity = $request->input('quantity');
        $user_id = session('user_id');

        $user = User::find($user_id);
        return view('order.confirm', [
            'product' => $product,
            'user' => $user,
            'quantity' => $quantity
        ]);
    }
    public function confirmFromCart()
    {
        $user_id = session('user_id');  // Mặc định là 12 vì chưa làm phần login, logout
        $user = User::find($user_id);
        $carts = (new CartDetail())->getListCartById($user_id);

        return view('order.confirmFromCart', [
            'carts' => $carts,
            'user' => $user,
        ]);
    }
    public function processPayment(Request $request)
    {
        $user_id = session('user_id');
        $totalPrice = (new CartDetail())->getTotalPrice($user_id);
        $method = $request->query('method');
        if ($method == 'vnpay') {
            $order_code = rand(1, 10000);
            $vnp_TxnRef = $order_code; //Mã giao dịch thanh toán tham chiếu của merchant
            $vnp_Amount = $totalPrice * 100; // Số tiền thanh toán
            $vnp_BankCode = 'NCB'; //Mã phương thức thanh toán

            $vnp_TmnCode = config('vnpay.vnp_tmncode');
            $vnp_HashSecret = config('vnpay.vnp_hashsecret');
            $vnp_Url = config('vnpay.vnp_url');
            $vnp_Returnurl = config('vnpay.vnp_returnurl');

            //Expire
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $startTime = date("YmdHis");
            $expire = date('YmdHis', strtotime('+15 minutes', strtotime($startTime)));
            $inputData = array(
                "vnp_Version" => "2.1.0",
                "vnp_TmnCode" => $vnp_TmnCode,
                "vnp_Amount" => $vnp_Amount,
                "vnp_Command" => "pay",
                "vnp_CreateDate" => $startTime,
                "vnp_CurrCode" => "VND",
                "vnp_IpAddr" => $request->ip(),  //IP Khách hàng thanh toán
                "vnp_Locale" => "vn", //Ngôn ngữ chuyển hướng thanh toán
                "vnp_OrderInfo" => "Thanh toan GD:" . (string) $vnp_TxnRef,
                "vnp_OrderType" => "other",
                "vnp_ReturnUrl" => $vnp_Returnurl,
                "vnp_TxnRef" => $vnp_TxnRef,
                "vnp_ExpireDate" => $expire
            );

            if (isset($vnp_BankCode) && $vnp_BankCode != "") {
                $inputData['vnp_BankCode'] = $vnp_BankCode;
            }
            // Mã hóa trước khi chuyển hướng
            ksort($inputData);
            $query = "";
            $i = 0;
            $hashdata = "";
            foreach ($inputData as $key => $value) {
                if ($i == 1) {
                    $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
                } else {
                    $hashdata .= urlencode($key) . "=" . urlencode($value);
                    $i = 1;
                }
                $query .= urlencode($key) . "=" . urlencode($value) . '&';
            }

            $vnp_Url = $vnp_Url . "?" . $query;
            $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret);//  
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
            // lưu đơn hàng trước khi chuyển hướng
            if (isset($vnp_HashSecret)) {
                return redirect()->away($vnp_Url);
            } else {
                echo 'Lỗi!';
            }
        }
    }
    public function returnVnpay(Request $request)
    {
        $user_id = session('user_id');  // Mặc định là 12 vì chưa làm phần login, logout
        $user = User::find($user_id);
        $order_created_time = date("Y-m-d H:i:s");
        $order_receiver = $user->user_fullname;
        $order_address = $user->user_address;
        $order_value = $request->query('vnp_Amount') / 100;
        $order_phone = $user->user_phone;
        $order_notes = "test";
        $order_payment = 'vnpay';
        $order_code = $request->query('vnp_TxnRef');
        // INSERT BẢN GHI VÀO BẢNG ORDER
        $order =  Order::create([
            'user_id' => $user_id,
            'order_created_time' => $order_created_time,
            'order_address' => $order_address,
            'order_notes' => $order_notes,
            'order_value' => $order_value,
            'order_phone' => $order_phone,
            'order_status' => 1,
            'order_receiver' => $order_receiver,
            'order_payment' => $order_payment,
            'order_code' => $order_code,
        ]);
        // DUYỆT INSERT BẢN GHI VÀO BẢNG ORDER_DETAILS
        $products = (new CartDetail())->getListCartById($user_id);
        $data = $products->map(function ($product) use ($order) {
            return [
                'order_id' => $order->order_id,
                'product_id' => $product->product_id,
                'quantity' => $product->quantity, // mặc định số lượng
                'order_code' => $order->order_code,
                'purchase_price' => $product->product_price,
            ];
        })->toArray();
        DB::table('tblorder_details')->insert($data);
        // XÓA GIỎ HÀNG SAU KHI THANH TOÁN SONG

        // GIẢM SỐ LƯỢNG PRODUCT 

        // Gửi mail xác nhận cho user 
        Mail::to($user->user_email)->send(new OrderSuccessMail($order));
        
        return view('order.finish', [
            'order' => $order
        ]);
    }
    public function history()
    {
        $user_id = session('user_id');
        $orders = DB::table('tblorder')
        ->where('user_id', $user_id )
        ->get();
        return view('order.history', [
            'orders' => $orders
        ]);
    }
    public function detail($id) {
        $order_info = DB::table('tblorder')
        ->where('order_id', $id )
        ->select(['order_receiver', 'order_phone' , 'order_created_time', 'order_notes', 'order_code', 'order_payment'])
        ->first();

        $order_details = DB::table('tblorder')
        ->where('tblorder.order_id', $id )
        ->join('tblorder_details', 'tblorder.order_id', '=' , 'tblorder_details.order_id')
        ->join('tblproduct', 'tblorder_details.product_id', '=', 'tblproduct.product_id')
        ->get();

        return view('order.detail', [
            'order_details' => $order_details,
            'order_info' => $order_info
        ]);
    }
}
