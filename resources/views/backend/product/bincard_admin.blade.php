@extends('admin.admin_dashboard')
@section('admin')

<div class="page-content">
  <!--breadcrumb-->
  <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Bin Card</div>
    <div class="ps-3">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0 p-0">
          <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
          </li>
          <li class="breadcrumb-item active" aria-current="page">{{$product_name}}<span class="badge rounded-pill bg-danger"></span> </li>
        </ol>
      </nav>
    </div>
    <div class="ms-auto">

    </div>
  </div>
  <!--end breadcrumb-->

  <hr />
  <div class="card">
    <div class="card-body">
      <div class="table-responsive">
        <table id="example" class="table table-striped table-bordered" style="width:100%">
          <thead>
            <tr>
              <th>SN</th>
              <th>User type </th>
              <th>Date </th>
              <th>Particular</th>
              <th>QTY In </th>
              <th>QTY Out </th>
              <th>Balance </th>
              <th>Action </th>
              <th>Remark </th>
            </tr>
          </thead>
          <tbody>
            @foreach($stocks as $key => $stock)
            <tr>
              <td> {{ $key+1 }} </td>
              <td>{{ $stock->user_type }}</td>
              <td>{{ Carbon\Carbon::parse ($stock->reg_date)->format('Y-m-d')}}</td>
              <td>{{ $stock->user->name }} {{$stock->user->matno}}</td>
              <td>{{ $stock->item_in }}</td>
              <td>{{ $stock->item_out }}</td>

              <td>{{ $stock->item_balance }}</td>
              <td>
                @if ($stock->id != 1)
                <a href="{{ route('remove.stock', ['id' => $stock->id]) }}">[Remove]</a>
                @else

                {{ $stock->id }}
                @endif
              </td>


              <td> </td>


            </tr>
            @endforeach


          </tbody>
          <tfoot>
            <tr>
              <th>SN</th>
              <th>User type </th>
              <th>Date </th>
              <th>Particular</th>
              <th>QTY In </th>
              <th>QTY Out </th>
              <th>Balance </th>
              <th>Action </th>
              <th>Remark </th>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>
  </div>



</div>




@endsection
