@extends('admin.admin_dashboard')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<div class="page-content">
  <!--breadcrumb-->
  <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Make User HOC </div>
    <div class="ps-3">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0 p-0">
          <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
          </li>
          <li class="breadcrumb-item active" aria-current="page">Assign HOC </li>
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

        <div class="col-lg-8">
          <div class="card">
            <div class="card-body">

              <form method="post" action="{{ route('admin.hoc.store') }}">
                @csrf

                <div class="row mb-3">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Select User by Name/ Matric no.</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    <input type="text" id="searchInput" class="form-control" placeholder="Search options">
                    <select name="user_id" id="selectOptions" class="form-select mb-3" aria-label="Default select example">
                      <option selected="">Open this select menu</option>
                      @foreach($users as $user)
                      <option value="{{ $user->id }}">{{ $user->name }} - {{ $user->matno }} </option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Department</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">

                    <select name="vendor_department" class="form-select mb-3" aria-label="Default select example">
                      <option selected="">Open this to select department</option>
                      @foreach($categories as $category)
                      <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Level</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    <select name="level" class="form-select mb-3" aria-label="Default select example">
                      <option selected="">Open this to select Level</option>


                      <option value="ND1">ND1</option>
                      <option value="ND2">ND2</option>
                      <option value="ND3">ND3</option>

                      <option value="HND1">HND1</option>
                      <option value="HND2">HND2</option>
                      <option value="HND3">HND3</option>

                    </select>
                  </div>
                </div>



                <div class="row">
                  <div class="col-sm-3"></div>
                  <div class="col-sm-9 text-secondary">
                    <input type="submit" class="btn btn-primary px-4" value="Update" />
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


<script>
  $(document).ready(function() {

    $('#searchInput').on('keyup', function() {
      var searchText = $(this).val().toLowerCase();
      $('#selectOptions option').each(function() {
        var optionText = $(this).text().toLowerCase();
        if (optionText.includes(searchText)) {
          $(this).show();
        } else {
          $(this).hide();
        }
      });
    });
  });
</script>





@endsection