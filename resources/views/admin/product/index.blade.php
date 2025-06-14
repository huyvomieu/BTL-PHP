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
                                @foreach($products as $index => $product)
                                    <tr>
                                        <td><input type="checkbox" class="form-check-input"></td>
                                        <td>
                                            <img src="/assets/images/products/{{ $product->product_image }}" alt="Sofa"
                                                class="img-thumbnail" style="width: 60px; height: 60px;">
                                        </td>
                                        <td>
                                            <strong>{{ $product->product_title }}</strong>
                                            <br><small class="text-muted">SKU: SF001</small>
                                        </td>
                                        <td><span class="badge badge-primary">{{ $product->category_name }}</span></td>
                                        <td>
                                            <strong>{{ number_format($product->product_price * (100 - $product->product_discount) / 100, 0, ',', '.') }}₫</strong>
                                            <br><small
                                                class="text-muted text-decoration-line-through">{{ number_format($product->product_price, 0, ',', '.') }}₫</small>
                                        </td>
                                        <td>
                                            <span class="badge badge-success">{{ $product->product_quantity }}</span>
                                        </td>
                                        <td><span
                                                class="badge badge-success">{{ $product->product_quantity > 0 ? "Còn hàng" : "Hết hàng" }}</span>
                                        </td>
                                        <td>
                                            {{ $product->create_date }}
                                        </td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <button class="btn btn-sm btn-info" title="Xem chi tiết">
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                                <button btn-edit-product class="btn btn-sm btn-warning" title="Chỉnh sửa"
                                                    data-toggle="modal" data-id="{{ $product->product_id }}"
                                                    data-target="#editProductModal">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <button btn-delete-product class="btn btn-sm btn-danger" title="Xóa"
                                                    data-toggle="modal" data-target="#deleteProductModal"
                                                    data-id="{{ $product->product_id }}">
                                                    <i class="fas fa-trash"></i>
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
                            <li class="page-item"><a class="page-link" href="/admin/products?page=2">2</a></li>
                            <li class="page-item"><a class="page-link" href="/admin/products?page=3">3</a></li>
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
            <form action="/admin/products/create" method="post">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Thêm sản phẩm mới</h5>
                        <button type="button" class="close" data-dismiss="modal">
                            <span>&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label>Tên sản phẩm
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control" name="product_title"
                                        placeholder="Nhập tên sản phẩm">
                                </div>
                                <div class="form-group">
                                    <label>Mô tả ngắn</label>
                                    <textarea class="form-control" rows="3" placeholder="Mô tả ngắn về sản phẩm"
                                        name="product_description"></textarea>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Danh mục <span class="text-danger">*</span></label>
                                    <select class="form-control" name="category_id">
                                        <option selected disabled>Chọn danh mục</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->category_id }}">{{ $category->category_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>SKU</label>
                                    <input type="text" class="form-control" placeholder="Mã sản phẩm" name="product_sku">
                                </div>
                                <div class="form-group">
                                    <label>Trạng thái</label>
                                    <select class="form-control" name="product_status">
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
                                    <label>Giá gốc <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" placeholder="0" name="product_price">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Giá khuyến mãi(% giảm giá)</label>
                                    <input type="number" class="form-control" placeholder="0" name="product_discount"
                                        value="0">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Số lượng tồn kho <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" placeholder="0" name="product_quantity">
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

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                        <button type="submit" class="btn btn-primary" id="btn-add-product">Lưu sản phẩm</button>
                    </div>
                </div>
            </form>
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
                                    <label>Tên sản phẩm <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" value="" id="product_title"
                                        name="product_title">
                                </div>
                                <div class="form-group">
                                    <label>Mô tả ngắn</label>
                                    <textarea class="form-control" rows="3" id="product_description"
                                        name="product_description"></textarea>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Danh mục <span class="text-danger">*</span></label>
                                    <select class="form-control">
                                        @foreach($categories as $category)
                                            <option value="{{ $category->category_id }}">{{ $category->category_name }}</option>
                                        @endforeach
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
                                    <label>Giá gốc <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" id="product_price" name="product_price">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Giá khuyến mãi</label>
                                    <input type="number" class="form-control" id="product_discount" name="product_discount">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Số lượng tồn kho <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" id="product_quantity" name="product_quantity">
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
                                    <img src="" class="img-thumbnail" style="width: 100px;">
                                    <button type="button" class="btn btn-sm btn-danger mt-1">Xóa</button>
                                </div>
                                <div class="col-md-2">
                                    <img src="" class="img-thumbnail" style="width: 100px;">
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
                    <button type="button" class="btn btn-danger" id="btn-confirm-delete">Xóa</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        var btnEditProduct = document.querySelectorAll('button[btn-edit-product]');
        btnEditProduct.forEach(btn => {
            btn.addEventListener('click', (e) => {
                const product_id = btn.getAttribute('data-id');
                $.get('/api/products/' + product_id, function (res, status) {
                    const data = res;
                    $('#product_title').val(data.product_title);
                    $('#product_description').val(data.product_description);
                    $('#product_price').val(data.product_price);
                    $('#product_discount').val(data.product_discount);
                    $('#product_quantity').val(data.product_quantity);
                }).fail(function (err) {
                    console.log(err);
                })

            })
        })
        $('button[btn-delete-product]').each(function () {
            $(this).on('click', function () {
                const product_id = $(this).attr('data-id');
                $('#btn-confirm-delete').on('click', function () {
                    window.location.href =  `/admin/products/delete/${product_id}`;
                });
            });
        });

    </script>
@endsection