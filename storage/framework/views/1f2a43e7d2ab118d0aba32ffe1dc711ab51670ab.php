<?php $site_config = app('App\Models\site_config'); ?>

<?php $__env->startSection('content'); ?>
    <div class="row g-gs">
        <div class="col-xl-12">
            <div class="nk-block nk-block-lg">
                <div class="nk-block-head">
                    <div class="nk-block-head-content">
                        <h4 class="nk-block-title"><?php echo e(__($title)); ?></h4>
                        <div class="nk-block-des">
                        </div>
                    </div>
                </div>
                <div class="card card-bordered card-preview">
                    <div class="card-inner">
                        <form action="<?php echo e(route('admin.configWebsite.post')); ?>" ajax-request="huycoder" method="POST">
                            <div class="form-group">
                                <label for="cf<?php echo e($site_config->getValueByName('domain')); ?>" class="form-label">Tên
                                    miền</label>
                                <input type="text" name="domain" id="cf<?php echo e($site_config->getValueByName('domain')); ?>"
                                    value="<?php echo e($site_config->getValueByName('domain')); ?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="cf<?php echo e($site_config->getValueByName('logo')); ?>" class="form-label">Logo
                                    web</label>
                                <input type="text" name="logoWeb" id="cf<?php echo e($site_config->getValueByName('logo')); ?>"
                                    value="<?php echo e($site_config->getValueByName('logo')); ?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="cffavicon" class="form-label">Favicon web</label>
                                <input type="text" name="favicon" id="cffavicon"
                                    value="<?php echo e($site_config->getValueByName('favicon')); ?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="cf<?php echo e($site_config->getValueByName('api_tele')); ?>" class="form-label">api
                                    tele</label>
                                <input type="text" name="api_tele" id="cf<?php echo e($site_config->getValueByName('api_tele')); ?>"
                                    value="<?php echo e($site_config->getValueByName('api_tele')); ?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="cf<?php echo e($site_config->getValueByName('id_chat_tele')); ?>" class="form-label">ID
                                    chat tele</label>
                                <input type="text" name="id_chat"
                                    id="cf<?php echo e($site_config->getValueByName('id_chat_tele')); ?>"
                                    value="<?php echo e($site_config->getValueByName('id_chat_tele')); ?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="cf<?php echo e($site_config->getValueByName('charge_level_CTV')); ?>"
                                    class="form-label">Mức nạp Cộng tác viên</label>
                                <input type="text" name="mucnapCTV"
                                    id="cf<?php echo e($site_config->getValueByName('charge_level_CTV')); ?>"
                                    value="<?php echo e($site_config->getValueByName('charge_level_CTV')); ?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="cf<?php echo e($site_config->getValueByName('charge_level_DL')); ?>" class="form-label">Mức
                                    nạp Đại lí</label>
                                <input type="text" name="mucnapDL"
                                    id="cf<?php echo e($site_config->getValueByName('charge_level_DL')); ?>"
                                    value="<?php echo e($site_config->getValueByName('charge_level_DL')); ?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="cf<?php echo e($site_config->getValueByName('charge_level_NPP')); ?>"
                                    class="form-label">Mức nạp Nhà phân phối</label>
                                <input type="text" name="mucnapNPP"
                                    id="cf<?php echo e($site_config->getValueByName('charge_level_NPP')); ?>"
                                    value="<?php echo e($site_config->getValueByName('charge_level_NPP')); ?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="cf<?php echo e($site_config->getValueByName('discount_TV')); ?>" class="form-label">Giảm
                                    giá thành viên</label>
                                <input type="text" name="discount_TV"
                                    id="cf<?php echo e($site_config->getValueByName('discount_TV')); ?>"
                                    value="<?php echo e($site_config->getValueByName('discount_TV')); ?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="cf<?php echo e($site_config->getValueByName('discount_CTV')); ?>" class="form-label">Giảm
                                    giá Cộng tác viên</label>
                                <input type="text" name="discount_CTV"
                                    id="cf<?php echo e($site_config->getValueByName('discount_CTV')); ?>"
                                    value="<?php echo e($site_config->getValueByName('discount_CTV')); ?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="cf<?php echo e($site_config->getValueByName('discount_DL')); ?>" class="form-label">Giảm
                                    giá Đại lí</label>
                                <input type="text" name="discount_DL"
                                    id="cf<?php echo e($site_config->getValueByName('discount_DL')); ?>"
                                    value="<?php echo e($site_config->getValueByName('discount_DL')); ?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="cf<?php echo e($site_config->getValueByName('discount_NPP')); ?>" class="form-label">Giảm
                                    giá Nhà phân phối</label>
                                <input type="text" name="discount_NPP"
                                    id="cf<?php echo e($site_config->getValueByName('discount_NPP')); ?>"
                                    value="<?php echo e($site_config->getValueByName('discount_NPP')); ?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="cf<?php echo e($site_config->getValueByName('card_discount')); ?>"
                                    class="form-label">Chiết khấu giá thẻ cào</label>
                                <input type="text" name="card_discount"
                                    id="cf<?php echo e($site_config->getValueByName('card_discount')); ?>"
                                    value="<?php echo e($site_config->getValueByName('card_discount')); ?>" class="form-control">
                            </div>
                            <div class="form-group mt-2">
                                <button type="submit" class="btn btn-primary btn-block">Lưu ngay</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp1\htdocs\Huycode\resources\views/admin/pages/configWeb.blade.php ENDPATH**/ ?>