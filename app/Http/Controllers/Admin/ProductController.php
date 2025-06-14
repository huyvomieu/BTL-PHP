<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use DB;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Schema;
class ProductController extends Controller
{
    public function index()
    {
        $categories = DB::table('tblcategory')
        ->get();
        $products = DB::table('tblproduct')
        ->join('tblcategory', 'tblcategory.category_id', '=', 'tblproduct.category_id')
        ->get();
        return view('admin.product.index', [
            'title_page' => 'Products',
            'products' => $products,
            'categories' => $categories,
        ]);
    }
    public function create(Request $request) {
        $product = new Product();
        $product->category_id = $request->category_id;
        $product->product_title = $request->product_title;
        $product->product_description = $request->product_description;
        $product->product_price = $request->product_price;
        $product->product_quantity = $request->product_quantity;
        $product->product_image = $request->product_image ?? "ghe2.jpg";
        $product->product_discount = $request->product_discount;
        $product->save();
        return redirect('/admin/products');
    }
    public function deleteById($id) {
        Product::where('product_id', $id)
        ->delete();
        return redirect('/admin/products');
    }

    // api

    public function getById($id) {
        $product = Product::find($id);
        
        return response()->json($product);
    }
    
}
