@extends('admin.layout.master-layout')

@section('title')
    <title>Form</title>
@endsection

@section('breadcrumb')
    <header class="page-header">
        <h2>Form Contact</h2>

        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="#">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li><span>Form Contact</span></li>
            </ol>

            <div class="sidebar-right-toggle" ></div>
        </div>
    </header>
@endsection

@section('content')
    <div class="col-md-12">
        <form name="register-form" action="/contact" method="post">
            @csrf
            <section class="panel">
                <header class="panel-heading">
                    <div class="panel-actions">
                        <a href="#" class="fa fa-caret-down"></a>
                    </div>
                    <h2 class="panel-title">Contact</h2>
                </header>
                <div class="panel-body">
                    @if(session('success'))
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <strong>{{ session('success') }}</strong>
                        </div>
                    @endif
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
                            <label>Email</label>
                            <input type="text" class="form-control" name="nameEmail" placeholder="name Email">
                            @error('nameEmail')
                            <label for="nameEmail" class="error">{{$message}}</label>
                            @enderror
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-lg-6">
                            <label>Name</label>
                            <input type="text" class="form-control" name="nameSend" placeholder="name Send">
                            @error('nameSend')
                            <label for="nameSend" class="error">{{$message}}</label>
                            @enderror
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-lg-6">
                            <label>Subject</label>
                            <input type="text" class="form-control" name="subject" placeholder="Subject">
                            @error('subject')
                            <label for="subject" class="error">{{$message}}</label>
                            @enderror
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-lg-12">
                            <label>Message</label>
                            <textarea rows="4" cols="80" class="form-control" name="message" placeholder="Here can be your message"></textarea>
                            @error('message')
                            <label for="message" class="error">{{$message}}</label>
                            @enderror
                        </div>
                    </div>
                </div>
                <footer class="panel-footer">
                    <button type="submit" class="btn btn-info btn-fill">Send</button>
                    <button type="reset" class="btn btn-info btn-fill">Reset</button>
                </footer>
            </section>
        </form>
    </div>
@endsection

@section('script')
    <script type="text/javascript">
        CKEDITOR.replace( 'editor' );
    </script>
@endsection
