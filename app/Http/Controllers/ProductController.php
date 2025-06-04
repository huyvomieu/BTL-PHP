<?php

namespace App\Http\Controllers;

use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
class ProductController extends Controller
{
    public function index() {
        // $products = DB::select("SELECT * FROM tblproduct");
        // $products = DB::table('tblproduct')->get();
        $products = Product::all();

        // dd($products);
        return view('products.index', [
            'products' => $products,
        ]);
    }
    public function detail($id) {
        $product = DB::select("SELECT * FROM tblproduct WHERE id =?id;", 
        [
            'id' => 3
        ]);;
        return view('products.detail', compact('product'));
    }
    public function search() {
        return response()->json('ok');
    }
}
