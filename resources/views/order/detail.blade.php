@extends('layouts.app')

@section('content')
    <div class="container mt-5 min-height-100">
        <table class="table-bordered w-100 bg-white" cellpadding="5px">
            <thead>
                <tr>
                    <th colspan="4">
                        <h1 class="text-center">Chi Tiết Đơn Hàng</h1>
                    </th>
                </tr>
                <tr>
                    <td colspan="2">Người nhận: {{ $order_info->order_receiver }}</td>
                    <td colspan="2">SDT: {{ $order_info->order_phone }}</td>
                </tr>
                <tr>
                    <td colspan="2">Địa chỉ: {{ $order_info->order_phone }}</td>
                    <td colspan="2">Thời gian đặt hàng: {{ $order_info->order_created_time }}</td>
                </tr>
                <tr>
                    <td colspan="4">Ghi chú: {{ $order_info->order_notes }}</td>
                </tr>
                <tr>
                    <td colspan="2">Mã đơn hàng: {{ $order_info->order_code }}</td>
                    <td colspan="2">Phương thức thanh toán: {{ $order_info->order_payment }}</td>
                </tr>
                <tr>
                    <th>STT</th>
                    <th>Tiêu đề</th>
                    <th>Tổng số lượng</th>
                    <th>Tổng Tiền</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $i = 0;
                @endphp
                @foreach ($order_details as $order_detail)
                    @php
                        $i++;
                    @endphp
                    <tr>
                        <td> {{ $i }} </td>
                        <td> {{ $order_detail->product_title }}</td>
                        <td> {{ $order_detail->quantity }} </td>
                        <td> {{ number_format($order_detail->purchase_price) }} VND/Vol</td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="4">Tổng thanh toán: {{ number_format($order_detail->order_value, 0, ',', '.') }} VND</th>
                </tr>
            </tfoot>
        </table>
        <a class="btn btn-primary mt-3" href="/order/history">Quay lại</a>
    </div>
@endsection