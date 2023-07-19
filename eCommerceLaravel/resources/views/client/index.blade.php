@extends("layout.client")

@section("client")


  <div class="site-blocks-cover">
    <div class="container">
      <div class="row">
        <div class="col-md-6 ml-auto order-md-2 align-self-start">
          <div class="site-block-cover-content">
            <h2 class="sub-title">New Summer Collection 2019</h2>
            <h1>Arrivals Sales</h1>
            <p><a href="#" class="btn btn-black rounded-0">Shop Now</a></p>
          </div>
        </div>
        <div class="col-md-6 order-1 align-self-end">
          <img src="{{url('/client/images/model_5.png')}}" alt="Image" class="img-fluid">
        </div>
      </div>
    </div>
  </div>

  <br><br>
  <br><br>
  <!-- Add jQuery (required by Bootstrap) -->
<style>
  /* Set the fixed height for the carousel */
  .carousel {
      max-height: 600px; /* Adjust the height as per your requirement */
  }

  /* Ensure the images fill the carousel items while maintaining aspect ratio */
  .carousel-item img {
      width: 100%;
      height: 600px;
      object-fit: contain;
  }
  .carousel-control-prev,
    .carousel-control-next {
        top: auto;
        bottom: 20px; /* Adjust the spacing from the bottom as needed */
    }

    /* Style the carousel indicators */
    .carousel-indicators {
        bottom: 0;
        justify-content: center;
    }
</style>


{{-- _______ slider _______ --}}
<div class="row">
  </div class="col-6">

    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators" style="color: red !important">
          @foreach ($product as $item)
              <li data-target="#carouselExampleIndicators" data-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : '' }}"></li>
          @endforeach
      </ol>
      <div class="carousel-inner">
          @foreach ($product as $item)
              <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                  <a href="{{url('/Product/Detail')}}/{{$item['id']}}">
                    <img class="d-block w-100" src="{{ $item->gallery }}" alt="Slide {{ $loop->iteration }}">
                  </a>
                  <div class="carousel-caption d-none d-md-block">
                      <h5>{{ $item['name'] }}</h5>
                      <p>{{ $item['description'] }}</p>
                  </div>
              </div>
          @endforeach
      </div>
    </div>
  </div>
</div>

{{-- _______ Category _______ --}}
  <div class="site-section">
    <div class="container">
      <div class="title-section mb-5">
        <h2 class="text-uppercase"><span class="d-block">Discover</span> The Collections</h2>
      </div>
      <div class="row align-items-stretch">
        <div class="col-lg-8">
          <div class="product-item sm-height full-height bg-gray">
            <a href="#" class="product-category">Women <span>25 items</span></a>
            <img src="{{url('/client/images/model_4.png')}}" alt="Image" class="img-fluid">
          </div>
        </div>
        <div class="col-lg-4">
          <div class="product-item sm-height bg-gray mb-4">
            <a href="#" class="product-category">Men <span>25 items</span></a>
            <img src="{{url('/client/images/model_5.png')}}" alt="Image" class="img-fluid">
          </div>
          <div class="product-item sm-height bg-gray">
            <a href="#" class="product-category">Shoes <span>25 items</span></a>
            <img src="{{url('/client/images/model_6.png')}}" alt="Image" class="img-fluid">
          </div>
        </div>
      </div>
    </div>
  </div>

  {{-- _______ Papular _______ --}}
  <div class="site-section">
    <div class="container">
      <div class="row">
        <div class="title-section mb-5 col-12">
          <h2 class="text-uppercase">Popular Products</h2>
        </div>
      </div>

      <div class="row">

        @foreach ($product as $item)
        <div class="col-lg-4 col-md-6 item-entry mb-4">
          <a href="#" class="product-item md-height bg-gray d-block">
            <img src="{{$item['gallery']}}" alt="Image" class="img-fluid">
          </a>
          <h2 class="item-title"><a href="#">{{$item['name']}}</a></h2>
          <strong class="item-price">${{$item['price']}}</strong>
        </div>
        @endforeach

        {{-- <div class="col-lg-4 col-md-6 item-entry mb-4">
          <a href="#" class="product-item md-height bg-gray d-block">
            <img src="{{url('/client/images/prod_3.png')}}" alt="Image" class="img-fluid">
          </a>
          <h2 class="item-title"><a href="#">Blue Shoe High Heels</a></h2>
          <strong class="item-price"><del>$46.00</del> $28.00</strong>
        </div>
        <div class="col-lg-4 col-md-6 item-entry mb-4">
          <a href="#" class="product-item md-height bg-gray d-block">
            <img src="{{url('/client/images/model_5.png')}}" alt="Image" class="img-fluid">
          </a>
          <h2 class="item-title"><a href="#">Denim Jacket</a></h2>
          <strong class="item-price"><del>$46.00</del> $28.00</strong>
          <div class="star-rating">
            <span class="icon-star2 text-warning"></span>
            <span class="icon-star2 text-warning"></span>
            <span class="icon-star2 text-warning"></span>
            <span class="icon-star2 text-warning"></span>
            <span class="icon-star2 text-warning"></span>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 item-entry mb-4">
          <a href="#" class="product-item md-height bg-gray d-block">
            <img src="{{url('/client/images/prod_1.png')}}" alt="Image" class="img-fluid">
          </a>
          <h2 class="item-title"><a href="#">Leather Green Bag</a></h2>
          <strong class="item-price"><del>$46.00</del> $28.00</strong>
          <div class="star-rating">
            <span class="icon-star2 text-warning"></span>
            <span class="icon-star2 text-warning"></span>
            <span class="icon-star2 text-warning"></span>
            <span class="icon-star2 text-warning"></span>
            <span class="icon-star2 text-warning"></span>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 item-entry mb-4">
          <a href="#" class="product-item md-height bg-gray d-block">
            <img src="{{url('/client/images/model_1.png')}}" alt="Image" class="img-fluid">
          </a>
          <h2 class="item-title"><a href="#">Smooth Cloth</a></h2>
          <strong class="item-price"><del>$46.00</del> $28.00</strong>
        </div>
        <div class="col-lg-4 col-md-6 item-entry mb-4">
          <a href="#" class="product-item md-height bg-gray d-block">
            <img src="{{url('/client/images/model_7.png')}}" alt="Image" class="img-fluid">
          </a>
          <h2 class="item-title"><a href="#">Yellow Jacket</a></h2>
          <strong class="item-price">$58.00</strong>
        </div> --}}

      </div>
    </div>
  </div>

  {{-- _______ Most rated _______ --}}
  <div class="site-section">
    <div class="container">
      <div class="row">
        <div class="title-section text-center mb-5 col-12">
          <h2 class="text-uppercase">Most Rated</h2>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 block-3">
          <div class="nonloop-block-3 owl-carousel">


            @foreach ($product as $item)
            <div class="item">
              <div class="item-entry">
                <a href="#" class="product-item md-height bg-gray d-block">
                  <img src="{{$item->gallery}}" alt="Image" class="img-fluid">
                </a>
                <h2 class="item-title"><a href="#">{{$item->name}}</a></h2>
                <strong class="item-price"><del>$46.00</del> ${{$item->price}}</strong>
                <div class="star-rating">
                  <span class="icon-star2 text-warning"></span>
                  <span class="icon-star2 text-warning"></span>
                  <span class="icon-star2 text-warning"></span>
                  <span class="icon-star2 text-warning"></span>
                  <span class="icon-star2 text-warning"></span>
                </div>
              </div>
            </div>
            @endforeach
            
            {{-- <div class="item">
              <div class="item-entry">
                <a href="#" class="product-item md-height bg-gray d-block">
                  <img src="{{url('/client/images/prod_3.png')}}" alt="Image" class="img-fluid">
                </a>
                <h2 class="item-title"><a href="#">Blue Shoe High Heels</a></h2>
                <strong class="item-price"><del>$46.00</del> $28.00</strong>
                <div class="star-rating">
                  <span class="icon-star2 text-warning"></span>
                  <span class="icon-star2 text-warning"></span>
                  <span class="icon-star2 text-warning"></span>
                  <span class="icon-star2 text-warning"></span>
                  <span class="icon-star2 text-warning"></span>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="item-entry">
                <a href="#" class="product-item md-height bg-gray d-block">
                  <img src="{{url('/client/images/model_5.png')}}" alt="Image" class="img-fluid">
                </a>
                <h2 class="item-title"><a href="#">Denim Jacket</a></h2>
                <strong class="item-price"><del>$46.00</del> $28.00</strong>
                <div class="star-rating">
                  <span class="icon-star2 text-warning"></span>
                  <span class="icon-star2 text-warning"></span>
                  <span class="icon-star2 text-warning"></span>
                  <span class="icon-star2 text-warning"></span>
                  <span class="icon-star2 text-warning"></span>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="item-entry">
                <a href="#" class="product-item md-height bg-gray d-block">
                  <img src="{{url('/client/images/prod_1.png')}}" alt="Image" class="img-fluid">
                </a>
                <h2 class="item-title"><a href="#">Leather Green Bag</a></h2>
                <strong class="item-price"><del>$46.00</del> $28.00</strong>
                <div class="star-rating">
                  <span class="icon-star2 text-warning"></span>
                  <span class="icon-star2 text-warning"></span>
                  <span class="icon-star2 text-warning"></span>
                  <span class="icon-star2 text-warning"></span>
                  <span class="icon-star2 text-warning"></span>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="item-entry">
                <a href="#" class="product-item md-height bg-gray d-block">
                  <img src="{{url('/client/images/model_7.png')}}" alt="Image" class="img-fluid">
                </a>
                <h2 class="item-title"><a href="#">Yellow Jacket</a></h2>
                <strong class="item-price">$58.00</strong>
                <div class="star-rating">
                  <span class="icon-star2 text-warning"></span>
                  <span class="icon-star2 text-warning"></span>
                  <span class="icon-star2 text-warning"></span>
                  <span class="icon-star2 text-warning"></span>
                  <span class="icon-star2 text-warning"></span>
                </div>
              </div>
            </div> --}}
          </div>
        </div>
      </div>
    </div>
  </div>


  <div class="site-blocks-cover inner-page py-5" data-aos="fade">
    <div class="container">
      <div class="row">
        <div class="col-md-6 ml-auto order-md-2 align-self-start">
          <div class="site-block-cover-content">
            <h2 class="sub-title">#New Summer Collection 2019</h2>
            <h1>New Shoes</h1>
            <p><a href="#" class="btn btn-black rounded-0">Shop Now</a></p>
          </div>
        </div>
        <div class="col-md-6 order-1 align-self-end">
          <img src="{{url('/client/images/model_6.png')}}" alt="Image" class="img-fluid">
        </div>
      </div>
    </div>
  </div>


@endsection