@extends('dashboard')
@section('user')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


<div class="page-header breadcrumb-wrap">
    <div class="container">
        <div class="breadcrumb">
            <a href="/" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
            <span></span> User Account
        </div>
    </div>
</div>
<div class="page-content pt-50 pb-50">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 m-auto">
                <div class="row">

                    <!-- // Start Col md 3 menu -->
                    @include('frontend.body.dashboard_sidebar_menu')
                    <!-- // End Col md 3 menu -->




                    <div class="col-md-9">
                        <div class="tab-content account dashboard-content pl-50">
                            <div class="tab-pane fade active show" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Account Details</h5>
                                    </div>
                                    <div class="card-body">



                                        <form method="post" action="{{ route('user.profile.store') }}" enctype="multipart/form-data">
                                            @csrf


                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label>User Name <span class="required">*</span></label>
                                                    <input required="" class="form-control" name="username" type="text" value="{{ $userData->username }}" />
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Full Name <span class="required">*</span></label>
                                                    <input required="" class="form-control" name="name" value="{{ $userData->name }}" />
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label>Email <span class="required">*</span></label>
                                                    <input required="" class="form-control" name="email" type="text" value="{{ $userData->email }}" />
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label>Phone <span class="required">*</span></label>
                                                    <input required="" class="form-control" name="phone" type="text" value="{{ $userData->phone }}" />
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label>Department <span class="required">*</span></label>


                                                    <select name="vendor_department" class="form-control" aria-label="Default select example">
                                                        <option selected="">Open this to select Department</option>
                                                        @foreach ($departments as $department )

                                                        <option value="{{$department->id}}" {{ $userData->vendor_department == $department->id  ? 'selected' : '' }}>{{$department->category_name}}</option>

                                                        @endforeach


                                                    </select>


                                                </div>

                                                <div class="form-group col-md-12">
                                                    <label>Level <span class="required">*</span></label>


                                                    <select name="vendor_department" class="form-control" aria-label="Default select example">
                                                        <option>Open this to select Level</option>
                                                        <option selected>{{$userData->level }}</option>

                                                        <option value="ND1">ND1</option>
                                                        <option value="ND2">ND2</option>
                                                        <option value="ND3">ND3</option>

                                                        <option value="HND1">HND1</option>
                                                        <option value="HND2">HND2</option>
                                                        <option value="HND3">HND3</option>

                                                        <option value="None">None</option>


                                                    </select>


                                                </div>


                                                <div class="form-group col-md-12">
                                                    <label>User Photo <span class="required">*</span></label>
                                                    <input class="form-control" name="photo" type="file" id="image" />
                                                </div>

                                                <div class="form-group col-md-12">
                                                    <label> <span class="required">*</span></label>
                                                    <img id="showImage" src="{{ (!empty($userData->photo)) ? url('upload/user_images/'.$userData->photo):url('upload/no_image.jpg') }}" alt="User" class="rounded-circle p-1 bg-primary" width="110">
                                                </div>



                                                <div class="col-md-12">
                                                    <button type="submit" class="btn btn-fill-out submit font-weight-bold" name="submit" value="Submit">Save Change</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>





                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('#image').change(function(e) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#showImage').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>



@endsection