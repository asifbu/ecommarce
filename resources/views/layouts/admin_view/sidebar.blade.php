<div class="user-panel mt-3 pb-3 mb-3 d-flex">
    <div class="image">
      <img src="{{asset('./admin_view/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
    </div>
    <div class="info">
      <a href="{{url('/admin/dashboard')}}" class="d-block"> Dashboard</a>
    </div>
  </div>

<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
           <li class="nav-item">
            <a href="{{url('/admin/categories')}}" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Categories</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('/admin/product')}}" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Products</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{url('/admin/display/product')}}" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Display Products</p>
            </a>
          </li>
    </ul>
  </nav>
