@extends('admin.admin_dashboard')
@section('admin')



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<div class="page-content">
  <!--breadcrumb-->
  <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Add Vendor Details</div>
    <div class="ps-3">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0 p-0">
          <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
          </li>
          <li class="breadcrumb-item active" aria-current="page">Add Vendor Details</li>
        </ol>
      </nav>
    </div>
    <div class="ms-auto">

    </div>
  </div>
  <!--end breadcrumb-->
  <div class="container">
    <div class="main-body">
      <div class="row">

        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">

              <form method="post" action="{{ route('add.vendor.store') }}" enctype="multipart/form-data">
                @csrf

                <input type="hidden" name="id">

                <div class="row mb-3">
                  <div class="col-sm-3">
                    <h6 class="mb-0">User Name</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    <input type="text" class="form-control" name="username" />
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-sm-3">
                    <h6 class="mb-0"> Full name</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    <input type="text" name="name" class="form-control" />
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-sm-3">
                    <h6 class="mb-0"> Email</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    <input type="email" name="email" class="form-control" />
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-sm-3">
                    <h6 class="mb-0"> Password</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    <input type="password" required="" id="password" name="password" value="12345678" class="form-control" />

                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-sm-3">
                    <h6 class="mb-0"> Phone </h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    <input type="text" name="phone" class="form-control" />
                  </div>
                </div>



                <div class="row mb-3">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Department</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">


                    <select name="vendor_department" class="form-select" id="inputVendor">
                      <option>Select</option>
                      @foreach($departments as $department)
                      <option value="{{ $department->id }}">{{ $department->category_name }}</option>
                      @endforeach


                    </select>
                  </div>

                </div>




                <div class="row mb-3">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Vendor Info</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    <textarea name="vendor_short_info" class="form-control" id="inputAddress2" placeholder="Vendor Info " rows="3">

                    </textarea>
                  </div>
                </div>







                <div class="row">
                  <div class="col-sm-3"></div>
                  <div class="col-sm-9 text-secondary">
                    <input type="submit" class="btn btn-primary px-4" value="Submit" />
                  </div>
                </div>
            </div>

            </form>



          </div>




        </div>
      </div>
    </div>
  </div>
</div>






@endsection