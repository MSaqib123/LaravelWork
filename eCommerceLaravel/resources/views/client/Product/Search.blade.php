@extends('layout.client')
@section('client')

    <div class="container">
        <h1 class="text-center">Total Products Searched</h1>
        <div class="row mb-5">
            
            @foreach ($Product as $item)
                <div class="col-lg-3 col-md-4 item-entry mb-4">
                    <a href="/Product/Detail/{{$item->id}}" class="product-item md-height bg-gray d-block">
                        <img src="{{$item->gallery}}" alt="Image" class="img-fluid">
                    </a>
                    <h2 class="item-title"><a href="#">{{$item->name}}</a></h2>
                    <strong class="item-price">Rs {{$item->price}}</strong><br> 
                    <small>{{$item->description}}</small>
                </div>    
            @endforeach
        </div>
    </div>

@endsection