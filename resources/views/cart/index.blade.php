@extends('layouts.app')


@section('content')
    <div class="container min-height-100 mb-5">
        <h1 class="text-center">Giỏ hàng của bạn</h1>
        <div>
            @if (!isset($_SESSION['user_id']))
                <form method="GET" action="order/confirm">
                    <table class="bg-white table-bordered w-100" cellpadding="5px">
                        <thead>
                            <tr class="text-center">
                                <th scope="col">STT</th>
                                <th scope="col">Nội dung</th>
                                <th scope="col">Hình ảnh</th>
                                <th scope="col">Số lượng</th>
                                <th scope="col">Giá bán</th>
                                <th scope="col">Xóa</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 0 ?>
                            @foreach ($carts as $cart)
                                <tr class="text-center">
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $cart->product_title }}</td>
                                    <td><img class="product-img" style="width: 260px" src="/assets/images/products/{{ $cart->product_image }}"></td>
                                    <td>
                                        <a class="text-dark" href="/cart/update/{{ $cart->product_id }}/plus"><i
                                                class="fa fa-plus"></i></a>
                                        {{ $cart->quantity }}
                                        <a class="text-dark" href="/cart/update/{{ $cart->product_id }}/minus"><i
                                                class="fa fa-minus"></i></a>
                                    </td>
                                    <td>{{ $cart->product_price }} VND/Vol</td>
                                    <td>
                                        <a class="text-danger" href="/cart/update/{{ $cart->product_id }}/delete">Xóa</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="3">Total value: VND</th>
                                <th colspan="2">Total quantity: total_quantity</th>
                                <td>
                                    <a class="btn btn-danger w-100" href="/cart/delete">Xóa hết</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="w-100" colspan="7">
                                    <button type="submit" class="btn btn-success w-100">Đặt hàng</button>
                                </td>
                            </tr>
                        </tfoot>

                    </table>
                </form>
            @else
                <h5 class="text-center">Không có sản phẩm nào trong giỏ hàng !</h5>
            @endif
        </div>
    </div>
@endsection