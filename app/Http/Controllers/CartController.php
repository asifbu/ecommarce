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

     
       // return redirect('/');
    }

    public function checkout()
    {

    //     $cartCollection = \Cart::getContent();   
    //    dd($cartCollection->count()) ;
       
       dd(\Cart::getContent());
    }

    public function read()
    {
        $cartCollection = \Cart::getContent(); 
        $data['count']=$cartCollection->count();
        return view('layouts/client_view/show_cart_item',$data);

        // return view('read')->with([
        //     'data' => $data
        // ]);
    }
}
