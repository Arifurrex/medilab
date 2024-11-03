@extends('Frontend.layouts.master')
@section('title')
{{$product->title}}/MediLab
@endsection
@section('content')

<!--========================================================-->
<!--sidebar start-->
<!--========================================================-->

  <!-- Breadcrumb Section Begin -->
  @php $i = 1; @endphp
        @foreach($product->images as $image) 
        @if($i>0)
    <section class="breadcrumb-section" style="background-image: url('{{asset('images/products/'.$image->image)}}');">
      <div class="wrapper flex">
            <div class="breadcrumb__text text-center">
              <h2>{{$product->title}}</h2>
              <div class="breadcrumb__option">
                <a href="{{ route('index') }}">Home</a>
                >
                <a href="">{{$product->catagory->name}}</a>
              </div>
            </div>
      </div>
    </section>
   
@endif
        @php $i--; @endphp
        @endforeach

    <!-- Breadcrumb Section End -->
    
    
 
 <section class="product-details spad">   
 <div class="wrapper padding">
  <div class="row">
<!--========================================================-->
<!--left sidebar start-->
<!--========================================================-->
    <div class="col-md-6 ">
     <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner border">
        @php $i=1 ; @endphp
        @foreach($product->images as $image)
        <div class="product-item carousel-item {{ $i == 1 ? 'active':'' }} ">
          <img class="d-block w-100"  src="{{asset('images/products/'.$image->image)}}" alt="First slide">
        </div>
        @php $i++ ; @endphp
        @endforeach

      </div>
      <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </div>
  
<!--========================================================-->
<!--left sidebar end here-->
<!--=========================================================-->
<!--========================================================-->
<!--right sidebar start here-->
<!--========================================================-->
<div class="col-lg-6 col-md-6 carousel-inner border">
<div class="product__details__text wrapper">
    
          <h3>{{$product->title}}</h3>
           <div class="product__details__price">{{$product->price_wth_comma}} Taka</div>
           
           <div class="" style="">
            <form class="form-inline" action="{{ route('carts.store') }}" method="post">
          @csrf
          <input type="hidden" name="product_id" value="{{$product->id}}">
          <button type="submit" class="gradent btn btn-success">Add to Cart</button>
        </form>
        {{-- @include('Frontend.partial.cart_button') --}}
      </div>
           
          <ul>
                <li>
                  <b>Model</b>
                  <span>{{$product->model}}</span>
                </li>
                <li><b>Origin</b> <span>{{$product->origin}}</span></li>
                <li><b>Availability</b> <span>{{$product->quantity <1 ?'No item is avaialable': $product->quantity.' item in stock'}}</span></li>
                <li><b>Condition</b> <span>{{$product->conditions}}</span></li>
                <li><b>Brand</b> <span>{{$product->brand->name}} </span> <span><img src="{!!asset('images/brands/'.$product->brand->image)!!}" style="width:100"/></span></li>
                <li>
                  <b>Share on</b>
                  <div class="share">
                    <a href="#"><i class="fa fa-facebook"></i></a>
                    <a href="#"><i class="fa fa-twitter"></i></a>
                    <a href="#"><i class="fa fa-instagram"></i></a>
                    <a href="#"><i class="fa fa-pinterest"></i></a>
                  </div>
                </li>
              </ul>
              
              
              
      <!--<h>Product Name :{{$product->title}}</h>-->
      <!--<hr>-->
      <!--<p>Model : {{$product->model}}</p>-->
      <!--<p>Origin :  {{$product->origin}}</p>-->
     
     
      <!--<p>Availability :  {{$product->quantity <1 ?'No item is avaialable': $product->quantity.' item in stock'}} </p>-->
      <!--  <p>Condition :  {{$product->conditions}}</p> -->
      <!--  <p>Brand :  {{$product->brand->name}}  </p>-->
      <!--  <img src="{!!asset('images/brands/'.$product->brand->image)!!}" style="margin-bottom:20px;width:100"/>-->
      <!--  <p>Category :  {{$product->catagory->name}}</p>-->

      <!--<p class="xx">{{$product->price}} Taka</p> -->
      <!--<p>{{$product->price_wth_comma}} Taka</p> -->
       <!--<p class="new-arrival text-center">{{$product->ask_for_price}}</p>-->
      <!--</div>-->
      <!--<div class="" style="">-->
      <!--  <form class="form-inline" action="{{ route('carts.store') }}" method="post">-->
      <!--    @csrf-->
      <!--    <input type="hidden" name="product_id" value="{{$product->id}}">-->
      <!--    <button type="submit" class="gradent btn btn-warning">Add to Cart</button>-->
      <!--  </form>-->
      <!--  {{-- @include('Frontend.partial.cart_button') --}}-->
      <!--</div>-->
      
      <p class="">{{$product->ask_for_price}}</p>
 </div>
    </div>
  </div>
  </section>
<!--========================================================-->
<!--right sidebar end here-->
<!--========================================================-->



<!--========================================================-->
<!--product descirption start here-->
<!--========================================================-->

   <div class="wrapper">
    <div class="row">
     <div class="best-selling mb-4"><h1 class="best-sell">Product Description</h1></div>
     <div class="product-desc"> {!!$product->description!!}</div>
   </div>
 </div>
 <hr>
 <!--========================================================-->
<!--right description end here-->
<!--=========================================================-->
<!--=========================================================-->
<!--How to order start here-->
<!--=========================================================-->
 <div class="wrapper mt-3">
  <div class="row">

      <div class="best-selling"><h1 class="best-sell">যেভাবে অর্ডার করবেন</h1></div>
        <div class="product-desc"> {!!$product->how_to_order!!}</div>
      
  
  </div>
</div>
<!--=========================================================-->
<!--How to order end here-->
<!--=========================================================-->

@endsection