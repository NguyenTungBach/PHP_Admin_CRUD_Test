@extends('admin.layout.master-layout')

@section('title')
    <title>Update All Price</title>
@endsection

@section('breadcrumb')
    <header class="page-header">
        <h2>Update All Price</h2>

        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="#">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li><span>Update All Price</span></li>
            </ol>

            <div class="sidebar-right-toggle" ></div>
        </div>
    </header>
@endsection

@section('content')
    <div class="col-md-12">
        <form name="register-form" action="/updateList" method="post">
            @csrf
            <section class="panel">
                <header class="panel-heading">
                    <div class="panel-actions">
                        <a href="#" class="fa fa-caret-down"></a>
                    </div>
                    <h2 class="panel-title">Update All ID @foreach($items as $item){{$item['id']}},@endforeach </h2>
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
                        <div class="col-lg-4">
                            <label>Ticket Price</label>
                            <input type="number" class="form-control" name="ticketPrice" placeholder="Price">
                            @error('ticketPrice')
                            <label for="ticketPrice" class="error">{{$message}}</label>
                            @enderror
                        </div>
                        <input type="hidden" class="form-control" name="arrayIdUpdate"
                               value="@foreach($items as $item){{$item['id']}},@endforeach">
                    </div>
                </div>
                <footer class="panel-footer">
                    <button type="submit" class="btn btn-info btn-fill">Update All Price</button>
                    <a href="/table"><button type="button" class="btn btn-danger pull-right">Cancel</button></a>
                </footer>
            </section>
        </form>
    </div>
@endsection

