<!DOCTYPE html>
<html>
  <head>

    @include('admin.css')


    <style>

        .div_deg
        {
            display: flex;
            justify-content: center;
            align-content: center;
            margin-top: 60px;
        }
        .table_deg
        {
            border: 2px solid greenyellow;
        }
        th
        {
            background-color: skyblue;
            color: white;
            font-size: 19px;
            font-weight: bold;
            padding: 15px;
        }
        td
        {
            border: 1px solid skyblue;
            text-align: center;
            color: white;
        }
        input[type='search']
        {
            width: 500px;
            height: 60px;
            margin-left: 50px;
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

            <form action="{{ route('product_search') }}" method="get">
                @csrf
                <input type="search" name="search" >
                <input type="submit" class="btn btn-secondary" value="Search">
            </form>




           <div class="div_deg">


            <table class="table_deg">

                <tr>
                    <th>#</th>
                    <th>Product Title</th>
                    <th>Description</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Image</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>

                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->title }}</td>
                        <td>{!! Str::words($product->description,40) !!}</td>
                        <td>{{ $product->category }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->quantity }}</td>
                        <td>
                            <img width="100px" height="100px" src="products/{{ $product->image }}" alt="">
                        </td>
                        <td>
                            <a href="{{ route('edit_product',$product->slug) }}" class="btn btn-success" >Edit</a>
                        </td>
                        <td>
                            <a href="{{ route('delete_product',$product->id) }}" class="btn btn-danger" onclick="confirmation(event)" >Delete</a>
                        </td>
                    </tr>

                @endforeach

            </table>



           </div>

           <div class="div_deg">

                {{ $products->links() }}

           </div>












          </div>
      </div>
    </div>
    <!-- JavaScript files-->


    <script type="text/JavaScript">
        function confirmation(ev) {
            ev.preventDefault();
            var urlToRedirect = ev.currentTarget.getAttribute('href'); // Corrected this line
            console.log(urlToRedirect);

            swal({
                title: "Are you sure to Delete this",
                text: "This delete will be permanent",  // Corrected typo in "permanent"
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willCancel) => {
                if (willCancel) {
                    window.location.href = urlToRedirect;
                }
            })
        }
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
        integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer">
    </script>





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
