@extends('layouts/client_view/app')

@section('main_page')
@include('layouts.client_view.hero')

<!-- Slider With Category Menu Area End Here -->
<!-- Begin Li's Static Banner Area -->
@include('layouts.client_view.add1')
<!-- Li's Static Banner Area End Here -->
<!-- Begin Li's Special Product Area -->
{{-- @include('layouts/client_view/hot_deal') --}}
<!-- Li's Special Product Area End Here -->
<!-- Begin Featured Product With Banner Area -->
{{-- @include('layouts/client_view/feature_products') --}}
<!-- Featured Product With Banner Area End Here -->
<!-- Begin Li's Laptop Product Area -->
{{-- 
@include('layouts/client_view/product_display1')

@include('layouts/client_view/product_display') --}}

@include('layouts/client_view/shop_contant')
<!-- Li's Laptop Product Area End Here -->
<!-- Begin Li's TV & Audio Product Area -->

{{-- @include('layouts/client_view/product_display2') --}}

<!-- Li's TV & Audio Product Area End Here -->
<!-- Begin Li's Static Banner Area -->
{{-- @include('layouts/client_view/add2') --}}
<!-- Li's Static Banner Area End Here -->
<!-- Begin Li's Trending Product Area -->
{{-- 
@include('layouts/client_view/product_display3') --}}

<!-- Li's Trending Product Area End Here -->
    
@endsection