@extends('backend.layouts.master')

@section('content')
<div class="main-panel">
  <div class="content-wrapper">

    <div class="card">
      <div class="card-header">
        Edit Division
      </div>
      <div class="card-body">

        <form action="{{ route('admin.division.update', $division->id) }}" method="post" enctype="multipart/form-data">
          {{ csrf_field() }}
          @include('backend.partials.massages')
          
          <div class="form-group">
            <label for="name">Name</label>
            <input type="name" class="form-control" name="name" id="name" value="{{$division->name}}" 
          </div>

          <div class="form-group">
            <label for="piority">piority</label>
            <input type="text" class="form-control" name="piority" id="piority" value="{{$division->piority}}" >
          </div>






          <button type="submit" class="btn btn-primary">Update division</button>

        </form>
      </div>
    </div>

  </div>
</div>
<!-- main-panel ends -->
@endsection
