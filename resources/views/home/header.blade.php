<header class="header_section">
    <nav class="navbar navbar-expand-lg custom_nav-container ">
      <a class="navbar-brand" href="index.html">
        <span>
          Giftos
        </span>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class=""></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav  ">
          <li class="nav-item active">
            <a class="nav-link" href="{{ route('home') }}">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('home.shop') }}">
              Shop
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('home.why') }}">
              Why Us
            </a>
          </li>
          <li class="nav-item">

            <a class="nav-link" href="{{ route('home.testimonial') }}">
              Testimonial
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('home.contact') }}">Contact Us</a>
          </li>
        </ul>
        <div class="user_option">

            @if(Route::has('login'))

            @auth

            <a href="{{ route('myorders') }}">
               My Orders
            </a>


            <a href="{{ route('mycart') }}">
                <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                [{{ $count }}]
            </a>

            <form style="padding: 15px;" action="{{ route('logout') }}" method="post">
                @csrf

                <input type="submit" class="btn btn-danger" value="Logout">
            </form>

            @else

          <a href="{{ route('login') }}">
            <i class="fa fa-user" aria-hidden="true"></i>
            <span>
              Login
            </span>
          </a>

          <a href="{{ route('register') }}">
            <i class="fa fa-user" aria-hidden="true"></i>
            <span>
              Register
            </span>
          </a>

          @endauth

          @endif


        </div>
      </div>
    </nav>
  </header>



