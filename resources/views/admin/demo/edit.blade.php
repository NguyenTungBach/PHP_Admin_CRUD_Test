@extends('admin.layout.master-layout')

@section('title')
    <title>Edit</title>
@endsection

@section('breadcrumb')
    <header class="page-header">
        <h2>Edit Even</h2>

        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="#">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li><span>Edit Even</span></li>
            </ol>

            <div class="sidebar-right-toggle" ></div>
        </div>
    </header>
@endsection

@section('content')
    <div class="col-md-12">
        <form name="register-form" action="/edit?id={{$item['id']}}" method="post">
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
                            <input type="text" class="form-control" name="eventName" placeholder="Event Name" value="{{$item['eventName']}}">
                            @error('eventName')
                                <label for="eventName" class="error">{{$message}}</label>
                            @enderror
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-lg-6">
                            <label>Band Names</label>
                            <input type="text" class="form-control" name="bandNames" placeholder="Band Names" value="{{$item['bandNames']}}">
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
                                <input name="startDate" type="text" data-plugin-datepicker="" class="form-control" value="{{date("m/d/Y", strtotime($item['startDate']))}}">
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
                                <input name="endDate" type="text" data-plugin-datepicker="" class="form-control" value="{{date("m/d/Y", strtotime($item['endDate']))}}">
                            </div>
                            @error('endDate')
                                <label for="endDate" class="error">{{$message}}</label>
                            @enderror
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-lg-3">
                            <label>Portfolio</label>
                            <select class="form-control" name="portfolio_id">
                                @foreach($portfolios as $portfolio)
                                    <option value="{{$portfolio->id}}" {{$portfolio->id==$item['portfolio_id']?'selected':""}}>{{$portfolio->name}}</option>
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
                            <input type="number" class="form-control" name="ticketPrice" placeholder="Price" value="{{$item['ticketPrice']}}">
                            @error('ticketPrice')
                                <label for="ticketPrice" class="error">{{$message}}</label>
                            @enderror
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-lg-3">
                            <label>Status</label>
                            <select class="form-control" name="status">
                                <option value="1" {{$item['status']==1?'selected':""}}>Đang diễn ra</option>
                                <option value="2" {{$item['status']==2?'selected':""}}>Sắp diễn ra</option>
                                <option value="3" {{$item['status']==3?'selected':""}}>Đã diễn ra</option>
                                <option value="0" {{$item['status']==0?'selected':""}}>Chờ lần sau</option>
                            </select>
                            @error('status')
                                <label for="status" class="error">{{$message}}</label>
                            @enderror
                        </div>
                    </div>
                </div>
                <footer class="panel-footer">
                    <button type="submit" class="btn btn-info btn-fill">Edit</button>
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
                    console.log('Done! Here is the image info: ', result.info.secure_url);
                    document.forms['register-form']['thumbnail'].value += result.info.secure_url + ',';

                    document.getElementById('preview-img').innerHTML += `<img src="${result.info.secure_url}" class="img-thumbnail img-200px">`;
                }
            }
        )

        $('#upload_widget').click(function () {
            myWidget.open();
        });
        CKEDITOR.replace( 'editor' );
    </script>
@endsection
