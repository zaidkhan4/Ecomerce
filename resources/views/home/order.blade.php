<!DOCTYPE html>
<html>

<head>
    @include('home.css')


    
  <style type="text/css">


    .table_center
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
        font-size: 20px;
        color: white;
        font-weight: bold;
        background-color: black; 
    }
    td
    {
        border: 1px solid skyblue;
        padding: 10px;

    }


</style>



</head>

<body>
  <div class="hero_area">

    @include('home.header')


    <div class="table_center">
        <table>

            <tr>
                <th>Product Name</th>
                <th>Price</th>
                <th>Delivery Status</th>
                <th>Image</th>
            </tr>
            @foreach ($orders as $order)
                <tr>
                    <td>{{ $order->product->title }}</td>
                    <td>{{ $order->product->price }}</td>
                    <td>{{ $order->status }}</td>
                    <td>
                        <img width="100" height="100" src="products/{{ $order->product->image }}" alt="">
                    </td>
                    
                </tr>
            @endforeach
                        
        </table>
    </div>




</div>
 

  

  

  @include('home.footer')


</body>

</html>