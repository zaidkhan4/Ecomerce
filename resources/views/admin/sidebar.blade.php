<div class="d-flex align-items-stretch">
    <!-- Sidebar Navigation-->
    <nav id="sidebar">
      <!-- Sidebar Header-->
      <div class="sidebar-header d-flex align-items-center">
        <div class="avatar"><img src="{{ asset('/admin_css/img/avatar-6.jpg') }}" alt="..." class="img-fluid rounded-circle"></div>
        <div class="title">
          <h1 class="h5">Mark Stephen</h1>
          <p>Web Designer</p>
        </div>
      </div>
      <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
      <ul class="list-unstyled">
            <li>
                <a href="{{ route('admin.dashboard') }}"> <i class="icon-home"></i>Home </a>
            </li>
            <li>
                <a href="{{ route('view_category') }}">
                    <i class="fas fa-th-large"></i>Category
                 </a>
            </li>


            <li>
                <a href="{{ route('view_brand') }}">
                     <i class="icon-grid"></i>Brand
                 </a>
            </li>

            <li>
                <a href="{{ route('showcontact') }}">
                     <i class="icon-grid"></i>Messages
                 </a>
            </li>


            <li>
                <a href="{{ route('banershow') }}">
                     <i class="icon-grid"></i>Baners
                 </a>
            </li>




              <li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-windows"></i>Product </a>
                <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                  <li><a href="{{ route('add_product') }}">Add Product</a></li>
                  <li><a href="{{ route('view_product') }}">View Product</a></li>

                </ul>
              </li>



              <li>
                <a href="{{ route('view_products') }}">
                     <i class="icon-grid"></i>Orders
                 </a>
            </li>

      </ul>
    </nav>
