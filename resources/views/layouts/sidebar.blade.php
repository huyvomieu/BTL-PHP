<nav id="sidebar" class="sidebar">
            <div class="sidebar-header">
                <h3><i class="fas fa-couch"></i> Nội Thất Admin</h3>
            </div>
            <ul class="list-unstyled components">
                <li class="{{ ($title_page == 'Dashboard') ? 'active' : '' }}">
                    <a href="/admin"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
                </li>
                <li class="{{ ($title_page == 'Category') ? 'active' : '' }}">
                    <a href="/admin/category"><i class="fas fa-list"></i> Quản lý danh mục</a>
                </li>
                <li class="{{ ($title_page == 'Products') ? 'active' : '' }}">
                    <a href="/admin/products"><i class="fas fa-box"></i> Quản lý sản phẩm</a>
                </li>
                <li class="{{ ($title_page == 'Orders') ? 'active' : '' }}">
                    <a href="/admin/orders"><i class="fas fa-shopping-cart"></i> Quản lý đơn hàng</a>
                </li>
                <li class="{{ ($title_page == 'Reports') ? 'active' : '' }}">
                    <a href="/admin/reports"><i class="fas fa-chart-bar"></i> Thống kê báo cáo</a>
                </li>
                <li class="{{ ($title_page == 'Users') ? 'active' : '' }}">
                    <a href="/admin/users"><i class="fas fa-users"></i> Quản lý người dùng</a>
                </li>
            </ul>
        </nav>