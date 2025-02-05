@extends('Frontend.layouts.master')
@section('content')
<div class='container '>
	<div class="row">
    
   <div class="col-md-4 mt-2">
   	<div class="list-group">
   		<a href="" class="list-group-item "><img src="{{App\Helpers\ImageHelper::getUserImage(Auth::user()->id)}}" style="width:100" class="img rounded-circle"></a>
   		<a href="{{route('user.dashboard')}}" class="list-group-item {{Route::is('user.dashboard') ? 'active' : ' '}}">Dashboard</a>
   		<a href="{{route('user.profile')}}" class="list-group-item {{Route::is('user.profile') ? 'active': ' '}}">Update profile</a>
   		<a href="{{}}" class="list-group-item">log out</a>
   	</div>
   </div>
   <div class="col-md-8">
   	<div class="card mt-2">
   		@yield('sub-content')
   	</div>
   	
   </div>

</div>
    
</div>


@endsection