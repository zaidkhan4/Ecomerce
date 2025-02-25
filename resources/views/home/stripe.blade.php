<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="robots" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Payment Status">
    <title>Payment Status</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <div class="row">
        <div class="col-12 text-center">

            <!-- Payment Status Messages -->
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @elseif (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
             <!-- Payment Form -->

             <h1>You need to pay: ${{ $value }}</h1>
            <div class="payment-status">
                <form action="{{ route('home.payment',$value) }}" method="POST" id="payment-form">
                    @csrf

                    <script src="https://checkout.stripe.com/checkout.js" class="stripe-button" id="stripe-button"
                            data-key="pk_test_51PoS8nKNFGL075Q77cDEzMR3KnmVj1Toy8ywwFr5Gg1zsHHdGcPQVCthTIiJ7cluaHJrr2MvvtqZ9LyouS5tn39i003wDR29RF"
                            data-name="Unity Coding"
                            data-description="Unity Coding Developers"
                            data-currency="usd"
                            data-image="{{ asset('logo.png') }}">
                    </script>
                </form>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12 text-right mt-3">
            <a href="{{ route('mycart') }}" class="btn btn-primary">Back</a>
        </div>
    </div>
</div>

</body>
</html>
