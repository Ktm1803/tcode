
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
                <div class="card card-bordered card-preview">
                    <div class="card-inner">
                        <form action="<?php echo e(route('admin.clients.edit.post', $user->id)); ?>" ajax-request="huycoder"
                            method="POST">
                            <input type="text" value="<?php echo e($user->id); ?>" name="id" hidden>
                            <div class="row">
                                <div class="col-xl-6">
                                    <div class="form-group">
                                        <label for="">Tên</label>
                                        <input type="text" class="form-control" value="<?php echo e($user->name); ?>" disabled>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="form-group">
                                        <label for="">Email</label>
                                        <input type="text" class="form-control" value="<?php echo e($user->email); ?>" disabled>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="form-group">
                                        <label for="">Số tiền</label>
                                        <input type="text" class="form-control" value="<?php echo e(number_format($user->money)); ?>"
                                            disabled>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="form-group">
                                        <label for="">Cấp độ</label>
                                        <input type="text" class="form-control" value="<?php echo e($user->level); ?>" disabled>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="form-group">
                                        <label class="form-label">Cộng tiền / trừ tiền</label>
                                        <div class="form-control-wrap">
                                            <select class="form-select js-select2" name="type">
                                                <option value="congtien" selected>Cộng tiền</option>
                                                <option value="trutien">Trừ tiền</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="form-group">
                                        <label class="form-label">Trạng thái</label>
                                        <div class="form-control-wrap">
                                            <select class="form-select js-select2" name="banned">
                                                <?php if($user->banned == 0): ?>
                                                    <option value="0">Mở khóa</option>
                                                    <option value="1">Khóa tài khoản</option>
                                                <?php else: ?>
                                                    <option value="1">Khóa tài khoản</option>
                                                    <option value="0">Mở khóa</option>
                                                <?php endif; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="form-group">
                                        <label for="" class="form-label">Nhập số tiền</label>
                                        <input type="text" class="form-control" name="money" value="0">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mt-2">
                                <button type="submit" class="btn btn-primary btn-block">Cập nhật</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp1\htdocs\Huycode\resources\views/admin/pages/editUser.blade.php ENDPATH**/ ?>