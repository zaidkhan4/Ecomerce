<!DOCTYPE html>
<html>
  <head> 
   
    @include('admin.css')


  <style type="text/css">


        .table_center
        {
            display: flex;
            justify-content: center;
            align-items: center;
        }
        table
        {
            border: 2px solid skyblue;
            text-align: center;
            width: 1200px;
        }
        th
        {
            border: 2px solid skyblue;
            text-align: center;
            color: white;
            font: 20px;
            color: white;
            font-weight: bold;
            background-color: skyblue; 
        }
        td
        {
            border: 1px solid skyblue;
            color: white;
            padding: 10px;

        }


</style>

  </head>
  <body>
  
    @include('admin.header')


    @include('admin.sidebar')


   
      <!-- Sidebar Navigation end-->
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">



            <div class="table_center">
                <table>

                    <tr>
                        <th>Customer Name</th>
                        <th>Address</th>
                        <th>Phone</th>
                        <th>Products Title</th>
                        <th>Price</th>
                        <th>Image</th>
                        <th>Status</th>
                        <th>Change Status</th>
                        <th>Change PDF</th>
                    </tr>
                    @foreach ($orders as $order)
                        <tr>
                            <td>{{ $order->name }}</td>
                            <td>{{ $order->rec_address }}</td>
                            <td>{{ $order->phone }}</td>
                            <td>{{ $order->product->title }}</td>
                            <td>{{ $order->product->price }}</td>
                            <td>
                                <img width="100" src="products/{{ $order->product->image }}" alt="">
                            </td>
                            <td>
                                @if ($order->status == 'in progress')
                                    <span style="color: red">{{ $order->status }}</span>

                                @elseif ($order->status == 'on the way')

                                <span style="color: skyblue">{{ $order->status }}</span>

                                @else
                                <span style="color: yellow">{{ $order->status }}</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('on_the_way',$order->id) }}" class="btn btn-success">On the Way</a>

                                <a href="{{ route('delivered',$order->id) }}" class="btn btn-danger">Delivered</a>

                            </td>
                            <td>
                                <a href="{{ route('change_pdf',$order->id) }}" class="btn btn-warning">Change PDF</a>
                            </td>
                        </tr>
                    @endforeach
                    
                </table>
            </div>




           

            

          </div>
      </div>
    </div>
    <!-- JavaScript files-->
    <script src="{{ asset('/admin_css/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('/admin_css/vendor/popper.js/umd/popper.min.js') }}"> </script>
    <script src="{{ asset('/admin_css/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('/admin_css/vendor/jquery.cookie/jquery.cookie.js') }}"> </script>
    <script src="{{ asset('/admin_css/vendor/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('/admin_css/vendor/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('/admin_css/js/charts-home.js') }}"></script>
    <script src="{{ asset('/admin_css/js/front.js') }}"></script>
  </body>
</html>