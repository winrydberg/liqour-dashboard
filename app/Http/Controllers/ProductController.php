<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Session;

class ProductController extends Controller
{
    public function getProducts(){
        $products = Product::with('brands', 'product_categories')->orderBy('name', 'desc')->paginate(20);
        return view('products', compact('products'));
    }

    public function newProduct(){
        $brands = Brand::all();
        $categories = ProductCategory::all();
        return view('newproduct', compact('brands', 'categories'));
    }

    public function saveProduct(Request $r){
        // dd($r->all());
        if($r->hasFile('image')){
            $destination_path = 'public/images/products';
            $image = $r->file('image');
            $image_name = $image->getClientOriginalName();
            $path = $r->file('image')->storeAs($destination_path, $image_name);

            $product = new Product();
            $product->name = $r->name;
            $product->slug = Str::slug($r->name);
            $product->images = $image_name;
            $product->price = $r->price;
            $product->sale_price = $r->sale_price;
            $product->product_category_id = $r->category;
            $product->description = $r->description;
            $product->producttype = $r->producttype;
            $product->brand_id = $r->brand;
            $product->save();
            Session::flash('success', 'Product succcessfully saved');
            return back();
        }else{
            Session::flash('error', 'Product image is required');
            return back();
        }
    }
}