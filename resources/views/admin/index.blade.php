@extends('admin.admin_dashboard')
@section('admin')

@php
$date = date('d F Y');
$today = App\Models\Order::where('order_date',$date)->whereIn('status', ['confirm', 'deliverd'])->sum('amount');

$month = date('F');
$month = App\Models\Order::where('order_month',$month)->whereIn('status', ['confirm', 'deliverd'])->sum('amount');


$year = date('Y');
$year = App\Models\Order::where('order_year',$year)->whereIn('status', ['confirm', 'deliverd'])->sum('amount');

$pending = App\Models\Order::where('status','pending')->get();
$deliverd = App\Models\Order::where('status','deliverd')->get();

$vendor = App\Models\User::where('status','active')->where('role','vendor')->get();

$admin = App\Models\User::where('status','active')->where('role','admin')->get();

$customer = App\Models\User::where('status','active')->where('role','user')->get();

@endphp





<div class="page-content">

    <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
        <div class="col">
            <div class="card radius-10 bg-gradient-deepblue">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <a href="{{route('search-by-date')}}" style="color:white">
                            <h5 class="mb-0 text-white">₦{{number_format($today) }}</h5>
                        </a>
                        <div class="ms-auto">
                            <i class='bx bx-cart fs-3 text-white'></i>
                        </div>
                    </div>
                    <div class="progress my-3 bg-light-transparent" style="height:3px;">
                        <div class="progress-bar bg-white" role="progressbar" style="width: 55%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <div class="d-flex align-items-center text-white">
                        <a href="{{route('search-by-date')}}" style="color:white">
                            <p class="mb-0">Today's Sale</p>
                        </a>
                        <p class="mb-0 ms-auto"><span><i class='bx bx-up-arrow-alt'></i></span></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card radius-10 bg-gradient-orange">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <a href="{{route('search-by-month')}}" style="color:white">
                            <h5 class="mb-0 text-white">₦{{ number_format($month) }}</h5>
                        </a>
                        <div class="ms-auto">
                            <i class='bx bx-dollar fs-3 text-white'></i>
                        </div>
                    </div>
                    <div class="progress my-3 bg-light-transparent" style="height:3px;">
                        <div class="progress-bar bg-white" role="progressbar" style="width: 55%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <div class="d-flex align-items-center text-white">
                        <a href="{{route('search-by-month')}}" style="color:white">
                            <p class="mb-0">Monthly Sale (Confirmed & Delivered)</p>
                        </a>
                        <p class="mb-0 ms-auto"><span><i class='bx bx-up-arrow-alt'></i></span></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card radius-10 bg-gradient-ohhappiness">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <a href="{{route('search-by-year')}}" style="color:white">
                            <h5 class="mb-0 text-white">₦{{ number_format($year) }}</h5>
                        </a>
                        <div class="ms-auto">
                            <i class='bx bx-group fs-3 text-white'></i>
                        </div>
                    </div>
                    <div class="progress my-3 bg-light-transparent" style="height:3px;">
                        <div class="progress-bar bg-white" role="progressbar" style="width: 55%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <div class="d-flex align-items-center text-white">
                        <a href="{{route('search-by-year')}}" style="color:white">
                            <p class="mb-0">Yearly Sale (Confirmed & Delivered)</p>
                        </a>
                        <p class="mb-0 ms-auto"><span><i class='bx bx-up-arrow-alt'></i></span></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card radius-10 bg-gradient-ibiza">
                <div class="card-body">
                    <div class="d-flex align-items-center text-white">
                        <a href="{{route('search-by-pending')}}">
                            <h5 class="mb-0 text-white">{{ count($pending) }}</h5>
                        </a>
                        <div class="ms-auto">
                            <i class='bx bx-envelope fs-3 text-white'></i>
                        </div>
                    </div>
                    <div class="progress my-3 bg-light-transparent" style="height:3px;">
                        <div class="progress-bar bg-white" role="progressbar" style="width: 55%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <div class="d-flex align-items-center text-white">
                        <a href="{{route('search-by-pending')}} " style="color:white">
                            <p class="mb-0">Pending Orders</p>
                        </a>
                        <p class="mb-0 ms-auto"><span><i class='bx bx-up-arrow-alt'></i></span></p>
                    </div>
                </div>
            </div>
        </div>



        <div class="col">
            <div class="card radius-10 bg-gradient-ibiza">
                <a href="/all/vendor">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <h5 class="mb-0 text-white">{{ count($vendor) }}</h5>
                            <div class="ms-auto">
                                <i class='bx bx-envelope fs-3 text-white'></i>
                            </div>
                        </div>
                        <div class="progress my-3 bg-light-transparent" style="height:3px;">
                            <div class="progress-bar bg-white" role="progressbar" style="width: 55%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="d-flex align-items-center text-white">
                            <p class="mb-0">Total Vendor </p>
                            <p class="mb-0 ms-auto"><span><i class='bx bx-up-arrow-alt'></i></span></p>
                        </div>
                    </div>
                </a>
            </div>
        </div>




        <div class="col">
            <div class="card radius-10 bg-gradient-ibiza">
                <a href="/all/user">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <h5 class="mb-0 text-white">{{ count($customer) }}</h5>
                            <div class="ms-auto">
                                <i class='bx bx-envelope fs-3 text-white'></i>
                            </div>
                        </div>
                        <div class="progress my-3 bg-light-transparent" style="height:3px;">
                            <div class="progress-bar bg-white" role="progressbar" style="width: 55%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="d-flex align-items-center text-white">
                            <p class="mb-0">Total User </p>
                            <p class="mb-0 ms-auto"><span><i class='bx bx-up-arrow-alt'></i></span></p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col">
            <div class="card radius-10 bg-gradient-deepblue">
                <a href="/all/admin">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <h5 class="mb-0 text-white">{{ count($admin) }}</h5>
                            <div class="ms-auto">
                                <i class='bx bx-envelope fs-3 text-white'></i>
                            </div>
                        </div>
                        <div class="progress my-3 bg-light-transparent" style="height:3px;">
                            <div class="progress-bar bg-white" role="progressbar" style="width: 55%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="d-flex align-items-center text-white">
                            <p class="mb-0">Total Admin</p>
                            <p class="mb-0 ms-auto"><span><i class='bx bx-up-arrow-alt'></i></span></p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col">
            <div class="card radius-10 bg-gradient-orange">
                <a href="/admin/delivered/order">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <h5 class="mb-0 text-white">{{ count($deliverd) }}</h5>
                            <div class="ms-auto">
                                <i class='bx bx-envelope fs-3 text-white'></i>
                            </div>
                        </div>
                        <div class="progress my-3 bg-light-transparent" style="height:3px;">
                            <div class="progress-bar bg-white" role="progressbar" style="width: 55%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="d-flex align-items-center text-white">
                            <p class="mb-0">Total Delivered</p>
                            <p class="mb-0 ms-auto"><span><i class='bx bx-up-arrow-alt'></i></span></p>
                        </div>
                    </div>
                </a>
            </div>
        </div>



    </div><!--end row-->





    @php

    $orders = App\Models\Order::where('status','pending')->orderBy('id','DESC')->limit(10)->get();
    @endphp

    <div class="card radius-10">
        <div class="card-body">
            <div class="d-flex align-items-center">
                <div>
                    <h5 class="mb-0">Orders Summary</h5>
                </div>
                <div class="font-22 ms-auto"><i class="bx bx-dots-horizontal-rounded"></i>
                </div>
            </div>
            <hr>
            <div class="table-responsive">
                <table class="table align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Sl</th>
                            <th>Date</th>
                            <th>Invoice</th>
                            <th>Amount</th>
                            <th>Payment</th>
                            <th>Status</th>
                        </tr>
                    </thead>


                    <tbody>

                        @foreach($orders as $key => $order)
                        <tr>
                            <td>{{ $key+1 }}</td>

                            <td>{{ $order->order_date }}</td>
                            <td><a href="/admin/order/details/{{ $order->id }}"> {{ $order->invoice_no }} </a></td>
                            <td>₦{{ number_format($order->amount,0) }}</td>
                            <td>{{ $order->payment_method }}</td>
                            <td>
                                <div class="badge rounded-pill bg-light-info text-info w-100">
                                    {{ $order->status  }}
                                </div>
                            </td>

                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

@endsection
