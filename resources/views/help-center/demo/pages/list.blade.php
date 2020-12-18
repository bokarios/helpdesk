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
                                                <th scope="col">عنوان الشكوى </th>
                                                <th scope="col">تفاصيل الشكوى </th>
                                                <th scope="col">الفئة</th>
                                                <th scope="col"> الحاله</th>
                                            </tr>
                                        </thead>
                                        <tbody class="list">
                                            <?php $i = 1; ?>
                                            @foreach ($tickets as $ticket)
                                                <tr>
                                                    <th scope="row">{{ $i }}</th>
                                                    <td>
                                                        <a href="{{ route('demo.dashboard.details', $ticket->id) }}">
                                                            {{ $ticket->subject }}
                                                        </a>
                                                    </td>
                                                    <td>
                                                        {{ Str::limit($ticket->replies()->first()->body, 24) }}
                                                    </td>
                                                    <td>
                                                        @foreach ($ticket->categories as $category)
                                                            <span class="badge badge-primary p-2">
                                                                {{ Str::title($category->display_name) }}
                                                            </span>    
                                                        @endforeach
                                                    </td>
                                                    <td>
                                                        @if ($ticket->status == 'open')
                                                            <span class="status on-progress">
                                                                مفتوحة
                                                            </span>
                                                        @endif
                                                        @if ($ticket->status == 'closed')
                                                            <span class="status bg-secondary">
                                                                مغلقة
                                                            </span>
                                                        @endif
                                                        @if ($ticket->status == 'pending')
                                                            <span class="status bg-warning">
                                                                معلقة
                                                            </span>
                                                        @endif
                                                        @if ($ticket->status == 'spam')
                                                            <span class="status bg-danger">
                                                                عشوائية
                                                            </span>
                                                        @endif
                                                    </td>
                                                </tr>
                                                <?php $i++; ?>    
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