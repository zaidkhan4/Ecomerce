<!DOCTYPE html>
<html>

<head>
    @include('home.css')
</head>

<body>
  <div class="hero_area">

    @include('home.header')

  </div>

  <!-- client section -->
  <section class="client_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Testimonial
        </h2>
      </div>
    </div>
    <div class="container px-0">
      <div id="customCarousel2" class="carousel carousel-fade" data-ride="carousel">
        <div class="carousel-inner">
          <!-- Loop through the banners -->
          @foreach ($baners as $index => $baner)
            <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
              <div class="box">
                <div class="client_info">
                  <div class="client_name">
                    <h5>
                      {{ $baner->name }}
                    </h5>
                    <h6>
                      Default model text
                    </h6>
                  </div>
                  <i class="fa fa-quote-left" aria-hidden="true"></i>
                </div>
                <p>
                  {{ $baner->description }}
                </p>
              </div>
            </div>
          @endforeach
        </div>

        <div class="carousel_btn-box">
          <a class="carousel-control-prev" href="#customCarousel2" role="button" data-slide="prev">
            <i class="fa fa-angle-left" aria-hidden="true"></i>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#customCarousel2" role="button" data-slide="next">
            <i class="fa fa-angle-right" aria-hidden="true"></i>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
    </div>
  </section>
  <!-- end client section -->

  @include('home.footer')

</body>

</html>
