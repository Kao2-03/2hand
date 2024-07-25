<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Cloth_img;
use App\Models\Clothes;
use App\Models\List_clothes;
use Illuminate\Http\Request;

class AdminProductsController extends Controller
{
    public function adminShowAllProducts()
    {
        $cloth_count = Clothes::count();
        $clothes = Clothes::limit(3)->get();
        foreach ($clothes as $cloth) {
            $category = Category::where('category_id', $cloth->category_id)->first();
            $cloth->category = $category;
        }

        return view('admin.product-management.index', [
            'clothes' => $clothes,
            'category' => $category,
            'cloth_count' => $cloth_count
        ]);
    }

    public function adminCreateProduct()
    {
        $categories = Category::all();
        return view('admin.product-management.create', [
            'categories' => $categories
        ]);
    }

    public function adminStoreProduct(Request $request)
    {
        $request->validate([
            // 'product_id' => 'required|string',
            'product_name' => 'required',
            'product_price' => 'required|numeric',
            'category_id' => 'required',
            'product_brand' => 'required',
            'product_origin' => 'required',
            'product_for' => 'required',
            'product_desc' => 'nullable|string',
            'product_img' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $cloth = Clothes::create([
            // 'cloth_id' => $request->input('product_id'),
            'cloth_name' => $request->input('product_name'),
            'cost' => $request->input('product_price'),
            'category_id' => $request->input('category_id'),
            'brand' => $request->input('product_brand'),
            'origin' => $request->input('product_origin'),
            'stock' => 0,
            'avg_rate' => 0,
            'purchase_quantity' => 0,
            'description' => $request->input('product_desc'),
            'forGender' => $request->input('product_for'),
        ]);

        return redirect('/admin/product-management');
    }

    public function adminDetailProduct(string $id)
    {
        $cloth = Clothes::where('cloth_id', $id)->first();
        return view('admin.product-management.detail', [
            'cloth' => $cloth
        ]);
    }

    public function adminEditProduct(string $id)
    {
        $cloth = Clothes::where('cloth_id', $id)->first();
        // dd($cloth);
        return view('admin.product-management.edit', [
            'cloth' => $cloth
        ]);
    }

    public function adminUpdateProduct(Request $request, string $id)
    {
        $cloth = Clothes::where('cloth_id', $id)->update([
            // 'cloth_id' => $request->input('product_id'),
            'cloth_name' => $request->input('product_name'),
            'cost' => $request->input('product_price'),
            'category_id' => $request->input('category_id'),
            'brand' => $request->input('product_brand'),
            'origin' => $request->input('product_origin'),
            'stock' => 0,
            'avg_rate' => 0,
            'purchase_quantity' => 0,
            'description' => $request->input('product_desc'),
            'forGender' => $request->input('product_for'),
        ]);

        return redirect('admin/product-management');
    }

    public function adminDeleteProduct(string $id)
    {
        $cloth = Clothes::where('cloth_id', $id)->delete();
        return redirect('admin/product-management');
    }
}
