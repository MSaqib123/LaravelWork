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
                            <input type="text" class="form-control py-3" id="Name" placeholder="Enter Name">
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control py-3" id="Email" placeholder="Enter Email">     
                        </div>
                        <div class="col-md-12">
                            <br>
                            <textarea type="text" rows="2" class="form-control py-3" id="Email" placeholder="Enter Address"></textarea>
                        </div>
                        <div class="col-md-6">
                            <br>
                            <input type="text" class="form-control py-3" id="Email" placeholder="Enter Phone#">     
                        </div>
                        <div class="col-md-6">
                            <br>
                            <input type="text" class="form-control py-3" id="Email" placeholder="Enter Mobile#">     
                        </div>
                    </div>

                    {{-- ______________ Payment information _________________ --}}
                    <div class="row">
                        <div class="col-md-12">
                            <br><br>
                            <label class="text-black h4" for="coupon">Payment Information</label>
                            <p>Enter your Billling information</p>
                        </div>
                        <div class="col-md-12 mb-3 mb-md-0">
                           <label><input type="radio" value="JazzCash" name="payment"> &nbsp; Jazz Cash online</label>
                           <br>
                           <label><input type="radio" value="Bank" name="payment"> &nbsp; Bank Cash</label>
                           <br>
                           <label><input type="radio" value="Debet" name="payment"> &nbsp; Debet Cart</label>
                           <br>
                           <label><input type="radio" value="Payneer" name="payment"> &nbsp; Payneer</label>
                           <br>
                           <label><input type="radio" value="Cash" name="payment"> &nbsp; Cash on Deleivery</label>
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
                                    <strong class="text-black">Rs {{$proTotal->totalItems}}</strong>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <span class="text-black">Subtotal</span>
                                </div>
                                <div class="col-md-6 text-right">
                                    <strong class="text-black">Rs {{$proTotal->totalValue}}</strong>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <span class="text-black">Deleviery Charges</span>
                                </div>
                                <div class="col-md-6 text-right">
                                    <strong class="text-black">119</strong>
                                </div>
                            </div>
                            <div class="row mb-5">
                                <div class="col-md-6">
                                    <span class="text-black">Total Bill</span>
                                </div>
                                <div class="col-md-6 text-right">
                                    <strong class="text-black">{{$proTotal->totalValue + 119}}</strong>
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
