@extends('backend.layouts.master')

@section('content')
  <div class="main-panel">
    <div class="content-wrapper">

      <div class="card">
        <div class="card-header">
         view Order arf{{$order->id}}
        </div>
           
        <div class="card-body">
            @include('backend.partials.massages')
            <h3>order information</h3>
            <div class="row">
              <div class="col-md-6 border-right">
                 <p>
              <p><strong>orderer Name : </strong>{{$order->name}}</p>
              <p><strong>orderer Phone No : </strong>{{$order->phone_no}}</p>
              <p><strong>orderer email : </strong>{{$order->email}}</p>
              <p><strong>orderer Shipping Address : </strong>{{$order->shipping_address}}</p>
            </p>
              </div>
              <div class="col-md-6 ">
                  <p><strong>order payment method : </strong>{{$order->payment->name}}</p>
                  <p><strong>order transaction: </strong>{{$order->transaction_id}}</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <h3>order information</h3>
              @if($order->carts->count()>0)
  <table class="table table-bordered table-striped ">
    <thead>
      <tr>
        <th>No</th>
        <th>Product Title</th>
        <th>Product image</th>
        <th>Product qantity</th>
        <th>Unit</th>
        <th>Sub Total</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
      @php
      $total_price=0;
      @endphp

      @foreach ($order->carts as $cart)
      <tr>
        <td>{{$loop->index+1}}</td>
        <td><a href="{{route('products.show',$cart->product->slug)}}">{{$cart->product->title}}</a></td>
        <td>
          @if($cart->product->images->count()>0)
          {{-- @php
          dd($cart->product->images->first()) ;
          @endphp --}}
          <img src="{{ asset('images/products/'.$cart->product->images->first()->image) }}"width="50px">
          @endif
        </td>

        <td>
          <form class="form-inline"  action="{{ route('carts.update',$cart->id) }}" method="post" style="width: 200px">
            @csrf
            <input type="number" name="product_quantity" class="form-control mr-2" style="margin-top: 0.5px;width: 100px" value="{{$cart->product_quantity}}">
            <button type="submit" class="btn btn-success">Update</button>
          </form>
        </td>
        <td>{{$cart->product->price}} Taka</td>
        
        <td>
          @php
          $total_price+=$cart->product->price*$cart->product_quantity
          @endphp
          {{$cart->product->price * $cart->product_quantity}} Taka
        </td>
        <td>
          <form action="{{ route('carts.delete',$cart->id) }}" method=
            "post" class="form-inline" >
            @csrf
            <input type="hidden" name="cart_id">
            <button class="btn btn-danger">Delete</button>
          </form>
        </td>
      </tr>

      @endforeach
      <tr>

        <td colspan="4"></td>
        <td ><strong>Total Price</strong></td>
        <td colspan="2">{{$total_price}} Taka</td>
      </tr>
    </tbody>

  </table>
  
  @endif
  <hr>
  <form action="{{ route('admin.order.completed',$order->id) }}" method="post" style="margin-right: 22px">
    @csrf
    @if($order->is_completed)
    <input type="submit" value="cancel order" class="btn btn-success">
    @else
    <input type="submit" value="complete order" class="btn btn-info">
    @endif
  </form>
   <form action="{{ route('admin.order.paid',$order->id) }}" method="post">
    @csrf
    @if($order->is_paid)
    <input type="submit" value="cancel payment" class="btn btn-success">
    @else
     <input type="submit" value="paid" class="btn btn-info">
     @endif
  </form>

  <hr>

            </div>
           
            
        </div>
      </div>
    </div>

  </div>
  {{-- main-panel ends --}}
@endsection
