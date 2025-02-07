
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
                                <th>Username</th>
                                <th>Loại</th>
                                <th>Số lượng</th>
                                <th>Tổng tiền</th>
                                <th>Giá tiền sv</th>
                                <th>Link order</th>
                                <th>Máy chủ</th>
                                <th>Trạng thái</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $order; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                               <?php if($item->status == 'Pending'): ?>
                               <tr>
                                <td><?php echo e($item->username); ?></td>
                                <td><?php echo e($item->type); ?></td>
                                <td><?php echo e($item->amount); ?></td>
                                <td><?php echo e($item->total_money); ?></td>
                                <td><?php echo e($item->price); ?></td>
                                <td><?php echo e($item->link_order); ?></td>
                                <td><?php echo e($item->server_order); ?></td>
                                <td><?php if($item->status == 'Pending'): ?>
                                    <span class="badge bg-warning">Chờ duyệt</span>
                                     <?php elseif($item->status == 'Start'): ?>
                                     <span class="badge bg-success">Đang hoạt động</span>
                                     <?php elseif($item->status == 'Success'): ?>
                                     <span class="badge bg-success">Đã hoàn thành</span>
                                  <?php endif; ?>
                                 </td>
                               </tr>
                                <?php elseif($item->status == 'Start'): ?>
                                <tr>
                                    <td><?php echo e($item->username); ?></td>
                                    <td><?php echo e($item->type); ?></td>
                                    <td><?php echo e($item->amount); ?></td>
                                    <td><?php echo e($item->total_money); ?></td>
                                    <td><?php echo e($item->price); ?></td>
                                    <td><?php echo e($item->link_order); ?></td>
                                    <td><?php echo e($item->server_order); ?></td>
                                    <td><?php if($item->status == 'Pending'): ?>
                                        <span class="badge bg-warning">Chờ duyệt</span>
                                         <?php elseif($item->status == 'Start'): ?>
                                         <span class="badge bg-success">Đang hoạt động</span>
                                         <?php elseif($item->status == 'Success'): ?>
                                         <span class="badge bg-success">Đã hoàn thành</span>
                                      <?php endif; ?>
                                     </td>
                                </tr>
                                <?php elseif($item->status == 'Success'): ?>
                                <tr>
                                    <td><?php echo e($item->username); ?></td>
                                    <td><?php echo e($item->type); ?></td>
                                    <td><?php echo e($item->amount); ?></td>
                                    <td><?php echo e($item->total_money); ?></td>
                                    <td><?php echo e($item->price); ?></td>
                                    <td><?php echo e($item->link_order); ?></td>
                                    <td><?php echo e($item->server_order); ?></td>
                                    <td><?php if($item->status == 'Pending'): ?>
                                        <span class="badge bg-warning">Chờ duyệt</span>
                                         <?php elseif($item->status == 'Start'): ?>
                                         <span class="badge bg-success">Đang hoạt động</span>
                                         <?php elseif($item->status == 'Success'): ?>
                                         <span class="badge bg-success">Đã hoàn thành</span>
                                      <?php endif; ?>
                                     </td>
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
<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp1\htdocs\Huycode\resources\views/admin/pages/clientOrders.blade.php ENDPATH**/ ?>