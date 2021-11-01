@extends('admin.layout.master-layout')

@section('title')
    <title>Form</title>
@endsection

@section('breadcrumb')
    <header class="page-header">
        <h2>Form Create</h2>

        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="#">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li><span>Form Create</span></li>
            </ol>

            <div class="sidebar-right-toggle" ></div>
        </div>
    </header>
@endsection

@section('content')
    <div class="col-md-12">
        <form name="register-form" action="/form" method="post">
            @csrf
            <section class="panel">
                <header class="panel-heading">
                    <div class="panel-actions">
                        <a href="#" class="fa fa-caret-down"></a>
                    </div>
                    <h2 class="panel-title">Create</h2>
                </header>
                <div class="panel-body">
                    @if($errors->all())
                        <div class="validation-message">
                            <ul style="display: block;">
                                @foreach($errors->all() as $error)
                                    <li>
                                        <label class="error">
                                            {{$error}}
                                        </label>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="row form-group">
                        <div class="col-lg-6">
                            <label>Event Name</label>
                            <input type="text" class="form-control" name="eventName" placeholder="Event Name">
                            @error('eventName')
                                <label for="eventName" class="error">{{$message}}</label>
                            @enderror
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-lg-6">
                            <label>Band Names</label>
                            <input type="text" class="form-control" name="bandNames" placeholder="Band Names">
                            @error('bandNames')
                                <label for="bandNames" class="error">{{$message}}</label>
                            @enderror
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-lg-3">
                            <label>Start Date</label>
                            <div class="input-group">
							<span class="input-group-addon">
							<i class="fa fa-calendar"></i>
							</span>
                                <input name="startDate" type="text" data-plugin-datepicker="" class="form-control">
                            </div>
                        </div>
                        @error('startDate')
                            <label for="startDate" class="error">{{$message}}</label>
                        @enderror
                    </div>
                    <div class="row form-group">
                        <div class="col-lg-3">
                            <label>End Date</label>
                            <div class="input-group">
							<span class="input-group-addon">
							<i class="fa fa-calendar"></i>
							</span>
                                <input name="endDate" type="text" data-plugin-datepicker="" class="form-control">
                            </div>
                        </div>
                        @error('endDate')
                            <label for="endDate" class="error">{{$message}}</label>
                        @enderror
                    </div>
                    <div class="row form-group">
                        <div class="col-lg-3">
                            <label>Portfolio</label>
                            <select class="form-control" name="portfolio_id">
                                @foreach($portfolios as $portfolio)
                                    <option value="{{$portfolio->id}}">{{$portfolio->name}}</option>
                                @endforeach
                            </select>
                            @error('portfolio_id')
                                <label for="portfolio_id" class="error">{{$message}}</label>
                            @enderror
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-lg-4">
                            <label>Ticket Price</label>
                            <input type="number" class="form-control" name="ticketPrice" placeholder="Price">
                            @error('ticketPrice')
                                <label for="ticketPrice" class="error">{{$message}}</label>
                            @enderror
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-lg-12">
                            <label>Thumbnail</label>
                            <div id="preview-img" class="row mt-lg pt-lg" >
                            </div>
                            <input type="hidden" class="form-control" name="thumbnail" placeholder="Link Thumbnail">
                            <button type="button" id="upload_widget" class="cloudinary-button btn btn-info btn-fill">Upload files</button>
                            @error('thumbnail')
                                <label for="thumbnail" class="error">{{$message}}</label>
                            @enderror
                        </div>
                    </div>
{{--                        <div class="row form-group">--}}
{{--                            <div class="col-lg-12">--}}
{{--                                <label>ThumbnailTest</label>--}}
{{--                                <div id="preview-img" class="row mt-lg pt-lg">--}}
{{--                                </div>--}}
{{--                                <a href="#" id="opener">upload</a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                    <div class="row form-group">
                        <div class="col-lg-3">
                            <label>Status</label>
                            <select class="form-control" name="status">
                                <option value="1" selected="">Đang diễn ra</option>
                                <option value="2">Sắp diễn ra</option>
                                <option value="3">Đã diễn ra</option>
                                <option value="0">Chờ lần sau</option>
                            </select>
                            @error('status')
                                <label for="status" class="error">{{$message}}</label>
                            @enderror
                        </div>
                    </div>
                </div>
                <footer class="panel-footer">
                    <button type="submit" class="btn btn-info btn-fill">Creat</button>
                    <a href="/table"><button type="button" class="btn btn-danger pull-right">Cancel</button></a>
                </footer>
            </section>
        </form>
    </div>
@endsection

@section('script')
    <script src="https://upload-widget.cloudinary.com/global/all.js" type="text/javascript"></script>
    <script type="text/javascript">
        var myWidget = cloudinary.createUploadWidget({
                cloudName: 'dark-faith',
                uploadPreset: 'nqbsybdh'}, (error, result) => {
                if (!error && result && result.event === "success") {
                    console.log('Done! Here is the image info: ', result.info);
                    document.forms['register-form']['thumbnail'].value += result.info.secure_url + ',';
                    document.getElementById('preview-img').innerHTML +=
                        `<div class="mt-lg">
                           <div class="col-md-3" >
                                <section class="panel">
                                    <header class="panel-heading">
                                        <div class="panel-actions">
    <!--										<a href="#" class="fa fa-caret-down"></a>-->
                                            <a href="#" class="fa fa-times" onclick="deleteImage('${result.info.delete_token}','${result.info.secure_url}')"></a>
                                        </div>
                                        <h2 class="panel-title">Single Item</h2>
                                    </header>
                                    <div class="panel-body">
                                        <div class="owl-carousel owl-theme owl-carousel-init" data-plugin-carousel="" data-plugin-options="{ &quot;items&quot;: 1, &quot;autoHeight&quot;: true }" style="display: block; opacity: 1;">
                                            <div class="owl-wrapper-outer autoHeight" style="height: 232px;"><div class="owl-wrapper" style="width: 1392px; left: 0px; display: block; transition: all 200ms ease 0s; transform: translate3d(0px, 0px, 0px);"><div class="owl-item" style="width: 232px;"><div class="item">
                                                <img alt="" class="img-responsive" src="${result.info.secure_url}">
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>
                       </div>`;
                }
            }
        )
        $('#upload_widget').click(function () {
            myWidget.open();
        });

        function deleteImage(delete_token,secure_url){
            var src = secure_url;
            const url = "https://api.cloudinary.com/v1_1/dark-faith/delete_by_token";
            $.ajax({
                url : url, // gửi ajax đến file result.php
                type : "POST", // chọn phương thức gửi là post
                data : { // Danh sách các thuộc tính sẽ gửi đi
                    token: delete_token
                },
                error: function (){
                    alert("Có lỗi xảy ra!");
                }
            });
            var array_thubmail_before = document.forms['register-form']['thumbnail'].value.split(',');
            array_thubmail_before.pop();
            // const obj = JSON.parse(src);
            // tìm đến những phần tử khác obj.secure_url
            const array_thubmail_after = array_thubmail_before.filter(thumbnail => {return thumbnail !== src});
            if (array_thubmail_after.length>0){
                document.forms['register-form']['thumbnail'].value = array_thubmail_after.join(',') + ',';
            } else{
                document.forms['register-form']['thumbnail'].value = "";
            }
            console.log(document.forms['register-form']['thumbnail'].value);
        }

        // $(document).on("click",".cloudinary-delete",function () {
        //     var src = $(this).parent().attr('data-cloudinary');
        //     var array_thubmail_before = document.forms['register-form']['thumbnail'].value.split(',');
        //     array_thubmail_before.pop();
        //     const obj = JSON.parse(src);
        //     // tìm đến những phần tử khác obj.secure_url
        //     const array_thubmail_after = array_thubmail_before.filter(thumbnail => {return thumbnail !== obj.secure_url});
        //     if (array_thubmail_after.length>0){
        //         document.forms['register-form']['thumbnail'].value = array_thubmail_after.join(',') + ',';
        //     } else{
        //         document.forms['register-form']['thumbnail'].value = "";
        //     }
        //     console.log(document.forms['register-form']['thumbnail'].value);
        // });

        CKEDITOR.replace( 'editor' );
    </script>
@endsection
