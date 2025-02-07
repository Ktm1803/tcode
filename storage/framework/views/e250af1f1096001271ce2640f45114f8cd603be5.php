
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
            </div>
        </div>
        <div class="col-xl-12">
            <div class="card">
                <div class="card-inner">
                    <h4>Sử dụng web gạch thẻ</h4>
                </div>
                <div class="card-body">
                    <form action="" ajax-request="huycoder" method="POST">
                        <div class="form-group">
                            <label for="nameWeb">Web nạp thẻ</label>
                            <select name="nameWeb" id="nameWeb" class="form-control">
                                <?php if($cardType == 'ttvpay'): ?>
                                    <option value="ttvpay" selected>Ttvpay.vn</option>
                                    <option value="thesieure">Thesieure.com</option>
                                <?php elseif($cardType == 'thesieure'): ?>
                                    <option value="ttvpay">Ttvpay.vn</option>
                                    <option value="thesieure" selected>Thesieure.com</option>
                                <?php endif; ?>
                            </select>
                        </div>
                        <div id="showInput"></div>
                        <div class="form-group mt-1">
                            <button type="submit" class="btn btn-primary btn-block">Lưu ngay</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script>
        $(document).ready(function() {
            $('#nameWeb').change(function() {
                var nameWeb = $(this).val();
                if (nameWeb == 'ttvpay') {
                    $('#showInput').html('<div class="form-group">\n' +
                        '                            <label for="apiKey">Api key</label>\n' +
                        '                            <input type="text" name="apiKey" id="apiKey" class="form-control" placerholder="Nhập apikey callack của bạn">\n' +
                        '                        </div>');
                } else if (nameWeb == 'thesieure') {
                    $('#showInput').html('<div class="form-group">\n' +
                        '                            <label for="parther_id">Parther_id</label>\n' +
                        '                            <input type="text" name="parther_id" id="parther_id" class="form-control" placerholder="Nhập parther_id của link callback">\n' +
                        '                        </div> <div class="form-group">\n' +
                        '                            <label for="parther_key">Parther_key</label>\n' +
                        '                            <input type="text" name="parther_key" id="parther_key" class="form-control" placerholder="Nhập parther_key của link callback">\n' +
                        '                        </div>');
                }
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp1\htdocs\Huycode\resources\views/admin/pages/rechargeCard.blade.php ENDPATH**/ ?>