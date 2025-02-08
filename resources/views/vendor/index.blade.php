@extends('vendor.vendor_dashboard')
@section('vendor')

@php
$id = Auth::user()->id;
$vendorId = App\Models\User::find($id);
$status = $vendorId->status;
@endphp

<div class="page-content">
    <!-- Vendor Status Alert -->
    @if($status === 'active')
    <div class="alert border-0 border-start border-5 border-success alert-dismissible fade show">
        <div class="text-success">Vendor Account Status: Active</div>
    </div>
    @else
    <div class="alert border-0 border-start border-5 border-danger alert-dismissible fade show">
        <div class="text-danger">Vendor Account Status: Inactive</div>
        <p>Please wait for admin approval</p>
    </div>
    @endif

    <!-- Stats Cards Row -->
    <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
        <div class="col">
            <div class="card radius-10 bg-gradient-deepblue">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <h5 class="mb-0 text-white">{{ $totalOrders }}</h5>
                        <div class="ms-auto">
                            <i class='bx bx-cart fs-3 text-white'></i>
                        </div>
                    </div>
                    <div class="progress my-3 bg-light-transparent" style="height:3px;">
                        <div class="progress-bar bg-white" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <div class="d-flex align-items-center text-white">
                        <p class="mb-0">Total Orders</p>
                        <p class="mb-0 ms-auto">Pending: {{ $pendingOrders }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card radius-10 bg-gradient-orange">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <h5 class="mb-0 text-white">₦{{ number_format($totalRevenue) }}</h5>
                        <div class="ms-auto">
                            <i class='bx bx-dollar fs-3 text-white'></i>
                        </div>
                    </div>
                    <div class="progress my-3 bg-light-transparent" style="height:3px;">
                        <div class="progress-bar bg-white" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <div class="d-flex align-items-center text-white">
                        <p class="mb-0">Total Revenue</p>
                        <p class="mb-0 ms-auto">
                            <i class='bx bx-up-arrow-alt'></i>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card radius-10 bg-gradient-ohhappiness">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <h5 class="mb-0 text-white">{{ $deliveredOrders }}</h5>
                        <div class="ms-auto">
                            <i class='bx bx-package fs-3 text-white'></i>
                        </div>
                    </div>
                    <div class="progress my-3 bg-light-transparent" style="height:3px;">
                        <div class="progress-bar bg-white" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <div class="d-flex align-items-center text-white">
                        <p class="mb-0">Delivered Orders</p>
                        <p class="mb-0 ms-auto">{{ number_format(($deliveredOrders/$totalOrders) * 100, 1) }}%</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card radius-10 bg-gradient-ibiza">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <h5 class="mb-0 text-white">{{ $totalProducts }}</h5>
                        <div class="ms-auto">
                            <i class='bx bx-store fs-3 text-white'></i>
                        </div>
                    </div>
                    <div class="progress my-3 bg-light-transparent" style="height:3px;">
                        <div class="progress-bar bg-white" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <div class="d-flex align-items-center text-white">
                        <p class="mb-0">Total Products</p>
                        <p class="mb-0 ms-auto">Out: {{ $outOfStockProducts }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Charts Row -->
    <div class="row">
        <div class="col-12 col-lg-8">
            <div class="card radius-10">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <h6 class="mb-0">Revenue Statistics {{ date('Y') }}</h6>

                    </div>
                    <div id="chart1"></div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-4">
            <div class="card radius-10">
                <div class="card-body">
                    <h6 class="mb-0">Order Status</h6>
                    <div id="chart2"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Orders Table -->
    <div class="card radius-10">
        <div class="card-body">
            <div class="d-flex align-items-center">
                <div>
                    <h5 class="mb-0">Recent Orders</h5>
                </div>
            </div>
            <hr>
            <div class="table-responsive">
                <table class="table align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Order ID</th>
                            <th>Product</th>
                            <th>Customer</th>
                            <th>Date</th>
                            <th>Price</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($recentOrders ?? [] as $order)
                        <tr>
                            <td>#{{ $order->id }}</td>
                            <td>{{ $order->product->product_name }}</td>
                            <td>{{ $order->order->user->name }}</td>
                            <td>{{ $order->created_at->format('d M Y') }}</td>
                            <td>₦{{ number_format($order->price) }}</td>
                            <td>
                                <span class="badge bg-{{ $order->order->status == 'deliverd' ? 'success' : 'warning' }}">
                                    {{ ucfirst($order->order->status) }}
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('vendor.order.details', $order->order_id) }}" class="btn btn-primary btn-sm">View</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
    // Revenue Chart
    var options1 = {
        series: [{
            name: 'Revenue',
            data: [@foreach($monthlySales as $sale) {{ $sale->total }}, @endforeach]
        }],
        chart: {
            type: 'area',
            height: 350,
            toolbar: { show: false }
        },
        xaxis: {
            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
        },
        colors: ['#0d6efd']
    };
    new ApexCharts(document.querySelector("#chart1"), options1).render();

    // Order Status Chart
    var options2 = {
        series: [{{ $deliveredOrders }}, {{ $pendingOrders }}],
        chart: {
            type: 'donut',
            height: 300
        },
        labels: ['Delivered', 'Pending'],
        colors: ['#0d6efd', '#ffc107']
    };
    new ApexCharts(document.querySelector("#chart2"), options2).render();
</script>


@endsection
