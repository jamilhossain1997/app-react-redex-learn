<?php

namespace App\Http\Controllers\product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Product; // Make sure you have the Product model

class ProAddController extends Controller
{
    public function ProductAdd(Request $request)
    {
        // Validate the request
        $validator = Validator::make($request->all(), [
            'product_name' => 'required|string|max:255',
            'product_price' => 'required|integer',
            'quantity' => 'required|integer',
            'description' => 'required|string|max:255',
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()], 422);
        }

        // Perform the insert operation only if validation passes
        $product = Product::create([
            'product_name' => $request->input('product_name'),
            'product_price' => $request->input('product_price'),
            'quantity' => $request->input('quantity', 0), 
            'description' => $request->input('description'),
        ]);

        if ($product) {
            return response()->json([
                'status' => 200,
                'message' => 'Product submitted successfully',
                'product' => $product
            ]);
        } else {
            return response()->json([
                'status' => 400,
                'message' => 'Product not submitted successfully',
            ]);
        }
    }
}