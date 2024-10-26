@extends('admin.admin_dashboard')
@section('admin')

<div class="page-content">
  <!--breadcrumb-->
  <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">All Payment By Month Report</div>
    <div class="ps-3">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0 p-0">
          <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
          </li>
          <li class="breadcrumb-item active" aria-current="page">Payment By Month Report <span class="badge rounded-pill bg-danger"> Total = ₦{{number_format($sumAmount,0)}}</span></li>
        </ol>
      </nav>
    </div>
    <div class="ms-auto">
      <div class="btn-group">

      </div>
    </div>
  </div>
  <!--end breadcrumb-->
  <h3> Seach By Month - Year : {{ $month }} - {{ $year }}</h3>
  <hr />
  <div class="card">
    <div class="card-body">
      <div class="table-responsive">
        <table id="example" class="table table-striped table-bordered" style="width:100%">
          <thead>
            <tr>
              <th>SN</th>
              <th>Date </th>
              <th>Name </th>
              <th>Email </th>
              <th>Order Number </th>
              <th>Amount </th>
              <th>Status </th>

            </tr>
          </thead>
          <tbody>
            @foreach($orders as $key => $item)
            <tr>
              <td> {{ $key+1 }} </td>
              <td> {{ Carbon\Carbon::parse ($item->paid_at)->format('Y-m-d')}}</td>
              <td>{{ $item->user->name }}</td>
              <td>{{ $item->user->email }}</td>
              <td>{{ $item->invoice_no }}</td>
              <td>₦{{ number_format($item->amount,0) }}</td>
              <td> {{ $item->status }}</td>



            </tr>
            @endforeach


          </tbody>
          <tfoot>
            <tr>
              <th>SN</th>
              <th>Date </th>
              <th>Name </th>
              <th>Email </th>
              <th>Order Number </th>
              <th>Amount </th>
              <th>Status </th>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>
  </div>



</div>




@endsection