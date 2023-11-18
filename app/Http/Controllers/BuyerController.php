<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class BuyerController extends Controller
{
    public function index(){
        $products = Product::where([
            ['deleted_at', '=', null]
        ])->get();
        return view('buyer.products_buy', ['products' => $products]);
    }
    public function checkout($id){

        return view('buyer.products_checkout', ['product_id'=> $id]);

    }
}
