@inject('site_config', 'App\Models\site_config')
@extends('app')
@section('title', 'Tiktok V1')
@section('content')

    <div class="content">
        <div class="intro-y flex items-center mt-8">
            <h2 class="text-lg font-medium mr-auto">
                {{ $title }}
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
                                <form class="validate-form" action="{{ route('api.service.tiktok-v2', $type) }}"
                                    ajax-request="huycoder" method="POST">
                                    {{-- like-post --}}
                                    @if ($type == 'like' || $type == 'comment' || $type == 'share' || $type == 'view')
                                        <div class="input-form mt-3">
                                            <label for="validation-form-5"
                                                class="form-label w-full flex flex-col sm:flex-row"> Links video <span
                                                    class="sm:ml-auto mt-1 sm:mt-0 text-xs text-gray-600">Vui lòng nhập
                                                    links video</span>
                                            </label>
                                            <input type="url" name="idpost" id="idpost"
                                                class="form-control url_service"
                                                placeholder="https://www.tiktok.com/@huycode/video/7103183733192232219"
                                                required="">
                                        </div>
                                    @endif
                                    {{-- follow --}}
                                    @if ($type == 'sub')
                                        <div class="input-form mt-3">
                                            <label for="validation-form-5"
                                                class="form-label w-full flex flex-col sm:flex-row"> Links hoặc ID
                                                profile <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-gray-600">Vui lòng
                                                    nhập links hoặc ID trang cá nhân</span>
                                            </label>
                                            <input type="text" name="idpost" id="idpost"
                                                class="form-control fanpage_id" onchange="getIDPOST()"
                                                placeholder="https://www.tiktok.com/@dekaypl" required="">
                                        </div>
                                    @endif
                                    {{-- comment --}}
                                    @if ($type == 'comment')
                                        <div class="input-form mt-3">
                                            <label for="validation-form-6"
                                                class="form-label w-full flex flex-col sm:flex-row"> Nội dung
                                                comment<span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-gray-600">Vui lòng
                                                    nhập tối thiểu 10 nội dung</span>
                                            </label>
                                            <textarea rows="5" type="text" class="form-control" name="comment" id="comment"
                                                placeholder="Nhập nội dung comments của bạn , mỗi nội dung 1 dòng nhé"> </textarea>
                                        </div>
                                    @endif
                                    {{-- server --}}
                                    <div class="input-form mt-3">
                                        <label for="validation-form-6" class="form-label w-full flex flex-col sm:flex-row">
                                            Chọn
                                            Server <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-gray-600">Vui lòng
                                                chọn
                                                server buff mà bạn mong muốn tăng</span>
                                        </label>
                                        @foreach ($server as $item)
                                            <div class="custom-control custom-radio custom-control-inline mt-3">
                                                <input type="radio" id="server{{ $item->id }}" name="server_order"
                                                    onchange="bill()" price="{{ $item->rate_server }}"
                                                    notice="{{ $item->content_server }}" class="custom-control-input"
                                                    checked value="{{ $item->server_service }}">

                                                <label class="custom-control-label" for="server{{ $item->id }}">
                                                    {{ $item->server_service }} - [ {{ $item->title_server }} ]
                                                    <span
                                                        class="justify-center bg-theme-17 rounded-md text-white w-24 text-center px-2 py-1 mx-auto my-auto"
                                                        style="font-size:12px;">{{ $item->rate_server }}
                                                        Coin</span>
                                                    @if ($item->status_server == 'on')
                                                        <span class="badge"
                                                            style="color:rgb(53, 181, 36);font-weight:700">(
                                                            {{ __('Hoạt Động') }}
                                                            )</span>
                                                    @else
                                                        <span class="badge"
                                                            style="color:rgb(240, 56, 56);font-weight:700">(
                                                            {{ __('Bảo Trì') }} )</span>
                                                    @endif
                                                </label>
                                            </div>
                                        @endforeach
                                        <div id="noticeServer"></div>
                                    </div>
                                    @if ($type == 'like' || $type == 'comment' || $type == 'sub' || $type == 'share' || $type == 'view')
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
                                    @endif

                                    {{-- ---- --}}


                                    <div class="input-form mt-3">
                                        <label for="validation-form-6"
                                            class="form-label w-full flex flex-col sm:flex-row">
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
                                                {{-- <th class="py-2 px-3 sticky top-0 border-b border-gray-200 bg-gray-100 sorting"
                                                    tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1"
                                                    aria-label="
                                            
                                                 Link
                                            
                                        : activate to sort column ascending"
                                                    style="width: 60.1094px;">
                                                    <label
                                                        class="text-teal-500 inline-flex hover:bg-gray-200 px-2 py-2 rounded-lg cursor-pointer">
                                                        Link
                                                    </label>
                                                </th> --}}
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
                                            @foreach ($OderTik as $item)
                                                <tr style="text-align:center">
                                                    <td>{{ $item->id }}</td>
                                                    <td>{{ $item->type }}</td>
                                                    {{-- <td>{{ $item->link_order }}</td> --}}
                                                    <td>{{ $item->server_order }}</td>
                                                    <td>{{ $item->amount }}</td>
                                                    <td>{{ $item->price }}</td>
                                                    <td>
                                                        @if ($item->status == 'Start')
                                                            <span
                                                                style="background:#51b714;padding:4px 6px;border-radius:7px;color:#fff">Đang
                                                                chạy</span>
                                                        @elseif ($item->status == 'Pending')
                                                            <span class="badge badge-warning">Chờ xử lý</span>
                                                        @elseif ($item->status == 'Success')
                                                            <span
                                                                style="background:#51b714;padding:4px 6px;border-radius:7px;color:#fff">Đã
                                                                hoàn thành</span>
                                                        @elseif ($item->status == 'Cancel')
                                                            <span class="badge badge-danger">Đã hủy</span>
                                                        @endif
                                                    </td>
                                                    <td>{{ $item->created_at }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- thoong baos --}}
            @if ($type == 'like')
                <div class="intro-y col-span-12 lg:col-span-4 bg-theme-7 p-2" style="border-radius: 5px">
                    <ul style="margin-right: 0px; margin-left: 0px; padding: 0px;">
                        <li
                            style="color: rgb(73, 80, 87); font-family: &quot;Nunito Sans&quot;, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;; margin: 0px; padding: 0px;">
                            <span
                                style="font-family: &quot;Source Sans Pro&quot;, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; color: rgb(255, 0, 0); font-weight: 700;">BUFF&nbsp;
                                LIKE TIKTOK&nbsp;</span><span
                                style="font-family: &quot;Source Sans Pro&quot;, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; color: rgb(255, 0, 0); font-weight: 700;">V1</span><br>
                        </li>
                        <li style="margin: 0px; padding: 0px;">+&nbsp;<span style="font-weight: bolder;">
                                <font color="#ff0000">Nghiêm cấm</font>
                            </span>&nbsp;đổi Username trong quá trình Buff Follow, Like, Comment, View Tiktok.</li>
                        <li style="margin: 0px; padding: 0px;">+ Nếu khách hàng cố tình đổi Username trong quá trình Buff
                            Follow, Like, Comment, View Tiktok, sẽ&nbsp;<span style="font-weight: bolder;">
                                <font color="#ff0000">KHÔNG</font>
                            </span>&nbsp;được hoàn tiền.</li>
                        <li style="margin: 0px; padding: 0px;">+ Có thể trong lúc chạy có thể like hoặc sub bị tụt vui lòng
                            buff dư thêm 30 - 50% trên tổng số lượng để tránh tụt vì acc lấy ra chạy có thể bị checkpoint
                            trong
                            khi chạy !</li>
                        <li style="margin: 0px; padding: 0px;">+&nbsp;<span style="font-weight: bolder;">
                                <font color="#ff0000">Chế độ bảo hành</font>
                            </span>&nbsp;: chỉ bảo hành khi id đó mua dịch vụ có bảo hành, nếu id đó mua dịch vụ không bảo
                            hành
                            sau đó lại mua dịch vụ có bảo hành, thì sẽ không được bảo hành</li>
                        <li style="margin: 0px; padding: 0px;">
                            <p style="margin: 5px 0px 0px; outline: none !important;"><span
                                    style="outline: none !important;">
                                    <font color="#0000ff"><span style="font-weight: bolder;">Lưu ý :</span><b>&nbsp;</b>
                                    </font>
                                </span>
                                <font color="#0000ff"><b>vui lòng gửi đúng link theo dạng
                                        https://www.tiktok.com/@username/video/id_video</b></font>
                            </p>
                            <p style="margin: 5px 0px 0px; outline: none !important;">
                                <font color="#0000ff"><b>Lưu ý : một số bạn lấy link từ điện thoại sẽ sai nhé ( chia sẻ
                                        link
                                        rồi copy link từ điện thoại sai định dạng ) (&nbsp;</b></font>
                            </p>
                            <p style="margin: 5px 0px 0px; outline: none !important;">
                                <font color="#0000ff"><b><span
                                            style="outline-color: initial; outline-style: initial;">https://vt.tiktok.com/ZSJd8rJmH/</span>&nbsp;)
                                        =&gt; có chữ vt ở đầu là sai</b></font>
                            </p>
                            <p style="margin: 5px 0px 0px; outline: none !important;">
                                <font color="#0000ff"><b>*** muốn lấy link chuẩn vui lòng dùng PC hoặc trình duyệt lấy</b>
                                </font>
                            </p>
                            <p style="margin: 5px 0px 0px; outline: none !important;">
                                <font color="#0000ff"><b>*** có thể dùng link điện thoại đó copy vào trình duyệt rồi lấy
                                        link
                                        từ trình duyệt đó&nbsp;</b></font>
                            </p>
                            <p style="margin: 5px 0px 0px; outline: none !important;">
                                <font color="#0000ff"><b>ví dụ:&nbsp;&nbsp;dùng trình duyệt bất kì như chrome hoặc safari
                                        rồi
                                        vào link&nbsp;<span
                                            style="outline-color: initial; outline-style: initial;">https://vt.tiktok.com/ZSJd8rJmH/</span>&nbsp;
                                        =&gt; seach =&gt; lấy link mới</b></font>
                            </p>
                        </li>
                    </ul>
                </div>
            @endif
            @if ($type == 'comment')
                <div class="intro-y col-span-12 lg:col-span-4 bg-theme-7 p-2" style="border-radius: 5px">
                    <ul style="margin-right: 0px; margin-left: 0px; padding: 0px;">
                        <li
                            style="color: rgb(73, 80, 87); font-family: &quot;Nunito Sans&quot;, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;; margin: 0px; padding: 0px;">
                            <span
                                style="font-family: &quot;Source Sans Pro&quot;, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; color: rgb(255, 0, 0); font-weight: 700;">{{ $title }}</span><span
                                style="font-family: &quot;Source Sans Pro&quot;, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; color: rgb(255, 0, 0); font-weight: 700;">V1</span><br>
                        </li>
                        <li style="margin: 0px; padding: 0px;">+&nbsp;<span style="font-weight: bolder;">
                                <font color="#ff0000">Nghiêm cấm</font>
                            </span>&nbsp;đổi Username trong quá trình Buff Follow, Like, Comment, View Tiktok.</li>
                        <li style="margin: 0px; padding: 0px;">+ Nếu khách hàng cố tình đổi Username trong quá trình Buff
                            Follow, Like, Comment, View Tiktok, sẽ&nbsp;<span style="font-weight: bolder;">
                                <font color="#ff0000">KHÔNG</font>
                            </span>&nbsp;được hoàn tiền.</li>
                        <li style="margin: 0px; padding: 0px;">+ Có thể trong lúc chạy có thể like hoặc sub bị tụt vui lòng
                            buff dư thêm 30 - 50% trên tổng số lượng để tránh tụt vì acc lấy ra chạy có thể bị checkpoint
                            trong khi chạy !</li>
                        <li style="margin: 0px; padding: 0px;">+&nbsp;<span style="font-weight: bolder;">
                                <font color="#ff0000">Chế độ bảo hành</font>
                            </span>&nbsp;: chỉ bảo hành khi id đó mua dịch vụ có bảo hành, nếu id đó mua dịch vụ không bảo
                            hành sau đó lại mua dịch vụ có bảo hành, thì sẽ không được bảo hành</li>
                        <li style="margin: 0px; padding: 0px;">+ Nghiêm cấm những bình luận có cử chỉ, lời nói thô bạo,
                            khiêu khích, trêu ghẹo, xúc phạm nhân phẩm, danh dự của Cá nhân hoặc Tổ chức.</li>
                        <li style="margin: 0px; padding: 0px;">+ Nếu cố tình buff bạn sẽ bị trừ hết tiền và ban khỏi hệ
                            thống vĩnh viễn, và phải chịu hoàn toàn trách nhiệm trước pháp luật.</li>
                        <li style="margin: 0px; padding: 0px;">
                            <p style="margin: 5px 0px 0px; outline: none !important;"><span
                                    style="outline: none !important;">
                                    <font color="#0000ff"><span style="font-weight: bolder;">Lưu ý :</span><span
                                            style="font-weight: bolder;">&nbsp;</span></font>
                                </span>
                                <font color="#0000ff"><span style="font-weight: bolder;">vui lòng gửi đúng link theo dạng
                                        https://www.tiktok.com/@username/video/id_video</span></font>
                            </p>
                            <p style="margin: 5px 0px 0px; outline: none !important;">
                                <font color="#0000ff"><span style="font-weight: bolder;">Lưu ý : một số bạn lấy link từ
                                        điện thoại sẽ sai nhé ( chia sẻ link rồi copy link từ điện thoại sai định dạng )
                                        (&nbsp;</span></font>
                            </p>
                            <p style="margin: 5px 0px 0px; outline: none !important;">
                                <font color="#0000ff"><span style="font-weight: bolder;"><span
                                            style="outline-color: initial; outline-style: initial;">https://vt.tiktok.com/ZSJd8rJmH/</span>&nbsp;)
                                        =&gt; có chữ vt ở đầu là sai</span></font>
                            </p>
                            <p style="margin: 5px 0px 0px; outline: none !important;">
                                <font color="#0000ff"><span style="font-weight: bolder;">*** muốn lấy link chuẩn vui lòng
                                        dùng PC hoặc trình duyệt lấy</span></font>
                            </p>
                            <p style="margin: 5px 0px 0px; outline: none !important;">
                                <font color="#0000ff"><span style="font-weight: bolder;">*** có thể dùng link điện thoại
                                        đó copy vào trình duyệt rồi lấy link từ trình duyệt đó&nbsp;</span></font>
                            </p>
                            <p style="margin: 5px 0px 0px; outline: none !important;">
                                <font color="#0000ff"><span style="font-weight: bolder;">ví dụ:&nbsp;&nbsp;dùng trình
                                        duyệt bất kì như chrome hoặc safari rồi vào link&nbsp;<span
                                            style="outline-color: initial; outline-style: initial;">https://vt.tiktok.com/ZSJd8rJmH/</span>&nbsp;
                                        =&gt; seach =&gt; lấy link mới</span></font>
                            </p>
                        </li>
                    </ul>
                </div>
            @endif
            @if ($type == 'sub')
                <div class="intro-y col-span-12 lg:col-span-4 bg-theme-7 p-2" style="border-radius: 5px">


                    <ul style="margin-right: 0px; margin-left: 0px; padding: 0px;">
                        <li
                            style="color: rgb(73, 80, 87); font-family: &quot;Nunito Sans&quot;, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;; margin: 0px; padding: 0px;">
                            <span
                                style="font-family: &quot;Source Sans Pro&quot;, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; color: rgb(255, 0, 0); font-weight: 700;">{{ $title }}</span><span
                                style="font-family: &quot;Source Sans Pro&quot;, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; color: rgb(255, 0, 0); font-weight: 700;">V1</span><br>
                        </li>
                        <li style="margin: 0px; padding: 0px;">+ <b>
                                <font color="#ff0000">Nghiêm cấm</font>
                            </b> đổi Username trong quá trình Buff Follow, Like, Comment, View Tiktok.</li>
                        <li style="margin: 0px; padding: 0px;">+ Nếu khách hàng cố tình đổi Username trong quá trình Buff
                            Follow, Like, Comment, View Tiktok, sẽ <b>
                                <font color="#ff0000">KHÔNG</font>
                            </b> được hoàn tiền.</li>
                        <li style="margin: 0px; padding: 0px;">+ Có thể trong lúc chạy có thể like hoặc sub bị tụt vui lòng
                            buff dư thêm 30 - 50% trên tổng số lượng để tránh tụt vì acc lấy ra chạy có thể bị checkpoint
                            trong khi chạy !</li>
                        <li style="margin: 0px; padding: 0px;">+ <b>
                                <font color="#ff0000">Chế độ bảo hành</font>
                            </b> : chỉ bảo hành khi id đó mua dịch vụ có bảo hành, nếu id đó mua dịch vụ không bảo hành sau
                            đó lại mua dịch vụ có bảo hành, thì sẽ không được bảo hành</li>
                        <li style="margin: 0px; padding: 0px;">
                            <p style="margin: 5px 0px 0px; outline: none !important;"><span
                                    style="outline: none !important;">
                                    <font color="#0000ff"><b>Lưu ý : một số bạn lấy link từ điện thoại sẽ sai nhé ( chia sẻ
                                            link rồi copy link từ điện thoại sai định dạng ) (&nbsp;</b></font>
                                </span></p>
                            <p style="margin: 5px 0px 0px; outline: none !important;"><span
                                    style="outline: none !important;">
                                    <font color="#0000ff"><b><span
                                                style="outline-color: initial; outline-style: initial;">https://vt.tiktok.com/ZSJd8rJmH/</span>&nbsp;)
                                            =&gt; có chữ vt ở đầu là sai</b></font>
                                </span></p>
                            <p style="margin: 5px 0px 0px; outline: none !important;"><span
                                    style="outline: none !important;">
                                    <font color="#0000ff"><b>*** có thể dùng link điện thoại đó copy vào trình duyệt rồi
                                            lấy link từ trình duyệt đó&nbsp;</b></font>
                                </span></p>
                            <p style="margin: 5px 0px 0px; outline: none !important;"><span
                                    style="outline: none !important;">
                                    <font color="#0000ff"><b>*** Dán :&nbsp;<span
                                                style="outline-color: initial; outline-style: initial;">https://vt.tiktok.com/ZSJd8rJmH/</span>&nbsp;
                                            vào trình duyệt sẽ ra link chuẩn nhé&nbsp;</b></font>
                                </span></p>
                        </li>
                    </ul>
                </div>
            @endif
            @if ($type == 'view' || $type == 'share')
                <div class="intro-y col-span-12 lg:col-span-4 bg-theme-7 p-2" style="border-radius: 5px">


                    <ul style="margin-right: 0px; margin-left: 0px; padding: 0px;">
                        <li
                            style="color: rgb(73, 80, 87); font-family: &quot;Nunito Sans&quot;, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;; margin: 0px; padding: 0px;">
                            <span
                                style="font-family: &quot;Source Sans Pro&quot;, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; color: rgb(255, 0, 0); font-weight: 700;">{{ $title }}</span><span
                                style="font-family: &quot;Source Sans Pro&quot;, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; color: rgb(255, 0, 0); font-weight: 700;">V1</span><br>
                        </li>
                        <li style="margin: 0px; padding: 0px;">+&nbsp;<span style="font-weight: bolder;">
                                <font color="#ff0000">Nghiêm cấm</font>
                            </span>&nbsp;đổi Username trong quá trình Buff Follow, Like, Comment, View Tiktok.</li>
                        <li style="margin: 0px; padding: 0px;">+ Nếu khách hàng cố tình đổi Username trong quá trình Buff
                            Follow, Like, Comment, View Tiktok, sẽ&nbsp;<span style="font-weight: bolder;">
                                <font color="#ff0000">KHÔNG</font>
                            </span>&nbsp;được hoàn tiền.</li>
                        <li style="margin: 0px; padding: 0px;">+ Có thể trong lúc chạy có thể like hoặc sub bị tụt vui lòng
                            buff dư thêm 30 - 50% trên tổng số lượng để tránh tụt vì acc lấy ra chạy có thể bị checkpoint
                            trong khi chạy !</li>
                        <li style="margin: 0px; padding: 0px;">+&nbsp;<span style="font-weight: bolder;">
                                <font color="#ff0000">Chế độ bảo hành</font>
                            </span>&nbsp;: chỉ bảo hành khi id đó mua dịch vụ có bảo hành, nếu id đó mua dịch vụ không bảo
                            hành sau đó lại mua dịch vụ có bảo hành, thì sẽ không được bảo hành</li>
                        <li style="margin: 0px; padding: 0px;">
                            <p style="margin: 5px 0px 0px; outline: none !important;"><span
                                    style="outline: none !important;">
                                    <font color="#0000ff"><span style="font-weight: bolder;">Lưu ý :</span><span
                                            style="font-weight: bolder;">&nbsp;</span></font>
                                </span>
                                <font color="#0000ff"><span style="font-weight: bolder;">vui lòng gửi đúng link theo dạng
                                        https://www.tiktok.com/@username/video/id_video</span></font>
                            </p>
                            <p style="margin: 5px 0px 0px; outline: none !important;">
                                <font color="#0000ff"><span style="font-weight: bolder;">Lưu ý : một số bạn lấy link từ
                                        điện thoại sẽ sai nhé ( chia sẻ link rồi copy link từ điện thoại sai định dạng )
                                        (&nbsp;</span></font>
                            </p>
                            <p style="margin: 5px 0px 0px; outline: none !important;">
                                <font color="#0000ff"><span style="font-weight: bolder;"><span
                                            style="outline-color: initial; outline-style: initial;">https://vt.tiktok.com/ZSJd8rJmH/</span>&nbsp;)
                                        =&gt; có chữ vt ở đầu là sai</span></font>
                            </p>
                            <p style="margin: 5px 0px 0px; outline: none !important;">
                                <font color="#0000ff"><span style="font-weight: bolder;">*** muốn lấy link chuẩn vui lòng
                                        dùng PC hoặc trình duyệt lấy</span></font>
                            </p>
                            <p style="margin: 5px 0px 0px; outline: none !important;">
                                <font color="#0000ff"><span style="font-weight: bolder;">*** có thể dùng link điện thoại
                                        đó copy vào trình duyệt rồi lấy link từ trình duyệt đó&nbsp;</span></font>
                            </p>
                            <p style="margin: 5px 0px 0px; outline: none !important;">
                                <font color="#0000ff"><span style="font-weight: bolder;">ví dụ:&nbsp;&nbsp;dùng trình
                                        duyệt bất kì như chrome hoặc safari rồi vào link&nbsp;<span
                                            style="outline-color: initial; outline-style: initial;">https://vt.tiktok.com/ZSJd8rJmH/</span>&nbsp;
                                        =&gt; seach =&gt; lấy link mới</span></font>
                            </p>
                        </li>
                    </ul>
                </div>
            @endif
        </div>
    </div>
    <!-- CONTAINER CLOSED -->
    </div>
@endsection
