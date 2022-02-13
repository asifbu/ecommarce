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
          <form action="{{url('/admin/categories/store')}}" method="POST">
            @csrf
            <div class="card-body">
              <div class="form-group">
                <label for="exampleInputEmail1"> Main Category</label>
                {{-- <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Main Category"> --}}
                <select name="main_category" class="form-control">
                  <option value="">-------  select main category  ------</option>
                  @foreach ($main_category as $key =>$category)
                  <option value="{{$key}}">{{$category}}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Sub Category</label>
                <input type="text" class="form-control" id="exampleInputPassword1" name="sub_category" value="{{old('sub_category')}}" placeholder="Enter Sub Category">
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
            <h3 class="card-title">Categories Table</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body p-0">
            <table class="table">
              <thead>
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Sub Category</th>
                  <th>Main Category</th>
                  <th>Update</th>
                  <th >Delete</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($sub_category as $category)
                <tr>
                  <td>{{$category->id}}</td>
                  <td>{{$category->name}}</td>
                  <td>{{App\Enums\MainCategory::getDescription($category->main_category_id)}}</td>
                  <td><a class="btn btn-primary" href="{{url("/admin/categories/$category->id/edit")}}" >Update</a></td>
                  {{-- <td><a class="btn btn-primary quer" >Update</a></td> --}}
                  <td>
                    <form action="{{url("/admin/categories/$category->id/delete")}}" method="POST">
                      @csrf
                    <button type="submit" class="btn btn-primary">Delete</button>
                    </form>
                  </td>
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

@section('script')

<script>
$(document).ready(function () {
  

$(document).on("click",".quer", function (e) {
  e.preventDefault();
  console.log("hello");


});
});
</script>
    
@endsection