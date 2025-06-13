@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2>Quản lý sản phẩm</h2>
                <button class="btn btn-primary" data-toggle="modal" data-target="#addProductModal">
                    <i class="fas fa-plus"></i> Thêm sản phẩm
                </button>
            </div>
        </div>
    </div>

    <!-- Search and Filter -->
    <div class="row mb-4">
        <div class="col-md-4">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Tìm kiếm sản phẩm...">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="button">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <select class="form-control">
                <option>Tất cả danh mục</option>
                <option>Sofa</option>
                <option>Bàn ghế</option>
                <option>Tủ kệ</option>
                <option>Giường ngủ</option>
            </select>
        </div>
        <div class="col-md-2">
            <select class="form-control">
                <option>Tất cả trạng thái</option>
                <option>Còn hàng</option>
                <option>Hết hàng</option>
                <option>Ngừng bán</option>
            </select>
        </div>
        <div class="col-md-2">
            <select class="form-control">
                <option>Giá: Thấp đến cao</option>
                <option>Giá: Cao đến thấp</option>
                <option>Tên A-Z</option>
                <option>Tên Z-A</option>
                <option>Mới nhất</option>
            </select>
        </div>
        <div class="col-md-2">
            <div class="btn-group" role="group">
                <button type="button" class="btn btn-outline-secondary active">
                    <i class="fas fa-th-list"></i>
                </button>
                <button type="button" class="btn btn-outline-secondary">
                    <i class="fas fa-th"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- Products Table -->
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
                                    <th width="8%">Hình ảnh</th>
                                    <th width="25%">Tên sản phẩm</th>
                                    <th width="12%">Danh mục</th>
                                    <th width="10%">Giá</th>
                                    <th width="8%">Tồn kho</th>
                                    <th width="10%">Trạng thái</th>
                                    <th width="12%">Ngày tạo</th>
                                    <th width="12%">Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><input type="checkbox" class="form-check-input"></td>
                                    <td>
                                        <img src="/placeholder.svg?height=60&width=60" alt="Sofa" class="img-thumbnail"
                                            style="width: 60px; height: 60px;">
                                    </td>
                                    <td>
                                        <strong>Sofa da thật 3 chỗ ngồi</strong>
                                        <br><small class="text-muted">SKU: SF001</small>
                                    </td>
                                    <td><span class="badge badge-primary">Sofa</span></td>
                                    <td>
                                        <strong>15,500,000₫</strong>
                                        <br><small class="text-muted text-decoration-line-through">18,000,000₫</small>
                                    </td>
                                    <td>
                                        <span class="badge badge-success">25</span>
                                    </td>
                                    <td><span class="badge badge-success">Còn hàng</span></td>
                                    <td>
                                        15/11/2024
                                        <br><small class="text-muted">10:30</small>
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <button class="btn btn-sm btn-info" title="Xem chi tiết">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button class="btn btn-sm btn-warning" title="Chỉnh sửa" data-toggle="modal"
                                                data-target="#editProductModal">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="btn btn-sm btn-danger" title="Xóa" data-toggle="modal"
                                                data-target="#deleteProductModal">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" class="form-check-input"></td>
                                    <td>
                                        <img src="/placeholder.svg?height=60&width=60" alt="Bàn ăn" class="img-thumbnail"
                                            style="width: 60px; height: 60px;">
                                    </td>
                                    <td>
                                        <strong>Bàn ăn gỗ sồi 6 chỗ</strong>
                                        <br><small class="text-muted">SKU: BA002</small>
                                    </td>
                                    <td><span class="badge badge-info">Bàn ghế</span></td>
                                    <td>
                                        <strong>8,200,000₫</strong>
                                    </td>
                                    <td>
                                        <span class="badge badge-warning">5</span>
                                    </td>
                                    <td><span class="badge badge-warning">Sắp hết</span></td>
                                    <td>
                                        12/11/2024
                                        <br><small class="text-muted">14:15</small>
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <button class="btn btn-sm btn-info" title="Xem chi tiết">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button class="btn btn-sm btn-warning" title="Chỉnh sửa">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="btn btn-sm btn-danger" title="Xóa">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" class="form-check-input"></td>
                                    <td>
                                        <img src="/placeholder.svg?height=60&width=60" alt="Tủ quần áo"
                                            class="img-thumbnail" style="width: 60px; height: 60px;">
                                    </td>
                                    <td>
                                        <strong>Tủ quần áo 4 cánh gương</strong>
                                        <br><small class="text-muted">SKU: TU003</small>
                                    </td>
                                    <td><span class="badge badge-secondary">Tủ kệ</span></td>
                                    <td>
                                        <strong>12,800,000₫</strong>
                                    </td>
                                    <td>
                                        <span class="badge badge-danger">0</span>
                                    </td>
                                    <td><span class="badge badge-danger">Hết hàng</span></td>
                                    <td>
                                        08/11/2024
                                        <br><small class="text-muted">09:20</small>
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <button class="btn btn-sm btn-info" title="Xem chi tiết">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button class="btn btn-sm btn-warning" title="Chỉnh sửa">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="btn btn-sm btn-danger" title="Xóa">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" class="form-check-input"></td>
                                    <td>
                                        <img src="/placeholder.svg?height=60&width=60" alt="Giường ngủ"
                                            class="img-thumbnail" style="width: 60px; height: 60px;">
                                    </td>
                                    <td>
                                        <strong>Giường ngủ King Size có ngăn kéo</strong>
                                        <br><small class="text-muted">SKU: GN004</small>
                                    </td>
                                    <td><span class="badge badge-dark">Giường ngủ</span></td>
                                    <td>
                                        <strong>22,500,000₫</strong>
                                    </td>
                                    <td>
                                        <span class="badge badge-success">12</span>
                                    </td>
                                    <td><span class="badge badge-success">Còn hàng</span></td>
                                    <td>
                                        05/11/2024
                                        <br><small class="text-muted">16:45</small>
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <button class="btn btn-sm btn-info" title="Xem chi tiết">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button class="btn btn-sm btn-warning" title="Chỉnh sửa">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="btn btn-sm btn-danger" title="Xóa">
                                                <i class="fas fa-trash"></i>
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
    <!-- Add Product Modal -->
    <div class="modal fade" id="addProductModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Thêm sản phẩm mới</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label>Tên sản phẩm *</label>
                                    <input type="text" class="form-control" placeholder="Nhập tên sản phẩm">
                                </div>
                                <div class="form-group">
                                    <label>Mô tả ngắn</label>
                                    <textarea class="form-control" rows="3" placeholder="Mô tả ngắn về sản phẩm"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Mô tả chi tiết</label>
                                    <textarea class="form-control" rows="5"
                                        placeholder="Mô tả chi tiết về sản phẩm"></textarea>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Danh mục *</label>
                                    <select class="form-control">
                                        <option>Chọn danh mục</option>
                                        <option>Sofa</option>
                                        <option>Bàn ghế</option>
                                        <option>Tủ kệ</option>
                                        <option>Giường ngủ</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>SKU</label>
                                    <input type="text" class="form-control" placeholder="Mã sản phẩm">
                                </div>
                                <div class="form-group">
                                    <label>Trạng thái</label>
                                    <select class="form-control">
                                        <option value="1">Còn hàng</option>
                                        <option value="0">Hết hàng</option>
                                        <option value="2">Ngừng bán</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <hr>

                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Giá gốc *</label>
                                    <input type="number" class="form-control" placeholder="0">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Giá khuyến mãi</label>
                                    <input type="number" class="form-control" placeholder="0">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Số lượng tồn kho *</label>
                                    <input type="number" class="form-control" placeholder="0">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Cảnh báo tồn kho</label>
                                    <input type="number" class="form-control" placeholder="5">
                                </div>
                            </div>
                        </div>

                        <hr>

                        <div class="form-group">
                            <label>Hình ảnh sản phẩm</label>
                            <input type="file" class="form-control-file" multiple>
                            <small class="form-text text-muted">Có thể chọn nhiều hình ảnh</small>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Kích thước (DxRxC)</label>
                                    <input type="text" class="form-control" placeholder="VD: 200x80x85 cm">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Trọng lượng</label>
                                    <input type="text" class="form-control" placeholder="VD: 50 kg">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Chất liệu</label>
                                    <input type="text" class="form-control" placeholder="VD: Gỗ sồi, da thật">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                    <button type="button" class="btn btn-primary">Lưu sản phẩm</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Product Modal -->
    <div class="modal fade" id="editProductModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Chỉnh sửa sản phẩm</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label>Tên sản phẩm *</label>
                                    <input type="text" class="form-control" value="Sofa da thật 3 chỗ ngồi">
                                </div>
                                <div class="form-group">
                                    <label>Mô tả ngắn</label>
                                    <textarea class="form-control"
                                        rows="3">Sofa da thật cao cấp, thiết kế hiện đại</textarea>
                                </div>
                                <div class="form-group">
                                    <label>Mô tả chi tiết</label>
                                    <textarea class="form-control"
                                        rows="5">Sofa da thật 100%, khung gỗ sồi chắc chắn, thiết kế hiện đại phù hợp với mọi không gian phòng khách.</textarea>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Danh mục *</label>
                                    <select class="form-control">
                                        <option selected>Sofa</option>
                                        <option>Bàn ghế</option>
                                        <option>Tủ kệ</option>
                                        <option>Giường ngủ</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>SKU</label>
                                    <input type="text" class="form-control" value="SF001">
                                </div>
                                <div class="form-group">
                                    <label>Trạng thái</label>
                                    <select class="form-control">
                                        <option value="1" selected>Còn hàng</option>
                                        <option value="0">Hết hàng</option>
                                        <option value="2">Ngừng bán</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <hr>

                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Giá gốc *</label>
                                    <input type="number" class="form-control" value="18000000">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Giá khuyến mãi</label>
                                    <input type="number" class="form-control" value="15500000">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Số lượng tồn kho *</label>
                                    <input type="number" class="form-control" value="25">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Cảnh báo tồn kho</label>
                                    <input type="number" class="form-control" value="5">
                                </div>
                            </div>
                        </div>

                        <hr>

                        <div class="form-group">
                            <label>Hình ảnh hiện tại</label>
                            <div class="row mb-3">
                                <div class="col-md-2">
                                    <img src="/placeholder.svg?height=100&width=100" class="img-thumbnail"
                                        style="width: 100px;">
                                    <button type="button" class="btn btn-sm btn-danger mt-1">Xóa</button>
                                </div>
                                <div class="col-md-2">
                                    <img src="/placeholder.svg?height=100&width=100" class="img-thumbnail"
                                        style="width: 100px;">
                                    <button type="button" class="btn btn-sm btn-danger mt-1">Xóa</button>
                                </div>
                            </div>
                            <input type="file" class="form-control-file" multiple>
                            <small class="form-text text-muted">Có thể chọn nhiều hình ảnh để thêm</small>
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

    <!-- Delete Product Modal -->
    <div class="modal fade" id="deleteProductModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Xác nhận xóa</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Bạn có chắc chắn muốn xóa sản phẩm này không?</p>
                    <p class="text-danger"><strong>Lưu ý:</strong> Việc xóa sản phẩm sẽ không thể hoàn tác.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                    <button type="button" class="btn btn-danger">Xóa</button>
                </div>
            </div>
        </div>
    </div>
@endsection