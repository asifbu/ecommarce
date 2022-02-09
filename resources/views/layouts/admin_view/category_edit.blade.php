@extends('layouts.admin_view.app')
@section('header')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Categories</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Blank Page</li>
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
            <h3 class="card-title">Add Category</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form action="{{url("/admin/categories/update/{$category_edit->id}")}}" method="POST">
            @csrf
            <div class="card-body">
              <div class="form-group">
                <label for="exampleInputEmail1"> Main Category</label>
                {{-- <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Main Category"> --}}
                <select name="main_category" class="form-control">
                  <option value="{{$category_edit->main_category_id}} "> {{App\Enums\MainCategory::getDescription($category_edit->main_category_id) }}</option>
                  @foreach ($main_category as $key =>$category)
                  <option value="{{$key}}">{{$category}}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Sub Category</label>
                <input type="text" class="form-control" id="exampleInputPassword1" name="sub_category" value="{{old('sub_category') }}{{$category_edit->name}}" placeholder="Enter Sub Category">
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

    
  </div>
</section>
    
@endsection