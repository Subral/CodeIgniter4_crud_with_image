<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet"
        href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet"
        href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet"
        href="<?php base_url() ?>/assests/css/style.css">
</head>

<body>
    <div class="container">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-6">
                            <h2>Manage <b>Products</b></h2>
                        </div>
                        <div class="col-sm-6">
                            <a href="#addProductModal"
                                class="btn btn-success"
                                data-toggle="modal"> <span>Add Product</span></a>
                        </div>
                    </div>
                </div>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>ID</th>
                            <th>Model</th>
                            <th>Images</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($products as $product) { ?>
                            <tr>
                                <td><?= $product['product'] ?></td>
                                <td><?= $product['category'] ?></td>
                                <td><?= $product['price'] ?></td>
                                <td><?= $product['id'] ?></td>
                                <td><?= $product['model'] ?></td>
                                <td>
                                    <?php if ($product['image']) { ?>
                                        <img src="<?= base_url('uploads/' . $product['image']) ?>"
                                            alt="<?= $product['product'] ?>"
                                            style="width: 80px; height: 80px;">
                                    <?php } ?>
                                </td>
                                <td>
                                    <a href="#editProductModal"
                                        data-id="<?= $product['product_id'] ?>"
                                        class="edit"
                                        data-toggle="modal">Edit</a>
                                    "
                                    <a href="#deleteProductModal"
                                        data-delete_id="<?= $product['product_id'] ?>"
                                        class="delete"
                                        data-toggle="modal"> Del</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Add Modal HTML -->
    <div id="addProductModal"
        class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="post"
                    action="<?= site_url('/add-product') ?>"
                    enctype="multipart/form-data">
                    <div class="modal-header">
                        <h4 class="modal-title">Add Product</h4>
                        <button type="button"
                            class="close"
                            data-dismiss="modal"
                            aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Product</label>
                            <input type="text"
                                name="product"
                                id="product"
                                class="form-control"
                                required>
                        </div>
                        <div class="form-group">
                            <label>Category</label>
                            <input type="text"
                                name="category"
                                id="category"
                                class="form-control"
                                required>
                        </div>
                        <div class="form-group">
                            <label>Price</label>
                            <input type="number"
                                name="price"
                                id="price"
                                class="form-control"
                                required>
                        </div>
                        <div class="form-group">
                            <label>ID</label>
                            <input type="text"
                                name="id"
                                id="id"
                                class="form-control"
                                required>
                        </div>
                        <div class="form-group">
                            <label>Image</label>
                            <input type="file"
                                name="image"
                                id="image"
                                class="form-control"
                                required>
                        </div>
                        <div class="form-group">
                            <label>Model</label>
                            <input type="text"
                                name="model"
                                id="model"
                                class="form-control"
                                required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="button"
                            class="btn btn-default"
                            data-dismiss="modal"
                            value="Cancel">
                        <input type="submit"
                            class="btn btn-info"
                            value="Save">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit Modal HTML -->
    <div id="editProductModal"
        class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="post"
                    action="<?= site_url('/update-product') ?>"
                    enctype="multipart/form-data">
                    <div class="modal-header">
                        <h4 class="modal-title">Update Product</h4>
                        <button type="button"
                            class="close"
                            data-dismiss="modal"
                            aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Product</label>
                            <input type="text"
                                name="product"
                                id="edit_product"
                                class="form-control"
                                required>
                        </div>
                        <div class="form-group">
                            <label>Category</label>
                            <input type="text"
                                name="category"
                                id="edit_category"
                                class="form-control"
                                required>
                        </div>
                        <div class="form-group">
                            <label>Price</label>
                            <input type="number"
                                name="price"
                                id="edit_price"
                                class="form-control"
                                required>
                        </div>
                        <div class="form-group">
                            <label>ID</label>
                            <input type="text"
                                name="id"
                                id="edit_id"
                                class="form-control"
                                required>
                        </div>
                        <div class="form-group">
                            <label>Model</label>
                            <input type="text"
                                name="model"
                                id="edit_model"
                                class="form-control"
                                required>
                        </div>
                        <div class="form-group">
                            <label>Image</label>
                            <input type="file"
                                name="image"
                                id="edit_image"
                                class="form-control"
                                accept="image/*">
                            <input type="hidden"
                                name="existing_image"
                                id="edit_existing_image">
                        </div>
                        <input type="hidden"
                            name="product_id"
                            id="edit_product_id">
                    </div>
                    <div class="modal-footer">
                        <input type="button"
                            class="btn btn-default"
                            data-dismiss="modal"
                            value="Cancel">
                        <input type="submit"
                            class="btn btn-info"
                            value="Update">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Delete Modal HTML -->
    <div id="deleteProductModal"
        class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="post"
                    action="<?= site_url('/delete-product') ?>">
                    <div class="modal-header">
                        <h4 class="modal-title">Delete Product</h4>
                        <button type="button"
                            class="close"
                            data-dismiss="modal"
                            aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to delete these Records?</p>
                        <p class="text-warning"><small>This action cannot be undone.</small></p>
                        <input type="hidden"
                            id="delete_id"
                            name="delete_id">
                    </div>
                    <div class="modal-footer">
                        <input type="button"
                            class="btn btn-default"
                            data-dismiss="modal"
                            value="Cancel">
                        <input type="submit"
                            class="btn btn-danger"
                            value="Delete">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            $('.edit').on('click', function () {
                var id = $(this).data('id');
                $.ajax({
                    url: '<?= site_url('/edit-product') ?>/' + id,
                    method: 'GET',
                    dataType: 'json',
                    success: function (data) {
                        $('#edit_product').val(data.product);
                        $('#edit_category').val(data.category);
                        $('#edit_price').val(data.price);
                        $('#edit_id').val(data.id);
                        $('#edit_model').val(data.model);
                        $('#edit_existing_image').val(data.image);
                        $('#edit_product_id').val(data.product_id);
                    }
                });
            });

            $('.delete').on('click', function () {
                var delete_id = $(this).data('delete_id');
                $('#delete_id').val(delete_id);
            });
        });
    </script>
</body>

</html>