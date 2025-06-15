<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
class OrderController extends Controller
{
    public function index()
    {
        $orders = DB::table('tblorder')
            ->join('tbluser', 'tblorder.user_id', '=', 'tbluser.user_id')
            ->orderByDesc('order_created_time')
            ->get();

        $orderCounts = DB::table('tblorder')
            ->selectRaw('order_status, COUNT(*) as total')
            ->groupBy('order_status')
            ->pluck('total', 'order_status'); // VD: => [0 => 10, 1 => 5, 2 => 7, 3 => 4]
        return view('admin.order.index', [
            'title_page' => 'Orders',
            'orders' => $orders,
            'statistics' => $orderCounts,
        ]);
    }

    // api 
    public function getById($id)  {
        $order_info = DB::table('tblorder')
        ->where('order_id', $id )
        ->join('tbluser', 'tblorder.user_id', '=', 'tbluser.user_id')
        ->select(['order_id', 'order_receiver', 'order_phone' , 'order_created_time', 'order_value', 'order_notes', 'order_code', 'order_payment', 'order_address', 'user_email'])
        ->first();

        $order_details = DB::table('tblorder')
        ->where('tblorder.order_id', $id)
        ->join('tblorder_details', 'tblorder.order_id', '=' , 'tblorder_details.order_id')
        ->join('tblproduct', 'tblorder_details.product_id', '=', 'tblproduct.product_id')
        ->get();
        return response()->json([
            'order_info' => $order_info,
            'order_details' => $order_details
        ]);
    }

}
