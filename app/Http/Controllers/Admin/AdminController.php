<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use DB;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Schema;
class AdminController extends Controller
{
    public function index()
    {
        return view('admin.pages.dashboard', [
            'title_page' => 'Dashboard'
        ]);
    }
    
}
