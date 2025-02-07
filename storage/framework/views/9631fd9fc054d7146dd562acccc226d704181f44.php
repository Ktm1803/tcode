
<?php $__env->startSection('content'); ?>
    <div class="row g-gs">
        <div class="col-xl-12">
            <div class="nk-block nk-block-lg">
                <div class="nk-block-head">
                    <div class="nk-block-head-content">
                        <h4 class="nk-block-title">Thêm máy chủ <?php echo e($title); ?></h4>
                        <div class="nk-block-des">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-inner">
                                <form action="<?php echo e(route('admin.service.add', 'tiktok')); ?>" ajax-request="huycoder"
                                    method="POST">
                                    
                                    <div class="form-group">
                                        <label class="form-label" for="server_type">Máy chủ của dịch vụ</label>
                                        <div class="form-control-wrap">
                                            <select name="server_type" id="server_type" class="form-select js-select2">
                                                <option value="select">Chọn dịch vụ</option>
                                                <option value="subgiare">subgiare.vn</option>
                                                <option value="baostar">baostar.pro</option>
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="server_service" class="form-label">Server</label>
                                        <div class="form-control-wrap">
                                            <select name="server_service" id="server_service"
                                                class="form-select js-select2">
                                                <?php for($i = 1; $i <= 30; $i++): ?>
                                                    <option value="sv<?php echo e($i); ?>">Server: <?php echo e($i); ?>

                                                    </option>
                                                <?php endfor; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div id="show_service"></div>
                                    <div class="form-group">
                                        <label for="rate_service" class="form-label">Giá dịch vụ</label>
                                        <input type="text" name="rate_service" id="rate_service" class="form-control"
                                            placeholder="Nhập giá dịch vụ">
                                    </div>
                                    <div class="form-group">
                                        <label for="title_service" class="form-label">Tiêu đề</label>
                                        <input type="text" name="title_service" id="title_service" class="form-control"
                                            placeholder="Nhập tiêu đề">
                                    </div>
                                    <div class="form-group">
                                        <label for="notice" class="form-label">Thông báo máy chủ</label>
                                        <input type="text" name="notice" id="notice" class="form-control"
                                            placeholder="Nhập thông báo máy chủ">
                                    </div>
                                    <div class="form-group mt-2">
                                        <button type="submit" class="btn btn-primary btn-block btn-lg">Thêm dịch
                                            vụ</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="nk-block nk-block-lg">
            <div class="nk-block-head">
                <div class="nk-block-head-content">
                    <h4 class="nk-block-title">Danh sách dịch vụ subgiare</h4>
                    <div class="nk-block-des">
                    </div>
                </div>
            </div>
            <div class="card card-bordered card-preview">
                <div class="card-inner">
                    <div class="table-responsive">
                        <table class="datatable-init table">
                            <thead>
                                <tr>
                                    <th>Loại</th>
                                    <th>Máy chủ</th>
                                    <th>Giá</th>
                                    <th>Trạng thái</th>
                                    <th>Ngày tạo</th>
                                    <th>Chức năng</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $SubGiare; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($item->code_server); ?></td>
                                        <td><?php echo e($item->server_service); ?></td>
                                        <td><?php echo e($item->rate_server); ?></td>
                                        <td>
                                            <?php if($item->status_server == 'on'): ?>
                                                <span class="badge bg-success">Hoạt động</span>
                                            <?php else: ?>
                                                <span class="badge bg-danger">Bảo trì</span>
                                            <?php endif; ?>
                                        </td>
                                        <td><?php echo e($item->created_at); ?></td>
                                        <td>
                                            <a href="<?php echo e(route('admin.service.edit', $item->id)); ?>"
                                                class="btn btn-success">Sửa</a>
                                            <?php if($item->status_server == 'on'): ?>
                                                <a href="<?php echo e(route('admin.service.status', $item->id)); ?>"
                                                    class="btn btn-danger">Bảo trì</a>
                                            <?php else: ?>
                                                <a href="<?php echo e(route('admin.service.status', $item->id)); ?>"
                                                    class="btn btn-success">Hoạt động</a>
                                            <?php endif; ?>
                                            <a href="<?php echo e(route('admin.service.delete', $item->id)); ?>"
                                                class="btn btn-danger">Xóa</a>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="nk-block nk-block-lg">
            <div class="nk-block-head">
                <div class="nk-block-head-content">
                    <h4 class="nk-block-title">Danh sách dịch vụ baostar</h4>
                    <div class="nk-block-des">
                    </div>
                </div>
            </div>
            <div class="card card-bordered card-preview">
                <div class="card-inner">
                    <div class="table-responsive">
                        <table class="datatable-init table">
                            <thead>
                                <tr>
                                    <th>Loại</th>
                                    <th>Máy chủ</th>
                                    <th>Giá</th>
                                    <th>Trạng thái</th>
                                    <th>Ngày tạo</th>
                                    <th>Chức năng</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $BaoStar; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($item->code_server); ?></td>
                                        <td><?php echo e($item->server_service); ?></td>
                                        <td><?php echo e($item->rate_server); ?></td>
                                        <td>
                                            <?php if($item->status_server == 'on'): ?>
                                                <span class="badge bg-success">Hoạt động</span>
                                            <?php else: ?>
                                                <span class="badge bg-danger">Bảo trì</span>
                                            <?php endif; ?>
                                        </td>
                                        <td><?php echo e($item->created_at); ?></td>
                                        <td>
                                            <a href="<?php echo e(route('admin.service.edit', $item->id)); ?>"
                                                class="btn btn-success">Sửa</a>
                                            <?php if($item->status_server == 'on'): ?>
                                                <a href="<?php echo e(route('admin.service.status', $item->id)); ?>"
                                                    class="btn btn-danger">Bảo trì</a>
                                            <?php else: ?>
                                                <a href="<?php echo e(route('admin.service.status', $item->id)); ?>"
                                                    class="btn btn-success">Hoạt động</a>
                                            <?php endif; ?>
                                            <a href="<?php echo e(route('admin.service.delete', $item->id)); ?>"
                                                class="btn btn-danger">Xóa</a>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script>
        $(document).ready(function() {
            $('#server_type').change(function() {
                var server_type = $(this).val();
                if (server_type == 'select') {
                    $('#show_service').html('');
                }
                if (server_type == 'subgiare') {
                    $('#show_service').html(`
                       
                    <div class="form-group">
                                        <label class="form-label" for="type_service">Loại dịch vụ</label>
                                        <div class="form-control-wrap">
                                            <select name="type_service" id="type_service" class="form-select js-select2">
                                                <option value="tym-tiktok">Like thả tim</option>
                                                <option value="comment-tiktok">Tăng bình luận</option>
                                                <option value="share-tiktok">Tăng Chia sẻ</option>
                                                <option value="sub-tiktok">Tăng sub/follow</option>
                                                <option value="view-tiktok">Tăng view video</option>
                                            </select>
                                        </div>
                                    </div>
                    `);
                } else if (server_type == 'baostar') {
                    $('#show_service').html(`
                        
                    <div class="form-group">
                                        <label for="type_service" class="form-label">Loại dịch vụ</label>
                                        <div class="form-control-wrap">
                                            <select name="type_service" id="type_service" class="form-select js-select2">
                                                <option value="like-tiktok">Like tiktok</option>
                                                <option value="follow-tiktok">Follow tiktok</option>
                                                <option value="view-instagram">View tiktok</option>
                                                <option value="comemnt-tiktok">comment tiktok</option>
                                                <option value="share-tiktok">Share tiktok</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="name_sv" class="form-label">Package name</label>
                                        <input type="text" name="name_sv" id="name_sv" class="form-control" placeholder="Nhập package_name VS(like_v2)">
                                    </div>
                    `);
                }
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp1\htdocs\Huycode\resources\views/admin/services/tiktok.blade.php ENDPATH**/ ?>