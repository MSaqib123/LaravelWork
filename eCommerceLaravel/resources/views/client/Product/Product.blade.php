@extends("layout.client")

@section('client')
{{-- 
<style>
    body{background-color: #EEEEEE}a{text-decoration: none !important}.card-product-list, .card-product-grid{margin-bottom: 0}.card{width: 500px;position: relative;display: -webkit-box;display: -ms-flexbox;display: flex;-webkit-box-orient: vertical;-webkit-box-direction: normal;-ms-flex-direction: column;flex-direction: column;min-width: 0;word-wrap: break-word;background-color: #fff;background-clip: border-box;border: 1px solid rgba(0, 0, 0, 0.1);border-radius: 23px;margin-top: 50px}.card-product-grid:hover{-webkit-box-shadow: 0 4px 15px rgba(153, 153, 153, 0.3);box-shadow: 0 4px 15px rgba(153, 153, 153, 0.3);-webkit-transition: .3s;transition: .3s}.card-product-grid .img-wrap{border-radius: 0.2rem 0.2rem 0 0;height: 220px}.card .img-wrap{overflow: hidden}.card-lg .img-wrap{height: 280px}.card-product-grid .img-wrap{border-radius: 0.2rem 0.2rem 0 0;height: 275px;padding: 16px}[class*='card-product'] .img-wrap img{height: 100%;max-width: 100%;width: auto;display: inline-block;-o-object-fit: cover;object-fit: cover}.img-wrap{text-align: center;display: block}.card-product-grid .info-wrap{overflow: hidden;padding: 18px 20px}[class*='card-product'] a.title{color: #212529;display: block}.rating-stars{display: inline-block;vertical-align: middle;list-style: none;margin: 0;padding: 0;position: relative;white-space: nowrap;clear: both}.rating-stars li.stars-active{z-index: 2;position: absolute;top: 0;left: 0;overflow: hidden}.rating-stars li{display: block;text-overflow: clip;white-space: nowrap;z-index: 1}.card-product-grid .bottom-wrap{padding: 18px;border-top: 1px solid #e4e4e4}.bottom-wrap-payment{padding: 0px;border-top: 1px solid #e4e4e4}.rated{font-size: 10px;color: #b3b4b6}.btn{display: inline-block;font-weight: 600;color: #343a40;text-align: center;vertical-align: middle;-webkit-user-select: none;-moz-user-select: none;-ms-user-select: none;user-select: none;background-color: transparent;border: 1px solid transparent;padding: 0.45rem 0.85rem;font-size: 1rem;line-height: 1.5;border-radius: 0.2rem}.btn-primary{color: #fff;background-color: #3167eb;border-color: #3167eb}.fa{color: #FF5722}
</style>


<div class="container d-flex justify-content-center">
    <figure class="card card-product-grid card-lg"> <a href="#" class="img-wrap" data-abc="true"> 
        <img src="{{$ProductDetail->gallery}}"> </a>
        <figcaption class="info-wrap">
            <div class="row">
                <div class="col-md-9 col-xs-9"> <a href="#" class="title" data-abc="true">{{$ProductDetail->name}}</a> <span class="rated">Laptops</span> </div>
                <div class="col-md-3 col-xs-3">
                    <div class="rating text-right"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <span class="rated">Rated 4.0/5</span> </div>
                </div>
            </div>
        </figcaption>
        <div class="bottom-wrap-payment">
            <figcaption class="info-wrap">
                <div class="row">
                    <div class="col-md-9 col-xs-9"> <a href="#" class="title" data-abc="true">${{$ProductDetail->price}}</a> <span class="rated">VISA Platinum</span> </div>
                    <div class="col-md-3 col-xs-3">
                        <div class="rating text-right"> #### 8787 </div>
                    </div>
                </div>
            </figcaption>
        </div>
        <div class="bottom-wrap"> <a href="#" class="btn btn-primary float-right" data-abc="true"> Buy now </a>
            <div class="price-wrap"> <a href="#" class="btn btn-warning float-left" data-abc="true"> Cancel </a> </div>
        </div>
    </figure>
</div> --}}

<style>
.hedding {
    font-size: 20px;
    color: #ab8181`;
}

.left-side-product-box img {
    width: 100%;
}

.left-side-product-box .sub-img img {
    margin-top: 5px;
    width: 83px;
    height: 100px;
}

.right-side-pro-detail span {
    font-size: 15px;
}

.right-side-pro-detail p {
    font-size: 25px;
    color: #a1a1a1;
}

.right-side-pro-detail .price-pro {
    color: #E45641;
}

.right-side-pro-detail .tag-section {
    font-size: 18px;
    color: #5D4C46;
}

.pro-box-section .pro-box img {
    width: 100%;
    height: 200px;
}

@media (min-width:360px) and (max-width:640px) {
    .pro-box-section .pro-box img {
        height: auto;
    }
}
</style>

<div class="container">
    <div class="col-lg-12 border p-3 bg-white">
        <div class="row m-0">
            <div class="col-lg-4 left-side-product-box pb-3">
                <img src="{{$ProductDetail->gallery}}" class="border p-3">
            </div>
            <div class="col-lg-8">
                <div class="right-side-pro-detail border p-3 m-0">
                    <div class="row">
                        <div class="col-lg-12">
                            <span>Who What Wear</span>
                            <p class="m-0 p-0">{{$ProductDetail->name}}</p>
                        </div>
                        <div class="col-lg-12">
                            <p class="m-0 p-0 price-pro">RS {{$ProductDetail->price}}</p>
                            <hr class="p-0 m-0">
                        </div>
                        <div class="col-lg-12 pt-2">
                            <h5>Product Detail</h5>
                            <span>
                                {{$ProductDetail->description}}<br>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                quis nostrud exercitation ullamco laboris.</span>
                            <hr class="m-0 pt-2 mt-2">
                        </div>
                        <div class="col-lg-12">
                            <p class="tag-section"><strong>Tag : </strong><a href="">Woman</a><a href="">,Man</a></p>
                        </div>
                        <div class="col-lg-6">
                            <h6>Quantity :</h6>
                            <input type="number" class="form-control form-control-sm text-center" value="1">
                        </div>
                        <div class="col-lg-12 ml-5 ms-5 d-flex pt-3">
                            <form class="mr-3" method="POST" action="/Product/AddToCart">
                                @csrf
                                <input type="hidden" name="product_id" value="{{$ProductDetail->id}}">
                                <button href="#" class="btn btn-primary">Add To Cart</button>
                            </form>
                            <button href="#" class="btn btn-success">Shop Now</button>
                            <br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 text-center pt-3">
                <h4>More Product</h4>
            </div>
        </div>
        <div class="row mt-3 p-0 text-center pro-box-section">
            <div class="col-lg-3 pb-2">
                <div class="pro-box border p-0 m-0">
                    <img src="">
                </div>
            </div>
            <div class="col-lg-3 pb-2">
                <div class="pro-box border p-0 m-0">
                    <img src="">
                </div>
            </div>
            <div class="col-lg-3 pb-2">
                <div class="pro-box border p-0 m-0">
                    <img src="">
                </div>
            </div>
            <div class="col-lg-3 pb-2">
                <div class="pro-box border p-0 m-0">
                    <img src="">
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
