@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-12">
            <h2 class="mb-4">Quản lý đơn hàng</h2>
        </div>
    </div>

    <!-- Order Statistics -->
    <div class="row mb-4">
        <div class="col-xl-3 col-md-6 mb-3">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Chờ xử lý
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $statistics[0] ?? 0 }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clock fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-3">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Đang xử lý
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $statistics[2] ?? 0 }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-cog fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-3">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Đang giao
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $statistics[3] ?? 0 }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-truck fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-3">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Hoàn thành
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $statistics[1] ?? 0}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-check fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Search and Filter -->
    <div class="row mb-4">
        <div class="col-md-4">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Tìm kiếm đơn hàng...">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="button">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <select class="form-control">
                <option>Tất cả trạng thái</option>
                <option>Chờ xử lý</option>
                <option>Đang xử lý</option>
                <option>Đang giao</option>
                <option>Hoàn thành</option>
                <option>Đã hủy</option>
            </select>
        </div>
        <div class="col-md-2">
            <select class="form-control">
                <option>Tất cả thanh toán</option>
                <option>Chưa thanh toán</option>
                <option>Đã thanh toán</option>
                <option>Hoàn tiền</option>
            </select>
        </div>
        <div class="col-md-2">
            <input type="date" class="form-control" placeholder="Từ ngày">
        </div>
        <div class="col-md-2">
            <input type="date" class="form-control" placeholder="Đến ngày">
        </div>
    </div>

    <!-- Orders Table -->
    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead class="thead-light">
                                <tr>
                                    <th width="8%">Mã đơn hàng</th>
                                    <th width="15%">Khách hàng</th>
                                    <th width="12%">Ngày đặt</th>
                                    <th width="12%">Tổng tiền</th>
                                    <th width="10%">Thanh toán</th>
                                    <th width="12%">Trạng thái</th>
                                    <th width="15%">Ghi chú</th>
                                    <th width="16%">Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orders as $index => $order)
                                    <tr>
                                        <td>
                                            <strong>#DH{{ $order->order_id }}</strong>
                                        </td>
                                        <td>
                                            <strong>{{ $order->user_fullname }}</strong>
                                            <br><small class="text-muted">{{ $order->user_phone }}</small>
                                        </td>
                                        <td>
                                            @php
                                                $date = Carbon\Carbon::parse($order->order_created_time);
                                            @endphp
                                            {{ $date->format('d/m/Y') }}
                                            <br><small class="text-muted">{{ $date->format('H:i:s') }}</small>
                                        </td>
                                        <td>
                                            <strong>{{ number_format($order->order_value, 0, ',', '.') }}₫</strong>
                                        </td>
                                        <td>
                                            <span
                                                class="badge badge-success">{{ !empty($order->order_code) ? "Đã thanh toán" : "Chờ xử lý" }}</span>
                                        </td>
                                        <td>
                                            <span
                                                class="badge {{ $order->order_status == 1 ? "badge-success" : "badge-warning" }} ">{{ $order->order_status == 1 ? "Hoàn thành" : "Chờ xử lý" }}</span>
                                        </td>
                                        <td>
                                            <small>{{ $order->order_notes }}</small>
                                        </td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <button btn-view-order class="btn btn-sm btn-info" data-toggle="modal"
                                                    data-target="#orderDetailModal" title="Xem chi tiết"
                                                    data-id="{{ $order->order_id }}">
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                                <button id="btn-edit-order" class="btn btn-sm btn-warning" title="Chỉnh sửa"
                                                    data-id="{{ $order->order_id }}">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <button class="btn btn-sm btn-primary" title="In hóa đơn">
                                                    <i class="fas fa-print"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    <nav aria-label="Page navigation">
                        <ul class="pagination justify-content-center">
                            <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1">Trước</a>
                            </li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#">Sau</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('modal')
    <!-- Order Detail Modal -->
    <div class="modal fade" id="orderDetailModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="order_id"></h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h6>Thông tin khách hàng</h6>
                            <table class="table table-sm">
                                <tr>
                                    <td width="30%"><strong>Họ tên:</strong></td>
                                    <td id="order_receiver"></td>
                                </tr>
                                <tr>
                                    <td><strong>Điện thoại:</strong></td>
                                    <td id="order_phone"></td>
                                </tr>
                                <tr>
                                    <td><strong>Email:</strong></td>
                                    <td id="user_email"></td>
                                </tr>
                                <tr>
                                    <td><strong>Địa chỉ:</strong></td>
                                    <td id="order_address"></td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <h6>Thông tin đơn hàng</h6>
                            <table class="table table-sm">
                                <tr>
                                    <td width="30%"><strong>Mã đơn:</strong></td>
                                    <td id="order_code"></td>
                                </tr>
                                <tr>
                                    <td><strong>Ngày đặt:</strong></td>
                                    <td id="order_created_time"></td>
                                </tr>
                                <tr>
                                    <td><strong id="order_status">Trạng thái:</strong></td>
                                    <td><span class="badge badge-success">Hoàn thành</span></td>
                                </tr>
                                <tr>
                                    <td><strong>Thanh toán:</strong></td>
                                    <td><span id="order_payment" class="badge badge-success">Đã thanh toán</span></td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <hr>

                    <h6>Sản phẩm đã đặt</h6>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="thead-light">
                                <tr>
                                    <th>Hình ảnh</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Đơn giá</th>
                                    <th>Số lượng</th>
                                    <th>Thành tiền</th>
                                </tr>
                            </thead>
                            <tbody id="tbl-body-orders">

                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="4" class="text-right"><strong>Tổng cộng:</strong></td>
                                    <td><strong id="order_value"></strong></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-6">
                            <h6>Ghi chú</h6>
                            <p id="order_notes"></p>
                        </div>
                        <div class="col-md-6">
                            <h6>Lịch sử trạng thái</h6>
                            <ul class="list-unstyled">
                                <li><small>15/12/2024 10:30 - Đơn hàng được tạo</small></li>
                                <li><small>15/12/2024 11:00 - Xác nhận thanh toán</small></li>
                                <li><small>15/12/2024 14:00 - Bắt đầu giao hàng</small></li>
                                <li><small>15/12/2024 16:30 - Giao hàng thành công</small></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                    <button type="button" class="btn btn-primary">In hóa đơn</button>
                    <button type="button" class="btn btn-warning">Chỉnh sửa</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $('button[btn-view-order]').each(function () {
            $(this).on('click', function () {
                const order_id = $(this).attr('data-id');
                $.get('/api/orders/' + order_id, function (res, status) {
                    const { order_info, order_details } = res;
                    $('#order_id').html("Chi tiết đơn hàng: #DH" + order_info.order_id);
                    $('#order_code').html(order_info.order_code);
                    $('#order_receiver').html(order_info.order_receiver);
                    $('#order_phone').html(order_info.order_phone);
                    $('#user_email').html(order_info.user_email);
                    $('#order_address').html(order_info.order_address);
                    $('#order_created_time').html(order_info.order_created_time);
                    $('#order_notes').html(order_info.order_notes);
                    $('#order_value').html(order_info.order_value);
                    var html = order_details.map(element => (`
                        <tr>
                            <td>
                                <img src="/assets/images/products/${element.product_image}" alt="${element.product_title}" class="img-thumbnail"
                                    style="width: 50px;">
                            </td>
                            <td>${element.product_title}</td>
                            <td>${element.product_price}₫</td>
                            <td>${element.quantity}</td>
                            <td>${element.product_price * element.quantity}₫</td>
                        </tr>
                    `));
                    $('#tbl-body-orders').html(html)
                }).fail(function (err) {
                    console.log(err);
                })
            })
        });
    </script>
@endsection