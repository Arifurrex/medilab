@extends('Frontend.pages.users.master')
@section('sub-content')
<div class='container '>
    
    <h4>Welcome <b style="color: #5f27cd">{{$user->first_name.' '.$user->last_name}}</b> </h4>
    <p>You can change your profile and informations here..</p>

    <div class="row">
    <div class="col-md-4">
    	<div class="card card-body mt-2 mb-2">
    	<a href="{{ route('user.profile') }}" class="btn btn-secondary">Profile Update</a>
    </div>
    </div>
</div>
    
</div>


@endsection