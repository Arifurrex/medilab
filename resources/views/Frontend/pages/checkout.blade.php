@extends('Frontend.layouts.master')
@section('content')
<div class="container margin-top-20 card card-body" style="background: #dfe6e9">
	<div class="card card-body">
		<h3>Confirm item </h3>
		<hr>
		<div class="row">
			<div class="col-md-7 border-right">
				@foreach (App\Models\cart::totalCarts() as $cart)
				<p>{{$cart->product->title}} _ <strong>{{$cart->product->price}}Taka </strong> _ {{$cart->product_quantity}} items</p>
				@endforeach
			</div>
			<div class="col-md-5">
				@php
				$total_price=0;
				@endphp
				@foreach (App\Models\cart::totalCarts() as $cart)
				@php
				$total_price+=$cart->product->price * $cart->product_quantity;
				@endphp
				@endforeach
				<p>Total Price = <strong>{{$total_price}}</strong> Taka</p>
				<p>Total Price with shipping cost = <strong>{{$total_price + App\Models\setting::first()->shipping_cost}}</strong> Taka</p>
			</div>
		</div>
		
		<a href="{{ route('carts') }} " class="btn btn-warning btn-md float-right">Change Carts item</a>
	</div>


	{{-- ********************************************************************************************** --}}
	<div class="card card-body mt-2">
		<h3>Confirm shipping address </h3>
		<hr>
		<form method="POST" action="{{ route('checkouts.store') }}" aria-label="{{ __('Register') }}">
			@csrf

			<div class="form-group row">
				<label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Reciever Name') }}</label>

				<div class="col-md-6">
					<input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ Auth::check() ? Auth::user()->first_name.' '.Auth::user()->last_name : '' }}" required autofocus>

					@if ($errors->has('name'))
					<span class="invalid-feedback" role="alert">
						<strong>{{ $errors->first('name') }}</strong>
					</span>
					@endif
				</div>
			</div> 



			<div class="form-group row">
				<label for="phone_no" class="col-md-4 col-form-label text-md-right">{{ __('phone Number') }}</label>

				<div class="col-md-6">
					<input id="phone_no" type="text" class="form-control{{ $errors->has('phone_no') ? ' is-invalid' : '' }}" name="phone_no" value="{{ Auth::check() ? Auth::user()->phone_no : '' }}" required autofocus>

					@if ($errors->has('phone_no'))
					<span class="invalid-feedback" role="alert">
						<strong>{{ $errors->first('phone_no') }}</strong>
					</span>
					@endif
				</div>
			</div>


			<div class="form-group row">
				<label for="massage" class="col-md-4 col-form-label text-md-right">{{ __('Additional Massage (optional) ') }}</label>

				<div class="col-md-6">
					<textarea id="massage"  class="form-control{{ $errors->has('massage') ? ' is-invalid' : '' }} "rows=4  name="massage" ></textarea>

					@if ($errors->has('massage'))
					<span class="invalid-feedback" role="alert">
						<strong>{{ $errors->first('massage') }}</strong>
					</span>
					@endif

				</div>
			</div>



			<div class="form-group row">
				<label for="shipping_address" class="col-md-4 col-form-label text-md-right">{{ __('shipping Address  ') }}</label>

				<div class="col-md-6">
					<textarea id="shipping_address"  class="form-control{{ $errors->has('shipping_address') ? ' is-invalid' : '' }} "rows=4  name="shipping_address" >{{ Auth::check() ? Auth::user()->shipping_address : '' }}</textarea>

					@if ($errors->has('shipping_address'))
					<span class="invalid-feedback" role="alert">
						<strong>{{ $errors->first('shipping_address') }}</strong>
					</span>
					@endif

				</div>
			</div>


			<div class="form-group row">
				<label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

				<div class="col-md-6">
					<input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ Auth::check() ? Auth::user()->email : '' }}" required>

					@if ($errors->has('email'))
					<span class="invalid-feedback" role="alert">
						<strong>{{ $errors->first('email') }}</strong>
					</span>
					@endif
				</div>
			</div>

			{{-- ths s payment method start --}}
			<div class="form-group row">
				<label for="payment_method" class="col-md-4 col-form-label text-md-right">{{ __('Payment Method') }}</label>

				<div class="col-md-6">
					<select class="form-control"  name="payment_method_id"  required id="payments" >
						<option value="">Select a payment method</option>
						@foreach ($payments as $payment)
						<option value="{{$payment->short_name}}">{{$payment->name }}</option>
						@endforeach

						
					</select>

					@foreach ($payments as $payment)
					
					@if ($payment->short_name == "cash_in")
					<div id="payments_{{$payment->short_name}}" class="card mt-5 hidden text-center" style="background-color: #20c997">
						<div  class="p-2">
							<h5>For Cash in there is nothing nessery to do .Just click Order</h5>
							<br>
							<small>You will get your products two or three days</small>
						</div>
					</div>

					@else
					<div>
						<div id="payments_{{$payment->short_name}}" class="card mt-5 mb-5 text-center hidden" style="background-color: #20c997">
							<div  class="p-2">
								<h5>{{$payment->name}}</h5>
								<p><strong>{{$payment->no}} No: {{$payment->no}}</strong>
									<br>
									<strong>Account Type : {{$payment->type}}</strong>
								</p>
								<div class="alert alert-success">Please send the above money to this Bcash No and write your transaction code below there </div>
								<input type="text" name="transaction_id" class="form-control" placeholder="please enter transaction ">
							</div>
						</div>
					</div>

					@endif

					
					@endforeach

				</div>
			</div>

			<div class="form-group row mb-0 mt-5">
				<div class="col-md-6 offset-md-4">
					<button type="submit" class="btn btn-primary">
						{{ __('Order Now') }}
					</button>
				</div>
			</div>

				{{-- </div>
				</div> --}}
			</form>
		</div>

	</div>







	@section('script')
	<script type="text/javascript">
		$("#payments").change(function(){
			// alert('hey');
			$payment_method = $("#payments").val();
			if($payment_method=="cash_in"){
				$("#payments_cash_in").removeClass('hidden');
				$("#payments_bcash").addClass('hidden');
				$("#payments_rocket").addClass('hidden');
			}else if($payment_method=="bcash"){
				$("#payments_bcash").removeClass('hidden');
				$("#payments_rocket").addClass('hidden');
				$("#payments_cash_in").addClass('hidden');

			}else if($payment_method=="rocket"){
				$("#payments_rocket").removeClass('hidden');
				$("#payments_cash_in").addClass('hidden');
				$("#payments_bcash").addClass('hidden');
			}

		})
	</script>
	@endsection

	@endsection