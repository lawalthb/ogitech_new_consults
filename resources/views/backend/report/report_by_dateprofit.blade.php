@extends('admin.admin_dashboard')
@section('admin')

<div class="page-content">
  <!--breadcrumb-->
  <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">All Order By Date Report</div>
    <div class="ps-3">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0 p-0">
          <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
          </li>
          <li class="breadcrumb-item active" aria-current="page">Order By Date Report</li>
        </ol>
      </nav>
    </div>
    <div class="ms-auto">
      <div class="btn-group">

      </div>
    </div>
  </div>
  <!--end breadcrumb-->
  <h3> Seach By Date : {{ $date_range }}</h3>
  <hr />
  <div class="card">
    <div class="card-body">
      <div class="table-responsive">
        <table id="example" class="table table-striped table-bordered" style="width:100%">
          <thead>
            <tr>
              <th>SN</th>
              <th>Date </th>
              <th>Product </th>
              <th>Purchased Price </th>
              <th>Sold Price </th>
              <th>Margin </th>

            </tr>
          </thead>
          <tbody>
            @php
            $totalMargin =0;
            @endphp
            @foreach($profits as $key => $item)
            <tr>
              <td> {{ $key+1 }} </td>
              <td>{{ $item->created_at->format('Y-m-d') }}</td>
              <td>{{ $item->product->product_name }}</td>
              <td>₦{{ number_format($item->purchase_price,0) }}</td>
              <td>₦{{ number_format($item->price,0) }}</td>
              <td>@php
                echo $margin = $item->price - $item->purchase_price;
                $totalMargin += $margin;
                @endphp</td>

            </tr>
            @endforeach


          </tbody>
          <tfoot>
            <tr>
              <th>SN</th>
              <th>Date </th>
              <th>Product </th>
              <th>Purchased Price </th>
              <th>Sold Price </th>
              <th>₦{{ number_format($totalMargin,0)}} </th>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>
  </div>



</div>




@endsection