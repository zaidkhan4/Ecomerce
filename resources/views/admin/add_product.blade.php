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
        h1
        {
            color: white;
        }
        label
        {
            display: inline-block;
            width: 250px;
            font-size: 18px!important;
            color: white!important;
        }
        input[type='text']
        {
            width: 350px;
            height: 50px;
        }
        textarea
        {
            width: 450px;
            height: 80px;
        }
        .input_deg
        {
            padding: 15px;
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
           

            <h1>Add Product</h1>



            <div class="div_deg">

                <form action="{{ route('upload_product') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="input_deg">
                      <label>Product Title</label>
                      <input type="text" name="title" required >
                      
                    </div>

                    <div class="input_deg">
                        <label>Description</label>
                        <textarea name="description" required></textarea>                        
                    </div>

                    <div class="input_deg">
                        <label>Price</label>
                        <input type="text" name="price" required >                        
                    </div>

                    <div class="input_deg">
                        <label>Quantity</label>
                        <input type="text" name="qty" required >
                        
                    </div>

                      <div class="input_deg">
                        <label>Product Category</label>
                            <select name="category" id="">
                                <option>Select a Option</option>
                                @foreach ($categores as $categore)
                                    <option value="{{ $categore->category_name }}" >{{ $categore->category_name }}</option>
                                @endforeach
                            </select>                        
                      </div>

                      <div class="input_deg">
                        <label>Product Image</label>
                        <input type="file" name="image"  >
                        
                      </div>
     
                    <div class="col-12 ">
                      <button class="btn btn-success" type="submit">Add Product</button>
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