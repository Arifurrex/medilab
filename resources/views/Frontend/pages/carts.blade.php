@extends('Frontend.layouts.master')
@section('content')

<div class='container margin-top-20'>
	<div class="best-selling" style="margin-bottom:5px"><h1 class="best-sell" >MY CART ITEMS</h1></div>
@if(App\Models\cart::totalitems()>0)
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

			@foreach (App\Models\cart::totalCarts() as $cart)
			<tr>
				<td>{{$loop->index+1}}</td>
				<td><a href="{{route('products.show',$cart->product->slug)}}">{{$cart->product->title}}</a></td>
				<td>
					@if($cart->product->images->count()>0)
					{{-- @php
					dd($cart->product->images->first())	;
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
	<div class="float-right mb-2">
		<a href="{{ route('products') }}"class="btn btn-info">Continue Shopping...</a>
		<a href="{{ route('checkout') }}"class="btn btn-warning">Checkout</a>
	</div>

	@else
	<div class="alert alert-warning">
		<strong>There is no item in your cart</strong>
	</div>
	@endif

</div>


@endsection