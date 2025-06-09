<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\CartDetail;
class OrderController extends Controller
{
    public function confirm(Request $request, $id)
    {
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
    public function confirmFromCart()
    {
        $user_id = session('user_id', '12');  // Mặc định là 12 vì chưa làm phần login, logout
        $user = User::find($user_id);
        $carts = (new CartDetail())->getListCartById($user_id);

        return view('order.confirmFromCart', [
            'carts' => $carts,
            'user' => $user,
        ]);
    }
    public function processPayment(Request $request)
    {
        $method = $request->query('method');
        if ($method == 'vnpay') {
            $order_code = rand(1, 10000);
            $vnp_TxnRef = $order_code; //Mã giao dịch thanh toán tham chiếu của merchant
            $vnp_Amount = 1000000; // Số tiền thanh toán
            $vnp_BankCode = 'NCB'; //Mã phương thức thanh toán

            $vnp_TmnCode = config('vnpay.vnp_tmncode');
            $vnp_HashSecret = config('vnpay.vnp_hashsecret');
            $vnp_Url = config('vnpay.vnp_url');
            $vnp_Returnurl = config('vnpay.vnp_returnurl');;

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
            $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret);//  
			$vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
            // lưu đơn hàng trước khi chuyển hướng
            // if (isset($vnp_HashSecret)) {
            //     $user_id = session('user_id', '12');  // Mặc định là 12 vì chưa làm phần login, logout
            //     $user = User::find($user_id);
            //     $order_created_time = date("Y-m-d H:i:s");
            //     $order_receiver = $user->user_fullname;
            //     $order_address = $user->user_address;
            //     $order_value = 100000;
            //     $order_phone = $user->user_phone;
            //     $order_notes = "";

            //     $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret);
            //     $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
            //     $order_payment = 'vnpay';

            //     // $sql_insert_invoice = "INSERT INTO 
            //     // tblorder(user_id,order_created_time,order_address,order_value,order_phone,order_receiver,order_payment, order_code) 
            //     // VALUES('" . $user_id . "','" . $order_created_time . "','" . $order_address . "','" . $order_value . "','" . $order_phone . "', '" . $order_receiver . "', '" . $order_payment . "', '$order_code')";
            //     //     $insert_invoice_result = mysqli_query($mysqli, $sql_insert_invoice);
            //     //     $order_id = mysqli_insert_id($mysqli);
            //     //     $_SESSION['order_id'] = $order_id;
            //     //     $sql_cart = "SELECT * FROM tblcart_details 
            //     // where tblcart_details.cart_id = $cart_id";
            //     //     $query_cart = mysqli_query($mysqli, $sql_cart);
            //     //     while ($row = mysqli_fetch_assoc($query_cart)) {
            //     //         $product_id = $row['product_id'];
            //     //         $quantity = $row['quantity'];
            //     //         $sql_product = "SELECT * FROM tblproduct
            //     // 	where product_id = $product_id";
            //     //         $query_product = mysqli_query($mysqli, $sql_product);
            //     //         $row_product = mysqli_fetch_assoc($query_product);
            //     //         $purchase_price = $row_product['product_price'] * (100 - $row_product['product_discount']) / 100;
            //     //         $sql_insert_order_detail = "INSERT INTO tblorder_details (order_id, product_id, quantity, order_code, purchase_price) VALUES ('$order_id', '$product_id', '$quantity', '$order_code', '$purchase_price')";
            //     //         $insert_detail_result = mysqli_query($mysqli, $sql_insert_order_detail);
            //     //         $sql_update = "UPDATE tblproduct set product_quantity = product_quantity - $quantity where product_id = $product_id";
            //     //         $query_update = mysqli_query($mysqli, $sql_update);
            //     //     }
            //     //     $id_delete_cart = $_SESSION['cart_id'];
            //     //     $sql_delete_all_products = "DELETE FROM tblcart_details WHERE cart_id = $id_delete_cart";
            //     //     $delete_result = mysqli_query($mysqli, $sql_delete_all_products);
            //     //     unset($_SESSION['total_value']);
            // }
            return redirect()->away($vnp_Url);
        }
    }
    public function returnVnpay() {
        return view('order.finish');
    }     public function history() {
        return view('order.history');
    }
}
