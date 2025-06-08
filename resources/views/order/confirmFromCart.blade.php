@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-8 mt-5">
                <table class="table-bordered w-100" cellpadding="5px">
                    <tr class="text-center">
                        <td colspan="4">
                            <h4>Đặt Hàng</h4>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4">Người nhận: {{ $user->user_fullname }} </td>
                    </tr>
                    <tr>
                        <td colspan="2">Địa chỉ: {{ $user->user_address }} </td>
                        <td colspan="2">SDT: {{ $user->user_phone }}</td>
                    </tr>
                    <tr>
                        <td colspan="4">Ghi chú: order_notes </td>
                    </tr>
                    <tr class="text-center">
                        <th scope="col">STT</th>
                        <th scope="col">Tiêu đề</th>
                        <th scope="col">Số lượng</th>
                        <th scope="col">Giá bán</th>
                    </tr>
                    @php
                        $total = 0;
                    @endphp
                    @foreach ($carts as $cart)
                        <tr class="text-center">
                            <td>1</td>
                            <td>
                                {{ $cart->product_title }}
                            </td>
                            <td>
                                {{ $cart->quantity }}
                            </td>
                            <td>
                                {{ $cart->product_price }}
                            </td>
                        </tr>
                        @php
                            $total += $cart->product_price
                        @endphp
                    @endforeach

                    <tr>
                        <th colspan="5">Total value: {{ $total }} VND</th>
                    </tr>
                </table>
                <a class="mt-5 btn btn-danger" href="/cart">Back</a>
            </div>
            <div class="col-lg-4 mt-5">
                <div>
                    <form method="POST" action="pages/main/order/process_payment.php">
                        <p class="mt-2 text-center">Phương Thức Thanh Toán</p>
                        <input class="d-block btn btn-success mt-3 w-100" type="submit" name="cod"
                            value="Cash on Delivery (COD)">
                        <input class="d-block btn btn-primary mt-3 w-100" type="submit" name="vnpay"
                            value="Payment via VNPAY">
                    </form>
                    <form method="POST" target="_blank" enctype="application/x-www-form-urlencoded"
                        action="pages/main/order/momo_qr_payment.php">
                        <input type="hidden" name="total_value" value="total_value">
                        <input class="btn text-light mt-3 w-100" style="background-color: #ae2170; border-color: #ae2170;"
                            type="submit" value="Payment via MOMO QR Code">
                    </form>
                    <form method="POST" target="_blank" enctype="application/x-www-form-urlencoded"
                        action="pages/main/order/momo_atm_payment.php">
                        <input type="hidden" name="total_value" value="total_value">
                        <input class="btn text-light mt-3 w-100" style="background-color: #ae2170; border-color: #ae2170;"
                            type="submit" value="Payment via MOMO ATM">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection