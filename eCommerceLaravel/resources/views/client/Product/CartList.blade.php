@extends('layout.client')

@section('client')
    <div class="site-section">
        <div class="container">


            {{-- ___________________ tOTAL cART lIST __________________ --}}
            <div class="row mb-5">
                <div class="col-md-12">

                    <a href="{{url('/Product/Order')}}" class="btn btn-primary height-auto btn-sm">
                        Go to CheckOut
                    </a>
                    <br><br>

                    <div class="site-blocks-table">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="product-thumbnail">Image</th>
                                    <th class="product-name">Product</th>
                                    <th class="product-price">Price</th>
                                    <th class="product-quantity">Quantity</th>
                                    <th class="product-total">Total</th>
                                    <th class="product-remove">Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($CartList as $p)
                                    <tr>
                                        <td class="product-thumbnail">
                                            <img src="{{ $p->gallery }}" alt="Image" class="img-fluid">
                                        </td>
                                        <td class="product-name">
                                            <h2 class="h5 text-black">{{ $p->name }}</h2>
                                        </td>
                                        <td>RS {{ $p->price }}</td>

                                        <td>
                                            <form action="{{ url('/Product/UpdateQuantity') }}/{{ $p->cart_id }}"
                                                class="d-flex align-content-center justify-content-center">
                                                @csrf
                                                <div class="input-group mb-3" style="max-width: 120px;">
                                                    <div class="input-group-prepend">
                                                        <button class="btn btn-outline-primary " type="submit"
                                                            name="quantity_change" value="-1">&minus;</button>
                                                    </div>

                                                    <input type="text" class="form-control text-center"
                                                        value='{{ $p->quantity }}' placeholder=""
                                                        aria-label="Example text with button addon"
                                                        aria-describedby="button-addon1">

                                                    <div class="input-group-append">
                                                        <button class="btn btn-outline-primary " type="submit"
                                                            name="quantity_change" value="1">&plus;</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </td>

                                        <td>{{ $p->price * $p->quantity }}</td>
                                        <td><a href="/Product/Remove/{{ $p->cart_id }}"
                                                class="btn btn-primary height-auto btn-sm">X</a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            {{-- <div class="row">
              <div class="col-md-12 text-center">
                <div class="site-block-27">
                  <ul>
                    <li><a href="#">&lt;</a></li>
                    <li class="active"><span>1</span></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                    <li><a href="#">&gt;</a></li>
                  </ul>
                </div>
              </div>
            </div> --}}

            {{-- @if (!$hidePagination)
                <div class="row">
                    <div class="col-md-12 text-center">
                        <div class="site-block-27">
                            {{ $CartList->links() }}
                        </div>
                    </div>
                </div>
            @endif --}}

            {{-- _____ Adding Pagination ______ --}}
            @if ($CartList->lastPage() > 1)
                <div class="row">
                    <div class="col-md-12 text-center">
                        <div class="site-block-27">
                            <ul>
                                @if ($CartList->onFirstPage())
                                    <li class="disabled"><span>&lt;</span></li>
                                @else
                                    <li><a href="{{ $CartList->previousPageUrl() }}">&lt;</a></li>
                                @endif

                                @for ($i = 1; $i <= $CartList->lastPage(); $i++)
                                    @if ($i == $CartList->currentPage())
                                        <li class="active"><span>{{ $i }}</span></li>
                                    @else
                                        <li><a href="{{ $CartList->url($i) }}">{{ $i }}</a></li>
                                    @endif
                                @endfor

                                @if ($CartList->hasMorePages())
                                    <li><a href="{{ $CartList->nextPageUrl() }}">&gt;</a></li>
                                @else
                                    <li class="disabled"><span>&gt;</span></li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            @endif


        </div>
    </div>
@endsection
