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
                @if(session('success'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <strong>{{ session('success') }}</strong>
                    </div>
                @endif
                <form action="/search" method="get" name ='searchForm'>
                    @csrf
                    <div class="row">
                        <div class="col-sm-12 col-md-3">
                            <div class="form-group">
                                <label>Portfolio</label>
                                <select id="company" class="form-control" name="portfolio_id" required="">
                                    <option value="0" selected disabled>--All--</option>
                                    @foreach($portfolios as $portfolio)
                                        <option value="{{$portfolio->id}}" {{isset($portfolioHasQuery) && $portfolio->id==$portfolioHasQuery  ? 'selected':""}}>{{$portfolio->name}}</option>
                                    @endforeach
                                </select>
                                <label class="error" for="company"></label>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4">
                            <div class="form-group">
                                <label>Sort</label>
                                <select id="company" class="form-control" name="sort" required="">
                                    <option value="0" selected disabled>--All--</option>
                                    <option value="nameAsc" {{isset($sort) && $sort == 'nameAsc'? 'selected' : ''}}>
                                        Sort by name a-z
                                    </option>
                                    <option
                                        value="nameDesc" {{isset($sort) && $sort == 'nameDesc'? 'selected' : ''}}>
                                        Sort by name z-a
                                    </option>
                                    <option
                                        value="priceAsc" {{isset($sort) && $sort == 'priceAsc'? 'selected' : ''}}>
                                        Sort by price low to height
                                    </option>
                                    <option
                                        value="priceDesc" {{isset($sort) && $sort == 'priceDesc'? 'selected' : ''}}>
                                        Sort by price height to low
                                    </option>
                                </select>
                                <label class="error" for="company"></label>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-5">
                        </div>
                        <div class="col-sm-12 col-md-5">
                            <label>Search</label>
                            <div class="input-group input-search">
                                <input type="text" class="form-control" name="keyword" placeholder="Search..." value="{{$keywordHasQuery??""}}">
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
                            Showing {{($items->currentPage() -1)* $limit + 1}} to {{($items->currentPage() -1)* $limit + $limit }} of {{$totalItem->count()}} item, total page {{$items->lastPage()}}
                        </div>
                    </div><div class="col-sm-12 col-md-6">
                        <div class="dataTables_paginate paging_bs_normal" id="datatable-editable_paginate">
                            @php
                                $link_limit = 7;
                            @endphp
                            @if($items->lastPage() >1)
                                <ul class="pagination">
{{--                                    chỉ hiển thị khi lớn hơn 1--}}
                                    @if($items->currentPage()>1)
                                        <li>
                                            <a href="{{$items->url(1)}}" class="page-link">
                                                First
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{$items->url($items->currentPage()-1)}}" class="page-link">
                                        <span class="fa fa-chevron-left">
                                        </span>
                                            </a>
                                        </li>
                                    @endif
                                    @for($i = 1;$i<= $items->lastPage(); $i++ )
                                        @php
                                            if(isset($link_limit) && isset($items)){
                                                $half_total_links = floor($link_limit / 2);
                                                $from = $items->currentPage() - $half_total_links;
                                                $to = $items->currentPage() + $half_total_links;
                                                if ($items->currentPage() < $half_total_links) {
                                                $to += $half_total_links - $items->currentPage();
                                                }
                                                if ($items->lastPage() - $items->currentPage() < $half_total_links) {
                                                $from -= $half_total_links - ($items->lastPage() - $items->currentPage()) - 1;
                                                }
                                            }
                                        @endphp
                                        @if ($from < $i && $i<$to)
                                            <li class="{{$items->currentPage() ==$i ? 'active' : ''}}">
                                                <a href="{{$items->url($i)}}" class="page-link">{{$i}}</a>
                                            </li>
                                        @endif
                                    @endfor
{{--                                    chỉ hiển thị khi currentPage < lastPage--}}
                                    @if($items->currentPage() < $items->lastPage())
                                        <li>
                                            <a href="{{ $items->url($items->currentPage() + 1) }}" class="page-link">
                                        <span class="fa fa-chevron-right">
                                        </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ $items->url($items->lastPage()) }}" class="page-link">
                                                Last
                                            </a>
                                        </li>
                                    @endif
                                </ul>
                            @endif
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
