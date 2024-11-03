@extends('Frontend.layouts.master')
@section('content')
<!--sidebar start-->

    <div class="wrapper padding">
        <div class="flex-row">
            
      <div class="col-md-12">
        <div class="widget">
          <div class="best-selling"><h1 class="best-sell">Results for - {{$search}}</h1></div> 
         @include('Frontend/pages/product/partials/all_products')
        </div>
        
      </div>
        </div>
    </div>
    @endsection