
<?php $__env->startSection('content'); ?>
    <div class="row g-gs">
        <div class="col-xl-12">
            <div class="nk-block nk-block-lg">
                <div class="nk-block-head">
                    <div class="nk-block-head-content">
                        <h4 class="nk-block-title">Quản lí người dùng</h4>
                        <div class="nk-block-des">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="card">
                <div class="card-inner">
                    <h4>Nội dung chuyển khoản</h4>
                    <?php $site_config = app('App\Models\site_config'); ?>
                </div>
                <div class="card-body">
                    <form action="<?php echo e(route('admin.transfer_code')); ?>" ajax-request="huycoder" method="POST">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="transfer_code" class="form-label">Nội dung</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" name="transfer_code" id="transfer_code" class="form-control"
                                        value="<?php echo e($site_config->getValueByName('transfer_Code')); ?>">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">Lưu ngay</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-xl-12">
            <div class="card">
                <div class="card-inner">
                    <h4>Thêm tài khoản ngân hàng</h4>
                </div>
                <div class="card-body">
                    <form action="<?php echo e(route('admin.recharge.post')); ?>" ajax-request="huycoder" method="POST">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="type_bank" class="form-label">Loại api bên</label>
                                </div>
                                <div class="col-md-9">
                                    <select name="type_bank" id="type_bank" class="form-control">
                                        <option value="">Chọn loại api</option>
                                        
                                        <option value="apigiare">apigiare.com</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="bank_name" class="form-label">Loại ngân hàng</label>
                                </div>
                                <div class="col-md-9">
                                    <select name="bank_name" id="bank_name" class="form-control">
                                        <option value="">Loại ngân hàng</option>
                                        <option value="momo">Momo</option>
                                        <option value="mbbank">Mbbank</option>
                                        <option value="vietcombank">Vietcombank</option>
                                        <option value="thesieure">Thesieure</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="logo_bank" class="form-label">Link logo</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" name="logo_bank" id="logo_bank" class="form-control"
                                        placeholder="Nhập link logo ngân hàng">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="account_name" class="form-label">Tên tài khoản</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" name="account_name" id="account_name" class="form-control"
                                        placeholder="Nhập tên tài khoản">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="account_number" class="form-label">Số tài khoản</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" name="account_number" id="account_number" class="form-control"
                                        placeholder="Nhập tên tài khoản">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="password" class="form-label">Mật khẩu (nếu sử dụng bank khác trừ
                                        momo)</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="password" name="password" id="password" class="form-control"
                                        placeholder="Nhập mật khẩu">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="token" class="form-label">Token</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" name="token" id="token" class="form-control"
                                        placeholder="Nhập token được lấy bên web bạn chọn">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="min_bank" class="form-label">Min bank</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" name="min_bank" id="min_bank" class="form-control"
                                        placeholder="Nhập tên tài khoản">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="notice" class="form-label">Thông báo</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" name="notice" id="notice" class="form-control"
                                        placeholder="Nhập thông báo ngắn">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block btn-lg">Thêm ngân hàng</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-xl-12">
            <div class="card card-bordered card-preview">
                <?php if(session('success')): ?>
                    <div class="alert alert-success">
                        <?php echo e(session('success')); ?>

                    </div>
                <?php elseif(session('error')): ?>
                    <div class="alert alert-danger">
                        <?php echo e(session('error')); ?>

                    </div>
                <?php endif; ?>
                <div class="card-inner">
                    <table class="datatable-init table">
                        <thead>
                            <tr>
                                <th>Loại ngân hàng</th>
                                <th>Tên tài khoản</th>
                                <th>Số tài khoản</th>
                                <th>logo</th>
                                <th>Min bank</th>
                                <th>Thông báo</th>
                                <th>token</th>
                                <th>Ngày tạo</th>
                                <th>Chức năng</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $account; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($item->bank_name); ?></td>
                                    <td><?php echo e($item->account_name); ?></td>
                                    <td><?php echo e($item->account_number); ?></td>
                                    <td><img src="<?php echo e($item->logo); ?>" alt="Logo"></td>
                                    <td><?php echo e($item->min_bank); ?></td>
                                    <td>
                                        <textarea name="form-control" cols="10" rows="3" disabled><?php echo e($item->notice); ?></textarea>
                                    </td>
                                    <td><?php echo e($item->token); ?></td>
                                    <td><?php echo e($item->created_at); ?></td>
                                    <td>
                                        <a href="<?php echo e(route('admin.recharge.edit', $item->id)); ?>"
                                            class="btn btn-primary">Sửa</a>
                                        <a href="<?php echo e(route('admin.recharge.delete', $item->id)); ?>"
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
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script>
        $(document).ready(function() {

        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp1\htdocs\Huycode\Huycode\resources\views/admin/pages/recharge.blade.php ENDPATH**/ ?>