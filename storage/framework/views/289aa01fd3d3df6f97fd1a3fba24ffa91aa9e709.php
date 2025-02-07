<?php $site_config = app('App\Models\site_config'); ?>

<?php $__env->startSection('content'); ?>
    <!--app-content open-->
    <div class="app-content main-content mt-0">
        <div class="side-app">

            <!-- CONTAINER -->
            <div class="main-container container-fluid">
                <!-- PAGE-HEADER -->
                <div class="page-header">
                    <div>
                        <h1 class="page-title">Trang chủ</h1>
                    </div>
                    <div class="ms-auto pageheader-btn">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Account</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Buy</li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12 col-md-12 col-lg-12">
                        <div class="card">
                            <div class="card-header border-bottom">
                                <h3 class="card-title">Danh sách tài khoản</h3>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered text-nowrap border-bottom w-100 text-center" id="responsive-datatable">
                                        <thead>
                                            <tr>
                                                <th class="wd-15p border-bottom-0">Sản phẩm</th>
                                                <th class="wd-15p border-bottom-0">Hiện còn</th>
                                                <th class="wd-20p border-bottom-0">Đã bán</th>
                                                <th class="wd-15p border-bottom-0">Giá</th>
                                                <th class="wd-20p border-bottom-0">Thông tin</th>
                                                <th class="wd-25p border-bottom-0">Hành động</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           <?php $__currentLoopData = $acc; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                               <?php if($item->type == 'clone'): ?>
                                                   <tr>
                                                        <td><?php echo e($item->content); ?></td>
                                                        <td><span class="badge bg-success"><?php echo e(number_format($clone->count())); ?></span></td>
                                                        <td><span class="badge bg-danger"><?php echo e(number_format($cloneSell->count())); ?></span></td>
                                                        <td><?php echo e($item->price); ?></td>
                                                        <td>
                                                            Còn sống : <span class="badge bg-success"><?php echo e(number_format($cloneLive->count())); ?></span>
                                                            <br>
                                                            Đã die : <span class="badge bg-danger"><?php echo e(number_format($cloneDie->count())); ?></span>
                                                        </td>
                                                        <td>
                                                            <?php if($clone->count() > 0): ?>
                                                                <a href="<?php echo e(route('service.account.buy', 'clone')); ?>" class="btn btn-primary">Mua</a>
                                                            <?php else: ?>
                                                                <a href="javascript:void(0);" class="btn btn-danger">Hết hàng</a>
                                                            <?php endif; ?>
                                                        </td>
                                                   </tr>
                                               <?php endif; ?> 
                                               <?php if($item->type == 'via'): ?>
                                               <tr>
                                                    <td><?php echo e($item->content); ?></td>
                                                    <td><span class="badge bg-success"><?php echo e(number_format($via->count())); ?></span></td>
                                                    <td> <span class="badge bg-danger"> <?php echo e(number_format($viaSell->count())); ?></span></td>
                                                    <td><?php echo e($item->price); ?></td>
                                                    <td>
                                                        Còn sống : <span class="badge bg-success"><?php echo e(number_format($viaLive->count())); ?></span>
                                                        <br>
                                                        Đã die : <span class="badge bg-danger"><?php echo e(number_format($viaDie->count())); ?></span>
                                                    </td>
                                                    <td>
                                                        <?php if($via->count() > 0): ?>
                                                            <a href="<?php echo e(route('service.account.buy', 'via')); ?>" class="btn btn-primary">Mua</a>
                                                        <?php else: ?>
                                                            <a href="javascript:void(0);" class="btn btn-danger">Hết hàng</a>
                                                        <?php endif; ?>
                                                    </td>
                                               </tr>
                                           <?php endif; ?>
                                           <?php if($item->type == 'tds'): ?>
                                           <tr>
                                                <td><?php echo e($item->content); ?></td>
                                                <td><span class="badge bg-success"><?php echo e(number_format($tds->count())); ?></span></td>
                                                <td><span class="badge bg-danger"><?php echo e(number_format($tdsSell->count())); ?></span></td>
                                                <td><?php echo e($item->price); ?></td>
                                                <td>
                                                            Còn sống : <span class="badge bg-success"><?php echo e(number_format($tdsLive->count())); ?></span>
                                                            <br>
                                                            Đã die : <span class="badge bg-danger"><?php echo e(number_format($tdsLive->count())); ?></span>
                                                        </td>
                                                <td>
                                                    <?php if($tds->count() > 0): ?>
                                                        <a class="modal-effect btn btn-primary d-grid mb-3" href="<?php echo e(route('service.account.buy', 'tds')); ?>">Mua ngay</a>
                                                    <?php else: ?>
                                                        <a href="javascript:void(0);" class="btn btn-danger">Hết hàng</a>
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
            </div>
        </div>
    </div>
    <!-- CONTAINER CLOSED -->
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(asset('')); ?>lbd/plugins/datatable/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo e(asset('')); ?>lbd/plugins/datatable/js/dataTables.bootstrap5.js"></script>
    <script src="<?php echo e(asset('')); ?>lbd/plugins/datatable/js/dataTables.buttons.min.js"></script>
    <script src="<?php echo e(asset('')); ?>lbd/plugins/datatable/js/buttons.bootstrap5.min.js"></script>
    <script src="<?php echo e(asset('')); ?>lbd/plugins/datatable/js/jszip.min.js"></script>
    <script src="<?php echo e(asset('')); ?>lbd/plugins/datatable/pdfmake/pdfmake.min.js"></script>
    <script src="<?php echo e(asset('')); ?>lbd/plugins/datatable/pdfmake/vfs_fonts.js"></script>
    <script src="<?php echo e(asset('')); ?>lbd/plugins/datatable/js/buttons.html5.min.js"></script>
    <script src="<?php echo e(asset('')); ?>lbd/plugins/datatable/js/buttons.print.min.js"></script>
    <script src="<?php echo e(asset('')); ?>lbd/plugins/datatable/js/buttons.colVis.min.js"></script>
    <script src="<?php echo e(asset('')); ?>lbd/plugins/datatable/dataTables.responsive.min.js"></script>
    <script src="<?php echo e(asset('')); ?>lbd/plugins/datatable/responsive.bootstrap5.min.js"></script>
    <script src="<?php echo e(asset('')); ?>lbd/js/table-data.js"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp1\htdocs\Huycode\resources\views/service/accounts/buyAccount.blade.php ENDPATH**/ ?>