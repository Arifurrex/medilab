@extends('Frontend.layouts.master')
@section('content')
<!--sidebar start-->

    <div class="container margin-top-20">
        <div class="row">
            {{-- <div class="col-md-4">
            
              </div> --}}

      <div class="col-md-12">
        <div class="widget">
          <div class="best-selling"><h1 class="best-sell">{{ $catagory->name }}</h1></div> 

          {{-- <h4>Category Products <strong  style="font-size: 20px;color:#fa983a"> {{ $catagory->name }}  </strong></h4>  --}}
          
          @php
          $products = $catagory->products()->paginate(9);
          @endphp

          @if($products->count()>0)
@include('Frontend/pages/product/partials/all_products')
@else
<div class="alert alert.warning">No products added yet in this catagory</div>
@endif
        </div>
        <div class="widget">

        </div>
      </div>
        </div>
    </div>
    @endsection
