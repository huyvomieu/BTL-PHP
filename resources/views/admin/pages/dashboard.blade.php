@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-12">
            <h2 class="mb-4">Dashboard</h2>
        </div>
    </div>
    <!-- Statistics Cards -->
    <div class="row mb-4">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Tổng sản phẩm
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">1,247</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-box fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Đơn hàng tháng này
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">156</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-shopping-cart fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Doanh thu tháng này
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">2.5 tỷ VNĐ</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Người dùng
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
    </div>

    <!-- Charts Row -->
    <div class="row">
        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Biểu đồ doanh thu</h6>
                </div>
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="myAreaChart" width="100%" height="40"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Danh mục bán chạy</h6>
                </div>
                <div class="card-body">
                    <div class="chart-pie pt-4 pb-2">
                        <canvas id="myPieChart" width="100%" height="50"></canvas>
                    </div>
                    <div class="mt-4 text-center small">
                        <span class="mr-2">
                            <i class="fas fa-circle text-primary"></i> Sofa
                        </span>
                        <span class="mr-2">
                            <i class="fas fa-circle text-success"></i> Bàn ghế
                        </span>
                        <span class="mr-2">
                            <i class="fas fa-circle text-info"></i> Tủ kệ
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Orders -->
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Đơn hàng gần đây</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Mã đơn hàng</th>
                                    <th>Khách hàng</th>
                                    <th>Ngày đặt</th>
                                    <th>Tổng tiền</th>
                                    <th>Trạng thái</th>
                                    <th>Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>#DH001</td>
                                    <td>Nguyễn Văn A</td>
                                    <td>15/12/2024</td>
                                    <td>15,500,000 VNĐ</td>
                                    <td><span class="badge badge-success">Hoàn thành</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-info">Xem</button>
                                        <button class="btn btn-sm btn-warning">Sửa</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>#DH002</td>
                                    <td>Trần Thị B</td>
                                    <td>14/12/2024</td>
                                    <td>8,200,000 VNĐ</td>
                                    <td><span class="badge badge-warning">Đang xử lý</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-info">Xem</button>
                                        <button class="btn btn-sm btn-warning">Sửa</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>#DH003</td>
                                    <td>Lê Văn C</td>
                                    <td>13/12/2024</td>
                                    <td>22,800,000 VNĐ</td>
                                    <td><span class="badge badge-info">Đang giao</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-info">Xem</button>
                                        <button class="btn btn-sm btn-warning">Sửa</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection