    @php
    $vendors = App\Models\User::where('role', 'vendor')->where('status', 'active')->inRandomOrder()->limit(20)->get();
    @endphp
    <style>
        .right-align {
            position: absolute;
            right: 0;
        }

        .mobile-only {
            display: none;
        }

        @media only screen and (max-width: 767px) {
            .mobile-only {
                display: block;
            }
        }
    </style>


    <section class="popular-categories section-padding">
        <div class="container wow animate__animated animate__fadeIn">
            <div class="section-title">
                <div class="title">
                    <span class="right-align mobile-only"><a href="{{ route('login') }}"> <img class="svgInject" alt="account" src="{{ asset('frontend/assets/imgs/theme/icons/icon-user.svg') }}" /> Login </a></span>
                    <span style="font-size: 30px; font-weight:900; color:#253D4E">Vendors</span>
                    <br />

                </div>
                <div class="slider-arrow slider-arrow-2 flex-right carausel-10-columns-arrow" id="carausel-10-columns-arrows"></div>
            </div>
            <div class="carausel-10-columns-cover position-relative">
                <div class="carausel-10-columns" id="carausel-10-columns">

                    @foreach($vendors as $vendor)
                    <div class="card-2 bg-9 wow animate__animated animate__fadeInUp" data-wow-delay=".1s" style="min-height:80px">
                        <figure class="img-hover-scale overflow-hidden">
                            <a href="{{ route('vendor.details',$vendor->id) }}"><img src="{{ (!empty($vendor->photo)) ? url('upload/vendor_images/'.$vendor->photo):url('upload/no_image.jpg') }}" alt="{{ $vendor->name }}" width="auto" height="50px" /></a>
                        </figure>
                        <h6><a href="{{ route('vendor.details',$vendor->id) }}">{{ $vendor->name }}</a></h6>

                        @php
                        // $products = App\Models\Product::where('vendor_id',$vendor->id)->count();
                        @endphp

                        <!-- <span>product count suppose to be here</span> -->
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </section>