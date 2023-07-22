<div class="site-navbar bg-white py-2">
    <div class="search-wrap">
      <div class="container">
        <a href="#" class="search-close js-search-close"><span class="icon-close2"></span></a>
        <form action="/Product/search">
          <input type="text" class="form-control" name="query" placeholder="Search keyword and hit enter...">
        </form>
      </div>
    </div>
    <div class="container">
      <div class="d-flex align-items-center justify-content-between">
        <div class="logo">
          <div class="site-logo">
            <a href="index.html" class="js-logo-clone">ShopMax</a>
          </div>
        </div>
        <div class="main-nav d-none d-lg-block">
          <nav class="site-navigation text-right text-md-center" role="navigation">
            <ul class="site-menu js-clone-nav d-none d-lg-block">
              <li class="active">
                <a href="/">Home</a>
                {{-- <ul class="dropdown">
                  <li><a href="#">Menu One</a></li>
                  <li><a href="#">Menu Two</a></li>
                  <li><a href="#">Menu Three</a></li>
                  <li class="has-children">
                    <a href="#">Sub Menu</a>
                    <ul class="dropdown">
                      <li><a href="#">Menu One</a></li>
                      <li><a href="#">Menu Two</a></li>
                      <li><a href="#">Menu Three</a></li>
                    </ul>
                  </li>
                </ul> --}}
              </li>
              <li><a href="shop.html">Shop</a></li>
              <li><a href="#">Catalogue</a></li>
              <li><a href="#">New Arrivals</a></li>
              <li><a href="contact.html">Contact</a></li>
            </ul>
          </nav>
        </div>
        <div class="icons">
          <a href="#" class="icons-btn d-inline-block js-search-open"><span class="icon-search"></span></a>
          <a href="#" class="icons-btn d-inline-block"><span class="icon-heart-o"></span></a>
          <a href="{{url('/Product/CartList')}}" class="icons-btn d-inline-block bag">
            <span class="icon-shopping-bag"></span>
            <?php
              use App\Http\Controllers\ProductController;
              $total = 0;
              if(Session::has('user')){
                  $total=ProductController::cartItem();
              }
            ?>
            <span class="number">{{$total}}</span>
          </a>

          @if (Session::has('user'))
            <a href="{{url('/Account/Register')}}" class="icons-btn d-inline-block" style="margin-left: 25px">
                <span class="icon-user" style="font-size: 20px"></span>
            </a>
            <a href="{{url('/Account/Logout')}}" class="icons-btn d-inline-block">
                <span class="icon-exit_to_app" style="font-size: 20px"></span>
            </a>

            @else
                <a href="{{url('/Account/Login')}}" class="icons-btn d-inline-block" style="margin-left: 25px">
                    <span class="icon-lock" style="font-size: 20px"></span>
                </a>
                <a href="{{url('/Account/Register')}}" class="icons-btn d-inline-block">
                    <span class="icon-registered" style="font-size: 20px"></span>
                </a>
          @endif

          <a href="#" class="site-menu-toggle js-menu-toggle ml-3 d-inline-block d-lg-none"><span
              class="icon-menu"></span></a>
        </div>
      </div>
    </div>
  </div>
