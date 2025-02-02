<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8" />
    <title>Register - OGITECH - Consults </title>
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:title" content="" />
    <meta property="og:type" content="" />
    <meta property="og:url" content="" />
    <meta property="og:image" content="" />
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('frontend/assets/imgs/theme/amos_fav.png') }}" />
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/main.css?v=5.3') }}" />
</head>

<body>

    @include('frontend.body.header')
    <!--End header-->

    <main class="main pages">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="/" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                    <span></span> My Account
                </div>
            </div>
        </div>
        <div class="page-content pt-50 pb-150">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8 col-lg-10 col-md-12 m-auto">
                        <div class="row">
                            <div class="col-lg-6 col-md-8">
                                <div class="login_wrap widget-taber-content background-white">
                                    <div class="padding_eight_all bg-white">
                                        <div class="heading_s1">
                                            <h1 class="mb-5">Create an Account</h1>
                                            <p class="mb-30">Already have an account? <a href="{{ route('login') }}">Login</a></p>
                                        </div>

                                        @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        @endif
                                        <form method="POST" action="{{ route('register') }}">
                                            @csrf


                                            <div class="form-group">
                                                <input type="text" id="name" required="" name="name" placeholder="Fullname" />
                                            </div>
                                            <div class="form-group">
                                                <input type="email" id="email" required="" name="email" placeholder="Email" />
                                            </div>
                                            <div class="form-group">
                                                <input required="" id="password" type="password" name="password" placeholder="Password" />
                                            </div>
                                            <div class="form-group">
                                                <input required="" id="password_confirmation" type="password" name="password_confirmation" placeholder="Confirm password" />
                                            </div>
                                            <div class="form-group">
                                                <input type="text" id="phone" name="phone" placeholder="Phone (optional)" />
                                            </div>



                                            <div class="form-group">
                                                <select name="vendor_department" class="form-select mb-3" aria-label="Default select example">
                                                    <option selected="">Open this to select Department</option>
                                                    @foreach ($departments as $department )

                                                    <option value="{{$department->id}}">{{$department->category_name}}</option>

                                                    @endforeach


                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <select name="level" id="level" class="form-select mb-3" aria-label="Default select example">
                                                    <option selected="">Open this to select Level</option>


                                                    <option value="ND1">ND1</option>
                                                    <option value="ND2">ND2</option>
                                                    <option value="ND3">ND3</option>

                                                    <option value="HND1">HND1</option>
                                                    <option value="HND2">HND2</option>
                                                    <option value="HND3">HND3</option>

                                                    <option value="None">None</option>




                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <input type="text" required id="matno" name="matno" placeholder="Matric Number is optional for ND1 and HND1 for now " />
                                            </div>


                                            <div class="login_footer form-group mb-50">
                                                <div class="chek-form">
                                                    <div class="custome-checkbox">
                                                        <input class="form-check-input" checked type="checkbox" name="checkbox" id="exampleCheckbox12" value="" />
                                                        <label class="form-check-label" for="exampleCheckbox12"><span>I agree to terms &amp; Policy.</span></label><a href=""> Click here to read</a>
                                                    </div>
                                                </div>
                                                <a href="/become/vendor"><i class="fi-rs-book-alt mr-5 text-muted"></i>Become a vendor</a>
                                            </div>
                                            <div class="form-group mb-30">
                                                <button type="submit" class="btn btn-fill-out btn-block hover-up font-weight-bold" name="login">Submit &amp; Register</button>
                                            </div>
                                            <p class="font-xs text-muted"><strong>Note:</strong>Your personal data will be used to support your experience throughout this website, to manage access to your account, and for other purposes described in our privacy policy</p>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 pr-30 d-none d-lg-block">
                                <div class="card-login mt-115">
                                    <img class="border-radius-15" src="{{ asset('frontend/assets/imgs/page/reg.jpg') }}" alt="" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script>
        document.getElementById('level').addEventListener('change', function() {
            const matnoField = document.getElementById('matno');
            if (this.value === 'ND1' || this.value === 'HND1') {
                matnoField.removeAttribute('required');
            } else {
                matnoField.setAttribute('required', '');
            }
        });
    </script>

    @include('frontend.body.footer')


    <!-- Preloader Start -->
    <!-- <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="text-center">
                    <img src="{{ asset('frontend/assets/imgs/theme/loading.gif') }}" alt="" />
                </div>
            </div>
        </div>
    </div> -->
    <!-- Vendor JS-->
    <script src="{{ asset('frontend/assets/js/vendor/modernizr-3.6.0.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/vendor/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/vendor/jquery-migrate-3.3.0.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/vendor/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/slick.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/jquery.syotimer.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/waypoints.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/wow.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/magnific-popup.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/select2.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/counterup.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/images-loaded.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/isotope.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/scrollup.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/jquery.vticker-min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/jquery.theia.sticky.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/jquery.elevatezoom.js') }}"></script>
    <!-- Template  JS -->
    <script src="{{ asset('frontend/assets/js/main.js?v=5.3') }}"></script>
    <script src="{{ asset('frontend/assets/js/shop.js?v=5.3') }}"></script>
</body>

</html>