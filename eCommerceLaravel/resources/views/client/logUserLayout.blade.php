@extends('layout.client')

@section('client')
    <div class="site-section" style="padding: 15px">
            <div class="row mb-5">
                <div class="col-md-3 order-1 mb-5 mb-md-0">
                    <div class=" p-4 mb-4">
                        <h3 class="mb-3 h6 text-uppercase text-black d-block">User's Settings</h3>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-1"><a href="{{route('LogUser.index')}}" class="d-flex"><span>Profile</span></a></li>
                            <li class="mb-1"><a href="#" class="d-flex"><span>Orders</span></a></li>
                            <li class="mb-1"><a href="#" class="d-flex"><span>Return or Replace</span> 
                                {{-- <span class="text-black ml-auto">(2,124)</span> --}}
                            </a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-9 order-2">
                    <div class=" p-4 rounded mb-4" style="min-height: 600px">
                        <div class="row mb-5 pl-4">
                            @yield('logUser')
                        </div>
                    </div>
                </div>
            </div>
        
    </div>
@endsection
