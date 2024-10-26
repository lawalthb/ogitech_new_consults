@extends('admin.admin_dashboard')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<div class="page-content">
  <!--breadcrumb-->
  <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Edit </div>
    <div class="ps-3">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0 p-0">
          <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
          </li>
          <li class="breadcrumb-item active" aria-current="page">Edit </li>
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

        <div class="col-lg-10">
          <div class="card">
            <div class="card-body">

              <form id="myForm" method="post" action="{{ route('update_user', $user->id) }}">
                @csrf

                @csrf

                <input type="hidden" name="id" value="{{ $user->id }}">

                <div class="row mb-3">
                  <div class="col-sm-3">
                    <h6 class="mb-0">User Name</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    <input type="text" class="form-control" name="username" value="{{ $user->username }}" />
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-sm-3">
                    <h6 class="mb-0"> Full name</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    <input type="text" name="name" class="form-control" value="{{ $user->name }}" />
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-sm-3">
                    <h6 class="mb-0"> Email</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    <input type="email" name="email" class="form-control" value="{{ $user->email }}" />
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-sm-3">
                    <h6 class="mb-0"> Phone </h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    <input type="text" name="phone" class="form-control" value="{{ $user->phone }}" />
                  </div>
                </div>


                <div class="row mb-3">
                  <div class="col-sm-3">
                    <h6 class="mb-0"> Address</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    <input type="text" name="address" class="form-control" value="{{ $user->address }}" />
                  </div>
                </div>
                @if($user->role !="vendor")
                <div class="row mb-3">
                  <div class="col-sm-3">
                    <h6 class="mb-0"> Level</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    <input type="text" name="level" class="form-control" value="{{ $user->level }}" />
                  </div>
                </div>

                <div class="row mb-3">
                  <div class="col-sm-3">
                    <h6 class="mb-0"> Matric Number</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    <input type="text" name="matno" class="form-control" value="{{ $user->matno }}" />
                  </div>
                </div>

@endif

                <div class="row mb-3">
                  <div class="col-sm-3">
                    <h6 class="mb-0"> Department</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    <select name="vendor_department" class="form-select mb-3" aria-label="Default select example">
                      <option selected="">Open this select menu</option>

                      @foreach($categories as $category)
                      <option value="{{ $category->id }}" {{ $category->id == $user->vendor_department ? 'selected' : '' }}>{{ $category->category_name }}</option>
                      @endforeach

                    </select>

                  </div>
                </div>




                <div class="row mb-3">
                  <div class="col-sm-3">
                    <h6 class="mb-0">User Type</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    <select name="role" class="form-select mb-3" aria-label="Default select example">
                      <option value="{{ $user->role }}">{{ $user->role }}</option>
                      <option value="user">User</option>
                      <option value="vendor">Vendor</option>
                      <option value="admin">Admin</option>
                    </select>
                  </div>
                </div>



                <div class="row mb-3">
                  <div class="col-sm-3">
                    <h6 class="mb-0"> Photo</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    <img id="showImage" src="{{ (!empty($user->photo)) ? url('upload/vendor_images/'.$user->photo):url('upload/no_image.jpg') }}" alt="Vendor" style="width:100px; height: 100px;">
                  </div>
                </div>




                <div class="row">
                  <div class="col-sm-3"></div>
                  <div class="col-sm-9 text-secondary">
                    <input type="submit" class="btn btn-danger px-4" value="Update" />
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




<script type="text/javascript">
  $(document).ready(function() {
    $('#myForm').validate({
      rules: {
        subcategory_name: {
          required: true,
        },
      },
      messages: {
        subcategory_name: {
          required: 'Please Enter SubCategory Name',
        },
      },
      errorElement: 'span',
      errorPlacement: function(error, element) {
        error.addClass('invalid-feedback');
        element.closest('.form-group').append(error);
      },
      highlight: function(element, errorClass, validClass) {
        $(element).addClass('is-invalid');
      },
      unhighlight: function(element, errorClass, validClass) {
        $(element).removeClass('is-invalid');
      },
    });
  });
</script>






@endsection