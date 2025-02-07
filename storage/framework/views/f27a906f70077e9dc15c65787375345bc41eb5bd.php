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
                                                <th class="wd-20p border-bottom-0">Đã mua</th>
                                                <th class="wd-15p border-bottom-0">Giá</th>
                                                <th class="wd-25p border-bottom-0">Hành động</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           <?php $__currentLoopData = $acc; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                               <?php if($item->type == 'clone'): ?>
                                                   <tr>
                                                        <td><?php echo e($item->content); ?></td>
                                                        <td><span class="badge bg-danger"><?php echo e(number_format($cloneSell->count())); ?></span></td>
                                                        <td><?php echo e($item->price); ?></td>
                                                        <td>
                                                           
                                                    <a class="modal-effect btn btn-primary" data-bs-effect="effect-scale" data-bs-toggle="modal" href="#modaldemo<?php echo e($item->id); ?>">Xem tài khoản</a>
                                                    <div class="modal fade"  id="modaldemo<?php echo e($item->id); ?>">
                                                        <div class="modal-dialog modal-dialog-centered text-center" role="document">
                                                            <div class="modal-content modal-content-demo">
                                                                <div class="modal-header">
                                                                    <h6 class="modal-title">Danh sách</h6><button aria-label="Close" class="btn-close" data-bs-dismiss="modal" ><span aria-hidden="true">&times;</span></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form action="">
                                                                        <div class="form-group">
                                                                            <textarea name="" class="form-control" id="" cols="30" rows="10">
                                                                                <?php $__currentLoopData = $cloneSell; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                <?php echo e($item->acc); ?>

                                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                            </textarea>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button class="btn btn-light" data-bs-dismiss="modal" >Close</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                        </td>
                                                   </tr>
                                               <?php endif; ?> 
                                               <?php if($item->type == 'via'): ?>
                                               <tr>
                                                    <td><?php echo e($item->content); ?></td>
                                                    <td> <span class="badge bg-danger"> <?php echo e(number_format($viaSell->count())); ?></span></td>
                                                    <td><?php echo e($item->price); ?></td>
                                                    <td>
                                                       
                                                    <a class="modal-effect btn btn-primary" data-bs-effect="effect-scale" data-bs-toggle="modal" href="#modaldemo<?php echo e($item->id); ?>">Xem tài khoản</a>
                                                    <div class="modal fade"  id="modaldemo<?php echo e($item->id); ?>">
                                                        <div class="modal-dialog modal-dialog-centered text-center" role="document">
                                                            <div class="modal-content modal-content-demo">
                                                                <div class="modal-header">
                                                                    <h6 class="modal-title">Danh sách</h6><button aria-label="Close" class="btn-close" data-bs-dismiss="modal" ><span aria-hidden="true">&times;</span></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form action="">
                                                                        <div class="form-group">
                                                                            <textarea name="" class="form-control" id="" cols="30" rows="10">
                                                                                <?php $__currentLoopData = $viaSell; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                    <?php echo e($item->acc); ?>

                                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                            </textarea>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button class="btn btn-light" data-bs-dismiss="modal" >Close</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    </td>
                                               </tr>
                                           <?php endif; ?>
                                           <?php if($item->type == 'tds'): ?>
                                           <tr>
                                                <td><?php echo e($item->content); ?></td>
                                                <td><span class="badge bg-danger"><?php echo e(number_format($tdsSell->count())); ?></span></td>
                                                <td><?php echo e($item->price); ?></td>
                                                <td>
                                                    <a class="modal-effect btn btn-primary" data-bs-effect="effect-scale" data-bs-toggle="modal" href="#modaldemo<?php echo e($item->id); ?>">Xem tài khoản</a>
                                                    <div class="modal fade"  id="modaldemo<?php echo e($item->id); ?>">
                                                        <div class="modal-dialog modal-dialog-centered text-center" role="document">
                                                            <div class="modal-content modal-content-demo">
                                                                <div class="modal-header">
                                                                    <h6 class="modal-title">Danh sách</h6><button aria-label="Close" class="btn-close" data-bs-dismiss="modal" ><span aria-hidden="true">&times;</span></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form action="">
                                                                        <div class="form-group">
                                                                            <textarea name="" class="form-control" id="" cols="30" rows="10">
                                                                                <?php $__currentLoopData = $tdsSell; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                <?php echo e($item->acc); ?>

                                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                            </textarea>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                                <div class="modal-footer">
                                                                     <button class="btn btn-light" data-bs-dismiss="modal" >Close</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp1\htdocs\Huycode\resources\views/service/accounts/hisAccount.blade.php ENDPATH**/ ?>