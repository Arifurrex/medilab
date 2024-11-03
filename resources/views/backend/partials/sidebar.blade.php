<nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item nav-profile">
            <div class="nav-link">
              <div class="profile-image"> <img src="{{asset('/images/faces/belayet.png')}}" alt="image"/> <span class="online-status online"></span> </div>
              <div class="profile-name">
                <p class="name">Belayet Hossain</p>
                <p class="designation">Manager</p>
                <div class="badge badge-teal mx-auto mt-3">Online</div>
              </div>
            </div>
          </li>
          <li class="nav-item"><a class="nav-link" href="{{route('admin.index')}}"><img class="menu-icon" src="{{asset('/images/menu_icons/01.png')}}" alt="menu icon"><span class="menu-title">Dashboard</span></a></li>


          <!--order -->

          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#order-pages"  aria-expanded="false" aria-controls="general-pages"> <img class="menu-icon" src="{{asset('/images/menu_icons/02.png')}}" alt="menu icon"> <span class="menu-title">Order</span></a>
            <div class="collapse" id="order-pages">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{route('admin.orders')}}">Manage Order</a></li>
                {{-- <li class="nav-item"> <a class="nav-link" href="{{route('admin.product.create')}}">create products</a></li> --}}

              </ul>
            </div>
          </li>
          <!--add dropdown-->

          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#general-pages"  aria-expanded="false" aria-controls="general-pages"> <img class="menu-icon" src="{{asset('/images/menu_icons/03.png')}}" alt="menu icon"> <span class="menu-title">Product</span></a>
            <div class="collapse" id="general-pages">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{route('admin.products')}}">Manage products</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{route('admin.product.create')}}">create products</a></li>

              </ul>
            </div>
          </li>

          <!--catagory here-->
            <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#catagory-pages" aria-expanded="false" aria-controls="general-pages"> <img class="menu-icon" src="{{asset('/images/menu_icons/04.png')}}" alt="menu icon"> <span class="menu-title">Catagory</span></a>
            <div class="collapse" id="catagory-pages">
              <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="{{route('admin.catagories')}}">Manage Catagory</a></li>
                  <li class="nav-item"> <a class="nav-link" href="{{route('admin.catagory.create')}}">Add Catagory</a></li>
              </ul>
            </div>
          </li>

        <!--slider here-->
            <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#slider-pages" aria-expanded="false" aria-controls="general-pages"> <img class="menu-icon" src="{{asset('/images/menu_icons/04.png')}}" alt="menu icon"> <span class="menu-title">Slider</span></a>
            <div class="collapse" id="slider-pages">
              <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="{{route('manage-slide')}}">Manage Slider</a></li>
                  <li class="nav-item"> <a class="nav-link" href="{{route('addSlide')}}">Add Slider</a></li>
              </ul>
            </div>
          </li>
          
          
          <!--brand dropdown -->
            <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#brand-pages" aria-expanded="false" aria-controls="general-pages"> <img class="menu-icon" src="{{asset('/images/menu_icons/05.png')}}" alt="menu icon"> <span class="menu-title">Brand</span></a>
            <div class="collapse" id="brand-pages">
              <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="{{route('admin.brands')}}">Manage Brand</a></li>
                  <li class="nav-item"> <a class="nav-link" href="{{route('admin.brand.create')}}">Add Brand</a></li>
              </ul>
            </div>
          </li>

          <!--division dropdown -->
            <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#division-pages" aria-expanded="false" aria-controls="general-pages"> <img class="menu-icon" src="{{asset('/images/menu_icons/06.png')}}" alt="menu icon"> <span class="menu-title">Division</span></a>
            <div class="collapse" id="division-pages">
              <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="{{route('admin.divisions')}}">Manage Division</a></li>
                  <li class="nav-item"> <a class="nav-link" href="{{route('admin.division.create')}}">Add Division</a></li>
              </ul>
            </div>
          </li> 

          <!--district dropdown -->
            <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#district-pages" aria-expanded="false" aria-controls="general-pages"> <img class="menu-icon" src="{{asset('/images/menu_icons/08.png')}}" alt="menu icon"> <span class="menu-title">District</span></a>
            <div class="collapse" id="district-pages">
              <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="{{route('admin.districts')}}">Manage district</a></li>
                  <li class="nav-item"> <a class="nav-link" href="{{route('admin.district.create')}}">Add district</a></li>
              </ul>
            </div>
          </li>

          {{-- logout --}}
            <li class="nav-item">
            <a class="nav-link"> 
              <form class="form-inline" action="{{ route('admin.logout') }}" method="post">
              @csrf
              <input type="submit" name="" value="Log out" class="btn btn-danger">
             </form>
             </a>
           
          </li>

        </ul>
      </nav>
