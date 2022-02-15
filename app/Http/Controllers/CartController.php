<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function add_product($id)
    {
        $product = Product::find($id);
        \Cart::add(array(
            'id' =>  $product->id,
            'name' =>  $product->name,
            'price' => $product->price,
            'quantity' => $product->stock

        ));

        dd(\Cart::getContent());
        return redirect('/');
    }
}
