
<?php $__env->startSection('content'); ?>
<div class="row g-gs">
    <div class="col-xl-12">
        <div class="nk-block nk-block-lg">
            <div class="nk-block-head">
                <div class="nk-block-head-content">
                    <h4 class="nk-block-title">Quản lí nạp tiền</h4>
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
                    <h4>Nạp ATm</h4>
                    <table class="datatable-init table">
                        <thead>
                            <tr>
                                <th>Username</th>
                                <th>Loại ngân hàng</th>
                                <th>Người chuyển</th>
                                <th>Số tiền</th>
                                <th>Trạng thái</th>
                                <th>Mã gd</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $bank; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($item->type == 'bank'): ?>
                                    <tr>
                                        <td><?php echo e($item->username); ?></td>
                                        <td><?php echo e($item->bank_name); ?></td>
                                        <td><?php echo e($item->name); ?></td>
                                        <td><?php echo e($item->thucnhan); ?></td>
                                        <td><?php if($item->status == 2): ?>
                                            <span class="badge badge-success">Thành công</span>
                                            <?php else: ?>
                                            <span class="badge badge-danger">Thất bại</span>
                                            <?php endif; ?></td>
                                            <td><?php echo e($item->transid); ?></td>
                                    </tr>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
                <div class="card-inner">
                    <h4>Nạp Card</h4>
                    <table class="datatable-init table">
                        <thead>
                            <tr>
                                <th>Username</th>
                                <th>Loại thẻ</th>
                                <th>Mệnh giá</th>
                                <th>Serial</th>
                                <th>Code</th>
                                <th>Nhận</th>
                                <th>Trạng thái</th>
                                <th>Mã gd</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $bank; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($item->type == 'card'): ?>
                                <tr>
                                    <td><?php echo e($item->username); ?></td>
                                    <td><?php echo e($item->card_type); ?></td>
                                    <td><?php echo e($item->card_price); ?></td>
                                    <td><?php echo e($item->serial); ?></td>
                                    <td><?php echo e($item->code); ?></td>
                                    <td><?php echo e($item->thucnhan); ?></td>
                                    <td><?php if($item->status == 2): ?>
                                        <span class="badge badge-success">Thành công</span>
                                        <?php elseif($item->status == 0): ?>
                                        <span class="badge badge-warning">Chờ xử lý</span>
                                        <?php else: ?>
                                        <span class="badge badge-danger">Thất bại</span>
                                        <?php endif; ?></td>
                                        <td><?php echo e($item->transid); ?></td>
                                </tr>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp1\htdocs\Huycode\resources\views/admin/pages/managerBank.blade.php ENDPATH**/ ?>