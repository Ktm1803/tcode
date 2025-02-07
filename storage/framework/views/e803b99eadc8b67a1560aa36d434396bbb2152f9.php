
<?php $__env->startSection('content'); ?>
    <div class="row g-gs">
        <div class="col-xxl-3 col-sm-4">
            <div class="card">
                <div class="nk-ecwg nk-ecwg6">
                    <div class="card-inner">
                        <div class="card-title-group">
                            <div class="card-title">
                                <h6 class="title">Tổng đơn hàng hôm nay</h6>
                            </div>
                        </div>
                        <div class="data">
                            <div class="data-group">
                                <div class="amount"><?php echo e($orders); ?></div>
                                <div class="nk-ecwg6-ck"><canvas class="ecommerce-line-chart-s3"
                                        id="todayOrders"></canvas></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xxl-3 col-sm-4">
            <div class="card">
                <div class="nk-ecwg nk-ecwg6">
                    <div class="card-inner">
                        <div class="card-title-group">
                            <div class="card-title">
                                <h6 class="title">Tổng thành viên</h6>
                            </div>
                        </div>
                        <div class="data">
                            <div class="data-group">
                                <div class="amount"><?php echo e($users); ?></div>
                                <div class="nk-ecwg6-ck"><canvas class="ecommerce-line-chart-s3"
                                        id="todayRevenue"></canvas></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xxl-3 col-sm-4">
            <div class="card">
                <div class="nk-ecwg nk-ecwg6">
                    <div class="card-inner">
                        <div class="card-title-group">
                            <div class="card-title">
                                <h6 class="title">Tổng đơn đang chạy</h6>
                            </div>
                        </div>
                        <div class="data">
                            <div class="data-group">
                                <div class="amount"><?php echo e($orders_run); ?></div>
                                <div class="nk-ecwg6-ck"><canvas class="ecommerce-line-chart-s3"
                                        id="todayCustomers"></canvas></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xxl-3 col-sm-4">
            <div class="card">
                <div class="nk-ecwg nk-ecwg6">
                    <div class="card-inner">
                        <div class="card-title-group">
                            <div class="card-title">
                                <h6 class="title">Tổng đơn hoàn thành</h6>
                            </div>
                        </div>
                        <div class="data">
                            <div class="data-group">
                                <div class="amount"><?php echo e($orders_success); ?></div>
                                <div class="nk-ecwg6-ck"><canvas class="ecommerce-line-chart-s3"
                                        id="todayVisitors"></canvas></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xxl-3 col-sm-4">
            <div class="card">
                <div class="nk-ecwg nk-ecwg6">
                    <div class="card-inner">
                        <div class="card-title-group">
                            <div class="card-title">
                                <h6 class="title">Tổng nạp hôm nay</h6>
                            </div>
                        </div>
                        <div class="data">
                            <div class="data-group">
                                <div class="amount"><?php echo e(number_format($total_recharge)); ?></div>
                                <div class="nk-ecwg6-ck"><canvas class="ecommerce-line-chart-s3"
                                        id="todayVisitors"></canvas></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xxl-3 col-sm-4">
            <div class="card">
                <div class="nk-ecwg nk-ecwg6">
                    <div class="card-inner">
                        <div class="card-title-group">
                            <div class="card-title">
                                <h6 class="title">Thành viên hôm nay</h6>
                            </div>
                        </div>
                        <div class="data">
                            <div class="data-group">
                                <div class="amount"><?php echo e($users_today); ?></div>
                                <div class="nk-ecwg6-ck"><canvas class="ecommerce-line-chart-s3"
                                        id="todayVisitors"></canvas></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp1\htdocs\Huycode\resources\views/admin/home.blade.php ENDPATH**/ ?>