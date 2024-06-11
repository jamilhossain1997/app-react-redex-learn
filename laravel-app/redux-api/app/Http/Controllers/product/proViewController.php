<?php

namespace App\Http\Controllers\product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class proViewController extends Controller
{
    public function ProductView(){
       $product=Product::where('active',1)->get();

       return response()->json([
          "product"=>$product
       ],200);
    }
}
