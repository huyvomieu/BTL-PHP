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

                    <tr class="text-center">
                        <td>1</td>
                        <td>
                            {{ $product->product_title }}
                        </td>
                        <td>
                            {{ $quantity }}
                        </td>
                        <td>
                            {{ $product->product_price }}
                        </td>
                    </tr>
                    <tr>
                        <th colspan="5">Total value: {{ $product->product_price * $quantity }}</th>
                    </tr>
                </table>
                <a class="mt-5 btn btn-danger" href="/product/{{ $product->product_id }}">Back</a>
            </div>
            <div class="col-lg-4 mt-5">
                <div>
                    <form method="POST" action="/order/process-payment?method=vnpay">
                        @csrf
                        <p class="mt-2 text-center">Phương Thức Thanh Toán</p>
                        <input class="d-block btn btn-primary mt-3 w-100" type="submit" name="vnpay"
                            value="Payment via VNPAY">
                    </form>
                    <form method="POST" action="/order/process-payment?method=cod">
                        @csrf
                        <input type="hidden" name="order_value" value="{{ $product->product_price * $quantity }}">
                        <input type="hidden" name="order_notes" id="order_notes_mapping">
                        <input class="d-block btn btn-success mt-3 w-100" type="submit" name="cod"
                            value="Cash on Delivery (COD)">
                    </form>
                    <form method="POST" target="_blank" enctype="application/x-www-form-urlencoded"
                        action="/order/momo_qr_payment">
                        @csrf
                        <input type="hidden" name="total_value" value="total_value">
                        <input class="btn text-light mt-3 w-100" style="background-color: #ae2170; border-color: #ae2170;"
                            type="submit" value="Payment via MOMO QR Code">
                    </form>
                    <form method="POST" target="_blank" enctype="application/x-www-form-urlencoded"
                        action="/order/momo_atm_payment">
                        @csrf
                        <input type="hidden" name="total_value" value="total_value">
                        <input class="btn text-light mt-3 w-100" style="background-color: #ae2170; border-color: #ae2170;"
                            type="submit" value="Payment via MOMO ATM">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection