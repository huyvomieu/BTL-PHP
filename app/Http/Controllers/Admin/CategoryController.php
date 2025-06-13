<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use DB;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Schema;
class CategoryController extends Controller
{
    public function index()
    {
        return view('admin.category.index', [
            'title_page' => 'Category'
        ]);
    }
    
}
