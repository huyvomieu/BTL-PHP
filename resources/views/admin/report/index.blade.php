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
                            <label>Tháng</label>
                            <select class="form-control" id="monthFilter">
                                <option value="1">Tháng 1</option>
                                <option value="2">Tháng 2</option>
                                <option value="3">Tháng 3</option>
                                <option value="4">Tháng 4</option>
                                <option value="5">Tháng 5</option>
                                <option value="6" selected>Tháng 6</option>
                                <option value="7">Tháng 7</option>
                                <option value="8">Tháng 8</option>
                                <option value="9">Tháng 9</option>
                                <option value="10">Tháng 10</option>
                                <option value="11">Tháng 11</option>
                                <option value="12">Tháng 12</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label>Năm</label>
                            <select class="form-control" id="yearFilter">
                                <option value="2022">2022</option>
                                <option value="2023">2023</option>
                                <option value="2024">2024</option>
                                <option value="2025" selected>2025</option>
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
                                Doanh thu tháng {{ date('m/Y') }}
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{ number_format($renvenue_orders, 0, ',', '.') }} ₫
                            </div>
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
                                Đơn hàng tháng {{ date('m/Y') }}
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $total_orders }}</div>
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
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $report_users }}</div>
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
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{ number_format($avg_orders, 0, ',', '.') }}₫
                            </div>
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
    <!-- Report Results Section -->
    <div class="row mb-4" id="reportResults" style="display: none">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary" id="reportTitle">
                        Báo cáo doanh thu tháng 12/2024
                    </h6>
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow">
                            <a class="dropdown-item" href="#" id="printReport"><i
                                    class="fas fa-print fa-sm fa-fw mr-2 text-gray-400"></i>In báo cáo</a>
                            <a class="dropdown-item" href="#" id="exportPDF"><i
                                    class="fas fa-file-pdf fa-sm fa-fw mr-2 text-gray-400"></i>Xuất PDF</a>
                            <a class="dropdown-item" href="#" id="exportExcel"><i
                                    class="fas fa-file-excel fa-sm fa-fw mr-2 text-gray-400"></i>Xuất Excel</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <!-- Report Filter Summary -->
                    <div class="alert alert-info mb-4">
                        <div class="row">
                            <div class="col-md-3">
                                <strong>Loại báo cáo:</strong>
                                <span id="summaryReportType">Doanh thu</span>
                            </div>

                            <div class="col-md-3">
                                <strong>Tháng/Năm:</strong>
                                <span id="summaryMonthYear">12/2024</span>
                            </div>
                            <div class="col-md-3 text-right">
                                <strong>Ngày tạo:</strong>
                                <span id="reportGeneratedDate">15/12/2024</span>
                            </div>
                        </div>
                    </div>

                    <!-- Report Content - Will change based on report type -->
                    <div id="revenueReportContent" style="display: none">
                        <!-- Revenue by Day Chart -->
                        <div class="mb-4">
                            <h6 class="font-weight-bold">Doanh thu theo ngày</h6>
                            <div class="chart-area">
                                <canvas id="dailyRevenueChart" width="100%" height="30"></canvas>
                            </div>
                        </div>

                        <!-- Revenue by Product Category -->
                        <div class="row mb-4">
                            <div class="col-md-8">
                                <h6 class="font-weight-bold">
                                    Doanh thu theo danh mục sản phẩm
                                </h6>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-sm">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>Danh mục</th>
                                                <th>Doanh thu</th>
                                                <th>Số lượng bán</th>
                                                <th>% Tổng doanh thu</th>
                                                <th>So với tháng trước</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Sofa</td>
                                                <td>1,282,500,000₫</td>
                                                <td>85</td>
                                                <td>45%</td>
                                                <td><span class="text-success">+8.5%</span></td>
                                            </tr>
                                            <tr>
                                                <td>Bàn ghế</td>
                                                <td>798,000,000₫</td>
                                                <td>120</td>
                                                <td>28%</td>
                                                <td><span class="text-success">+5.2%</span></td>
                                            </tr>
                                            <tr>
                                                <td>Tủ kệ</td>
                                                <td>513,000,000₫</td>
                                                <td>65</td>
                                                <td>18%</td>
                                                <td><span class="text-danger">-2.1%</span></td>
                                            </tr>
                                            <tr>
                                                <td>Giường ngủ</td>
                                                <td>256,500,000₫</td>
                                                <td>12</td>
                                                <td>9%</td>
                                                <td>
                                                    <span class="text-success">+12.3%</span>
                                                </td>
                                            </tr>
                                            <tr class="table-info">
                                                <td><strong>Tổng cộng</strong></td>
                                                <td><strong>2,850,000,000₫</strong></td>
                                                <td><strong>282</strong></td>
                                                <td><strong>100%</strong></td>
                                                <td>
                                                    <strong><span class="text-success">+15.2%</span></strong>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <h6 class="font-weight-bold">Phân bổ doanh thu</h6>
                                <div class="chart-pie pt-4 pb-2">
                                    <canvas id="revenuePieChart" width="100%" height="50"></canvas>
                                </div>
                                <div class="mt-4 text-center small">
                                    <span class="mr-2">
                                        <i class="fas fa-circle text-primary"></i> Sofa
                                        (45%)
                                    </span>
                                    <span class="mr-2">
                                        <i class="fas fa-circle text-success"></i> Bàn ghế
                                        (28%)
                                    </span>
                                    <span class="mr-2">
                                        <i class="fas fa-circle text-info"></i> Tủ kệ (18%)
                                    </span>
                                    <span class="mr-2">
                                        <i class="fas fa-circle text-warning"></i> Giường
                                        ngủ (9%)
                                    </span>
                                </div>
                            </div>
                        </div>

                        <!-- Revenue Trends -->
                        <div class="mb-4">
                            <h6 class="font-weight-bold">Xu hướng doanh thu</h6>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card border-left-success mb-3">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                        Tăng trưởng so với tháng trước
                                                    </div>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                        +15.2%
                                                    </div>
                                                    <div class="text-xs text-muted">
                                                        Tháng 11/2024: 2,475,000,000₫
                                                    </div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fas fa-arrow-up fa-2x text-success"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card border-left-info mb-3">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                                        Tăng trưởng so với cùng kỳ năm trước
                                                    </div>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                        +22.8%
                                                    </div>
                                                    <div class="text-xs text-muted">
                                                        Tháng 12/2023: 2,320,000,000₫
                                                    </div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fas fa-arrow-up fa-2x text-info"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Additional Analysis -->
                        <div class="mb-4">
                            <h6 class="font-weight-bold">Phân tích thêm</h6>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="card mb-3">
                                        <div class="card-header py-3">
                                            <h6 class="m-0 font-weight-bold text-primary">
                                                Phương thức thanh toán
                                            </h6>
                                        </div>
                                        <div class="card-body">
                                            <div class="chart-pie pt-4 pb-2">
                                                <canvas id="paymentMethodChart" width="100%" height="50"></canvas>
                                            </div>
                                            <div class="mt-4 text-center small">
                                                <span class="mr-2">
                                                    <i class="fas fa-circle text-primary"></i> Thẻ
                                                    tín dụng (45%)
                                                </span>
                                                <span class="mr-2">
                                                    <i class="fas fa-circle text-success"></i>
                                                    Chuyển khoản (30%)
                                                </span>
                                                <span class="mr-2">
                                                    <i class="fas fa-circle text-info"></i> COD
                                                    (25%)
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card mb-3">
                                        <div class="card-header py-3">
                                            <h6 class="m-0 font-weight-bold text-primary">
                                                Kênh bán hàng
                                            </h6>
                                        </div>
                                        <div class="card-body">
                                            <div class="chart-pie pt-4 pb-2">
                                                <canvas id="salesChannelChart" width="100%" height="50"></canvas>
                                            </div>
                                            <div class="mt-4 text-center small">
                                                <span class="mr-2">
                                                    <i class="fas fa-circle text-primary"></i>
                                                    Website (60%)
                                                </span>
                                                <span class="mr-2">
                                                    <i class="fas fa-circle text-success"></i> Cửa
                                                    hàng (25%)
                                                </span>
                                                <span class="mr-2">
                                                    <i class="fas fa-circle text-info"></i> Đại lý
                                                    (15%)
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card mb-3">
                                        <div class="card-header py-3">
                                            <h6 class="m-0 font-weight-bold text-primary">
                                                Khu vực
                                            </h6>
                                        </div>
                                        <div class="card-body">
                                            <div class="chart-pie pt-4 pb-2">
                                                <canvas id="regionChart" width="100%" height="50"></canvas>
                                            </div>
                                            <div class="mt-4 text-center small">
                                                <span class="mr-2">
                                                    <i class="fas fa-circle text-primary"></i>
                                                    Miền Nam (50%)
                                                </span>
                                                <span class="mr-2">
                                                    <i class="fas fa-circle text-success"></i>
                                                    Miền Bắc (30%)
                                                </span>
                                                <span class="mr-2">
                                                    <i class="fas fa-circle text-info"></i> Miền
                                                    Trung (20%)
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Order Report Content (Hidden by default) -->
                    <div id="orderReportContent" style="display: none">
                        <!-- Order report content will be here -->
                    </div>

                    <!-- Product Report Content (Hidden by default) -->
                    <div id="productReportContent" style="display: none">
                        <!-- Product report content will be here -->
                    </div>

                    <!-- Customer Report Content (Hidden by default) -->
                    <div id="customerReportContent" style="display: none">
                        <!-- Customer report content will be here -->
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
                                @foreach($product_populars as $product_popular)
                                    <tr>
                                        <td>{{ $product_popular->product_title }}</td>
                                        <td>{{ $product_popular->total_quantity }}</td>
                                        <td>{{ number_format($product_popular->total_renvenue, 0, ',', '.', ) }}₫</td>
                                    </tr>
                                @endforeach
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
                                @foreach($top_users as $top_user)
                                    <tr>
                                        <td>{{ $top_user->user_fullname }}</td>
                                        <td>{{ $top_user->total_orders }}</td>
                                        <td>{{ number_format($top_user->total_spend, 0, ',', '.', ) }}₫</td>
                                    </tr>
                                @endforeach
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
                    <h6 class="m-0 font-weight-bold text-primary">So sánh theo tháng năm {{ date('Y') }}</h6>
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

@section('script')
    <script>
        // Report generation functionality
        $(document).ready(function () {
            // Handle View Report button click
            var myLineChart = null;
            var myPieChart1 = null;
            var myPieChart2 = null;
            var myPieChart3 = null;
            var myPieChart4 = null;
            $('button:contains("Xem báo cáo")').on("click", function () {
                var reportType = $('#reportType').val();
                var monthFilter = $('#monthFilter').val();
                var yearFilter = $('#yearFilter').val();
                console.log('ok');

                $.post('/api/reports', {
                    reportType, monthFilter, yearFilter
                }, function (res) {
                    generateReport(res);
                }).fail(function (error) {
                    console.log(error);

                })
            });

            // Handle report type change
            $("#reportType").on("change", function () {
                updateReportUI();
            });

            // Initialize charts when report is shown
            function initReportCharts(res) {
                console.log(res);

                // Daily Revenue Chart
                if ($("#dailyRevenueChart").length) {
                    var ctx = document.getElementById("dailyRevenueChart");
                    // Nếu đã có biểu đồ thì huỷ trước khi tạo mới
                    if (myLineChart !== null) {
                        myLineChart.destroy();
                    }
                    myLineChart = new Chart(ctx, {
                        type: "line",
                        data: {
                            labels: [
                                "1",
                                "2",
                                "3",
                                "4",
                                "5",
                                "6",
                                "7",
                                "8",
                                "9",
                                "10",
                                "11",
                                "12",
                                "13",
                                "14",
                                "15",
                                "16",
                                "17",
                                "18",
                                "19",
                                "20",
                                "21",
                                "22",
                                "23",
                                "24",
                                "25",
                                "26",
                                "27",
                                "28",
                                "29",
                                "30",
                                "31",
                            ],
                            datasets: [
                                {
                                    label: "Doanh thu",
                                    lineTension: 0.3,
                                    backgroundColor: "rgba(78, 115, 223, 0.05)",
                                    borderColor: "rgba(78, 115, 223, 1)",
                                    pointRadius: 3,
                                    pointBackgroundColor: "rgba(78, 115, 223, 1)",
                                    pointBorderColor: "rgba(78, 115, 223, 1)",
                                    pointHoverRadius: 3,
                                    pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
                                    pointHoverBorderColor: "rgba(78, 115, 223, 1)",
                                    pointHitRadius: 10,
                                    pointBorderWidth: 2,
                                    data: res.revenuePerDay,
                                },
                            ],
                        },
                        options: {
                            maintainAspectRatio: false,
                            layout: {
                                padding: {
                                    left: 10,
                                    right: 25,
                                    top: 25,
                                    bottom: 0,
                                },
                            },
                            scales: {
                                x: {
                                    beginAtZero: true,
                                    title: {
                                        display: true,
                                        text: 'Ngày'
                                    }
                                },
                                y: {
                                    beginAtZero: true,
                                    title: {
                                        display: true,
                                        text: 'Doanh số (Triệu)'
                                    }
                                },
                            },
                            legend: {
                                display: false,
                            },
                            tooltips: {
                                backgroundColor: "rgb(255,255,255)",
                                bodyFontColor: "#858796",
                                titleMarginBottom: 10,
                                titleFontColor: "#6e707e",
                                titleFontSize: 14,
                                borderColor: "#dddfeb",
                                borderWidth: 1,
                                xPadding: 15,
                                yPadding: 15,
                                displayColors: false,
                                intersect: false,
                                mode: "index",
                                caretPadding: 10,
                                callbacks: {
                                    label: function (tooltipItem, chart) {
                                        var datasetLabel =
                                            chart.datasets[tooltipItem.datasetIndex].label || "";
                                        return (
                                            datasetLabel + ": " + tooltipItem.yLabel + " triệu VNĐ"
                                        );
                                    },
                                },
                            },
                        },
                    });
                }

                // Revenue Pie Chart
                if ($("#revenuePieChart").length) {
                    var ctx = document.getElementById("revenuePieChart");
                    if (myPieChart1 !== null) {
                        myPieChart1.destroy();
                    }
                    myPieChart1 = new Chart(ctx, {
                        type: "doughnut",
                        data: {
                            labels: ["Sofa", "Bàn ghế", "Tủ kệ", "Giường ngủ"],
                            datasets: [
                                {
                                    data: [45, 28, 18, 9],
                                    backgroundColor: [
                                        "#4e73df",
                                        "#1cc88a",
                                        "#36b9cc",
                                        "#f6c23e",
                                    ],
                                    hoverBackgroundColor: [
                                        "#2e59d9",
                                        "#17a673",
                                        "#2c9faf",
                                        "#f4b619",
                                    ],
                                    hoverBorderColor: "rgba(234, 236, 244, 1)",
                                },
                            ],
                        },
                        options: {
                            maintainAspectRatio: false,
                            tooltips: {
                                backgroundColor: "rgb(255,255,255)",
                                bodyFontColor: "#858796",
                                borderColor: "#dddfeb",
                                borderWidth: 1,
                                xPadding: 15,
                                yPadding: 15,
                                displayColors: false,
                                caretPadding: 10,
                            },
                            legend: {
                                display: false,
                            },
                            cutoutPercentage: 80,
                        },
                    });
                }

                // Payment Method Chart
                if ($("#paymentMethodChart").length) {
                    var ctx = document.getElementById("paymentMethodChart");
                    if (myPieChart2 !== null) {
                        myPieChart2.destroy();
                    }
                    myPieChart2 = new Chart(ctx, {
                        type: "doughnut",
                        data: {
                            labels: ["Thẻ tín dụng", "Chuyển khoản", "COD"],
                            datasets: [
                                {
                                    data: [45, 30, 25],
                                    backgroundColor: ["#4e73df", "#1cc88a", "#36b9cc"],
                                    hoverBackgroundColor: ["#2e59d9", "#17a673", "#2c9faf"],
                                    hoverBorderColor: "rgba(234, 236, 244, 1)",
                                },
                            ],
                        },
                        options: {
                            maintainAspectRatio: false,
                            tooltips: {
                                backgroundColor: "rgb(255,255,255)",
                                bodyFontColor: "#858796",
                                borderColor: "#dddfeb",
                                borderWidth: 1,
                                xPadding: 15,
                                yPadding: 15,
                                displayColors: false,
                                caretPadding: 10,
                            },
                            legend: {
                                display: false,
                            },
                            cutoutPercentage: 80,
                        },
                    });
                }

                // Sales Channel Chart
                if ($("#salesChannelChart").length) {
                    var ctx = document.getElementById("salesChannelChart");
                    if (myPieChart3 !== null) {
                        myPieChart3.destroy();
                    }
                    myPieChart3 = new Chart(ctx, {
                        type: "doughnut",
                        data: {
                            labels: ["Website", "Cửa hàng", "Đại lý"],
                            datasets: [
                                {
                                    data: [60, 25, 15],
                                    backgroundColor: ["#4e73df", "#1cc88a", "#36b9cc"],
                                    hoverBackgroundColor: ["#2e59d9", "#17a673", "#2c9faf"],
                                    hoverBorderColor: "rgba(234, 236, 244, 1)",
                                },
                            ],
                        },
                        options: {
                            maintainAspectRatio: false,
                            tooltips: {
                                backgroundColor: "rgb(255,255,255)",
                                bodyFontColor: "#858796",
                                borderColor: "#dddfeb",
                                borderWidth: 1,
                                xPadding: 15,
                                yPadding: 15,
                                displayColors: false,
                                caretPadding: 10,
                            },
                            legend: {
                                display: false,
                            },
                            cutoutPercentage: 80,
                        },
                    });
                }

                // Region Chart
                if ($("#regionChart").length) {
                    var ctx = document.getElementById("regionChart");
                    if (myPieChart4 !== null) {
                        myPieChart4.destroy();
                    }
                    myPieChart4 = new Chart(ctx, {
                        type: "doughnut",
                        data: {
                            labels: ["Miền Nam", "Miền Bắc", "Miền Trung"],
                            datasets: [
                                {
                                    data: [50, 30, 20],
                                    backgroundColor: ["#4e73df", "#1cc88a", "#36b9cc"],
                                    hoverBackgroundColor: ["#2e59d9", "#17a673", "#2c9faf"],
                                    hoverBorderColor: "rgba(234, 236, 244, 1)",
                                },
                            ],
                        },
                        options: {
                            maintainAspectRatio: false,
                            tooltips: {
                                backgroundColor: "rgb(255,255,255)",
                                bodyFontColor: "#858796",
                                borderColor: "#dddfeb",
                                borderWidth: 1,
                                xPadding: 15,
                                yPadding: 15,
                                displayColors: false,
                                caretPadding: 10,
                            },
                            legend: {
                                display: false,
                            },
                            cutoutPercentage: 80,
                        },
                    });
                }
            }

            // Generate report based on selected options
            function generateReport(res) {

                // Get selected options
                var reportType = $("#reportType").val();
                var month = $("#monthFilter").val();
                var year = $("#yearFilter").val();

                // Update report title and summary
                updateReportSummary(reportType, month, year);

                // Show the report results section
                $("#reportResults").fadeIn();

                // Update UI based on report type
                updateReportUI();

                // Initialize charts
                setTimeout(function () {
                    initReportCharts(res);
                    // showLoading(false);
                }, 800);

                // Scroll to report results
                $("html, body").animate(
                    {
                        scrollTop: $("#reportResults").offset().top - 70,
                    },
                    500
                );
            }

            // Update report summary information
            function updateReportSummary(reportType, month, year) {
                var reportTypeText = $("#reportType option:selected").text();
                var monthText = $("#monthFilter option:selected").text();
                var yearText = $("#yearFilter option:selected").text();

                // Update report title
                $("#reportTitle").text(
                    "Báo cáo " +
                    reportTypeText.toLowerCase() +
                    " " +
                    monthText.toLowerCase() +
                    "/" +
                    yearText
                );

                // Update summary info
                $("#summaryReportType").text(reportTypeText);
                $("#summaryMonthYear").text(month + "/" + year);

                // Set current date for report generation
                var today = new Date();
                var dd = String(today.getDate()).padStart(2, "0");
                var mm = String(today.getMonth() + 1).padStart(2, "0");
                var yyyy = today.getFullYear();
                $("#reportGeneratedDate").text(dd + "/" + mm + "/" + yyyy);
            }

            // Update UI based on report type
            function updateReportUI() {
                var reportType = $("#reportType").val();

                // Hide all report content sections
                $(
                    "#revenueReportContent, #orderReportContent, #productReportContent, #customerReportContent"
                ).hide();

                // Show the selected report content
                switch (reportType) {
                    case "revenue":
                        $("#revenueReportContent").show();
                        break;
                    case "orders":
                        $("#orderReportContent").show();
                        break;
                    case "products":
                        $("#productReportContent").show();
                        break;
                    case "customers":
                        $("#customerReportContent").show();
                        break;
                    default:
                        $("#revenueReportContent").show();
                }
            }

            // Show/hide loading overlay
            function showLoading(show) {
                if (show) {
                    var loadingHtml =
                        '<div id="reportLoading" style="position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.5); z-index: 9999; display: flex; align-items: center; justify-content: center;">' +
                        '<div class="bg-white p-4 rounded shadow">' +
                        '<div class="spinner-border text-primary mb-3" role="status"><span class="sr-only">Đang tải...</span></div>' +
                        '<div class="text-center">Đang tạo báo cáo...</div>' +
                        "</div></div>";
                    $("body").append(loadingHtml);
                } else {
                    $("#reportLoading").fadeOut(function () {
                        $(this).remove();
                    });
                }
            }

            // Handle print report
            $("#printReport").on("click", function (e) {
                e.preventDefault();
                window.print();
            });

            // Handle export to Excel
            $('#exportExcel, button:contains("Xuất Excel")').on(
                "click",
                function (e) {
                    e.preventDefault();
                    alert("Tính năng xuất Excel đang được phát triển.");
                }
            );

            // Handle export to PDF
            $("#exportPDF").on("click", function (e) {
                e.preventDefault();
                alert("Tính năng xuất PDF đang được phát triển.");
            });
        });
    </script>
@endsection