
<?php $__env->startSection('content'); ?>
    <div class="row g-gs">
        <div class="col-xl-12">
            <div class="nk-block nk-block-lg">
                <div class="nk-block-head">
                    <div class="nk-block-head-content">
                        <h4 class="nk-block-title">Quản lí <?php echo e($title); ?></h4>
                        <div class="nk-block-des">
                        </div>
                    </div>
                </div>
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
                        <form action="<?php echo e(route('admin.service.update', 'facebook')); ?>" ajax-request="huycoder"
                            method="POST">
                            <div class="row">
                                <div class="col-xl-6">
                                    <div class="form-group">
                                        <label class="form-label" for="sgr">Dịch vụ api (subgiare)</label>
                                        <div class="form-control-wrap">
                                            <select name="subgiare" id="sgr" class="form-select js-select2">
                                                <?php if($sgr->value == 'show'): ?>
                                                    <option value="show" selected>Đã bật</option>
                                                    <option value="hide">Tắt</option>
                                                <?php elseif($sgr->value == 'hide'): ?>
                                                    <option value="hide" selected>Đã Tắt</option>
                                                    <option value="show">Bật</option>
                                                <?php endif; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="form-group">
                                        <label class="form-label" for="bs">Dịch vụ api (baostart)</label>
                                        <div class="form-control-wrap">
                                            <select name="baostar" id="bs" class="form-select js-select2">
                                                <?php if($baostart->value == 'show'): ?>
                                                    <option value="show" selected>Đã bật</option>
                                                    <option value="hide">Tắt</option>
                                                <?php elseif($baostart->value == 'hide'): ?>
                                                    <option value="hide" selected>Đã Tắt</option>
                                                    <option value="show">Bật</option>
                                                <?php endif; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mt-2">
                                    <button type="submit" class="btn btn-info btn-block">Thay đổi</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp1\htdocs\Huycode\resources\views/admin/services/autoService.blade.php ENDPATH**/ ?>