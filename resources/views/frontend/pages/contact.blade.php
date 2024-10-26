@extends('frontend.master_dashboard')
@section('main')
@section('title')
Contact Us page |OGITECH Consults
@endsection
<style>
  .show-more-content {
    max-height: 100px;
    overflow: hidden;
    transition: max-height 0.3s ease;
  }

  .show-more-content.expanded {
    max-height: none;
  }
</style>

<div class="page-header mt-30 mb-5">
  <div class="container">
    <div class="archive-header">
      <div class="row align-items-center">
        <div class="col-xl-3">
          <h1 class="mb-15">Contact Us</h1>
          <div class="breadcrumb">
            <a href="/" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
            <span></span> Contact Us
          </div>
        </div>

      </div>
    </div>
  </div>
</div>
<div class="page-content mb-5">
  <div class="container">
    <div class="row">
      <div class="col-xl-10 col-lg-12 m-auto">
        <section class="row align-items-end mb-50">

          <div class="col-lg-8">
            <div class="row">

              <div class="col-lg-6 mb-lg-0 mb-4">
                <h5 class="mb-20 ">01. Mrs. Osiebe Gloria Oghenekevwe </h5>
                <!-- <p><b style="font-weight: bold;">Address:</b>Pellentesque habitant morbi tristique</p> -->
                <p><b style="font-weight: bold;">Phone: </b>08072050052</p>
                <p><b style="font-weight: bold;">Email:</b>Osiebegloria01@gmail.com </p>

              </div>
              <div class="col-lg-6">
                <h5 class="mb-20">02. Mrs. Obanla Temitope olamide</h5>
                <!-- <p><b style="font-weight: bold;">Address:</b> Pellentesque habitant morbi tristique</p> -->
                <p><b style="font-weight: bold;">Phone: </b>+2347030053985</p>
                <p><b style="font-weight: bold;">Email:</b>obanlatemitope12@gmail.com</p>

              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-xl-10 col-lg-12 m-auto">
      <section class="row align-items-center mb-50">
        <div class="row">
          <div class="col-xl-8">
            <div class="contact-from-area padding-20-row-col">

              <h2 class="mb-10">Drop Us your message</h2>
              <p class="text-muted mb-30 font-sm">Your email address will not be published. Required fields are marked *</p>
              <form class="contact-form-style mt-30" id="contact-form" action="#" method="post">
                <div class="row">
                  <div class="col-lg-6 col-md-6">
                    <div class="input-style mb-20">
                      <input name="name" placeholder="Full Name*" type="text" />
                    </div>
                  </div>
                  <div class="col-lg-6 col-md-6">
                    <div class="input-style mb-20">
                      <input name="email" placeholder="Your Email*" type="email" />
                    </div>
                  </div>
                  <div class="col-lg-6 col-md-6">
                    <div class="input-style mb-20">
                      <input name="telephone" placeholder="Your Phone*" type="tel" />
                    </div>
                  </div>
                  <div class="col-lg-6 col-md-6">
                    <div class="input-style mb-20">
                      <input name="address" placeholder="Address" type="text" />
                    </div>
                  </div>







                  <div class="col-lg-12 col-md-12">

                    <div class="textarea-style mb-30">
                      <textarea name="additional_info" placeholder="Message here"></textarea>
                    </div>

                    <button class="submit submit-auto-width" type="submit">Send</button>
                  </div>
                </div>
              </form>
              <p class="form-messege"></p>
            </div>
          </div>
          <div class="col-lg-4 pl-50 d-lg-block d-none">
            <img class="border-radius-15 mt-50" src="{{ asset('frontend/assets/imgs/page/about-1.png') }}" alt="" />
          </div>
        </div>
      </section>
    </div>
  </div>
</div>
</div>
</div>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    const toggleButtons = document.querySelectorAll('.toggle-button');

    toggleButtons.forEach(function(button) {
      button.addEventListener('click', function() {
        const cardContent = this.previousElementSibling;
        cardContent.classList.toggle('expanded');
        this.textContent = cardContent.classList.contains('expanded') ? 'Show Less' : 'Show More';
      });
    });
  });
</script>

@endsection