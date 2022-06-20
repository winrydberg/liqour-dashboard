<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function searchProduct(Request $request){
        $results = Product::query()->where('name', 'LIKE', "%{$request->term}%")->get();

        return response()->json([
            'status'=>'success',
            'products' => $results
        ]);
    }
}