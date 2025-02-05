@extends('Frontend.pages.users.master')
@section('sub-content')
<div class='container '>



	<div class="card-body">
		<form method="POST" action="{{ route('user.profile.update') }}" aria-label="{{ __('Register') }}">
			@csrf

			<div class="form-group row">
				<label for="first_name" class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>

				<div class="col-md-6">
					<input id="first_name" type="text" class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}" name="first_name" value="{{ $user->first_name }}" required autofocus>

					@if ($errors->has('first_name'))
					<span class="invalid-feedback" role="alert">
						<strong>{{ $errors->first('first_name') }}</strong>
					</span>
					@endif
				</div>
			</div> 

			<div class="form-group row">
				<label for="last_name" class="col-md-4 col-form-label text-md-right">{{ __('last Name') }}</label>

				<div class="col-md-6">
					<input id="last_name" type="text" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" name="last_name" value="{{ $user->last_name }}" required autofocus>

					@if ($errors->has('last_name'))
					<span class="invalid-feedback" role="alert">
						<strong>{{ $errors->first('last_name') }}</strong>
					</span>
					@endif
				</div>
			</div>

			<div class="form-group row">
				<label for="username" class="col-md-4 col-form-label text-md-right">{{ __('User Name') }}</label>

				<div class="col-md-6">
					<input id="username" type="text" class="form-control{{ $errors->has('user_name') ? ' is-invalid' : '' }}" name="username" value="{{ $user->username }}" required autofocus>

					@if ($errors->has('username'))
					<span class="invalid-feedback" role="alert">
						<strong>{{ $errors->first('username') }}</strong>
					</span>
					@endif
				</div>
			</div> 

			<div class="form-group row">
				<label for="phone_no" class="col-md-4 col-form-label text-md-right">{{ __('phone Number') }}</label>

				<div class="col-md-6">
					<input id="phone_no" type="text" class="form-control{{ $errors->has('phone_no') ? ' is-invalid' : '' }}" name="phone_no" value="{{$user->phone_no }}" required autofocus>

					@if ($errors->has('phone_no'))
					<span class="invalid-feedback" role="alert">
						<strong>{{ $errors->first('phone_no') }}</strong>
					</span>
					@endif
				</div>
			</div>

			<div class="form-group row">
				<label for="division_id" class="col-md-4 col-form-label text-md-right">{{ __('Division') }}</label>

				<div class="col-md-6">
					<select class="form-control" name="division_id">
						<option value="">please select your division</option>
						@foreach ($divisions as $division)
						<option value="{{ $division->id }}" {{ $user->division_id == $division->id ? 'selected' : '' }}> {{ $division->name }} </option>
						@endforeach
					</select>
				</div>
			</div>

			<div class="form-group row">
				<label for="district_id" class="col-md-4 col-form-label text-md-right">{{ __('District') }}</label>

				<div class="col-md-6">
					<select class="form-control" name="district_id">
						<option value="">please select your district</option>
						@foreach ($districts as $district)
						<option value="{{$district->id}}"{{ $user->district_id == $district->id ? 'selected' : ''}}>{{ $district->name }}</option>
						@endforeach
					</select>
				</div>
			</div>

			<div class="form-group row">
				<label for="street_address" class="col-md-4 col-form-label text-md-right">{{ __('Street Address') }}</label>

				<div class="col-md-6">
					<input id="street_address" type="" class="form-control{{ $errors->has('street_address') ? ' is-invalid' : '' }}" name="street_address" value="{{ $user->street_address }}" required>

					@if ($errors->has('street_address'))
					<span class="invalid-feedback" role="alert">
						<strong>{{ $errors->first('street_address') }}</strong>
					</span>
					@endif
				</div>
			</div> 

			<div class="form-group row">
				<label for="shipping_address" class="col-md-4 col-form-label text-md-right">{{ __('Shipping Address (optional) ') }}</label>

				<div class="col-md-6">
					<textarea id="shipping_address"  class="form-control{{ $errors->has('Shipping_address') ? ' is-invalid' : '' }} "rows=4  name="shipping_address" >{{ $user->shipping_address }}</textarea>

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
					<input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{$user->email}}" required>

					@if ($errors->has('email'))
					<span class="invalid-feedback" role="alert">
						<strong>{{ $errors->first('email') }}</strong>
					</span>
					@endif
				</div>
			</div>

			<div class="form-group row">
				<label for="password" class="col-md-4 col-form-label text-md-right">{{ __('New Password (optional)') }}</label>

				<div class="col-md-6">
					<input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password">

					@if ($errors->has('password'))
					<span class="invalid-feedback" role="alert">
						<strong>{{ $errors->first('password') }}</strong>
					</span>
					@endif
				</div>
			</div>



			<div class="form-group row mb-0">
				<div class="col-md-6 offset-md-4">
					<button type="submit" class="btn btn-primary">
						{{ __('Update Profile') }}
					</button>
				</div>
			</div>
		</form>






	</div>
</div>


@endsection