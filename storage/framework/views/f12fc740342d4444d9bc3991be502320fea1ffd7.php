
<?php $__env->startSection('content'); ?>
    <div class="row g-gs">
        <div class="col-xl-12">
            <div class="nk-block nk-block-lg">
                <div class="nk-block-head">
                    <div class="nk-block-head-content">
                        <h4 class="nk-block-title">Quản lí IP</h4>
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
                        <div class="card-body">
                            <form action="<?php echo e(route('admin.block-ip.post')); ?>" ajax-request="huycoder" method="POST">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="ip" class="form-label">IP Cần block</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" id="ip" name="blockIp" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="reason" class="form-label">Lí do</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" id="reason" name="reason" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block">Khóa ip</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="nk-block nk-block-lg">
                <div class="nk-block-head">
                    <div class="nk-block-head-content">
                        <h4 class="nk-block-title">Danh sách bị chặn</h4>
                        <div class="nk-block-des">
                        </div>
                    </div>
                </div>
                <div class="card card-bordered card-preview">
                    <div class="card-inner">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>IP</th>
                                            <th>Lí do</th>
                                            <th>Ngày ban</th>
                                            <th>Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $ip; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($item->id); ?></td>
                                                <td><?php echo e($item->ip); ?></td>
                                                <td><?php echo e($item->reason); ?></td>
                                                <td><?php echo e($item->updated_at); ?></td>
                                                <td>
                                                    <a href="<?php echo e(route('admin.block-ip.delete', $item->id)); ?>"
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
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp1\htdocs\Huycode\Huycode\resources\views/admin/pages/blockIp.blade.php ENDPATH**/ ?>