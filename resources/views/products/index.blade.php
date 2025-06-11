@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-2 col-sm-12 sidebar">
                <div class="text-white">
                    <p><i class="fas fa-list"></i> Thể Loại</p>
                    <ul class="list-unstyled">
                        @foreach ($categories as $category)
                            <li class="p-2 mt-2">
                                <a class="text-white" href="/product?c={{ $category->category_id }}">
                                    {{ $category->category_name }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="container-fluid col-lg-10 col-sm-12">
                <h2 class="text-center">Product</h2>
                <div class="row min-height-100">
                    @foreach ($products as $product)
                        <!-- <form class="col-lg-3 col-md-4 col-sm-6" action="/product/{{ $product->product_id }}" method="GET"> -->
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <div class="card text-center mb-4" style="height: 380px;">
                                    <img class="card-img-top product-img"
                                        src="./assets/images/products/{{ $product->product_image }}" />
                                    <div class="card-body">
                                        <h5>{{ $product->product_title }}</h5>
                                        @if ($product->product_discount > 0)
                                            <h6 class="text-danger">
                                                <s>{{ number_format($product->product_price, 0, ',', '.') }} VND</s>
                                                <sup class="badge badge-danger">{{ $product->product_discount }} %</sup>
                                            </h6>
                                            <h6>{{ number_format($product->product_price * (100 - $product->product_discount) / 100, 0, ',', '.') }} VND</h6>
                                        @else
                                            <h6>{{ number_format($product->product_price, 0, ',', '.') }} VND</h6>
                                        @endif
    
                                        @if (session('user_id'))
    
                                            <a href="/product/{{ $product->product_id }}" class="btn btn-info">Buy</a>
                                        @else
                                            <a href="/product/{{ $product->product_id }}" class="btn btn-info">View detail</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        <!-- </form> -->
                    @endforeach
                </div>

@endsection