<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
class UserController extends Controller
{
    public function index()
    {
        $users = DB::table('tbluser')
        ->get();
        // Truy vấn user theo status
            $statics_users = DB::table('tbluser')
                ->selectRaw('user_enabled, SUM(user_enabled) as total')
                ->groupBy(DB::raw('user_enabled'))
                ->pluck('total', 'user_enabled');

            // Chuyển thành mảng chỉ chứa giá trị
            $statics_users = array_values($statics_users->toArray());
        return view('admin.user.index', [
            'title_page' => 'Users',
            'users' => $users,
            'statics_users' => $statics_users
        ]);
    }


}
