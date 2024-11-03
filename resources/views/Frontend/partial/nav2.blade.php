 <header>
     <!--primary-nav start here-->
      <nav class="primary-nav">
        <div class="wrapper">
          <ul class="nav__list flex-row primary-nav--modifier">
            <li class="nav__item">
              welcome to medilab
            </li>
            <li class="nav__item">
              <i class="fas fa-envelope"></i>
              medilabbd.javed@gmail.com
            </li>
            
            <!-- Authentication Links -->
            @guest
            <li class="nav__item nav__item--push--right"><a href="{{ route('login') }}">sign in</a></li>
            <li class="nav__item nav__item--register"><a class="button"href="{{ route('register') }}">{{ __('Register') }}</a></li>
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
        </div>
      </nav>
      <!--primary-nav end here-->
      <!--main.nav start from here-->
      <div class="main-nav">
        <div class="wrapper main-nav--flex">
          <a href="{{ route('index') }}" class="logo"><img src="{{asset('images/'.'Logo.png')}}" alt="logo" /></a>
          <nav class="nav main-nav--modifier">
            <ul class="nav__list main-nav__list--modifier">
              <li class="nav__item main-nav--item {{Route::is ('index')?'active':''}}"><a class="nav-link" href="{{ route('index') }}">home</a></li>
              <li class="nav__item main-nav--item {{Route::is('products')?'active':''}} "><a class="nav-link" href="{{ route('products') }}">Product</a></li>
              <li class="nav__item main-nav--item {{Route::is('contact')?'active':''}}"><a class="nav-link" href="{{ route('contact') }}">contact</a></li>
            </ul>
          </nav>

          <button
            class="nav-toggle nav-toggle--modifier"
            aria-label="open navigation"
          >
            <span class="hamburger"></span>
          </button>

          <div class="cart flex">
            <div class="cart-quantity">
                <a href="{{ route('carts') }}">
              <i class="fas fa-shopping-bag"></i><span class="badge rounded-circle">{{ App\Models\cart::totalItems() }}</span>
              </a>
            </div>
            <div class="cart-price">
                <a href="{{ route('carts') }}">
                    item: <strong>&#2547; 0.00</strong>
                 </a>
            </div>
          </div>
        </div>
      </div>
      <!--main-nav end here-->
      <div class="secondary-nav">
          <div class="wrapper">
          <div class="column secondary-nav__modifier">
              
            <div class="secondary-nav-department">
                <div class="wrapper flex-row">
                 <i class="fa fa-bars"></i>
                <span>All departments</span>
                <i class="fas fa-chevron-down" id="fas"></i>
               </div>
           </div>
           
             <div class="secondary-nav-search  secondary-nav-search--modifier  flex-row ">
              <div class="secondary-nav-search__form ">
                <form action="{!!route('search')!!}" method="get">
                  <input name="search" class="secondary-nav-search__input"type="text" placeholder="What do yo u need?" />
                  <button type="submit" class="secondary-nav-search__btn">SEARCH</button>
                </form>
              </div>
              <div class="secondary-nav__phone flex">
                <div class="secondary-nav__phone__icon flex-row">
                  <i class="fa fa-phone"></i>
                </div>
                <div class="secondary-nav__phone__text">
                  <h>+8801973-092345</h>
                </div>
              </div>
            </div>
            
          </div>
          </div>
      </div>
    </header>