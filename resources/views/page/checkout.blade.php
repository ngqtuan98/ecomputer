    @extends('master')
    @section('extra-css')
    <script src="https://js.stripe.com/v3/"></script>
    @endsection
    @section('content')
    <!-- Start Banner Area -->
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>Checkout</h1>
                    <nav class="d-flex align-items-center">
                        <a href="index.html">Home<span class="lnr lnr-arrow-right"></span></a>
                        <a href="single-product.html">Checkout</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->

    <!--================Checkout Area =================-->
    <section class="checkout_area section_gap">
        @if(session()->has('success_message'))
        <div class="alert alert-success">
            {{session()->get('success_message')}}
        </div>
        @endif
        @if(count($errors)>0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="container">
            <div class="billing_details">
                <div class="row">
                    <div class="col-lg-8">
                        <form action="{{route('checkout.store')}}" method="post" id="payment-form">
                            {{csrf_field()}}
                            <h3>Billing Details</h3>
                            <div class="col-md-12 form-group p_star">
                                <label>Name</label>
                                <input type="text" class="form-control" id="name_on_card" name="name_on_card" required>
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <label>Email</label>
                                <input type="text" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <label>Phone</label>
                                <input type="text" class="form-control" id="number" name="number" required>
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <label>Address</label>
                                <input type="text" class="form-control" id="add1" name="add1">
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <label>City</label>
                                <input type="text" class="form-control" id="city" name="city">
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <label>Province</label>
                                <input type="text" class="form-control" id="province" name="province">
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <label>Postalcode</label>
                                <input type="text" class="form-control" id="postalcode" name="postalcode">
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <label for="card-element">
                                    Credit or debit card
                                </label>
                                <div id="card-element">
                                    <!-- A Stripe Element will be inserted here. -->
                                </div>

                                <!-- Used to display form errors. -->
                                <div id="card-errors" role="alert"></div>
                            </div>
                            <input type="submit" class="form-control" />
                        </form>
                    </div>
                    <div class="col-lg-4">
                        <div class="order_box">
                            <h2>Your Order</h2>
                            <ul class="list">
                                <li><a href="#">Product <span>Quanlity</span></a></li>
                                @foreach(Cart::content() as $item)
                                <li><a href="#">{{$item->model->slug}} <span class="middle">x {{$item->qty}}</span> </a></li>
                                @endforeach
                            </ul>
                            <ul class="list list_2">
                                <li><a href="#">Subtotal <span>{{number_format(Cart::subtotal())}} VNĐ</span></a></li>
                                <li><a href="#">Tax 10%: <span>{{number_format(Cart::tax())}}</span></a></li>
                                <li><a href="#">Total <span>{{number_format(Cart::total())}} VNĐ</span></a></li>
                            </ul>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Checkout Area =================-->
    @endsection

    @section('extra-js')
    <script>
        (function() {
            // Create a Stripe client.
            var stripe = Stripe('pk_test_qqqOVnfNy7JpCaWWllxG4Bg800liCchrnE');

            // Create an instance of Elements.
            var elements = stripe.elements();

            // Custom styling can be passed to options when creating an Element.
            // (Note that this demo uses a wider set of styles than the guide below.)
            var style = {
                base: {
                    color: '#32325d',
                    fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                    fontSmoothing: 'antialiased',
                    fontSize: '16px',
                    '::placeholder': {
                        color: '#aab7c4'
                    }
                },
                invalid: {
                    color: '#fa755a',
                    iconColor: '#fa755a'
                }
            };

            // Create an instance of the card Element.
            var card = elements.create('card', {
                style: style
            });

            // Add an instance of the card Element into the `card-element` <div>.
            card.mount('#card-element');

            // Handle real-time validation errors from the card Element.
            card.addEventListener('change', function(event) {
                var displayError = document.getElementById('card-errors');
                if (event.error) {
                    displayError.textContent = event.error.message;
                } else {
                    displayError.textContent = '';
                }
            });

            // Create a token or display an error when the form is submitted.
            var form = document.getElementById('payment-form');
            form.addEventListener('submit', function(event) {
                event.preventDefault();

                var options = {
                    name: document.getElementById('name_on_card').value,
                    address_line1: document.getElementById('add1').value,
                    address_city: document.getElementById('city').value,
                    address_state: document.getElementById('province').value,
                    address_zip: document.getElementById('postalcode').value,

                }

                stripe.createToken(card, options).then(function(result) {
                    if (result.error) {
                        // Inform the customer that there was an error.
                        var errorElement = document.getElementById('card-errors');
                        errorElement.textContent = result.error.message;
                    } else {
                        // Send the token to your server.
                        stripeTokenHandler(result.token);
                    }
                });
            });

            function stripeTokenHandler(token) {
                // Insert the token ID into the form so it gets submitted to the server
                var form = document.getElementById('payment-form');
                var hiddenInput = document.createElement('input');
                hiddenInput.setAttribute('type', 'hidden');
                hiddenInput.setAttribute('name', 'stripeToken');
                hiddenInput.setAttribute('value', token.id);
                form.appendChild(hiddenInput);

                // Submit the form
                form.submit();
            }

        })();

        // Submit the form with the token ID.
    </script>
    @endsection