@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-12">
            <h2 class="mb-4">Thống kê báo cáo</h2>
        </div>
    </div>

    <!-- Filter Section -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <label>Loại báo cáo</label>
                            <select class="form-control" id="reportType">
                                <option value="revenue">Doanh thu</option>
                                <option value="orders">Đơn hàng</option>
                                <option value="products">Sản phẩm</option>
                                <option value="customers">Khách hàng</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label>Thời gian</label>
                            <select class="form-control" id="timeFilter">
                                <option value="today">Hôm nay</option>
                                <option value="week">Tuần này</option>
                                <option value="month" selected>Tháng này</option>
                                <option value="year">Năm này</option>
                                <option value="custom">Tùy chọn</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label>Tháng</label>
                            <select class="form-control" id="monthFilter">
                                <option value="1">Tháng 1</option>
                                <option value="2">Tháng 2</option>
                                <option value="3">Tháng 3</option>
                                <option value="4">Tháng 4</option>
                                <option value="5">Tháng 5</option>
                                <option value="6">Tháng 6</option>
                                <option value="7">Tháng 7</option>
                                <option value="8">Tháng 8</option>
                                <option value="9">Tháng 9</option>
                                <option value="10">Tháng 10</option>
                                <option value="11">Tháng 11</option>
                                <option value="12" selected>Tháng 12</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label>Năm</label>
                            <select class="form-control" id="yearFilter">
                                <option value="2022">2022</option>
                                <option value="2023">2023</option>
                                <option value="2024" selected>2024</option>
                                <option value="2025">2025</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label>&nbsp;</label>
                            <div class="d-flex">
                                <button class="btn btn-primary mr-2">
                                    <i class="fas fa-search"></i> Xem báo cáo
                                </button>
                                <button class="btn btn-success">
                                    <i class="fas fa-download"></i> Xuất Excel
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3" id="customDateRange" style="display: none;">
                        <div class="col-md-3">
                            <label>Từ ngày</label>
                            <input type="date" class="form-control">
                        </div>
                        <div class="col-md-3">
                            <label>Đến ngày</label>
                            <input type="date" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Summary Cards -->
    <div class="row mb-4">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Doanh thu tháng 12/2024
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">2,850,000,000₫</div>
                            <div class="text-xs text-success">
                                <i class="fas fa-arrow-up"></i> 15.2% so với tháng trước
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
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
                                Đơn hàng tháng 12/2024
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">186</div>
                            <div class="text-xs text-success">
                                <i class="fas fa-arrow-up"></i> 8.5% so với tháng trước
                            </div>
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
                                Khách hàng mới
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">45</div>
                            <div class="text-xs text-danger">
                                <i class="fas fa-arrow-down"></i> 2.1% so với tháng trước
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
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
                                Giá trị đơn hàng TB
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">15,323,000₫</div>
                            <div class="text-xs text-success">
                                <i class="fas fa-arrow-up"></i> 5.8% so với tháng trước
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calculator fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Charts Row -->
    <div class="row mb-4">
        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Biểu đồ doanh thu theo ngày</h6>
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow">
                            <a class="dropdown-item" href="#">Xuất PNG</a>
                            <a class="dropdown-item" href="#">Xuất PDF</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="revenueChart" width="100%" height="40"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Doanh thu theo danh mục</h6>
                </div>
                <div class="card-body">
                    <div class="chart-pie pt-4 pb-2">
                        <canvas id="categoryChart" width="100%" height="50"></canvas>
                    </div>
                    <div class="mt-4 text-center small">
                        <span class="mr-2">
                            <i class="fas fa-circle text-primary"></i> Sofa (45%)
                        </span>
                        <span class="mr-2">
                            <i class="fas fa-circle text-success"></i> Bàn ghế (28%)
                        </span>
                        <span class="mr-2">
                            <i class="fas fa-circle text-info"></i> Tủ kệ (18%)
                        </span>
                        <span class="mr-2">
                            <i class="fas fa-circle text-warning"></i> Giường ngủ (9%)
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Detailed Reports -->
    <div class="row">
        <div class="col-xl-6 col-lg-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Top sản phẩm bán chạy</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-sm">
                            <thead class="thead-light">
                                <tr>
                                    <th>Sản phẩm</th>
                                    <th>Số lượng bán</th>
                                    <th>Doanh thu</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Sofa da thật 3 chỗ ngồi</td>
                                    <td>25</td>
                                    <td>387,500,000₫</td>
                                </tr>
                                <tr>
                                    <td>Bàn ăn gỗ sồi 6 chỗ</td>
                                    <td>18</td>
                                    <td>147,600,000₫</td>
                                </tr>
                                <tr>
                                    <td>Tủ quần áo 4 cánh gương</td>
                                    <td>12</td>
                                    <td>153,600,000₫</td>
                                </tr>
                                <tr>
                                    <td>Giường ngủ King Size</td>
                                    <td>8</td>
                                    <td>180,000,000₫</td>
                                </tr>
                                <tr>
                                    <td>Kệ sách gỗ tự nhiên</td>
                                    <td>15</td>
                                    <td>75,000,000₫</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-6 col-lg-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Khách hàng mua nhiều nhất</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-sm">
                            <thead class="thead-light">
                                <tr>
                                    <th>Khách hàng</th>
                                    <th>Số đơn hàng</th>
                                    <th>Tổng chi tiêu</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Nguyễn Văn A</td>
                                    <td>8</td>
                                    <td>125,600,000₫</td>
                                </tr>
                                <tr>
                                    <td>Trần Thị B</td>
                                    <td>6</td>
                                    <td>89,200,000₫</td>
                                </tr>
                                <tr>
                                    <td>Lê Văn C</td>
                                    <td>5</td>
                                    <td>78,500,000₫</td>
                                </tr>
                                <tr>
                                    <td>Phạm Thị D</td>
                                    <td>4</td>
                                    <td>65,800,000₫</td>
                                </tr>
                                <tr>
                                    <td>Hoàng Văn E</td>
                                    <td>7</td>
                                    <td>95,300,000₫</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Monthly Comparison -->
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">So sánh theo tháng năm 2024</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="thead-light">
                                <tr>
                                    <th>Tháng</th>
                                    <th>Doanh thu</th>
                                    <th>Đơn hàng</th>
                                    <th>Khách hàng mới</th>
                                    <th>Tỷ lệ chuyển đổi</th>
                                    <th>So với tháng trước</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Tháng 1</td>
                                    <td>1,850,000,000₫</td>
                                    <td>125</td>
                                    <td>38</td>
                                    <td>2.8%</td>
                                    <td><span class="text-success">+12.5%</span></td>
                                </tr>
                                <tr>
                                    <td>Tháng 2</td>
                                    <td>1,650,000,000₫</td>
                                    <td>108</td>
                                    <td>32</td>
                                    <td>2.5%</td>
                                    <td><span class="text-danger">-10.8%</span></td>
                                </tr>
                                <tr>
                                    <td>Tháng 3</td>
                                    <td>2,100,000,000₫</td>
                                    <td>142</td>
                                    <td>45</td>
                                    <td>3.2%</td>
                                    <td><span class="text-success">+27.3%</span></td>
                                </tr>
                                <tr>
                                    <td>Tháng 4</td>
                                    <td>1,950,000,000₫</td>
                                    <td>135</td>
                                    <td>41</td>
                                    <td>3.0%</td>
                                    <td><span class="text-danger">-7.1%</span></td>
                                </tr>
                                <tr>
                                    <td>Tháng 5</td>
                                    <td>2,250,000,000₫</td>
                                    <td>156</td>
                                    <td>52</td>
                                    <td>3.5%</td>
                                    <td><span class="text-success">+15.4%</span></td>
                                </tr>
                                <tr>
                                    <td>Tháng 6</td>
                                    <td>2,400,000,000₫</td>
                                    <td>168</td>
                                    <td>48</td>
                                    <td>3.8%</td>
                                    <td><span class="text-success">+6.7%</span></td>
                                </tr>
                                <tr>
                                    <td>Tháng 7</td>
                                    <td>2,650,000,000₫</td>
                                    <td>185</td>
                                    <td>55</td>
                                    <td>4.1%</td>
                                    <td><span class="text-success">+10.4%</span></td>
                                </tr>
                                <tr>
                                    <td>Tháng 8</td>
                                    <td>2,350,000,000₫</td>
                                    <td>162</td>
                                    <td>43</td>
                                    <td>3.6%</td>
                                    <td><span class="text-danger">-11.3%</span></td>
                                </tr>
                                <tr>
                                    <td>Tháng 9</td>
                                    <td>2,550,000,000₫</td>
                                    <td>178</td>
                                    <td>49</td>
                                    <td>3.9%</td>
                                    <td><span class="text-success">+8.5%</span></td>
                                </tr>
                                <tr>
                                    <td>Tháng 10</td>
                                    <td>2,750,000,000₫</td>
                                    <td>192</td>
                                    <td>58</td>
                                    <td>4.2%</td>
                                    <td><span class="text-success">+7.8%</span></td>
                                </tr>
                                <tr>
                                    <td>Tháng 11</td>
                                    <td>2,475,000,000₫</td>
                                    <td>171</td>
                                    <td>46</td>
                                    <td>3.7%</td>
                                    <td><span class="text-danger">-10.0%</span></td>
                                </tr>
                                <tr class="table-info">
                                    <td><strong>Tháng 12</strong></td>
                                    <td><strong>2,850,000,000₫</strong></td>
                                    <td><strong>186</strong></td>
                                    <td><strong>45</strong></td>
                                    <td><strong>4.0%</strong></td>
                                    <td><strong><span class="text-success">+15.2%</span></strong></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection