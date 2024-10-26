@extends('frontend.master_dashboard')
@section('main')
@section('title')
Get Quote Page | Amos Niyi Mart
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

<div class="page-header mt-30 mb-75">
  <div class="container">
    <div class="archive-header">
      <div class="row align-items-center">
        <div class="col-xl-3">
          <h1 class="mb-15">Get Quote</h1>
          <div class="breadcrumb">
            <a href="/" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
            <span></span> Get Quote
          </div>
        </div>

      </div>
    </div>
  </div>
</div>
<div class="page-content mb-50">
  <div class="container">
    <div class="row">
      <div class="col-xl-10 col-lg-12 m-auto">
        <section class="row align-items-center mb-50">
          <div class="row">
            <div class="col-xl-8">
              <div class="contact-from-area padding-20-row-col">
                <h5 class="text-brand mb-10">Ready to get started? Request a quote today!</h5>
                <h2 class="mb-10">Drop Us your needs</h2>
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

                    <div class="col-lg-6 col-md-6">
                      <div class="input-style mb-20">
                        <input name="project_details" placeholder="Project Details*" type="text" />
                      </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                      <div class="input-style mb-20">
                        <input name="budget" placeholder="Budget" type="text" />
                      </div>
                    </div>

                    <div class="col-lg-6 col-md-6">
                      <div class="input-style mb-20">
                        <input name="delivery_date" placeholder="Delivery Date" type="date" />
                      </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                      <div class="input-style mb-20">
                        <input name="delivery_time" placeholder="Delivery Time" type="time" />
                      </div>
                    </div>




                    <div class="col-lg-12 col-md-12">
                      <div class="textarea-style mb-30">
                        <textarea name="materials" placeholder="Materials and Services Needed, List them*"></textarea>
                      </div>
                      <div class="textarea-style mb-30">
                        <textarea name="additional_info" placeholder="Additional Information"></textarea>
                      </div>

                      <button class="submit submit-auto-width" type="submit">Send Request</button>
                    </div>
                  </div>
                </form>
                <p class="form-messege"></p>
              </div>
            </div>
            <div class="col-lg-4 pl-50 d-lg-block d-none">
              <img class="border-radius-15 mt-50" src="{{ asset('frontend/assets/imgs/theme/doors.jpg') }}" alt="" />
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