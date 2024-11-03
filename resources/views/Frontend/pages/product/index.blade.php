@extends('Frontend.layouts.master')
@section('content')
<!--sidebar start-->

    <div class="wrapper padding">
        <div class="row">
            
      <div class="col-md-12">
        <div class="widget">
          <div class="best-selling"><h1 class="best-sell">All products</h1></div> 

@include('Frontend/pages/product/partials/all_products')
        </div>
    
      </div>
        </div>
    </div>
    @endsection