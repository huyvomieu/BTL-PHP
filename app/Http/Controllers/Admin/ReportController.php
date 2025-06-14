<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use DB;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
class ReportController extends Controller
{
    // Views
    public function index()
    {
        $report_orders = DB::table('tblorder')
            ->whereMonth('order_created_time', Carbon::now()->month)
            ->whereYear('order_created_time', Carbon::now()->year)
            ->selectRaw('COUNT(*) as total_count, SUM(order_value) as total_value, AVG(order_value) as avg_value')
            ->first();

        $report_users = DB::table('tbluser')
            ->whereMonth('user_created_date', Carbon::now()->month)
            ->whereYear('user_created_date', Carbon::now()->year)
            ->selectRaw('COUNT(*) as total_count')
            ->first();
        ;

        $product_populars = DB::table('tblorder_details')
            ->join('tblproduct', 'tblproduct.product_id', '=', 'tblorder_details.product_id')
            ->groupBy('tblorder_details.product_id', 'product_title') // thêm cả product_title nếu dùng select
            ->selectRaw('tblorder_details.product_id, product_title, SUM(quantity) as total_quantity, SUM(quantity * purchase_price) as total_renvenue')
            ->orderByDesc('total_quantity')
            ->orderByDesc('total_renvenue')
            ->limit(5)
            ->get();
        $top_users = DB::table('tblorder')
            ->join('tbluser', 'tbluser.user_id', '=', 'tblorder.user_id')
            ->join('tblorder_details', 'tblorder_details.order_id', '=', 'tblorder.order_id')
            ->groupBy('tblorder.user_id', 'user_fullname')
            ->selectRaw('user_fullname, COUNT(*) as total_orders, SUM(quantity * purchase_price) as total_spend')
            ->orderByDesc('total_orders')
            ->orderByDesc('total_spend')
            ->limit(5)
            ->get();
        return view('admin.report.index', [
            'title_page' => 'Reports',
            'total_orders' => $report_orders->total_count,
            'renvenue_orders' => $report_orders->total_value,
            'avg_orders' => $report_orders->avg_value,
            'report_users' => $report_users->total_count,
            'product_populars' => $product_populars,
            'top_users' => $top_users,

        ]);
    }

    // API
    public function reports(Request $request)
    {
        $reportType = $request->reportType;
        $month = $request->monthFilter;
        $year = $request->yearFilter;
        if ($reportType == "revenue") {
            // Tạo danh sách ngày trong tháng (01 đến 31)
            $start = Carbon::createFromDate($year, $month, 1);
            $end = $start->copy()->endOfMonth();

            $allDays = collect();
            for ($date = $start->copy(); $date->lte($end); $date->addDay()) {
                $allDays->put($date->format('Y-m-d'), 0);
            }

            // Truy vấn doanh thu theo ngày
            $revenuePerDay = DB::table('tblorder')
                ->selectRaw('DATE(order_created_time) as date, SUM(order_value) as total')
                ->whereMonth('order_created_time', $month)
                ->whereYear('order_created_time', $year)
                ->groupBy(DB::raw('DATE(order_created_time)'))
                ->pluck('total', 'date');

            // Gộp dữ liệu có thật với danh sách ngày mặc định
            $revenuePerDay = $allDays->merge($revenuePerDay)->sortKeys();
            // Chuyển thành mảng chỉ chứa giá trị
            $revenuePerDay = array_values($revenuePerDay->toArray());
        }
        return response()->json([
            'revenuePerDay' => $revenuePerDay
        ]);
    }


}
