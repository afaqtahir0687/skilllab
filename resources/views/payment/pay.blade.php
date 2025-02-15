@extends('layout.master')
@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Payment</title>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    </head>

    <body style="background-color: #f4f4f4;">
        <div class="container mt-4">
            <div class="row justify-content-center">
                <div class="col-md-8 mt-4">
                    <div class="card" style="background-color: white;">
                        <table class="table table-bordered">
                            <div class="card-header text-center">
                                <h5>Product Detail</h5>
                            </div>
                            <tbody>
                                <tr>
                                    <td><strong>Product Name:</strong></td>
                                    <td>{{ $product->name }}</td>
                                </tr>
                               
                                <tr>
                                    <td><strong>Product Price:</strong></td>
                                    <td>{{ number_format($product->price, 2) }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Product Currency:</strong></td>
                                    <td>{{ $product->currency }}</td>
                                </tr>
                                {{-- <tr>
                                    <td><strong>Status:</strong></td>
                                    <td>{{ $product->status }}</td>
                                </tr> --}}
                            </tbody>
                        </table>
                        <div class="text-center mt-2 mb-2">
                            @if ($product->status != 'Paid')
                                <div class="btn-group">
                                    <a href="{{ route('paystripe', ['id' => $product->id]) }}"
                                        class="btn btn-primary">Pay via Card</a>
                                    <form action="{{ route('paypalstore', ['id' => $product->id]) }}"
                                        method="post" class="ms-2">
                                        @csrf
                                        <button type="submit" class="btn btn-success">Pay with PayPal</button>
                                    </form>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
    </html>
@endsection