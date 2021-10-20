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
                                        <option value="{{$portfolio->id}}" {{isset($portfolioHasQuery) && $portfolio->id == $portfolioHasQuery? 'selected' : ''}}>{{$portfolio->name}}</option>
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
                            <th>Thumbnail</th>
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
                                    {{$item->portfolio->name}}
                                </td>
                                <td>{{number_format($item['ticketPrice'])}}</td>
                                <td>
                                    <img style="width: 30%" src="{{$item->FirstThumbnail}}" alt="">
                                </td>
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
                @include('admin.layout.include.paginate')
{{--                Start facebook For Developers, tạo bình luận--}}
                <div id="fb-root"></div>
                <div class="fb-comments" data-href="https://developers.facebook.com/docs/plugins/comments#configurator" data-width="" data-numposts="5"></div>
{{--                End facebook For Developers, tạo bình luận--}}
            </div>
        </section>
    </div>
@endsection

@section('script')
    <!--Start of Tawk.to Script-->
    <script type="text/javascript">
        var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
        (function(){
            var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
            s1.async=true;
            s1.src='https://embed.tawk.to/6170106f86aee40a573782e7/1fies0ctc';
            s1.charset='UTF-8';
            s1.setAttribute('crossorigin','*');
            s0.parentNode.insertBefore(s1,s0);
        })();
    </script>
    <!--End of Tawk.to Script-->
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v12.0" nonce="1NFmAnm6"></script>
    <script>
        document.forms['searchForm']['category'].onchange = function (){
            document.forms['searchForm'].submit();
        };
    </script>
@endsection
