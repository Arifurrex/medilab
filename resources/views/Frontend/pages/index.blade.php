@extends('Frontend.layouts.master')
@section('content')

<!--hero section start from here-->

 <section class="hero">
      <div class="wrapper">
        <div class="flex-row flex-wrap">
            
          <div class="hero-category border">
           <!-- <div class="hero__categories__all">-->
           <!--     <div class="wrapper flex-row">-->
           <!--   <i class="fa fa-bars"></i>-->
           <!--   <span>All departments</span>-->
           <!--   <i class="fas fa-chevron-down" id="fas"></i>-->
           <!--    </div>-->
           <!--</div>-->
              
          <div id="sidebar" class="sidebar">
           <ul>
            <li><a href="{{ route('index') }}">Home</a></li>
            @foreach (App\Models\catagory::orderBy('name', 'asc')->where('parent_id',NULL)->get() as $parent)
            <li class="flex-row sidebar-list">
                <a class="sidebar__link" href="#main-{{$parent->id}}"> {{$parent->name}} </a>
                <i class="fas fa-chevron-circle-right"></i>
                
                  <ul class="column">
                     @foreach (App\Models\catagory::where('parent_id',$parent->id)->get() as $child)
                     <a  href="{{ route('catagories.show', $child->id) }}"
                     <li class="sidebar-list">{{$child->name}} </li>
                     </a>
                    @endforeach
                 </ul>
            </li>
           
            @endforeach 
            
          </ul>
        </div>
     </div>

          <div class="hero-slider column">
            
    <!--=====================================-->
     <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
               @php $i = 1; @endphp
              @foreach($slider as $slide)
    <div class="carousel-item {{ $i == 1 ? 'active':'' }} ">
      <img src="{{asset('images/slider/'.$slide->slide_image)}}" class="d-block w-100 carousel-item__image" alt="...">
     
    </div>
     @php $i++ ; @endphp
    @endforeach
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
     <!--=============================================-->
            
             <div class="secondary-nav-search secondary-nav-search-hide flex-row flex-wrap">
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
                  <h5>+8801973-092345</h5>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    
<!--hero section start from here-->


<!--==============================================================-->
<!--this  is All Products start-->
<!--==============================================================-->
<div class="all-product">
<div class="wrapper">
<div class="best-selling"><h1 class="best-sell">All Products</h1></div> 

<div class="product-container">
  <div class="flex-row">
    <div class="owl-carousel owl-theme" id="team-carousel">

     @foreach($products as $product)   

     <div class="product__single" >
     <a href="{!!route('products.show',$product->slug)!!}"> 
      <div class="product-top">

        @php $i = 1; @endphp
        @foreach($product->images as $image) 
        @if($i>0)
        <img class="best-selling__image" src="{{asset('images/products/'.$image->image)}}" alt="">
        @endif
        @php $i--; @endphp
        @endforeach

        
    </div>
    <div class="product-bottom text-center">
      <p>{{$product->title}}</p>
      <!--<div class=""><strong>&#2547;{{$product->price}}</strong></div> -->
      <div class="">&#2547; {{$product->price_wth_comma}}</div> 
    </div>
    </a>
  </div>

  @endforeach

</div>
</div>
</div>
</div>
</div>
<!--=============================================================-->
<!--this  is All Products end-->
<!--=============================================================-->

<!--==============================================================-->
<!--this  is Covid-19 Personal Protective Gear start-->
<!--==============================================================-->
<div class="covid">
<div class="wrapper">
<div class="best-selling"><h1 class="best-sell">Covid-19 Personal Protective Gear</h1></div> 

<div class="product-container">
  <div class="flex-row">
    <div class="owl-carousel owl-theme">

      @foreach($product_covid as $product)   

     <div class="product__single" >
     <a href="{!!route('products.show',$product->slug)!!}"> 
      <div class="product-top">

        @php $i = 1; @endphp
        @foreach($product->images as $image) 
        @if($i>0)
        <img class="best-selling__image" src="{{asset('images/products/'.$image->image)}}" alt="">
        @endif
        @php $i--; @endphp
        @endforeach

        <div class="overlay-right flex-row">
            <div>
                <button class="overlay-right__button">
                <i class="fas fa-eye overlay-right__icon"></i>
                </button>
            </div>
         
         <div>
             <form action="{{route('carts.store')}}" method="post">
          @csrf
          <input type="hidden" name="product_id" value="{{$product->id}}">
          <button type="submit" class="overlay-right__button" title="Add to cart list">
            <i class="fas fa-shopping-cart overlay-right__icon" ></i>
          </button>
        </form>
         </div>
        

      </div>
    </div>
    <div class="product-bottom text-center">
      <h>{{$product->title}}</h>
      <!--<div class=""><strong>&#2547;{{$product->price}}</strong></div> -->
      <div class="">&#2547; {{$product->price_wth_comma}}</div> 
    </div>
    </a>
  </div>

  @endforeach

</div>
</div>
</div>
</div>
</div>
<!--=============================================================-->
<!--this  is Covid-19 Personal Protective Gear END HERE-->
<!--=============================================================-->



<!--==============================================================-->
 <!--Home Care Medical Equipment start here -->
<!--==============================================================-->
<div class="all-product">
<div class="wrapper">
<div class="best-selling"><h1 class="best-sell">Home Care Medical Equipment</h1></div> 

<div class="product-container">
  <div class="flex-row">
    <div class="owl-carousel owl-theme">

      @foreach($productone as $product)   

     <div class="product__single" >
     <a href="{!!route('products.show',$product->slug)!!}"> 
      <div class="product-top">

        @php $i = 1; @endphp
        @foreach($product->images as $image) 
        @if($i>0)
        <img class="best-selling__image" src="{{asset('images/products/'.$image->image)}}" alt="">
        @endif
        @php $i--; @endphp
        @endforeach

        <div class="overlay-right flex-row">
            <div>
                <button class="overlay-right__button">
                <i class="fas fa-eye overlay-right__icon"></i>
                </button>
            </div>
         
         <div>
             <form action="{{route('carts.store')}}" method="post">
          @csrf
          <input type="hidden" name="product_id" value="{{$product->id}}">
          <button type="submit" class="overlay-right__button" title="Add to cart list">
            <i class="fas fa-shopping-cart overlay-right__icon" ></i>
          </button>
        </form>
         </div>
        

      </div>
    </div>
    <div class="product-bottom text-center">
      <p>{{$product->title}}</p>
      <!--<div class=""><strong>&#2547;{{$product->price}}</strong></div> -->
      <div class="">&#2547; {{$product->price_wth_comma}}</div> 
    </div>
    </a>
  </div>

  @endforeach

</div>
</div>
</div>
</div>
</div>
<!--=============================================================-->
 <!--Home Care Medical Equipment end here -->
<!--=============================================================-->


<!--==============================================================-->
 <!--Imaging/Radiology Product products start here -->
<!--==============================================================-->
<div class="imaging">
<div class="wrapper">
<div class="best-selling"><h1 class="best-sell">Imaging/Radiology Product</h1></div> 

<div class="product-container">
  <div class="flex-row">
    <div class="owl-carousel owl-theme">

     @foreach($producttwo as $product)   

     <div class="product__single" >
     <a href="{!!route('products.show',$product->slug)!!}"> 
      <div class="product-top">

        @php $i = 1; @endphp
        @foreach($product->images as $image) 
        @if($i>0)
        <img class="best-selling__image" src="{{asset('images/products/'.$image->image)}}" alt="">
        @endif
        @php $i--; @endphp
        @endforeach

        <div class="overlay-right flex-row">
            <div>
                <button class="overlay-right__button">
                <i class="fas fa-eye overlay-right__icon"></i>
                </button>
            </div>
         
         <div>
             <form action="{{route('carts.store')}}" method="post">
          @csrf
          <input type="hidden" name="product_id" value="{{$product->id}}">
          <button type="submit" class="overlay-right__button" title="Add to cart list">
            <i class="fas fa-shopping-cart overlay-right__icon" ></i>
          </button>
        </form>
         </div>
        

      </div>
    </div>
    <div class="product-bottom text-center">
      <h>{{$product->title}}</h>
      <!--<div class=""><strong>&#2547;{{$product->price}}</strong></div> -->
      <div class="">&#2547; {{$product->price_wth_comma}}</div> 
    </div>
    </a>
  </div>

  @endforeach

</div>
</div>
</div>
</div>
</div>

<!--=============================================================-->
 <!--Imaging/Radiology Product products end here -->
<!--=============================================================-->

<!--==============================================================-->
<!--OT Instrument start here -->
<!--==============================================================-->
<div class="all-product">
<div class="wrapper">
<div class="best-selling"><h1 class="best-sell">OT Instrument</h1></div> 

<div class="product-container">
  <div class="flex-row">
    <div class="owl-carousel owl-theme">

      @foreach($product_three as $product)   

     <div class="product__single" >
     <a href="{!!route('products.show',$product->slug)!!}"> 
      <div class="product-top">

        @php $i = 1; @endphp
        @foreach($product->images as $image) 
        @if($i>0)
        <img class="best-selling__image" src="{{asset('images/products/'.$image->image)}}" alt="">
        @endif
        @php $i--; @endphp
        @endforeach

        <div class="overlay-right flex-row">
            <div>
                <button class="overlay-right__button">
                <i class="fas fa-eye overlay-right__icon"></i>
                </button>
            </div>
         
         <div>
             <form action="{{route('carts.store')}}" method="post">
          @csrf
          <input type="hidden" name="product_id" value="{{$product->id}}">
          <button type="submit" class="overlay-right__button" title="Add to cart list">
            <i class="fas fa-shopping-cart overlay-right__icon" ></i>
          </button>
        </form>
         </div>
        

      </div>
    </div>
    <div class="product-bottom text-center">
      <p>{{$product->title}}</p>
      <!--<div class=""><strong>&#2547;{{$product->price}}</strong></div> -->
      <div class="">&#2547; {{$product->price_wth_comma}}</div> 
    </div>
    </a>
  </div>

  @endforeach

</div>
</div>
</div>
</div>
</div>
<!--=============================================================-->
<!--OT Instrument end here -->
<!--=============================================================-->

<!--==============================================================-->
<!--Lab/Pathology Item start here -->
<!--==============================================================-->
<div class="all-product">
<div class="wrapper">
<div class="best-selling"><h1 class="best-sell">Lab/Pathology Item</h1></div> 

<div class="product-container">
  <div class="flex-row">
    <div class="owl-carousel owl-theme">

      @foreach($product_four as $product)     

     <div class="product__single" >
     <a href="{!!route('products.show',$product->slug)!!}"> 
      <div class="product-top">

        @php $i = 1; @endphp
        @foreach($product->images as $image) 
        @if($i>0)
        <img class="best-selling__image" src="{{asset('images/products/'.$image->image)}}" alt="">
        @endif
        @php $i--; @endphp
        @endforeach

        <div class="overlay-right flex-row">
            <div>
                <button class="overlay-right__button">
                <i class="fas fa-eye overlay-right__icon"></i>
                </button>
            </div>
         
         <div>
             <form action="{{route('carts.store')}}" method="post">
          @csrf
          <input type="hidden" name="product_id" value="{{$product->id}}">
          <button type="submit" class="overlay-right__button" title="Add to cart list">
            <i class="fas fa-shopping-cart overlay-right__icon" ></i>
          </button>
        </form>
         </div>
        

      </div>
    </div>
    <div class="product-bottom text-center">
      <p>{{$product->title}}</p>
      <!--<div class=""><strong>&#2547;{{$product->price}}</strong></div> -->
      <div class="">&#2547; {{$product->price_wth_comma}}</div> 
    </div>
    </a>
  </div>

  @endforeach

</div>
</div>
</div>
</div>
</div>
<!--=============================================================-->
<!--Lab/Pathology Item end here -->
<!--=============================================================-->
<!--==============================================================-->
<!--Hospital Furniture start here -->
<!--==============================================================-->
<div class="all-product">
<div class="wrapper">
<div class="best-selling"><h1 class="best-sell">Hospital Furniture</h1></div> 

<div class="product-container">
  <div class="flex-row">
    <div class="owl-carousel owl-theme">

      @foreach($product_Hospital_Furniture as $product)     

     <div class="product__single" >
     <a href="{!!route('products.show',$product->slug)!!}"> 
      <div class="product-top">

        @php $i = 1; @endphp
        @foreach($product->images as $image) 
        @if($i>0)
        <img class="best-selling__image" src="{{asset('images/products/'.$image->image)}}" alt="">
        @endif
        @php $i--; @endphp
        @endforeach

        <div class="overlay-right flex-row">
            <div>
                <button class="overlay-right__button">
                <i class="fas fa-eye overlay-right__icon"></i>
                </button>
            </div>
         
         <div>
             <form action="{{route('carts.store')}}" method="post">
          @csrf
          <input type="hidden" name="product_id" value="{{$product->id}}">
          <button type="submit" class="overlay-right__button" title="Add to cart list">
            <i class="fas fa-shopping-cart overlay-right__icon" ></i>
          </button>
        </form>
         </div>
        

      </div>
    </div>
    <div class="product-bottom text-center">
      <p>{{$product->title}}</p>
      <!--<div class=""><strong>&#2547;{{$product->price}}</strong></div> -->
      <div class="">&#2547; {{$product->price_wth_comma}}</div> 
    </div>
    </a>
  </div>

  @endforeach

</div>
</div>
</div>
</div>
</div>
<!--=============================================================-->
<!--Hospital Furniture end here -->
<!--=============================================================-->


    @endsection

