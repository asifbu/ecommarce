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
            <h3 class="card-title">Add Product</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form action="{{url('/admin/product/store')}}" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="card-body">

                <div class="form-group">
                    <label for="exampleInputPassword1">Product Name</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" name="product_name" value="{{old('product_name')}}" placeholder="Enter Sub Category">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputPassword1"> Product Price</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" name="product_price" value="{{old('product_price')}}" placeholder="Enter Sub Category">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputPassword1"> Product Stock</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" name="product_stock" value="{{old('product_stock')}}" placeholder="Enter Sub Category">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputPassword1"> Product Description</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" name="product_desc" value="{{old('product_desc')}}" placeholder="Enter Sub Category">
                  </div>

              <div class="form-group">
                <label for="exampleInputEmail1"> Product Type</label>
                {{-- <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Main Category"> --}}
                <select name="product_type" class="form-control">
                  <option value="">-------  select Product Type  ------</option>
                  @foreach ($product_type as $key =>$types)
                  <option value="{{$key}}">{{$types}}</option>
                  @endforeach
                </select>
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1"> Sub Category</label>
                {{-- <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Main Category"> --}}
                <select name="category_id" class="form-control">
                  <option value="">-------  select category  ------</option>
                  @foreach ($sub_category as $category)
                  <option value="{{$category->id}}">{{$category->name}}</option>
                  @endforeach
                </select>
              </div>

              <div class="form-group">
                <label for="exampleFormControlFile1">Enter Product Image</label>
                <input type="file" name="main_image" class="form-control-file" id="exampleFormControlFile1">
              </div>

        
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
        </div>
        <!-- /.card -->

      </div>

      {{-- display categories --}}

      <div class="col-md-8">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Product Table</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body p-0">
            <table class="table">
              <thead>
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Sub Category</th>
                  <th>Main Category</th>
                  <th> Update </th>
                  <th >Delete</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($products as $product)
                <tr>
                  <td>{{$product->id}}</td>
                  <td>{{$product->name}}</td>
                  {{-- <td>{{App\Enums\ProductType::getDescription($product->main_category_id)}}</td> --}}
                  <td><a class="btn btn-primary" href="{{url("admin/product/edit/$product->id")}}">Update</a></td>
                  {{-- <td><a class="btn btn-primary" href="{{url("admin/product/delete/$product->id")}}">Delete</a></td> --}}
                  <form action="{{url("admin/product/delete/$product->id")}}" method="POST">
                    @csrf
                  <td> <button type="submit" class="btn btn-primary">Delete</button></td>
                  </form>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->

       
 

    </div>
  </div>
</section>
    
@endsection