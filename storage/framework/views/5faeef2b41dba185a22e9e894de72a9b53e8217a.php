
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
                                <th>Tên</th>
                                <th>Username</th>
                                <th>Cấp bậc</th>
                                <th>Số tiền</th>
                                <th>Tổng nạp</th>
                                <th>Tổng mua</th>
                                <th>Ip</th>
                                <th>Ngày tạo</th>
                                <th>Chức năng</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($item->name); ?></td>
                                    <td><?php echo e($item->username); ?></td>
                                    <td>
                                        <?php if($item->level == 'member'): ?>
                                            <span class="badge bg-success">Thành viên</span>
                                        <?php elseif($item->level == 'ctv'): ?>
                                            <span class="badge bg-warning">Cộng tác viên</span>
                                        <?php elseif($item->level == 'dl'): ?>
                                            <span class="badge badge-danger">Đại lý</span>
                                        <?php elseif($item->level == 'npp'): ?>
                                            <span class="badge bg-info">Nhà phân phối</span>
                                        <?php elseif($item->level == 'admin'): ?>
                                            <span class="badge bg-primary">Admin</span>
                                        <?php endif; ?>
                                    </td>
                                    <td><?php echo e(number_format($item->money)); ?></td>
                                    <td><?php echo e(number_format($item->total_charge)); ?></td>
                                    <td><?php echo e(number_format($item->total_minus)); ?></td>
                                    <td><?php echo e($item->ip); ?></td>
                                    <td><?php echo e($item->created_at); ?></td>
                                    <td>
                                        <a href="<?php echo e(route('admin.clients.edit', $item->id)); ?>" class="btn btn-primary">Sửa</a>
                                        <a href="<?php echo e(route('admin.clients.delete', $item->id)); ?>" class="btn btn-danger">Xóa</a>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp1\htdocs\Huycode\resources\views/admin/pages/manageUser.blade.php ENDPATH**/ ?>