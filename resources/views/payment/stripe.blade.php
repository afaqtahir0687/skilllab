@extends('layout.master')
@section('content')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Stripe</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .StripeElement {
            background-color: white;
            padding: 8px 12px;
            border-radius: 4px;
            border: 1px solid transparent;
            box-shadow: 0 1px 3px 0 #e6ebf1;
            -webkit-transition: box-shadow 150ms ease;
            transition: box-shadow 150ms ease;
        }

        .StripeElement--focus {
            box-shadow: 0 1px 3px 0 #cfd7df;
        }

        .StripeElement--invalid {
            border-color: #fa755a;
        }

        .StripeElement--webkit-autofill {
            background-color: #fefde5 !important;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8 mt-5">
                <div class="card">
                    <div class="card-header text-center">
                        <h4>Pay</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('paypalstore', ['id' => $id]) }}" method="POST" id="subscribe-form">
                            @csrf
                            <!-- <div class="form-group">
                            <label for="amount">Amount</label>
                            <input id="amount" type="number" name="amount" class="form-control" placeholder="Enter amount">
                            </div> -->
                            <div class="form-group">
                                <label for="card-holder-name">Card Holder Name</label>
                                <input id="card-holder-name" name="card-holder-name" type="text" class="form-control" placeholder="Enter card holder name">
                            </div>
                            <div class="form-group">
                                <label for="card-element">Credit or debit card</label>
                                <div id="card-element" class="form-control"></div>
                                <div id="card-errors" role="alert" class="text-danger mt-2"></div>
                            </div>
                            @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                {{ $error }}<br>
                                @endforeach
                            </div>
                            @endif
                            <div class="form-group text-center">
                                <button id="card-button" data-secret="{{ $intent->client_secret }}" class="btn btn-lg btn-success ">SUBMIT</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Include Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script src="https://js.stripe.com/v3/"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var stripe = Stripe('{{ $stripeKey }}');
            var elements = stripe.elements();
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
            var card = elements.create('card', {
                hidePostalCode: true,
                style: style
            });
            card.mount('#card-element');
            card.addEventListener('change', function(event) {
                var displayError = document.getElementById('card-errors');
                if (event.error) {
                    displayError.textContent = event.error.message;
                } else {
                    displayError.textContent = '';
                }
            });

            const cardHolderName = document.getElementById('card-holder-name');
            const cardButton = document.getElementById('card-button');
            const clientSecret = cardButton.dataset.secret;

            cardButton.addEventListener('click', async (e) => {
                e.preventDefault();
                const {
                    setupIntent,
                    error
                } = await stripe.confirmCardSetup(clientSecret, {
                    payment_method: {
                        card: card,
                        billing_details: {
                            name: cardHolderName.value
                        }
                    }
                });

                if (error) {
                    var errorElement = document.getElementById('card-errors');
                    errorElement.textContent = error.message;
                } else {
                    paymentMethodHandler(setupIntent.payment_method);
                }
            });

            function paymentMethodHandler(payment_method) {
                var form = document.getElementById('subscribe-form');
                var hiddenInput = document.createElement('input');
                hiddenInput.setAttribute('type', 'hidden');
                hiddenInput.setAttribute('name', 'payment_method');
                hiddenInput.setAttribute('value', payment_method);
                form.appendChild(hiddenInput);
                form.submit();
            }
        });
    </script>
</body>

</html>
@endsection