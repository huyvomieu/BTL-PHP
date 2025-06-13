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
                            <div class="h5 mb-0 font-weight-bold text-gray-800">12</div>
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
                            <div class="h5 mb-0 font-weight-bold text-gray-800">8</div>
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
                            <div class="h5 mb-0 font-weight-bold text-gray-800">15</div>
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
                            <div class="h5 mb-0 font-weight-bold text-gray-800">156</div>
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
                                <tr>
                                    <td>
                                        <strong>#DH001</strong>
                                    </td>
                                    <td>
                                        <strong>Nguyễn Văn A</strong>
                                        <br><small class="text-muted">0901234567</small>
                                    </td>
                                    <td>
                                        15/12/2024
                                        <br><small class="text-muted">10:30</small>
                                    </td>
                                    <td>
                                        <strong>15,500,000₫</strong>
                                    </td>
                                    <td>
                                        <span class="badge badge-success">Đã thanh toán</span>
                                    </td>
                                    <td>
                                        <span class="badge badge-success">Hoàn thành</span>
                                    </td>
                                    <td>
                                        <small>Giao hàng nhanh</small>
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <button class="btn btn-sm btn-info" data-toggle="modal"
                                                data-target="#orderDetailModal" title="Xem chi tiết">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button class="btn btn-sm btn-warning" title="Chỉnh sửa">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="btn btn-sm btn-primary" title="In hóa đơn">
                                                <i class="fas fa-print"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong>#DH002</strong>
                                    </td>
                                    <td>
                                        <strong>Trần Thị B</strong>
                                        <br><small class="text-muted">0912345678</small>
                                    </td>
                                    <td>
                                        14/12/2024
                                        <br><small class="text-muted">14:15</small>
                                    </td>
                                    <td>
                                        <strong>8,200,000₫</strong>
                                    </td>
                                    <td>
                                        <span class="badge badge-warning">Chưa thanh toán</span>
                                    </td>
                                    <td>
                                        <span class="badge badge-warning">Đang xử lý</span>
                                    </td>
                                    <td>
                                        <small>COD</small>
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <button class="btn btn-sm btn-info" title="Xem chi tiết">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button class="btn btn-sm btn-warning" title="Chỉnh sửa">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="btn btn-sm btn-primary" title="In hóa đơn">
                                                <i class="fas fa-print"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong>#DH003</strong>
                                    </td>
                                    <td>
                                        <strong>Lê Văn C</strong>
                                        <br><small class="text-muted">0923456789</small>
                                    </td>
                                    <td>
                                        13/12/2024
                                        <br><small class="text-muted">09:20</small>
                                    </td>
                                    <td>
                                        <strong>22,800,000₫</strong>
                                    </td>
                                    <td>
                                        <span class="badge badge-success">Đã thanh toán</span>
                                    </td>
                                    <td>
                                        <span class="badge badge-info">Đang giao</span>
                                    </td>
                                    <td>
                                        <small>Giao trong ngày</small>
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <button class="btn btn-sm btn-info" title="Xem chi tiết">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button class="btn btn-sm btn-warning" title="Chỉnh sửa">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="btn btn-sm btn-primary" title="In hóa đơn">
                                                <i class="fas fa-print"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong>#DH004</strong>
                                    </td>
                                    <td>
                                        <strong>Phạm Thị D</strong>
                                        <br><small class="text-muted">0934567890</small>
                                    </td>
                                    <td>
                                        12/12/2024
                                        <br><small class="text-muted">16:45</small>
                                    </td>
                                    <td>
                                        <strong>5,600,000₫</strong>
                                    </td>
                                    <td>
                                        <span class="badge badge-danger">Hoàn tiền</span>
                                    </td>
                                    <td>
                                        <span class="badge badge-danger">Đã hủy</span>
                                    </td>
                                    <td>
                                        <small>Khách hủy đơn</small>
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <button class="btn btn-sm btn-info" title="Xem chi tiết">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button class="btn btn-sm btn-secondary" title="Đã hủy" disabled>
                                                <i class="fas fa-ban"></i>
                                            </button>
                                            <button class="btn btn-sm btn-primary" title="In hóa đơn">
                                                <i class="fas fa-print"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
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
                    <h5 class="modal-title">Chi tiết đơn hàng #DH001</h5>
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
                                    <td>Nguyễn Văn A</td>
                                </tr>
                                <tr>
                                    <td><strong>Điện thoại:</strong></td>
                                    <td>0901234567</td>
                                </tr>
                                <tr>
                                    <td><strong>Email:</strong></td>
                                    <td>nguyenvana@email.com</td>
                                </tr>
                                <tr>
                                    <td><strong>Địa chỉ:</strong></td>
                                    <td>123 Đường ABC, Quận 1, TP.HCM</td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <h6>Thông tin đơn hàng</h6>
                            <table class="table table-sm">
                                <tr>
                                    <td width="30%"><strong>Mã đơn:</strong></td>
                                    <td>#DH001</td>
                                </tr>
                                <tr>
                                    <td><strong>Ngày đặt:</strong></td>
                                    <td>15/12/2024 10:30</td>
                                </tr>
                                <tr>
                                    <td><strong>Trạng thái:</strong></td>
                                    <td><span class="badge badge-success">Hoàn thành</span></td>
                                </tr>
                                <tr>
                                    <td><strong>Thanh toán:</strong></td>
                                    <td><span class="badge badge-success">Đã thanh toán</span></td>
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
                            <tbody>
                                <tr>
                                    <td>
                                        <img src="/placeholder.svg?height=50&width=50" alt="Sofa" class="img-thumbnail"
                                            style="width: 50px;">
                                    </td>
                                    <td>Sofa da thật 3 chỗ ngồi</td>
                                    <td>15,500,000₫</td>
                                    <td>1</td>
                                    <td>15,500,000₫</td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="4" class="text-right"><strong>Tổng cộng:</strong></td>
                                    <td><strong>15,500,000₫</strong></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-6">
                            <h6>Ghi chú</h6>
                            <p>Giao hàng nhanh, khách hàng yêu cầu gọi trước khi giao.</p>
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