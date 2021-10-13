@extends('admin.layout.master-layout')

@section('title')
    <title>Detail Event</title>
@endsection

@section('breadcrumb')
    <header class="page-header">
        <h2>Detail Event</h2>

        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="#">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li><span>Detail Event</span></li>
            </ol>

            <div class="sidebar-right-toggle" ></div>
        </div>
    </header>
@endsection

@section('content')
    <div class="col-md-12">
        <form action="#">
            @csrf
            <section class="panel">
                <header class="panel-heading">
                </header>
                <div class="panel-body">
                    <form >
                        <section class="panel">
                            <div class="col-md-12">
                                <br>
                                <div>
                                    <div class="col-md-12 mb-lg">
                                        <label>Event Name:</label>
                                        <h4>{{$eventName}}</h4>
                                    </div>
                                    <div class="col-md-12 mb-lg">
                                        <label>Band Names:</label>
                                        <h4>{{$bandNames}}</h4>
                                    </div>
                                    <div class="col-md-12 mb-lg">
                                        <label>Start Date:</label>
                                        <h4>{{date("d/m/Y", strtotime($startDate))}}</h4>
                                    </div>
                                    <div class="col-md-12 mb-lg">
                                        <label>End Date:</label>
                                        <h4>{{date("d/m/Y", strtotime($endDate))}}</h4>
                                    </div>
                                    <div class="col-md-12 mb-lg">
                                        <label>Portfolio:</label>
                                        <h4>{{$portfolio}}</h4>
                                    </div>
                                    <div class="col-md-12 mb-lg">
                                        <label>ticketPrice :</label>
                                        <h4>{{number_format($ticketPrice)}}</h4>
                                    </div>
                                    <div class="col-md-12 mb-lg">
                                        <label>Status :</label>
                                    @switch($status)
                                        @case(1)
                                            <h4>Đang diễn ra</h4>
                                        @break
                                        @case(2)
                                            <h4>Sắp diễn ra</h4>
                                        @break
                                        @case(3)
                                            <h4>Đã diễn ra</h4>
                                        @break
                                    @endswitch
                                    </div>
                                </div>
                            </div>
                        </section>
                    </form>
                </div>
            </section>
        </form>
    </div>
    <footer class="panel-footer">
        <a href="/table"><button class="btn btn-danger">Back to list</button></a>
        <a href="/edit?id={{$id}}"><button class="btn btn-primary">Edit</button></a>
        <a href="/delete?id={{$id}}"><button class="btn btn-primary">Delete</button></a>
    </footer>
@endsection
