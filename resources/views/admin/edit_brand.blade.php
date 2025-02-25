<!DOCTYPE html>
<html>
  <head>

    @include('admin.css')


    <style>
        .div_cat
        {
            margin-left: 350px;
            margin-top: 100px;
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


            <h1>Update Brand</h1>



            <div class="div_cat">

                <form action="{{ route('update_brand', $brand->id) }}" method="post">
                    @csrf

                    <div class="col-md-4 position-relative mb-5">
                      <label for="" class="form-label"><h3>Add Brand</h3></label>
                      <input type="text" name="brand_name" class="form-control" placeholder="Enter Brand" required
                          value="{{ $brand->brand_name }}"  >

                    </div>

                    <div class="col-12 ">
                      <button class="btn btn-primary" type="submit">Update Brand</button>
                    </div>
                </form>

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
