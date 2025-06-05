<?php

namespace App\Http\Controllers;

use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Category;
class ProductController extends Controller
{
    public function index() {
        // $products = DB::select("SELECT * FROM tblproduct");
        // $products = DB::table('tblproduct')->get();
        $products = Product::all();
        $categories = Category::all();

        // dd($products);
        return view('products.index', [
            'products' => $products,
            'categories' => $categories,
        ]);
    }
    public function detail($id) {

        $product = Product::find($id);
        // dd($product);
        return view('products.detail', [
            'product' => $product
        ]);
    }
    public function search() {
        return response()->json('ok');
    }
}
