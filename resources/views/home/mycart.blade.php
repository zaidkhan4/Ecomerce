<!DOCTYPE html>
<html>

<head>
    @include('home.css')

    <style type="text/css">

        .div_deg
        {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 60px;
        }
        table
        {
            border: 2px solid black;
            text-align: center;
            width: 800px;
        }
        th
        {
            border: 2px solid black;
            text-align: center;
            color: white;
            font: 20px;
            font-weight: bold;
            background-color: black;
        }
        td
        {
            border: 1px solid black;
        }
        .cart_value
        {
            text-align: center;
            margin-bottom: 70px;
            padding: 18px;
        }
        .order_deg
        {
            display: flex;
            justify-content: center;
            align-items: center;
            padding-right: 100px;
            margin-top: -40px;
        }
        label
        {
            display: inline-block;
            width: 150px;
        }
        .div_gap
        {
            padding: 20px;
        }




    </style>


</head>

<body>
  <div class="hero_area">

    @include('home.header')

</div>



<div class="div_deg">


    <table>
        <tr>
            <th>Product Title</th>
            <th>Price</th>
            <th>Image</th>
            <th>Remove</th>
        </tr>

        @php
            $value = 0;
        @endphp

        @foreach ($carts as $cart)
            <tr>
                <td>{{ $cart->product->title }}</td>
                <td>{{ $cart->product->price }}</td>
                <td>
                    <img width="100" src="/products/{{ $cart->product->image }}" alt="">
                </td>
                <td>
                    <a href="{{ route('remove_cart', $cart->id) }}" class="btn btn-danger">Remove</a>
                </td>
            </tr>

            @php
                if (isset($cart->product) && isset($cart->product->price) && is_numeric($cart->product->price)) {
                    $value += $cart->product->price;
                }
            @endphp
        @endforeach
    </table>
</div>

<div class="cart_value">
    <h3>Total Value of cart is : ${{$value }}</h3>
</div>






<div class="order_deg">
    <form action="{{ route('confirm_order') }}" method="post">
        @csrf

        <div class="div_gap">
            <label for="">Receiver Name</label>
            <input type="text" name="name" value="{{ Auth::check() ? Auth::user()->name : '' }}">
        </div>

        <div class="div_gap">
            <label for="">Receiver Address</label>
            <textarea name="address">{{ Auth::check() ? Auth::user()->address : '' }}</textarea>
        </div>

        <div class="div_gap">
            <label for="">Receiver Phone</label>
            <input type="text" name="phone" value="{{ Auth::check() ? Auth::user()->phone : '' }}">
        </div>

        <div class="div_gap">
            <input type="submit" class="btn btn-primary" value="Cash on delivery">

            <a href="{{ route('home.stripe',$value) }}" class="btn btn-success">Pay Using Cart</a>

        </div>
    </form>
</div>





  @include('home.footer')


</body>

</html>
