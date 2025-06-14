@extends('layouts.app')

@section('content')
    <div>
        <div class="container mt-4">
            <form method="post" action="/order/confirm/{{  $product->product_id  }}">
                @csrf
                <h1 class="text-center">
                    {{ $product->product_title }}
                </h1>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="card">
                            <img src="/assets/images/products/{{  $product->product_image  }}"
                                style="display: inline-block; width: 100%; height: 400px; object-fit: contain; object-position: center center;">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <h5 class="text-center mb-3">Chi Tiết Sản Phẩm</h5>
                        <h6>Giá Bán: {{ number_format($product->product_price, 0, ',', '.') }} VND/Vol</h6>
                        <h6>Giảm Giá: {{ $product->product_discount }} %</h6>
                        <h6>Giá Mua:
                            {{ number_format($product->product_price * (100 - $product->product_discount) / 100, 0, ',', '.') }}
                            VND/Vol
                        </h6>
                        <div class="form-group">
                            <label for="quantity"><b>Số Lượng:</b></label>
                            <input type="number" class="form-control" id="quantity" name="quantity" min="1" max="100" value="1">
                        </div>
                        @if ($product->product_quantity > 0)
                            <div>
                                <input type="submit" class="btn btn-primary" name='mua' value="Mua">
                                <input type="button" class="btn btn-success" name='addToCa' value="Thêm vào giỏ" onclick="handleClickAddCart()">
                            </div>
                        @else
                            <p class="text-danger">Sản phẩm tạm thời hết hàng !!!</p>
                        @endif
                    </div>
                    <div class="col-lg-4">
                        <div class="card p-3">
                            <h5 class="text-center">Mô Tả</h5>
                            <hr>
                            <p class="font-italic">
                                "{{ $product->product_description }}"
                            </p>
                            <p>Tác giả: {{$product->product_author  }}</p>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="container my-5">
            <h3>Bình Luận: </h3>
            
        </div>
    </div>
    <script>
        function handleClickAddCart() {
            var quantity = document.getElementById('quantity').value;
            window.location.href = `/cart/add/{{ $product->product_id }}/${quantity}`;
            
        }
    </script>

@endsection