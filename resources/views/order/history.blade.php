@extends('layouts.app')

@section('content')
    <div class="container min-height-100">
        <div class="row">
            <div class="col-md-12 mt-3">
                <h2 class="text-center">Danh Sách Đơn Đặt Hàng</h2>
                <table cellpadding="5px" class="table-bordered w-100 bg-white">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">STT</th>
                            <th scope="col">ID</th>
                            <th scope="col">Người Nhận</th>
                            <th scope="col">Thời Gian</th>
                            <th scope="col">Tổng Thanh Toán</th>
                            <th scope="col">Trạng Thái</th>
                            <th scope="col">Chi Tiết</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($orders->count() > 0)
                            @foreach ($orders as $order)
                                <tr>
                                    <td>1</td>
                                    <td> echo $row_getOrder['order_id']; ?></td>
                                    <td> echo $row_getOrder['order_receiver']; ?></td>
                                    <td> echo $row_getOrder['order_created_time']; ?></td>
                                    <td> echo number_format($row_getOrder['order_value'], 0, ',', '.'); ?> VND</td>
                                    <td class="">status</td>
                                    <td>
                                        <a href="index.php?navigate=order_details&id=echo $row_getOrder['order_id']">Xem</a>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr >
                                <td colspan="7"><p class="text-center">Không Có Lịch Sử Đặt Hàng Nào!</p></td>
                            </tr>
                        @endif
                    </tbody>


                </table>
            </div>
        </div>
    </div>
@endsection