@extends('vendor.vendor_dashboard')
@section('vendor')


<div class="page-content">
  <!--breadcrumb-->
  <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Statement</div>
    <div class="ps-3">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0 p-0">
          <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
          </li>
         
        </ol>
      </nav>
    </div>
    <div class="ms-auto">

    </div>
  </div>
  <!--end breadcrumb-->

  <h3> Statement for: {{$username}}</h3>
  <hr />
  <div class="card">
    <div class="card-body">
      <div class="table-responsive">
        <table id="example" class="table table-striped table-bordered" style="width:100%">
          <thead>
            <tr>
              <th>SN</th>
              <th>Date </th>
              <th>Particular</th>
              <th>Amount In (stock) </th>
              <th>Amount Out (Withdraw)</th>

              <th>Balance </th>
              <th>Comment </th>

            </tr>
          </thead>
          <tbody>
            @php
            $balance =0;
            @endphp
            @foreach($statements as $key => $item)
            <tr>
              <td> {{ $key+1 }} </td>

              <td>{{ $item->created_at }}</td>
              <td>{{ $item->reason }}</td>
              <td>₦{{ number_format($item->amount_in,0) }}</td>
              <td>


                ₦{{ number_format($item->amount_out,0) }}</td>
              <td> @php
                $balance =$balance+$item->amount_in-$item->amount_out;
                @endphp
                ₦{{ number_format($balance,0) }}</td>
              <td>{{ $item->comment }}</td>

            </tr>
            @endforeach


          </tbody>
          <tfoot>
            <tr>
              <th>SN</th>
              <th>Date </th>
              <th>Particular</th>
              <th>Amount In (stock) </th>
              <th>Amount Out (Withdraw)</th>
              <th>Balance </th>

              <th>Comment </th>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>
  </div>



</div>




@endsection