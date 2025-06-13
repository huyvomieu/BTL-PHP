@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2>Quản lý người dùng</h2>
                <button class="btn btn-primary" data-toggle="modal" data-target="#addUserModal">
                    <i class="fas fa-plus"></i> Thêm người dùng
                </button>
            </div>
        </div>
    </div>

    <!-- User Statistics -->
    <div class="row mb-4">
        <div class="col-xl-3 col-md-6 mb-3">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Tổng người dùng
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">3,421</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
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
                                Hoạt động
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">3,156</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-check fa-2x text-gray-300"></i>
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
                                Tạm khóa
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">265</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-times fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-3">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Mới tháng này
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">45</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-plus fa-2x text-gray-300"></i>
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
                <input type="text" class="form-control" placeholder="Tìm kiếm người dùng...">
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
                <option>Hoạt động</option>
                <option>Tạm khóa</option>
                <option>Chưa xác thực</option>
            </select>
        </div>
        <div class="col-md-2">
            <select class="form-control">
                <option>Tất cả vai trò</option>
                <option>Khách hàng</option>
                <option>Admin</option>
                <option>Nhân viên</option>
            </select>
        </div>
        <div class="col-md-2">
            <input type="date" class="form-control" placeholder="Từ ngày">
        </div>
        <div class="col-md-2">
            <select class="form-control">
                <option>Sắp xếp theo tên</option>
                <option>Sắp xếp theo ngày tạo</option>
                <option>Sắp xếp theo lần đăng nhập</option>
            </select>
        </div>
    </div>

    <!-- Users Table -->
    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead class="thead-light">
                                <tr>
                                    <th width="3%">
                                        <input type="checkbox" class="form-check-input">
                                    </th>
                                    <th width="8%">Avatar</th>
                                    <th width="20%">Thông tin</th>
                                    <th width="15%">Liên hệ</th>
                                    <th width="10%">Vai trò</th>
                                    <th width="12%">Ngày tạo</th>
                                    <th width="12%">Lần đăng nhập cuối</th>
                                    <th width="10%">Trạng thái</th>
                                    <th width="10%">Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><input type="checkbox" class="form-check-input"></td>
                                    <td>
                                        <img src="/placeholder.svg?height=50&width=50" alt="Avatar" class="rounded-circle"
                                            style="width: 50px; height: 50px;">
                                    </td>
                                    <td>
                                        <strong>Nguyễn Văn A</strong>
                                        <br><small class="text-muted">ID: #U001</small>
                                        <br><small class="text-muted">Username: nguyenvana</small>
                                    </td>
                                    <td>
                                        <strong>0901234567</strong>
                                        <br><small class="text-muted">nguyenvana@email.com</small>
                                    </td>
                                    <td><span class="badge badge-primary">Khách hàng</span></td>
                                    <td>
                                        15/01/2024
                                        <br><small class="text-muted">10:30</small>
                                    </td>
                                    <td>
                                        15/12/2024
                                        <br><small class="text-muted">14:25</small>
                                    </td>
                                    <td><span class="badge badge-success">Hoạt động</span></td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <button class="btn btn-sm btn-info" data-toggle="modal"
                                                data-target="#userDetailModal" title="Xem chi tiết">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button class="btn btn-sm btn-warning" title="Chỉnh sửa" data-toggle="modal"
                                                data-target="#editUserModal">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="btn btn-sm btn-danger" title="Khóa tài khoản">
                                                <i class="fas fa-ban"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" class="form-check-input"></td>
                                    <td>
                                        <img src="/placeholder.svg?height=50&width=50" alt="Avatar" class="rounded-circle"
                                            style="width: 50px; height: 50px;">
                                    </td>
                                    <td>
                                        <strong>Trần Thị B</strong>
                                        <br><small class="text-muted">ID: #U002</small>
                                        <br><small class="text-muted">Username: tranthib</small>
                                    </td>
                                    <td>
                                        <strong>0912345678</strong>
                                        <br><small class="text-muted">tranthib@email.com</small>
                                    </td>
                                    <td><span class="badge badge-success">Admin</span></td>
                                    <td>
                                        10/02/2024
                                        <br><small class="text-muted">09:15</small>
                                    </td>
                                    <td>
                                        15/12/2024
                                        <br><small class="text-muted">16:40</small>
                                    </td>
                                    <td><span class="badge badge-success">Hoạt động</span></td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <button class="btn btn-sm btn-info" title="Xem chi tiết">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button class="btn btn-sm btn-warning" title="Chỉnh sửa">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="btn btn-sm btn-secondary" title="Không thể khóa Admin" disabled>
                                                <i class="fas fa-shield-alt"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" class="form-check-input"></td>
                                    <td>
                                        <img src="/placeholder.svg?height=50&width=50" alt="Avatar" class="rounded-circle"
                                            style="width: 50px; height: 50px;">
                                    </td>
                                    <td>
                                        <strong>Lê Văn C</strong>
                                        <br><small class="text-muted">ID: #U003</small>
                                        <br><small class="text-muted">Username: levanc</small>
                                    </td>
                                    <td>
                                        <strong>0923456789</strong>
                                        <br><small class="text-muted">levanc@email.com</small>
                                    </td>
                                    <td><span class="badge badge-info">Nhân viên</span></td>
                                    <td>
                                        25/03/2024
                                        <br><small class="text-muted">14:20</small>
                                    </td>
                                    <td>
                                        14/12/2024
                                        <br><small class="text-muted">11:15</small>
                                    </td>
                                    <td><span class="badge badge-success">Hoạt động</span></td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <button class="btn btn-sm btn-info" title="Xem chi tiết">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button class="btn btn-sm btn-warning" title="Chỉnh sửa">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="btn btn-sm btn-danger" title="Khóa tài khoản">
                                                <i class="fas fa-ban"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" class="form-check-input"></td>
                                    <td>
                                        <img src="/placeholder.svg?height=50&width=50" alt="Avatar" class="rounded-circle"
                                            style="width: 50px; height: 50px;">
                                    </td>
                                    <td>
                                        <strong>Phạm Thị D</strong>
                                        <br><small class="text-muted">ID: #U004</small>
                                        <br><small class="text-muted">Username: phamthid</small>
                                    </td>
                                    <td>
                                        <strong>0934567890</strong>
                                        <br><small class="text-muted">phamthid@email.com</small>
                                    </td>
                                    <td><span class="badge badge-primary">Khách hàng</span></td>
                                    <td>
                                        12/11/2024
                                        <br><small class="text-muted">16:45</small>
                                    </td>
                                    <td>
                                        10/12/2024
                                        <br><small class="text-muted">08:30</small>
                                    </td>
                                    <td><span class="badge badge-warning">Tạm khóa</span></td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <button class="btn btn-sm btn-info" title="Xem chi tiết">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button class="btn btn-sm btn-warning" title="Chỉnh sửa">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="btn btn-sm btn-success" title="Mở khóa">
                                                <i class="fas fa-unlock"></i>
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
        <!-- Add User Modal -->
    <div class="modal fade" id="addUserModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Thêm người dùng mới</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Họ và tên *</label>
                                    <input type="text" class="form-control" placeholder="Nhập họ và tên">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Username *</label>
                                    <input type="text" class="form-control" placeholder="Nhập username">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Email *</label>
                                    <input type="email" class="form-control" placeholder="Nhập email">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Số điện thoại</label>
                                    <input type="tel" class="form-control" placeholder="Nhập số điện thoại">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Mật khẩu *</label>
                                    <input type="password" class="form-control" placeholder="Nhập mật khẩu">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Xác nhận mật khẩu *</label>
                                    <input type="password" class="form-control" placeholder="Xác nhận mật khẩu">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Vai trò</label>
                                    <select class="form-control">
                                        <option value="customer">Khách hàng</option>
                                        <option value="staff">Nhân viên</option>
                                        <option value="admin">Admin</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Trạng thái</label>
                                    <select class="form-control">
                                        <option value="active">Hoạt động</option>
                                        <option value="inactive">Tạm khóa</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Địa chỉ</label>
                            <textarea class="form-control" rows="3" placeholder="Nhập địa chỉ"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Avatar</label>
                            <input type="file" class="form-control-file">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                    <button type="button" class="btn btn-primary">Lưu người dùng</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit User Modal -->
    <div class="modal fade" id="editUserModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Chỉnh sửa người dùng</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Họ và tên *</label>
                                    <input type="text" class="form-control" value="Nguyễn Văn A">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Username *</label>
                                    <input type="text" class="form-control" value="nguyenvana" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Email *</label>
                                    <input type="email" class="form-control" value="nguyenvana@email.com">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Số điện thoại</label>
                                    <input type="tel" class="form-control" value="0901234567">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Vai trò</label>
                                    <select class="form-control">
                                        <option value="customer" selected>Khách hàng</option>
                                        <option value="staff">Nhân viên</option>
                                        <option value="admin">Admin</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Trạng thái</label>
                                    <select class="form-control">
                                        <option value="active" selected>Hoạt động</option>
                                        <option value="inactive">Tạm khóa</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Địa chỉ</label>
                            <textarea class="form-control" rows="3">123 Đường ABC, Quận 1, TP.HCM</textarea>
                        </div>
                        <div class="form-group">
                            <label>Avatar hiện tại</label>
                            <div class="mb-2">
                                <img src="/placeholder.svg?height=100&width=100" alt="Current Avatar" class="rounded-circle" style="width: 100px;">
                            </div>
                            <input type="file" class="form-control-file">
                        </div>
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="resetPassword">
                                <label class="form-check-label" for="resetPassword">
                                    Đặt lại mật khẩu (gửi email hướng dẫn cho người dùng)
                                </label>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                    <button type="button" class="btn btn-primary">Cập nhật</button>
                </div>
            </div>
        </div>
    </div>

    <!-- User Detail Modal -->
    <div class="modal fade" id="userDetailModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Chi tiết người dùng</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-4 text-center">
                            <img src="/placeholder.svg?height=150&width=150" alt="Avatar" class="rounded-circle mb-3" style="width: 150px; height: 150px;">
                            <h5>Nguyễn Văn A</h5>
                            <span class="badge badge-primary">Khách hàng</span>
                            <span class="badge badge-success ml-1">Hoạt động</span>
                        </div>
                        <div class="col-md-8">
                            <h6>Thông tin cá nhân</h6>
                            <table class="table table-sm">
                                <tr>
                                    <td width="30%"><strong>ID:</strong></td>
                                    <td>#U001</td>
                                </tr>
                                <tr>
                                    <td><strong>Username:</strong></td>
                                    <td>nguyenvana</td>
                                </tr>
                                <tr>
                                    <td><strong>Email:</strong></td>
                                    <td>nguyenvana@email.com</td>
                                </tr>
                                <tr>
                                    <td><strong>Điện thoại:</strong></td>
                                    <td>0901234567</td>
                                </tr>
                                <tr>
                                    <td><strong>Địa chỉ:</strong></td>
                                    <td>123 Đường ABC, Quận 1, TP.HCM</td>
                                </tr>
                                <tr>
                                    <td><strong>Ngày tạo:</strong></td>
                                    <td>15/01/2024 10:30</td>
                                </tr>
                                <tr>
                                    <td><strong>Lần đăng nhập cuối:</strong></td>
                                    <td>15/12/2024 14:25</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    
                    <hr>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <h6>Thống kê mua hàng</h6>
                            <table class="table table-sm">
                                <tr>
                                    <td><strong>Tổng đơn hàng:</strong></td>
                                    <td>8 đơn</td>
                                </tr>
                                <tr>
                                    <td><strong>Tổng chi tiêu:</strong></td>
                                    <td>125,600,000₫</td>
                                </tr>
                                <tr>
                                    <td><strong>Đơn hàng trung bình:</strong></td>
                                    <td>15,700,000₫</td>
                                </tr>
                                <tr>
                                    <td><strong>Đơn hàng gần nhất:</strong></td>
                                    <td>15/12/2024</td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <h6>Lịch sử hoạt động gần đây</h6>
                            <ul class="list-unstyled">
                                <li><small>15/12/2024 14:25 - Đăng nhập</small></li>
                                <li><small>15/12/2024 10:30 - Đặt đơn hàng #DH001</small></li>
                                <li><small>14/12/2024 16:15 - Xem sản phẩm</small></li>
                                <li><small>13/12/2024 09:20 - Đăng nhập</small></li>
                                <li><small>12/12/2024 11:45 - Cập nhật thông tin</small></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                    <button type="button" class="btn btn-warning">Chỉnh sửa</button>
                    <button type="button" class="btn btn-info">Xem đơn hàng</button>
                </div>
            </div>
        </div>
    </div>
@endsection