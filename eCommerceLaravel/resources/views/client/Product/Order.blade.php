@extends('layout.client')

@section('client')
    <div class="site-section">
        <div class="container"> 
              

            {{-- ___________________ checkOut __________________ --}}
            <div class="row">
                
                <div class="col-md-6">
                    {{-- ______________ Coupon _________________ --}}
                    <form>
                        <div class="row">
                            <div class="col-md-12">
                                <label class="text-black h4" for="coupon">Coupon</label>
                                <p>Enter your coupon code if you have one.</p>
                            </div>
                            <div class="col-md-8 mb-3 mb-md-0">
                                <input type="text" class="form-control py-3" id="coupon" placeholder="Coupon Code">
                            </div>
                            <div class="col-md-4">
                                <button class="btn btn-primary btn-sm px-4">Apply Coupon</button>
                            </div>
                        </div>
                    </form>

                    {{-- ______________ Personal information _________________ --}}
                    {{-- ====== open Form ====== --}}
                    <form method="post" action="/">
                    <div class="row">
                        <div class="col-md-12">
                            <br><br>
                            <label class="text-black h4" for="coupon">Personal Information</label>
                            <p>Enter your Personal information</p>
                        </div>
                        <div class="col-md-6 mb-3 mb-md-0">
                            <input type="text" class="form-control py-3" id="name" name="name" placeholder="Enter Name">
                        </div>
                        <div class="col-md-6">
                            <input type="email" class="form-control py-3" id="email" name="email" placeholder="Enter Email">     
                        </div>
                        <div class="col-md-12">
                            <br>
                            <textarea type="text" rows="2" class="form-control py-3" id="address" name="address" placeholder="Enter Address"></textarea>
                        </div>
                        <div class="col-md-12">
                            <br>
                            <label for="deliveryAddress" class="text-black">Delevery Adderess</label>
                            <textarea type="text" rows="2" class="form-control py-3" id="deliveryAddress" name="deliveryAddress"  placeholder="Enter Delivery Address" required></textarea>
                        </div>
                        <div class="col-md-6">
                            <br>
                            <input type="text" class="form-control py-3" id="phone" name="phone" placeholder="Enter Phone#">     
                        </div>
                        <div class="col-md-6">
                            <br>
                            <input type="text" class="form-control py-3" id="mobile" name="mobile" placeholder="Enter Mobile#">     
                        </div>
                    </div>

                    {{-- ______________ Payment | Delevery Information _________________ --}}
                    <div class="row"> 
                        {{-- ______________ Payment information _________________ --}}
                        <div class="col-md-6">
                            <br><br>
                            <label class="text-black h4" for="coupon">Payment Information</label>
                            <p class="text-black">Enter your Billling information</p>

                            @foreach ($proDto->paymentMethod as $item)
                                <label><input type="radio" value="{{$item->id}}" name="payment"> &nbsp; {{$item->payment_method_name}}</label>
                                <br>
                            @endforeach
                        </div>

                        {{-- ______________ Delivery information _________________ --}}
                        <div class="col-md-6 mb-3 mb-md-0">
                            <br><br>
                            <label class="text-black h4" for="coupon">Delevery Type</label>
                            <p class="text-black">Select Delevery Type</p>
                            @foreach ($proDto->delevery_type as $item)
                                <label><input type="radio" value="{{$item->id}}" name="payment"> &nbsp; {{$item->delivery_type_name}}</label>
                                <br>
                            @endforeach
                        </div> 
                    </div>


                </div>
                {{-- ______________ Totals _________________ --}}
                <div class="offset-md-6 col-md-6 pl-5">
                    <div class="row justify-content-end">
                        <div class="col-md-7">
                            <div class="row">
                                <div class="col-md-12 text-right border-bottom mb-5">
                                    <h3 class="text-black h4 text-uppercase">Cart Totals</h3>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <span class="text-black">TotalItem</span>
                                </div>
                                <div class="col-md-6 text-right">
                                    <input type="hidden" name="totalItem" value="{{$proDto->totalItems}}">
                                    <strong class="text-black">Rs {{$proDto->totalItems}}</strong>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <span class="text-black">Subtotal</span>
                                </div>
                                <div class="col-md-6 text-right">
                                    <input type="hidden" name="totalValue" value="{{$proDto->totalValue}}">
                                    <strong class="text-black">Rs {{$proDto->totalValue}}</strong>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <span class="text-black">Deleviery Charges</span>
                                </div>
                                <div class="col-md-6 text-right">
                                    @php
                                        $delveryCharges = 119;
                                    @endphp
                                    <strong class="text-black">119</strong>
                                    <input type="hidden" name="delveryCharges" value="119">
                                </div>
                            </div>
                            <div class="row mb-5">
                                <div class="col-md-6">
                                    <span class="text-black">Total Bill</span>
                                </div>
                                <div class="col-md-6 text-right">
                                    @php
                                        $totalBill = $proDto->totalValue + 119;
                                    @endphp
                                    <strong class="text-black">{{$totalBill}}</strong>
                                    <input type="hidden" name="delveryCharges" value="{{$totalBill}}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <button class="btn btn-primary btn-lg btn-block"
                                        onclick="window.location='checkout.html'">Proceed
                                        To Checkout</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </form>
                {{-- ====== End Form ===== --}}
            </div>

        </div>
    </div>
@endsection
