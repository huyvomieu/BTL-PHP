<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Schema;
class PageController extends Controller
{
    public function index()
    {
        return view('pages.home');
    }
    public function search(Request $request)
    {
        $keyword = $request->query('keyword');
        $products = $results = Product::where(function ($query) use ($keyword) {
            $columns = Schema::getColumnListing('tblproduct');
            foreach ($columns as $column) {
                $query->orWhere($column, 'LIKE', "%{$keyword}%");
            }
        })->get();
        $categories = Category::all();
        return view('pages.search', [
            'products' => $products,
            'categories' => $categories,
        ]);
    }
}
