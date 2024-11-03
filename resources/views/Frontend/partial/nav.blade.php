
<!-- nav for login registration -->

<nav class="navbar navbar-expand-lg navbar-light topnave" >

  <ul class="navbar-nav mr-auto">
    <li class="icon_hoverd" ><marquee>Welcome to Medilab Corporation </marquee></li>
   <li class="icon_hover" ><img src="{{ asset('images/'.'telephone.png') }}"><a href="https://mail.google.com" class="bb">01973-092345</a></li> 
   <li  class="icon_hover"><img src="{{ asset('images/'.'email.png') }}"> <a href="https://mail.google.com" class="bb">medilabbd.javed@gmail.com</a></li> 

 </ul>

 <ul class="navbar-nav ml-auto mr-5">
  <a class="nav-link kk" href="{{ route('carts') }}"><img src="{{asset('images/'.'cart.png')}}" style="height: 40px;width: 40px"><span class="badge badge-danger">{{ App\Models\cart::totalItems() }}</span></a>
  
  <!-- Authentication Links -->
  @guest
  <li class="nav-item mt-2">
    <a class="nav-link login" href="{{ route('login') }}">{{ __('Login') }}</a>
  </li>
  <li class="nav-item mt-2">
    <a class="nav-link login" href="{{ route('register') }}">{{ __('Register') }}</a>
  </li>
  @else
  <li class="nav-item dropdown">


    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
      <img src="{{App\Helpers\ImageHelper::getUserImage(Auth::user()->id)}}"  class="img rounded-circle">
      {{ Auth::user()->first_name }}  {{ Auth::user()->last_name }} <span class="caret"></span>
    </a>

    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
      <a class="dropdown-item" href="{{ route('user.dashboard') }}">{{ __('Dashboard') }}</a>
      <a class="dropdown-item" href="{{ route('logout') }}"
      onclick="event.preventDefault();
      document.getElementById('logout-form').submit();">
      {{ __('Logout') }}
    </a>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
      @csrf
    </form>
  </div>
</li>
@endguest
</ul>

</nav>

<!-- nav for login registration end here -->


<!-- horizontal nav bar-->

<div class="row">
    <div class="col-md-6">
        <nav class="navbar navbar-expand-md  navbar-dark">
            <!-- Brand -->
  <a class="navbar-brand" href="{{ route('index') }}"><img src="{{asset('images/'.'Logo.png')}}" style="width: 350px;height: 80px;margin-left:50px;"></a>
  </nav>
    </div>
    
    <div class="col-md-6">
        <nav class="navbar navbar-expand-md  navbar-dark">
  

  <!-- Toggler/collapsibe Button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon" style="color:green"></span>
  </button>

  <!-- Navbar links -->
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item ">
        
      </li>
      <li class="nav-item {{Route::is ('index')?'active':''}}  mt-1">
        <a class="nav-link" href="{{ route('index') }}">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item {{Route::is('products')?'active':''}}  mt-1">
        <a class="nav-link" href="{{ route('products') }}">Products</a>
      </li>
      <li class="nav-item {{Route::is('contact')?'active':''}} mr-2 mt-1">
        <a class="nav-link" href="{{ route('contact') }}">Contact</a>
      </li>
     
      
      <li class="nav-item">
          
       <ul class="navbar-nav ml-auto mr-4">
      <form class="form-inline my-2 my-lg-0" action="{!!route('search')!!}" method="get">

        <div class="input-group mb-3">
          <input type="text" class="form-control" name="search" placeholder="Search Products" aria-label="Recipient's username" aria-describedby="basic-addon2">
          <div class="input-group-append">
            <button class="btn btn-outline-secondary" type="submit"><i class="fa fa-search"></i></button>
          </div>
        </div>

      </form>

      
    </ul>
    
    </li>
  </ul>
</div> 
</nav>

</div>
</div>



<!-- another nav -->


