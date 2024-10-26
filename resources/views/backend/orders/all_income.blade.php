@extends('admin.admin_dashboard')
@section('admin')

<div class="page-content">
  <!--breadcrumb-->
  <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">All Payment</div>
    <div class="ps-3">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0 p-0">
          <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
          </li>
          <li class="breadcrumb-item active" aria-current="page">All Expenses <span class="badge rounded-pill bg-danger"> Total = ₦{{number_format($totalAmount,0)}}</span></li>
      </nav>
    </div>
    <div class="ms-auto">
      <div class="btn-group">
        <a href="{{ route('admin.make.payment') }}" class="btn btn-primary">Add Payment</a>
      </div>
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
              <th>Sn</th>
              <th>Date Time</th>
              <th>Account Name</th>

              <th>Amount ₦</th>
              <th>Comment</th>
            </tr>
          </thead>
          <tbody>
            @foreach($incomes as $key => $income)
            <tr>
              <td> {{ $key+1 }} </td>
              <td>{{ $income->created_at }}</td>
              <td>{{ $income->user->name }}</td>
              <td>{{ number_format($income->amount_in,0)}}</td>
              <td>{{ $income->comment}}</td>
              <td>

                <a href="{{ route('admin.income.delete',$income->id) }}" class='btn btn-danger' id="delete">Delete</a>

              </td>
            </tr>
            @endforeach


          </tbody>
          <tfoot>
            <tr>
              <th>Sn</th>
              <th>Date Time</th>
              <th>Account Name</th>

              <th>Amount ₦</th>
              <th>Comment</th>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>
  </div>



</div>




@endsection