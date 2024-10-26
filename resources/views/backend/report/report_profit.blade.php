@extends('admin.admin_dashboard')
@section('admin')

<div class="page-content">
  <!--breadcrumb-->
  <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">BookShop Report</div>
    <div class="ps-3">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0 p-0">
          <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
          </li>
          <li class="breadcrumb-item active" aria-current="page">Profit Report</li>
        </ol>
      </nav>
    </div>

  </div>
  <!--end breadcrumb-->

  <hr />




  <div class="row row-cols-1 row-cols-md-1 row-cols-lg-3 row-cols-xl-3">

    <form method="post" action="{{ route('search_profit-by-date')}}">
      @csrf

      <div class="col">
        <div class="card">

          <div class="card-body">
            <h5 class="card-title">Search By Date</h5>
            <label class="form-label">From Date:</label>
            <input type="date" name="from_date" class="form-control">
            <label class="form-label">To Date:</label>
            <input type="date" name="to_date" class="form-control">
            <br>
            <input type="submit" class="btn btn-rounded btn-primary" value="Submit">
          </div>


        </div>
      </div>
    </form>

  </div>


</div>




@endsection