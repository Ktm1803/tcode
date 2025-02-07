<?php $site_config = app('App\Models\site_config'); ?>

<?php $__env->startSection('title', 'Instagram V1'); ?>
<?php $__env->startSection('content'); ?>

    <div class="content">
        <div class="intro-y flex items-center mt-8">
            <h2 class="text-lg font-medium mr-auto">
                <?php echo e($title); ?>

            </h2>
        </div>
        <div class="grid grid-cols-12 gap-6 mt-5 pos">
            <div class="intro-y col-span-12 lg:col-span-8">
                <div class="intro-y">
                    <div class="box p-2">
                        <div class="pos__tabs nav nav-tabs justify-center" role="tablist">
                            <a id="create-tab" data-toggle="tab" data-target="#create" href="javascript:;"
                                class="flex-1 py-2 rounded-md text-center active" role="tab" aria-controls="create"
                                aria-selected="true">Mua dịch vụ</a>
                            <a id="orders-tab" data-toggle="tab" data-target="#orders" href="javascript:;"
                                class="flex-1 py-2 rounded-md text-center" role="tab" aria-controls="orders"
                                aria-selected="false">Dịch vụ đã mua</a>
                        </div>
                    </div>
                </div>
                <!-- BEGIN: Form Validation -->
                <div class="tab-content intro-y">
                    <div id="create" class="tab-pane box active mt-5" role="tabpanel" aria-labelledby="create-tab">
                        <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200 dark:border-dark-5">
                            <h2 class="font-medium text-base mr-auto">
                                Cài dịch vụ
                            </h2>
                        </div>
                        <div id="form-validation" class="p-5 pt-2">
                            <div class="preview">
                                <!-- BEGIN: Validation Form -->
                                <form class="validate-form" action="<?php echo e(route('api.service.instagram-v2', $type)); ?>"
                                    ajax-request="huycoder" method="POST">
                                    
                                    <?php if($type == 'like-post'): ?>
                                        <div class="input-form mt-3">
                                            <label for="validation-form-5"
                                                class="form-label w-full flex flex-col sm:flex-row"> Links bài viết <span
                                                    class="sm:ml-auto mt-1 sm:mt-0 text-xs text-gray-600">Vui lòng nhập
                                                    links bài viết</span>
                                            </label>
                                            <input type="url" name="idpost" id="idpost"
                                                class="form-control url_service"
                                                placeholder="https://www.instagram.com/lqh/CRxyqIojIpB/" required="">
                                        </div>
                                    <?php endif; ?>
                                    
                                    <?php if($type == 'follow'): ?>
                                        <div class="input-form mt-3">
                                            <label for="validation-form-5"
                                                class="form-label w-full flex flex-col sm:flex-row"> Links hoặc ID
                                                profile <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-gray-600">Vui lòng
                                                    nhập links hoặc ID trang cá nhân</span>
                                            </label>
                                            <input type="text" name="idpost" id="idpost"
                                                class="form-control fanpage_id" onchange="getIDPOST()"
                                                placeholder="https://www.instagram.com/lqh.03/" required="">
                                        </div>
                                    <?php endif; ?>
                                    
                                    <div class="input-form mt-3">
                                        <label for="validation-form-6" class="form-label w-full flex flex-col sm:flex-row">
                                            Chọn
                                            Server <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-gray-600">Vui lòng
                                                chọn
                                                server buff mà bạn mong muốn tăng</span>
                                        </label>
                                        <?php $__currentLoopData = $server; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="custom-control custom-radio custom-control-inline mt-3">
                                                <input type="radio" id="server<?php echo e($item->id); ?>" name="server_order"
                                                    onchange="bill()" price="<?php echo e($item->rate_server); ?>"
                                                    notice="<?php echo e($item->content_server); ?>" class="custom-control-input"
                                                    checked value="<?php echo e($item->server_service); ?>">

                                                <label class="custom-control-label" for="server<?php echo e($item->id); ?>">
                                                    <?php echo e($item->server_service); ?> - [ <?php echo e($item->title_server); ?> ]
                                                    <span
                                                        class="justify-center bg-theme-17 rounded-md text-white w-24 text-center px-2 py-1 mx-auto my-auto"
                                                        style="font-size:12px;"><?php echo e($item->rate_server); ?>

                                                        Coin</span>
                                                    <?php if($item->status_server == 'on'): ?>
                                                        <span class="badge"
                                                            style="color:rgb(53, 181, 36);font-weight:700">(
                                                            <?php echo e(__('Hoạt Động')); ?>

                                                            )</span>
                                                    <?php else: ?>
                                                        <span class="badge"
                                                            style="color:rgb(240, 56, 56);font-weight:700">(
                                                            <?php echo e(__('Bảo Trì')); ?> )</span>
                                                    <?php endif; ?>
                                                </label>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <div id="noticeServer"></div>
                                    </div>
                                    <?php if($type == 'like-post' || $type == 'follow'): ?>
                                        <div class="input-form mt-3">
                                            <label for="validation-form-4"
                                                class="form-label w-full flex flex-col sm:flex-row">
                                                Số lượng <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-gray-600">Vui
                                                    lòng
                                                    nhập số
                                                    lượng tối thiểu 1000</span>
                                            </label>
                                            <input type="number" name="amount" id="amount" class="form-control"
                                                placeholder="Vui lòng nhập số lượng" onkeyup="bill()" value="1000">
                                        </div>
                                    <?php endif; ?>

                                    

                                    <div class="input-form mt-3">
                                        <label for="validation-form-6" class="form-label w-full flex flex-col sm:flex-row">
                                            Ghi
                                            Chú <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-gray-600">Ghi chú nếu
                                                cần</span>
                                        </label>
                                        <textarea class="form-control" name="note" id="note" placeholder="Nhập ghi chú của bạn"></textarea>
                                    </div>

                                    <div class="input-form mt-3">
                                        <div class="btn btn-primary block p-4 mx-auto text-center" role="alert">
                                            <h4 style="font-size: 20px"> Tổng thanh
                                                toán : <span id="payment"></span>
                                                Coin</h4>
                                        </div>
                                    </div>

                                    <button type="submit" show="Bạn có chắc chắn muốn mua đơn hàng này?"
                                        class="btn btn-primary block w-40 mx-auto mt-5">
                                        Khởi Tạo
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div id="orders" class="tab-pane mt-5" role="tabpanel" aria-labelledby="orders-tab">
                        <div class="box p-5 mt-5">
                            <div class="overflow-x-auto bg-white rounded-lg shadow overflow-y-auto relative">
                                <div id="dataTable_wrapper" class="dataTables_wrapper no-footer">
                                    <table id="dataTable" style="font-size:14px" 
                                        class="border-collapse table-auto w-full whitespace-no-wrap bg-white table-striped relative dataTable no-footer"
                                        role="grid" aria-describedby="dataTable_info">
                                        <thead>
                                            <tr class="text-left" role="row">
                                                <th class="py-2 px-3 sticky top-0 border-b border-gray-200 bg-gray-100 sorting"
                                                    tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1"
                                                    aria-label="
                                            
                                                #ID
                                            
                                        : activate to sort column ascending"
                                                    style="width: 37.5312px;">
                                                    <label
                                                        class="text-teal-500 inline-flex hover:bg-gray-200 px-2 py-2 rounded-lg cursor-pointer">
                                                        #ID
                                                    </label>
                                                </th>
                                                <th class="py-2 px-3 sticky top-0 border-b border-gray-200 bg-gray-100 sorting"
                                                    tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1"
                                                    aria-label="
                                            
                                                Đơn Hàng
                                            
                                        : activate to sort column ascending"
                                                    style="width: 79.4844px;">
                                                    <label
                                                        class="text-teal-500 inline-flex hover:bg-gray-200 px-2 py-2 rounded-lg cursor-pointer">
                                                        Đơn Hàng
                                                    </label>
                                                </th>
                                                
                                                <th class="py-2 px-3 sticky top-0 border-b border-gray-200 bg-gray-100 sorting"
                                                    tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1"
                                                    aria-label="
                                            
                                                 Máy Chủ
                                            
                                        : activate to sort column ascending"
                                                    style="width: 74.8594px;">
                                                    <label
                                                        class="text-teal-500 inline-flex hover:bg-gray-200 px-2 py-2 rounded-lg cursor-pointer">
                                                        Máy Chủ
                                                    </label>
                                                </th>
                                                <th class="py-2 px-3 sticky top-0 border-b border-gray-200 bg-gray-100 sorting"
                                                    tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1"
                                                    aria-label="
                                            
                                                Số Lượng
                                            
                                        : activate to sort column ascending"
                                                    style="width: 73.7656px;">
                                                    <label
                                                        class="text-teal-500  hover:bg-gray-200 px-2 py-2 rounded-lg cursor-pointer">
                                                        Số Lượng
                                                    </label>
                                                </th>

                                                <th class="py-2 px-3 sticky top-0 border-b border-gray-200 bg-gray-100 sorting"
                                                    tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1"
                                                    aria-label="
                                            
                                                Giá
                                            
                                        : activate to sort column ascending"
                                                    style="width: 36.7656px;">
                                                    <label
                                                        class="text-teal-500 inline-flex hover:bg-gray-200 px-2 py-2 rounded-lg cursor-pointer">
                                                        Giá
                                                    </label>
                                                </th>
                                                <th class="py-2 px-3 sticky top-0 border-b border-gray-200 bg-gray-100 w-40 sorting"
                                                    tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1"
                                                    aria-label="
                                            
                                                Trạng thái
                                            
                                        : activate to sort column ascending"
                                                    style="width: 160px;">
                                                    <label
                                                        class="text-teal-500 inline-flex hover:bg-gray-200 px-2 py-2 rounded-lg cursor-pointer">
                                                        Trạng thái
                                                    </label>
                                                </th>
                                                <th class="py-2 px-3 sticky top-0 border-b border-gray-200 bg-gray-100 sorting sorting_desc"
                                                    tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1"
                                                    aria-label="
                                            
                                                Tạo lúc


                                            
                                        : activate to sort column ascending"
                                                    style="width: 62.4219px;" aria-sort="descending">
                                                    <label
                                                        class="text-teal-500 inline-flex hover:bg-gray-200 px-2 py-2 rounded-lg cursor-pointer">
                                                        Tạo lúc
                                                    </label>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__currentLoopData = $OderIg; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr style="text-align:center">
                                                    <td><?php echo e($item->id); ?></td>
                                                    <td><?php echo e($item->type); ?></td>
                                                    
                                                    <td><?php echo e($item->server_order); ?></td>
                                                    <td><?php echo e($item->amount); ?></td>
                                                    <td><?php echo e($item->price); ?></td>
                                                    <td>
                                                        <?php if($item->status == 'Start'): ?>
                                                            <span
                                                                style="background:#51b714;padding:4px 6px;border-radius:7px;color:#fff">Đang
                                                                chạy</span>
                                                        <?php elseif($item->status == 'Pending'): ?>
                                                            <span class="badge badge-warning">Chờ xử lý</span>
                                                        <?php elseif($item->status == 'Success'): ?>
                                                            <span
                                                                style="background:#51b714;padding:4px 6px;border-radius:7px;color:#fff">Đã
                                                                hoàn thành</span>
                                                        <?php elseif($item->status == 'Cancel'): ?>
                                                            <span class="badge badge-danger">Đã hủy</span>
                                                        <?php endif; ?>
                                                    </td>
                                                    <td><?php echo e($item->created_at); ?></td>
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

            

            <?php if($type == 'like-post'): ?>
                <div class="intro-y col-span-12 lg:col-span-4 bg-theme-7 p-2" style="border-radius: 5px">


                    <ul style="margin-right: 0px; margin-left: 0px; padding: 0px;">
                        <li
                            style="color: rgb(73, 80, 87); font-family: &quot;Nunito Sans&quot;, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;; margin: 0px; padding: 0px;">
                            <span
                                style="color: rgb(255, 0, 0); font-family: &quot;Source Sans Pro&quot;, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; font-weight: 700;"><?php echo e($title); ?></span><br>
                        </li>
                        <li style="margin: 0px; padding: 0px;">+ Có thể trong lúc chạy có thể like hoặc sub bị tụt vui lòng
                            buff dư thêm 20 - 30% trên tổng số lượng để tránh tụt vì acc lấy ra chạy có thể bị checkpoint
                            trong
                            khi chạy !</li>
                        <li style="margin: 0px; padding: 0px;">+ Nghiêm cấm đổi Username trong quá trình Buff Instagram.
                            Nếu
                            khách hàng cố tình đổi Username trong quá trình Buff Instagram, sẽ KHÔNG được hoàn tiền.</li>
                        <li style="margin: 0px; padding: 0px;">+ <b>
                                <font color="#ff0000">Chế độ bảo hành</font>
                            </b> : chỉ bảo hành khi id đó mua dịch vụ có bảo hành, nếu id đó mua dịch vụ không bảo hành sau
                            đó
                            lại mua dịch vụ có bảo hành, thì sẽ không được bảo hành</li>
                        <li style="margin: 0px; padding: 0px;">+ Tất cả các id chạy theo dõi đều phải mở công khai, nếu để
                            ở
                            chế độ riêng tư có thể không chạy được hoặc sẽ hoàn thành luôn</li>
                    </ul>
                </div>
            <?php endif; ?>

            <?php if($type == 'follow'): ?>
                {
                <div class="intro-y col-span-12 lg:col-span-4 bg-theme-7 p-2" style="border-radius: 5px">
                    <ul style="margin-right: 0px; margin-left: 0px; padding: 0px;">
                        <li
                            style="color: rgb(73, 80, 87); font-family: &quot;Nunito Sans&quot;, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;; margin: 0px; padding: 0px;">
                            <span
                                style="color: rgb(255, 0, 0); font-family: &quot;Source Sans Pro&quot;, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; font-weight: 700;"><?php echo e($title); ?></span><br>
                        </li>
                        <li style="margin: 0px; padding: 0px;">+ Có thể trong lúc chạy có thể like hoặc sub bị tụt vui lòng
                            buff dư thêm 20 - 30% trên tổng số lượng để tránh tụt vì acc lấy ra chạy có thể bị checkpoint
                            trong khi chạy !</li>
                        <li style="margin: 0px; padding: 0px;">+ Nghiêm cấm đổi Username trong quá trình Buff Instagram.
                            Nếu khách hàng cố tình đổi Username trong quá trình Buff Instagram, sẽ KHÔNG được hoàn tiền.
                        </li>
                        <li style="margin: 0px; padding: 0px;">+&nbsp;<span style="font-weight: bolder;">
                                <font color="#ff0000">Chế độ bảo hành</font>
                            </span>&nbsp;:&nbsp;chỉ bảo hành khi id đó mua dịch vụ có bảo hành, nếu id đó mua dịch vụ không
                            bảo hành sau đó lại mua dịch vụ có bảo hành, thì sẽ không được bảo hành</li>
                        <li style="margin: 0px; padding: 0px;">+ Tất cả các id chạy theo dõi đều phải mở công khai, nếu để
                            ở chế độ riêng tư có thể không chạy được hoặc sẽ hoàn thành luôn</li>
                        <li style="margin: 0px; padding: 0px;"><span style="outline: none !important;"><span
                                    style="outline-color: initial !important; outline-width: initial !important;"><br></span></span>
                        </li>
                        <li style="margin: 0px; padding: 0px;"><span style="outline: none !important;"><span
                                    style="outline-color: initial !important; outline-width: initial !important;"><b>
                                        <font color="#ff0000">Buff sub Instagram việt</font>
                                    </b></span></span>
                            <p style="margin-right: 0px; margin-bottom: 10px; margin-left: 0px; outline: none !important;">
                                <span style="outline: none !important;"><span
                                        style="outline-color: initial !important; outline-width: initial !important;"><b>
                                            <font color="#ff0000">Để công khai để được tăng follow</font>
                                        </b></span></span>
                            </p>
                            <p style="margin-right: 0px; margin-bottom: 10px; margin-left: 0px; outline: none !important;">
                                <span style="outline: none !important;"><span
                                        style="outline-color: initial !important; outline-width: initial !important;"><b>
                                            <font color="#ff0000">- Công khai trang cá nhân</font>
                                        </b></span></span>
                            </p>
                            <p style="margin-right: 0px; margin-bottom: 10px; margin-left: 0px; outline: none !important;">
                                <img src="" style="width: 100%;" data-filename="image.png"><span
                                    style="outline: none !important;"><span
                                        style="outline-color: initial !important; outline-width: initial !important;"><b>
                                            <font color="#ff0000"><br></font>
                                        </b></span></span>
                            </p>
                        </li>
                    </ul>
                </div>
                }
            <?php endif; ?>
        </div>
    </div>
    <!-- CONTAINER CLOSED -->
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp1\htdocs\Huycode\resources\views/service/instagram/instagram-v2.blade.php ENDPATH**/ ?>