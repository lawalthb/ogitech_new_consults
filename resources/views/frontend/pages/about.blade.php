@extends('frontend.master_dashboard')
@section('main')
@section('title')
About Page | Consults
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

<div class="page-header  mb-1" style="margin-top:-50px">
  <div class="container">
    <div class="archive-header">
      <div class="row align-items-center">
        <div class="col-xl-3">
          <h1 class="mb-15">About</h1>
          <div class="breadcrumb">
            <a href="/" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
            <span></span> About
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
          <div class="col-lg-6 postion_img ">
            <img src="{{ asset('frontend/assets/imgs/page/consult_director.png') }}" width="300px" height="400px" alt="" class="border-radius-15 mb-md-3 mb-lg-0 mb-sm-4" />
          </div>
          <div class="col-lg-6">
            <div class="pl-25">
              <h2 class="mb-30">Welcome to <br>OGITECH Consults</h2>
              <p class="mb-25">
                <b><span style="font-weight: bold;">Coordinator name: </span> Surv. Eletu Ahmed Ajiboye (MNIS, MGEOSON)</b>
              </p>
              <p class="mb-25">
                <b><span style="font-weight: bold;">Overview of the Consultancy Unit: </b> <br /></span>
                OGITECH Consultancy Limited was first established in 2012 when the need arose to centralize the distribution of students' materials and manuals. The Unit was later incorporated under the Companies and Allied Matters Act 1990 as GATEWAY (ICT) POLYTECHNIC IGBESA CONSULT LIMITED on the 11th May of the same year. Later, marketing of students' produce from entrepreneurship development, sales of stationery, beverages, packaged water, biscuits, sandcrete block-making factory, sales of diesel to the polytechnic community, rentals of plastic chairs, etc. were added.
              </p>
              <p>
                The Unit was established to serve as the commercial arm of our dear Institute and to perform its functions, the unit has lined up more ventures.
              </p>
              <p> <b><span style="font-weight: bold;">Past Directors of the Unit since inception</p></b> </span>
              <table>
                <tr>
                  <td>1</td>
                  <td>Mr. John Ekundayo Idowu (ACIB, AAT)</td>
                  <td>Pioneer Ag. Director</td>
                  <td style="width: 25%;">2012-2018</td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>Engr. Mrs. Edun Abosede</td>
                  <td>Ag. Director</td>
                  <td>2012-2018</td>
                </tr>
                <tr>
                  <td>3</td>
                  <td>Mrs. Oyekola Olaronke Olukemi (FCA, ACTI)</td>
                  <td>Ag. Director</td>
                  <td>2012-2018</td>
                </tr>
                <tr>
                  <td>4</td>
                  <td>Mr. Agunbiade Bolaji</td>
                  <td>Ag. Director</td>
                  <td>2012-2018</td>
                </tr>
                <tr>
                  <td>5</td>
                  <td>Mr. Akingbade Fatai Sunday</td>
                  <td>Ag. Director</td>
                  <td>2012-2018</td>
                </tr>
              </table>

              </p>

              <!-- <div class="carausel-3-columns-cover position-relative">
                <div id="carausel-3-columns-arrows"></div>
                <div class="carausel-3-columns" id="carausel-3-columns">
                  <img src="{{ asset('frontend/assets/imgs/theme/amos_fav.png') }}" alt="" />
                  <img src="{{ asset('frontend/assets/imgs/theme/amos_fav.png') }}" alt="" />
                  <img src="{{ asset('frontend/assets/imgs/theme/amos_fav.png') }}" alt="" />
                  <img src="{{ asset('frontend/assets/imgs/theme/amos_fav.png') }}" alt="" />
                </div>
              </div> -->
            </div>
          </div>
        </section>
        <section class="text-center mb-50">
          <h2 class="title style-3 mb-40">More Ventures</h2>
          <div class="row">
            <div class="col-lg-4 col-md-6 mb-24">
              <div class="featured-card">
                <img src="{{ asset('frontend/assets/imgs/about/binding.jpeg') }}" alt="" />
                <h4>Bindery</h4>

              </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-24">
              <div class="featured-card">
                <img src="{{ asset('frontend/assets/imgs/about/purewater.jpeg') }}" alt="" />
                <h4> Production and sales of packaged water</h4>

              </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-24">
              <div class="featured-card">
                <img src="{{ asset('frontend/assets/imgs/about/lab_coat.jpg') }}" alt="" />
                <h4> Production and sales of laboratory coats</h4>

              </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-24">
              <div class="featured-card">
                <img src="{{ asset('frontend/assets/imgs/about/bread.jpg') }}" alt="" />
                <h4>Production and sales of bread</h4>

              </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-24">
              <div class="featured-card">
                <img src="{{ asset('frontend/assets/imgs/about/training2.png') }}" alt="" />
                <h4>Computer training institute (certificate courses)</h4>

              </div>
            </div>





            <div class="col-lg-4 col-md-6 mb-24">
              <div class="featured-card">
                <img src="{{ asset('frontend/assets/imgs/about/houseimg.png') }}" alt="" />
                <h4>Students hostel accommodation</h4>

              </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-24">
              <div class="featured-card">
                <img src="{{ asset('frontend/assets/imgs/about/POS.jpeg') }}" alt="" />
                <h4>Business centre and POS services, etc.</h4>

              </div>
            </div>


            <div class="col-lg-8 col-md-6 mb-24">
              <div class="featured-card">
                <img src="{{ asset('frontend/assets/imgs/about/consult_image.jpg') }}" alt="" />
                <h4></h4>
                <div class="card-content show-more-content">
                  <p>OGITECH Consultancy Limited is dedicated to pursuing every business venture of the polytechnic with a drive for increase and expansion. Additionally, the Unit serves as a training ground for students interested in undergoing their SIWES and one-year industrial training.</p>
                </div>

              </div>
            </div>

          </div>
        </section>

        <section class="text-center mb-50">
          <h2 class="title style-3 mb-40">Our Team</h2>
          <div class="row">
                  <div class="col-lg-4 col-md-6 mb-24" style="border: solid 2px #ececec ; border-radius: 20px;">
              <img width="200px" src="{{ asset('frontend/assets/imgs/team/sales_rep2.jpg') }}" alt="" />
              <h4>Ojo Oluwagbenga Ige</h4>
              <h6>Assistant Coordinator</h6>
            </div>
            <div class="col-lg-4 col-md-6 mb-24" style="border: solid 2px #ececec ; border-radius: 20px;">

              <img width="200px" src="{{ asset('frontend/assets/imgs/team/accountant.jpg') }}" alt="" />
              <h4>Osiebe Gloria Oghenekevwe</h4>
              <h6>Accountant</h6>


            </div>
            <div class="col-lg-4 col-md-6 mb-24" style="border: solid 2px #ececec ; border-radius: 20px;">
              <img width="200px" src="{{ asset('frontend/assets/imgs/team/sales_rep.jpg') }}" alt="" />
              <h4>obanla Temitope olamide</h4>
              <h6>Sales Clerk</h6>
            </div>
        












          </div>
        </section>


        <section class="row align-items-center mb-50">
          <div class="row mb-50 align-items-center">
            <div class="col-lg-7 pr-30">
              <img src="{{ asset('frontend/assets/imgs/about/laptop_image.png') }}" alt="" class="mb-md-3 mb-lg-0 mb-sm-4" />
            </div>
            <div class="col-lg-5">
              <h4 class="mb-20 text-muted">Our performance</h4>
              <h1 class="heading-1 mb-40">We partner with Vendors</h1>
              <div class="card-content show-more-content">
                <p class="mb-30">Quisque aliquam tempor magna. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nunc ac magna. Maecenas odio dolor, vulputate vel, auctor ac, accumsan id, felis. Pellentesque cursus sagittis felis. </p>
                <p class="mb-30">
                  Quisque aliquam tempor magna. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nunc ac magna. Maecenas odio dolor, vulputate vel, auctor ac, accumsan id, felis. Pellentesque cursus sagittis felis.</p>
                <p class="mb-30">
                  Quisque aliquam tempor magna. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nunc ac magna. Maecenas odio dolor, vulputate vel, auctor ac, accumsan id, felis. Pellentesque cursus sagittis felis.</p>

              </div>
              <a href="javascript:" class="toggle-button ">Read more</a>
            </div>
          </div>
          <!-- <div class="row">
            <div class="col-lg-4 pr-30 mb-md-5 mb-lg-0 mb-sm-5">
              <h3 class="mb-30">Who we are</h3>
              <p>Volutpat diam ut venenatis tellus in metus. Nec dui nunc mattis enim ut tellus eros donec ac odio orci ultrices in. ellus eros donec ac odio orci ultrices in.</p>
            </div>
            <div class="col-lg-4 pr-30 mb-md-5 mb-lg-0 mb-sm-5">
              <h3 class="mb-30">Our history</h3>
              <p>Volutpat diam ut venenatis tellus in metus. Nec dui nunc mattis enim ut tellus eros donec ac odio orci ultrices in. ellus eros donec ac odio orci ultrices in.</p>
            </div>
            <div class="col-lg-4">
              <h3 class="mb-30">Our mission</h3>
              <p>Volutpat diam ut venenatis tellus in metus. Nec dui nunc mattis enim ut tellus eros donec ac odio orci ultrices in. ellus eros donec ac odio orci ultrices in.</p>
            </div>
          </div> -->
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