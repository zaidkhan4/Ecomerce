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
        h2{
            margin-top: 50px;
        }
        .table_deg
        {
            text-align: center;
            margin: auto;
            margin-top: 50px;
        }
        th
        {
            background-color: skyblue;
            padding: 15px;
            font-size: 20px;
            font-weight: bold;
            color: white;
        }
        td
        {
            color: skyblue;
            padding: 10px;
            color: white;
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







    <h2>All Message</h2>
            <div >

                <table class="table_deg table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Message</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($contacts as $contact)

                            <tr>
                                <td>{{ $contact->id }}</td>
                                <td>{{ $contact->name }}</td>
                                <td>{{ $contact->email }}</td>
                                <td>{{ $contact->phone }}</td>
                                <td>{{ $contact->message }}</td>


                                <td>
                                    <a href="{{ route('deletecontact',$contact->id ) }}" class="btn btn-danger" onclick="confirmation(event)">Delete</a>
                                </td>

                            </tr>

                        @endforeach
                    </tbody>
                </table>

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
