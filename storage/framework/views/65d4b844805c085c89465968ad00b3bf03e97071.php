</div>
</div>
</div>
</div>
</div>
<?php $site_config = app('App\Models\site_config'); ?>
<div class="nk-footer">
    <div class="container-fluid">
        <div class="nk-footer-wrap">
            <div class="nk-footer-copyright"> &copy; 2022 <?php echo e($site_config->getValueByName('domain')); ?>. Website được
                vận hành bởi <a href="https://fb.com/lqh.coder"
                    target="_blank"><?php echo e($site_config->getValueByName('admin_name')); ?></a>
            </div>
        </div>
    </div>
</div>

</div>

</div>
</div>

<script src="<?php echo e(asset('')); ?>assets/js/bundle5b75.js?ver=3.0.2"></script>
<script src="<?php echo e(asset('')); ?>assets/js/scripts5b75.js?ver=3.0.2"></script>
<script src="<?php echo e(asset('')); ?>assets/js/demo-settings5b75.js?ver=3.0.2"></script>
<script src="<?php echo e(asset('')); ?>assets/js/charts/chart-ecommerce5b75.js?ver=3.0.2"></script>
<script src="<?php echo e(asset('')); ?>assets/js/libs/datatable-btns5b75.js?ver=3.0.2"></script>
<script src="<?php echo e(asset('huycode/js/ajax-huycode.js?')); ?><?php echo e(time()); ?>"></script>

<?php echo $__env->yieldContent('script'); ?>

</body>

</html>
<?php /**PATH C:\xampp1\htdocs\Huycode\resources\views/admin/layouts/footer.blade.php ENDPATH**/ ?>