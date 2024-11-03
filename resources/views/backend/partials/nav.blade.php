<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
        <a class="navbar-brand brand-logo" href="{{route('admin.index')}}"><img src="{{asset('images/medi-lab logo.png')}}" alt="logo"/></a>

      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center">
        <ul class="navbar-nav navbar-nav-left header-links d-none d-md-flex">
          <li class="nav-item">
            <a href="{{route('index')}}" class="nav-link">Frontend</a>
          </li>
        </ul>
        <ul class="navbar-nav navbar-nav-right">
          
             <li class="nav-item">
            <a class="nav-link"> 
              <form class="form-inline" action="{{ route('admin.logout') }}" method="post">
              @csrf
              <input type="submit" name="" value="Log out" class="btn btn-danger">
             </form>
             </a>
           
          </li> 
          
          <li class="nav-item d-none d-lg-block">
            <a class="nav-link" href="#">
              <img class="img-xs rounded-circle" src="{{asset('/images/faces/belayet.png')}}" alt="">
            </a>
          </li>
        </ul>
        <!--<button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">-->
        <!--  <span class="icon-menu"></span>-->
        <!--</button>-->
      </div>
    </nav>
