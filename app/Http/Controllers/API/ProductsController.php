<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function getProducts(Request $request){

        $lastId = $request->lastid;
        if($lastId != null){
            $products = Product::where('id', '>', $lastId)->orderBy('id', 'ASC')->take(20)->get();
        }else{
            $products = Product::orderBy('id', 'ASC')->take(20)->get();
        }

        return response()->json([
            'status' => 'success',
            'products' => $products
        ]);
    }



    //get alcoholic and non alcolic wine

    public function getCategoryProducts(Request $request){
        
    }
}