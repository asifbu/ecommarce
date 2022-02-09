@extends('layouts.admin_view.app')
@section('header')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Product</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">product</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>
    
@endsection
@section('main_card')

<section class="content">
  <div class="container-fluid">
    <div class="row">
      <!-- left column -->
      <div class="col-md-4">
        <!-- general form elements -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Edit Product</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form action="{{url("/admin/product/$product->id/update")}}" method="POST">
            @method('put')
            @csrf
            <div class="card-body">

                <div class="form-group">
                    <label for="exampleInputPassword1">Product Name</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" name="product_name" value=" {{$product->name}}  {{old('product_name')}}" placeholder="Enter Sub Category">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputPassword1"> Product Price</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" name="product_price" value="{{$product->price}}{{old('product_price')}}" placeholder="Enter Sub Category">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputPassword1"> Product Stock</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" name="product_stock" value="{{$product->stock}}{{old('product_stock')}}" placeholder="Enter Sub Category">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputPassword1"> Product Description</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" name="product_desc" value="{{$product->description}}{{old('product_desc')}}" placeholder="Enter Sub Category">
                  </div>

              <div class="form-group">
                <label for="exampleInputEmail1"> Product Type</label>
                {{-- <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Main Category"> --}}
                <select name="product_type" class="form-control">
                  <option value="{{$product->type}}">{{App\Enums\ProductType::getDescription($product->type)}}</option>
                  @foreach ($product_type as $key =>$types)
                  <option value="{{$key}}">{{$types}}</option>
                  @endforeach
                </select>
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1"> Sub Category</label>
               
                <select name="category_id" class="form-control">
                  <option value="{{$product->category_id}}">{{$product->category_id}}</option>
                  @foreach ($sub_category as $category)
                  <option value="{{$category->id}}">{{$category->name}}</option>
                  @endforeach
                </select>
              </div>
            <!-- /.card-body -->

            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
        </div>
        <!-- /.card -->

      </div>

       
 

    </div>
  </div>
</section>
    
@endsection