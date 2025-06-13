@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2>Quản lý danh mục</h2>
                <button class="btn btn-primary" data-toggle="modal" data-target="#addCategoryModal">
                    <i class="fas fa-plus"></i> Thêm danh mục
                </button>
            </div>
        </div>
    </div>

    <!-- Search and Filter -->
    <div class="row mb-4">
        <div class="col-md-6">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Tìm kiếm danh mục...">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="button">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <select class="form-control">
                <option>Tất cả trạng thái</option>
                <option>Hoạt động</option>
                <option>Không hoạt động</option>
            </select>
        </div>
        <div class="col-md-3">
            <select class="form-control">
                <option>Sắp xếp theo tên</option>
                <option>Sắp xếp theo ngày tạo</option>
                <option>Sắp xếp theo số sản phẩm</option>
            </select>
        </div>
    </div>

    <!-- Categories Table -->
    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead class="thead-light">
                                <tr>
                                    <th >
                                        <input type="checkbox" class="form-check-input">
                                    </th>
                                    <th width="10%">Hình ảnh</th>
                                    <th width="25%">Tên danh mục</th>
                                    <th width="30%">Mô tả</th>
                                    <th width="10%">Số sản phẩm</th>
                                    <th width="10%">Trạng thái</th>
                                    <th width="10%">Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><input type="checkbox" class="form-check-input"></td>
                                    <td>
                                        <img src="/placeholder.svg?height=50&width=50" alt="Sofa" class="img-thumbnail"
                                            style="width: 50px; height: 50px;">
                                    </td>
                                    <td>
                                        <strong>Sofa</strong>
                                        <br><small class="text-muted">Slug: sofa</small>
                                    </td>
                                    <td>Các loại sofa cao cấp, hiện đại cho phòng khách</td>
                                    <td><span class="badge badge-info">45 sản phẩm</span></td>
                                    <td><span class="badge badge-success">Hoạt động</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-warning" data-toggle="modal"
                                            data-target="#editCategoryModal">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="btn btn-sm btn-danger" data-toggle="modal"
                                            data-target="#deleteCategoryModal">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" class="form-check-input"></td>
                                    <td>
                                        <img src="/placeholder.svg?height=50&width=50" alt="Bàn ghế" class="img-thumbnail"
                                            style="width: 50px; height: 50px;">
                                    </td>
                                    <td>
                                        <strong>Bàn ghế</strong>
                                        <br><small class="text-muted">Slug: ban-ghe</small>
                                    </td>
                                    <td>Bàn ghế ăn, bàn làm việc, ghế văn phòng</td>
                                    <td><span class="badge badge-info">32 sản phẩm</span></td>
                                    <td><span class="badge badge-success">Hoạt động</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-warning" data-toggle="modal"
                                            data-target="#editCategoryModal">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="btn btn-sm btn-danger" data-toggle="modal"
                                            data-target="#deleteCategoryModal">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" class="form-check-input"></td>
                                    <td>
                                        <img src="/placeholder.svg?height=50&width=50" alt="Tủ kệ" class="img-thumbnail"
                                            style="width: 50px; height: 50px;">
                                    </td>
                                    <td>
                                        <strong>Tủ kệ</strong>
                                        <br><small class="text-muted">Slug: tu-ke</small>
                                    </td>
                                    <td>Tủ quần áo, kệ sách, tủ tivi, tủ bếp</td>
                                    <td><span class="badge badge-info">28 sản phẩm</span></td>
                                    <td><span class="badge badge-success">Hoạt động</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-warning" data-toggle="modal"
                                            data-target="#editCategoryModal">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="btn btn-sm btn-danger" data-toggle="modal"
                                            data-target="#deleteCategoryModal">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" class="form-check-input"></td>
                                    <td>
                                        <img src="/placeholder.svg?height=50&width=50" alt="Giường ngủ"
                                            class="img-thumbnail" style="width: 50px; height: 50px;">
                                    </td>
                                    <td>
                                        <strong>Giường ngủ</strong>
                                        <br><small class="text-muted">Slug: giuong-ngu</small>
                                    </td>
                                    <td>Giường đơn, giường đôi, nệm và phụ kiện</td>
                                    <td><span class="badge badge-info">18 sản phẩm</span></td>
                                    <td><span class="badge badge-warning">Tạm dừng</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-warning" data-toggle="modal"
                                            data-target="#editCategoryModal">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="btn btn-sm btn-danger" data-toggle="modal"
                                            data-target="#deleteCategoryModal">
                                            <i class="fas fa-trash"></i>
                                        </button>
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
    <!-- Add Category Modal -->
    <div class="modal fade" id="addCategoryModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Thêm danh mục mới</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Tên danh mục *</label>
                                    <input type="text" class="form-control" placeholder="Nhập tên danh mục">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Slug</label>
                                    <input type="text" class="form-control" placeholder="Tự động tạo từ tên">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Mô tả</label>
                            <textarea class="form-control" rows="3" placeholder="Mô tả về danh mục"></textarea>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Hình ảnh</label>
                                    <input type="file" class="form-control-file">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Trạng thái</label>
                                    <select class="form-control">
                                        <option value="1">Hoạt động</option>
                                        <option value="0">Tạm dừng</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Thứ tự hiển thị</label>
                            <input type="number" class="form-control" value="0">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                    <button type="button" class="btn btn-primary">Lưu danh mục</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Category Modal -->
    <div class="modal fade" id="editCategoryModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Chỉnh sửa danh mục</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Tên danh mục *</label>
                                    <input type="text" class="form-control" value="Sofa">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Slug</label>
                                    <input type="text" class="form-control" value="sofa">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Mô tả</label>
                            <textarea class="form-control"
                                rows="3">Các loại sofa cao cấp, hiện đại cho phòng khách</textarea>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Hình ảnh hiện tại</label>
                                    <div class="mb-2">
                                        <img src="/placeholder.svg?height=100&width=100" alt="Current" class="img-thumbnail"
                                            style="width: 100px;">
                                    </div>
                                    <input type="file" class="form-control-file">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Trạng thái</label>
                                    <select class="form-control">
                                        <option value="1" selected>Hoạt động</option>
                                        <option value="0">Tạm dừng</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Thứ tự hiển thị</label>
                            <input type="number" class="form-control" value="1">
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

    <!-- Delete Category Modal -->
    <div class="modal fade" id="deleteCategoryModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Xác nhận xóa</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Bạn có chắc chắn muốn xóa danh mục này không?</p>
                    <p class="text-danger"><strong>Lưu ý:</strong> Việc xóa danh mục sẽ ảnh hưởng đến tất cả sản phẩm thuộc
                        danh mục này.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                    <button type="button" class="btn btn-danger">Xóa</button>
                </div>
            </div>
        </div>
    </div>
@endsection