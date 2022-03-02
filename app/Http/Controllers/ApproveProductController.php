<?php

namespace App\Http\Controllers;

use App\Enums\ProductType;
use App\Models\Approve_product;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ApproveProductController extends Controller
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Approve_product  $approve_product
     * @return \Illuminate\Http\Response
     */
    public function show(Approve_product $approve_product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Approve_product  $approve_product
     * @return \Illuminate\Http\Response
     */
    public function edit(Approve_product $approve_product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Approve_product  $approve_product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Approve_product $approve_product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Approve_product  $approve_product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Approve_product $approve_product)
    {
        //
    }
}
