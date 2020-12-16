@extends('help-center.demo.main')

@section('title')
    Tickets list
@endsection

<!--user nav-->
@include('help-center.demo.partials._user_nav')
    
@section('content')
    
    <!--dashboard-->
    <div class="dashboard-wrapper text-righted">
        @include('help-center.demo.partials._sidebar')

        <!--content-->
        <div class="content">
            <button class="sidebar-toggle" id="sidebar-toggler">
                <i class="far fa-bars"></i>
            </button>

            <div class="parent">
                <!--table-->
                <div class="table-conrainer">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="child">
                                <div class="table-upper">
                                    <h4> الشكاوي الحاليه</h4>

                                    <a href="{{ route('demo.dashboard.new') }}">
                                        <i class="far fa-plus"></i>
                                        شكوي جديده
                                    </a>
                                </div>
                                <div class="tableScroll">
                                    <table class="table table table-fixed">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">عنوان الشكوي </th>
                                                <th scope="col">الفئة</th>
                                                <th scope="col"> الحاله</th>
                                            </tr>
                                        </thead>
                                        <tbody class="list">
                                            @foreach ($tickets as $ticket)
                                                <tr>
                                                    <th scope="row">{{ $ticket->id }}</th>
                                                    <td>
                                                        <a href="{{ route('demo.dashboard.details', 1) }}">
                                                            {{ $ticket->subject }}
                                                        </a>
                                                    </td>
                                                    <td>
                                                        {{ $ticket->categories[0]['display_name'] }}
                                                    </td>
                                                    <td>
                                                        <span class="status on-progress">
                                                            {{ $ticket->status }}
                                                        </span>
                                                    </td>
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
        </div>
    </div>

@endsection