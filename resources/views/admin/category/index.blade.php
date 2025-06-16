{{-- filepath: g:\PHP nang cap\BTL-PHP\resources\views\admin\category\index.blade.php --}}
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

    <!-- ...search/filter giữ nguyên... -->
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
                @foreach($categories as $category)
                    <option>{{ $category->category_name }}</option>
                @endforeach
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

    <!-- Categories Table -->
    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead class="thead-light">
                                <tr>
                                    <th>
                                        <input type="checkbox" class="form-check-input">
                                    </th>

                                    <th width="25%">Tên danh mục</th>
                                    <th width="30%">Mô tả</th>
                                    <th width="10%">Số sản phẩm</th>
                                    <th width="10%">Trạng thái</th>
                                    <th width="10%">Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($categories as $category)
                                    <tr>
                                        <td><input type="checkbox" class="form-check-input"></td>

                                        <td>
                                            <strong>{{ $category->category_name }}</strong>
                                            <br><small class="text-muted">Slug: {{ $category->category_slug }}</small>
                                        </td>
                                        <td>{{ $category->category_desc }}</td>
                                        <td><span class="badge badge-info">{{ $category->product_count }} sản phẩm</span></td>
                                        <td>
                                            <span
                                                class="badge {{ $category->category_status ? 'badge-success' : 'badge-warning' }}">
                                                {{ $category->category_status ? 'Hoạt động' : 'Tạm dừng' }}
                                            </span>
                                        </td>
                                        <td>
                                            <button class="btn btn-sm btn-warning" data-toggle="modal" btn-edit-category
                                                data-target="#editCategoryModal" data-id="{{ $category->category_id }}"
                                                data-name="{{ $category->category_name }}"
                                                data-desc="{{ $category->category_desc }}"
                                                data-status="{{ $category->category_status }}"
                                                data-slug="{{ $category->category_slug }}">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <a href="{{ route('admin.category.delete', $category->category_id) }}"
                                                class="btn btn-sm btn-danger"
                                                onclick="return confirm('Bạn có chắc chắn muốn xóa?')">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- ...pagination giữ nguyên... -->
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
            <form action="{{ route('admin.category.store') }}" method="POST">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Thêm danh mục mới</h5>
                        <button type="button" class="close" data-dismiss="modal">
                            <span>&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Tên danh mục *</label>
                            <input type="text" class="form-control" name="category_name" required>
                        </div>
                        <div class="form-group">
                            <label>Mô tả</label>
                            <textarea class="form-control" name="category_desc"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Trạng thái</label>
                            <select class="form-control" name="category_status">
                                <option value="1">Hoạt động</option>
                                <option value="0">Tạm dừng</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                        <button type="submit" class="btn btn-primary">Lưu danh mục</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Edit Category Modal -->
    <div class="modal fade" id="editCategoryModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <form id="editCategoryForm" method="POST">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Chỉnh sửa danh mục</h5>
                        <button type="button" class="close" data-dismiss="modal">
                            <span>&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="id" id="edit-category-id">
                        <div class="form-group">
                            <label>Tên danh mục *</label>
                            <input type="text" class="form-control" name="category_name" id="edit-category-name" required>
                        </div>
                        <div class="form-group">
                            <label>Mô tả</label>
                            <textarea class="form-control" name="category_desc" id="edit-category-desc"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Trạng thái</label>
                            <select class="form-control" name="category_status" id="edit-category-status">
                                <option value="1">Hoạt động</option>
                                <option value="0">Tạm dừng</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                        <button type="submit" class="btn btn-primary">Cập nhật</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Delete Category Modal -->
    <div class="modal fade" id="deleteCategoryModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <form id="deleteCategoryForm" method="POST">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Xác nhận xóa</h5>
                        <button type="button" class="close" data-dismiss="modal">
                            <span>&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Bạn có chắc chắn muốn xóa danh mục này không?</p>
                        <p class="text-danger"><strong>Lưu ý:</strong> Việc xóa danh mục sẽ ảnh hưởng đến tất cả sản phẩm
                            thuộc danh mục này.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                        <button type="submit" class="btn btn-danger">Xóa</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('script')
    <script>

        $('button[btn-edit-category]').each(function () {
            $(this).on('click', function () {
                const category_id = $(this).attr('data-id');
                $.get('/api/category/' + category_id, function (res, status) {
                    const data = res;
                    console.log(data);

                    $('#edit-category-id').val(data.category_id);
                    $('#edit-category-name').val(data.category_name);
                    $('#edit-category-desc').val(data.category_desc);
                    $('#edit-category-status').val(data.category_status);
                }).fail(function (err) {
                    console.log(err);
                })

            });
        });

        $('#editCategoryModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            console.log(button);

            $('#edit-category-id').html(button.data('id'));
            $('#edit-category-name').html(button.data('name'));
            $('#edit-category-desc').html(button.data('desc'));
            $('#edit-category-status').html(button.data('status'));
            $('#editCategoryForm').attr('action', '/admin/category/update/' + button.data('id'));
        });
        // console.log(button.data('id'), button.data('name'), button.data('desc'), button.data('status'), button.data('slug'));
    </script>
@endsection