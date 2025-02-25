<!DOCTYPE html>
<html>

<head>
    @include('home.css')
</head>

<body>
  <div class="hero_area">

    @include('home.header')

</div>



<section class="contact_section ">
    <div class="container px-0">
      <div class="heading_container ">
        <h2 class="">
          Contact Us
        </h2>
      </div>
    </div>
    <div class="container container-bg">
      <div class="row">

        <div class="col-md-8  ">
          <form action="{{ route('home.contactsave') }}" method="post">
            @csrf
            
            <div>
              <input type="text" placeholder="Name" name="name" />
            </div>
            <div>
              <input type="email" placeholder="Email" name="email" />
            </div>
            <div>
              <input type="text" placeholder="Phone" name="phone" />
            </div>
            <div>
              <input type="text" class="message-box" placeholder="Message" name="message" />
            </div>
            <div class="d-flex ">
              <button>
                SEND
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>

  <br><br><br>








  @include('home.footer')


</body>

</html>
