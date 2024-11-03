@extends('Frontend.layouts.master')
@section('content')
<!--sidebar start-->

    <div class="container margin-top-20">
        <div class="row">
            <div class="col-md-4">
            @include('Frontend/partial.product-sidebar')
              </div>
            
      <div class="col-md-8">
        <div class="widget">
          <h3>ALL Products</h3>
@include('Frontend/pages/product/partials/all_products')
        </div>
        <div class="widget">

        </div>
      </div>
        </div>
    </div>
    @endsection