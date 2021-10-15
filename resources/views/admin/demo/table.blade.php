@extends('admin.layout.master-layout')

@section('title')
    <title>Table</title>
@endsection

@section('breadcrumb')
    <header class="page-header">
        <h2>Table Create</h2>

        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="#">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li><span>Table Create</span></li>
            </ol>

            <div class="sidebar-right-toggle" ></div>
        </div>
    </header>
@endsection

@section('content')
    <div class="col-md-12">
        <section class="panel">
            <header class="panel-heading">
                <form action="#" method="get" name ='searchForm'>
                    <div class="row">
                        <div class="col-sm-12 col-md-5">
                            <div class="form-group">
                                <label>Search</label>
                                <select id="company" class="form-control" name="category" required="">
                                    <option value="0" selected disabled>--All--</option>
                                    <option > SomeThing</option>
                                </select>
                                <label class="error" for="company"></label>
                            </div>

                        </div>
                        <div class="col-sm-12 col-md-2">
                        </div>
                        <div class="col-sm-12 col-md-5">
                            <label>Search</label>
                            <div class="input-group input-search">
                                <input type="text" class="form-control" name="keyword" placeholder="Search...">
                                <span class="input-group-btn">
								<button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
							</span>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="col-sm-12 col-md-6">

                </div>

                <div class="col-sm-12 col-md-6">

                </div>
                <!--                <hr class="separator">-->

            </header>
            <div class="panel-body" style="display: block;">
                <div class="table-responsive">
                    <table class="table mb-none">
                        <thead>
                        <tr>
                            <th>STT</th>
                            <th>Event Name</th>
                            <th>Band Names</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Portfolio</th>
                            <th>Ticket Price</th>
                            <th>Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($items as $item)
                            <tr>
                                <td>{{$item['id']}}</td>
                                <td>{{$item['eventName']}}</td>
                                <td >{{$item['bandNames']}}</td>
                                <td>{{date("d/m/Y", strtotime($item['startDate']))}}</td>
                                <td>{{date("d/m/Y", strtotime($item['endDate']))}}</td>
                                <td>
                                    @foreach($portfolios as $portfolio)
                                        {{$item->portfolio_id==$portfolio->id?$portfolio->name:""}}
                                    @endforeach
                                </td>
                                <td>{{number_format($item['ticketPrice'])}}</td>
                                <td>
                                @switch($item['status'])
                                        @case(1)
                                            Đang diễn ra
                                        @break
                                        @case(2)
                                            Sắp diễn ra
                                        @break
                                        @case(3)
                                            Đã diễn ra
                                            @break
                                        @case(0)
                                            Chờ lần sau
                                        @break
                                @endswitch
                                </td>
                                <td>
                                    <a href="/detail?id={{$item['id']}}" ><i class="fa fa-info"></i></a>
                                    <a href="/edit?id={{$item['id']}}" ><i class="fa fa-pencil"></i></a>
                                    <a href="/delete?id={{$item['id']}}" class="on-default "><i class="fa fa-trash-o"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="row datatables-footer">
                    <div class="col-sm-12 col-md-6">
                        <div class="dataTables_info" id="datatable-editable_info" role="status" aria-live="polite">
                            Showing 1 to 5 of 500 product, total page 300
                        </div>
                    </div><div class="col-sm-12 col-md-6">
                        <div class="dataTables_paginate paging_bs_normal" id="datatable-editable_paginate">
                            <ul class="pagination">
                                <li>
                                    <a href="1" class="page-link">
                                        First
                                    </a>
                                </li>
                                <li>
                                    <a href="<%= parseInt(page) - 1%>" class="page-link">
                                        <span class="fa fa-chevron-left">
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="<%= parseInt(page) - 2%>" class="page-link">1</a>
                                </li>
                                <li>
                                    <a href="<%= parseInt(page) - 1%>" class="page-link">2</a>
                                </li>

                                <li class="active">
                                    <a href="#">3</a>
                                </li>

                                <li>
                                    <a href="<%= parseInt(page) + 1%>" class="page-link">4</a>
                                </li>

                                <li>
                                    <a href="<%= parseInt(page) + 2%>" class="page-link">5</a>
                                </li>

                                <li>
                                    <a href="<%= parseInt(page) + 1%>" class="page-link">
                                        <span class="fa fa-chevron-right">
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="<%= totalPage%>" class="page-link">
                                        Last
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('script')
    <script>
        document.forms['searchForm']['category'].onchange = function (){
            document.forms['searchForm'].submit();
        };
    </script>
@endsection
