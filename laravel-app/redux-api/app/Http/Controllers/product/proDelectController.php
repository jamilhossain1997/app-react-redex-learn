<?php

namespace App\Http\Controllers\product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class proDelectController extends Controller
{
    public function ProductDelect(Request $request,$id){
        $product=Product::findOrFail($id);
        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        $product->delete();
    
        return response()->json(['message' => 'Product deleted successfully']);
    }
}
