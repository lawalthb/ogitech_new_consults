@extends('admin.admin_dashboard')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<div class="page-content">
  <!--breadcrumb-->
  <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Make Recipt</div>
    <div class="ps-3">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0 p-0">
          <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
          </li>
          <li class="breadcrumb-item active" aria-current="page">Income /Money Received </li>
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
              @if ($errors->any())
              <div class="alert alert-danger">
                <ul>
                  @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
              @endif


              <form method="post" action="{{ route('admin.income.store') }}">
                @csrf

                <div class="row mb-3">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Search by Email/Name</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">



                    <!-- Search input field -->
                    <input type="text" id="searchInput" class="form-control" placeholder="Search options">
                    <!-- HTML select field -->
                    <select id="selectOptions" class="form-select" name="user_id">
                      <option selected>Pick user here</option>
                      @foreach($users as $user)
                      <option value="{{ $user->id }}">{{ $user->email }} - {{ $user->name }}</option>
                      @endforeach
                      <!-- Add more options as needed -->
                    </select>

                  </div>
                </div>

                <div class="row mb-3">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Amount</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    <input type="number" name="amount_in" class="form-control" placeholder="Enter Amount" require />
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Date </h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    <input type="datetime-local" name="date" class="form-control" placeholder="Enter date and time" require />
                  </div>
                </div>


                <div class="row mb-3">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Comment</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    <input type="text" name="comment" class="form-control" placeholder="Any comment?" />
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