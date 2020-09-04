@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 order-block">
            <form id="order-form">
                <h3>ORDER DETAILS</h3>
                @if (Session::has('success'))
                <div class="alert alert-success text-center">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                    <p>{{ Session::get('success') }}</p>
                </div>
                @endif
                <div class="form-group">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="title" id="mr" value="mr" checked>
                        <label class="form-check-label" for="mr">Mr</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="title" id="mrs" value="mrs">
                        <label class="form-check-label" for="mrs">Mrs</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="title" id="miss" value="miss">
                        <label class="form-check-label" for="miss">Miss</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="title" id="rabbi" value="rabbi">
                        <label class="form-check-label" for="rabbi">Rabbi</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="title" id="doctor" value="doctor">
                        <label class="form-check-label" for="doctor">Doctor</label>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="first_name">First name</label>
                        <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First Name" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="second_name">Last name</label>
                        <input type="text" class="form-control" id="second_name" name="last_name" placeholder="Last name" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                </div>
                <button type="button" class="btn btn-link" data-toggle="collapse" data-target="#company-group">+ Add a company</button>
                <div class="form-group collapse" id="company-group">
                    <label for="company">Company</label>
                    <input type="text" class="form-control" id="company" name="company" placeholder="Company">
                </div>
                <div class="form-group">
                    <label for="countries">Country</label>
                    <select id="countries" class="form-control" name="country">
                        @foreach($countries as $country)
                            <option value="{{ $country['name'] }}">{{ $country['name'] }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="shipping_address">Shipping address</label>
                    <input type="text" class="form-control" id="shipping_address" name="shipping_address" placeholder="Enter here" required>
                </div>
                <div class="form-group">
                    <label for="billing_address">Billing address</label>
                    <input type="text" class="form-control" id="billing_address" name="billing_address" placeholder="Enter here">
                </div>
                <div class="form-row">
                    <div class="form-group col-md-2">
                        <label for="zip">Zip</label>
                        <input type="text" class="form-control" id="zip" name="zip" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="city">City</label>
                        <input type="text" class="form-control" id="city" name="city" required>
                    </div>
                    <div class="form-group col-md-4 states-block">
                        <label for="state">State</label>
                        <select id="state" class="form-control" name="state">
                            <option value="" selected></option>
                            @foreach($states as $state)
                                <option value="{{ $state }}">{{ $state }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-12">
                    <button type="button" class="btn btn-lg btn-block clr-btn" id="next">Next</button>
                </div>
            </form>
        </div>

        <div class="col-md-8 payment-block">
            <div class="credit-card-box">
                <div class="panel-heading">
                    <div class="row">
                        <h3>TICKET HOLDER INFORMATION</h3>
                    </div>
                </div>
                <div class="panel-body">

                    <form role="form" action="{{ route('payment') }}" method="post" class="require-validation" data-cc-on-file="false" data-stripe-publishable-key="{{ config('services.stripe.publishable') }}" id="payment-form">
                        @csrf

                        <div class='form-row row'>
                            <div class='col-xs-12 form-group required'>
                                <label class='control-label'>Name on Card</label> <input class='form-control' size='4' type='text'>
                            </div>
                        </div>

                        <div class='form-row row'>
                            <div class='col-xs-12 form-group card required'>
                                <label class='control-label'>Card Number</label> <input autocomplete='off' class='form-control card-number' size='20' type='text'>
                            </div>
                        </div>

                        <div class='form-row row'>
                            <div class='col-xs-12 col-md-4 form-group cvc required'>
                                <label class='control-label'>CVC</label> <input autocomplete='off' class='form-control card-cvc' placeholder='ex. 311' size='4' type='text'>
                            </div>
                            <div class='col-xs-12 col-md-4 form-group expiration required'>
                                <label class='control-label'>Expiration Month</label> <input class='form-control card-expiry-month' placeholder='MM' size='2' type='text'>
                            </div>
                            <div class='col-xs-12 col-md-4 form-group expiration required'>
                                <label class='control-label'>Expiration Year</label> <input class='form-control card-expiry-year' placeholder='YYYY' size='4' type='text'>
                            </div>
                        </div>

                        <div class='form-row row'>
                            <div class='col-md-12 error form-group hide'>
                                <div class='alert-danger alert'>Please correct the errors and try
                                    again.</div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-4">
                                <button class="btn btn-link btn-lg btn-block" type="button" id="back">Back</button>
                            </div>
                            <div class="col-xs-8">
                                <button class="btn btn-lg btn-block clr-btn" type="submit">Check out</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-md-offset-1 order-summary d-table">
            <h3>ORDER SUMMARY</h3>
            <div class="form-group col-md-12">
                <span>$180 Men's Ticket's X 4 </span>
                <span>$180</span>
            </div>
            <div class="form-group col-md-12" id="total">
                <p>Total: $720</p>
            </div>
            <div class="form-group col-md-12">
                <p>Please note that you only have <span id="timer"></span> minutes to complete the transaction
                    before your tickets are re-released.</p>
            </div>
        </div>

        
    </div>
</div>
@endsection