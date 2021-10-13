@extends('admin.layout.master-layout')

@section('title')
    <title>Delete Event</title>
@endsection

@section('breadcrumb')
    <header class="page-header">
        <h2>Delete Event</h2>

        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="#">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li><span>Delete Event</span></li>
            </ol>

            <div class="sidebar-right-toggle" ></div>
        </div>
    </header>
@endsection

@section('content')
    <div class="col-md-12">
        <form action="/delete?id={{$id}}" method="post">
            @csrf
            <section class="panel">
                <header class="panel-heading">
                    <div class="panel-actions">
                        <a href="#" class="fa fa-caret-down"></a>
                    </div>
                    <h2 class="panel-title">Are you sure <b>Delete</b> ?</h2>
                </header>
                    <div class="panel-body">
                        <form >
                            <section class="panel">
                                <div class="col-md-12">
                                    <br>
                                    <div class="toggle" data-plugin-toggle="">
                                        <div class="col-md-12 mb-lg">
                                            <label>event Name:</label>
                                            <h4>{{$eventName}}</h4>
                                        </div>
                                        <div class="col-md-12 mb-lg">
                                            <label>band Names</label>
                                            <h4>{{$bandNames}}</h4>
                                        </div>
                                        <div class="col-md-12 mb-lg">
                                            <label>ID Event</label>
                                            <h4>{{$id}}</h4>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </form>
                    </div>
                </header>
                <footer class="panel-footer">
                    <button type="submit" class="btn btn-primary">Yes Delete It</button>
                    <a href="/table"><button type="button" class="btn btn-danger pull-right">No Back to list</button></a>
                </footer>
            </section>
        </form>
    </div>
@endsection
