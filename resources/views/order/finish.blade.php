@extends('layouts.app')

@section('content')
    <div class="container min-height-100">
        <div class="text-center mt-5">
            <p>Cảm ơn bạn đã thanh toán đơn hàng thành công.</p>

            <p><strong>Mã đơn hàng:</strong> {{ $order->order_code }}</p>
            <p><strong>Tổng tiền:</strong> {{ number_format($order->order_value) }}đ</p>

            <p>Chúng tôi sẽ xử lý đơn hàng của bạn sớm nhất. Vui lòng kiểm tra email để xác nhận thông tin!</p>
            <a class="btn btn-info" href="/order/history">Xem lịch sử đơn hàng</a>
        </div>
    </div>
@endsection