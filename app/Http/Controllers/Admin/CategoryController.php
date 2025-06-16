<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use DB;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = DB::table('tblcategory')
            ->leftJoin('tblproduct', 'tblproduct.category_id', '=', 'tblcategory.category_id')
            ->select(
                'tblcategory.*',
                DB::raw('COUNT(tblproduct.product_id) as product_count')
            )
            ->groupBy('tblcategory.category_id', 'tblcategory.category_name', 'tblcategory.category_desc', 'tblcategory.category_status', 'tblcategory.category_slug')
            ->get();

        return view('admin.category.index', [
            'title_page' => 'Category',
            'categories' => $categories
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required|string|max:255',
            'category_desc' => 'nullable|string',
            'category_status' => 'required|in:0,1'
        ]);

        $category = new Category();
        $category->category_name = $request->category_name;
        $category->category_slug = Str::slug($request->category_name);
        $category->category_desc = $request->category_desc;
        $category->category_status = $request->category_status;

        $category->save();

        return redirect()->route('admin.category.index')->with('success', 'Thêm danh mục thành công!');
    }

    public function updateById(Request $request, $id)
    {
        $request->validate([
            'category_name' => 'required|string|max:255',
            'category_desc' => 'nullable|string',
            'category_status' => 'required|in:0,1'
        ]);

        $category = Category::findOrFail($id);
        $category->category_name = $request->category_name;
        $category->category_slug = Str::slug($request->category_name);
        $category->category_desc = $request->category_desc;
        $category->category_status = $request->category_status;

        $category->save();

        return redirect()->route('admin.category.index')->with('success', 'Cập nhật danh mục thành công!');
    }

    // Xóa bằng GET
    public function getById($id)
    {
        $product = Category::find($id);

        return response()->json($product);
    }

}
