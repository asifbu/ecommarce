<?php

namespace App\Http\Controllers\admin;

use App\Enums\ProductType;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data["product_type"] = ProductType::asSelectArray();
        $data["products"] = Product::get();
        $data["sub_category"] = Category::get();
        return view('layouts/admin_view/product',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $path = $request->file('main_image')->store("images",'public');
        $product = new Product();
        $product->name = $request->product_name;
        $product->price = $request->product_price;
        $product->stock = $request->product_stock;
        $product->type = $request->product_type;
        $product->description = $request->product_desc;
        $product->feature_image = $path;

        $product->category_id = $request->category_id;
        $product->save();
        return redirect('/admin/product');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $data["product"] = Product::where('id',$id)->get();
        $data["product"] = Product::find($id);
        $data["product_type"] = ProductType::asSelectArray();
        $data["sub_category"] = Category::get();
        return view('layouts/admin_view/edit',$data);
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product_update = Product::find($id);
        $product_update->name = $request->product_name;
        $product_update->price = $request->product_price;
        $product_update->stock = $request->product_stock;
        $product_update->type = $request->product_type;
        $product_update->description = $request->product_desc;

        $product_update->category_id = $request->category_id;
       // $product->price = $request->product_price;
        $product_update->save();
        return redirect('/admin/product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        if(!$product)
        {
            return redirect('/admin/product');
        }
        $product->delete();

        return redirect('/admin/product');
    }

    public function status()
    {
        $data["product_type"] = ProductType::asSelectArray();
        $data["products"] = Product::get();
        $data["sub_category"] = Category::get();
        return view('layouts/admin_view/approve_product',$data);
    }

    public function statusEdit($id)
    {
        $data["product"] = Product::find($id);
        $data["product_type"] = ProductType::asSelectArray();
        $data["sub_category"] = Category::get();
        return view('layouts/admin_view/approved_edit',$data);

    }

    public function statusUpdate(Request $request, $id)
    {
        $product_update = Product::find($id);
        $product_update->status = $request->product_status;
        $product_update->save();
        return redirect('/admin/status/product');
    }
}
