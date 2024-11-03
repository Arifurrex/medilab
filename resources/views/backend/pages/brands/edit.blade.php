@extends('backend.layouts.master')

@section('content')
  <div class="main-panel">
    <div class="content-wrapper">

      <div class="card">
        <div class="card-header">
         Edit Brand
        </div>
        <div class="card-body">

        <form action="{{ route('admin.brand.update', $brand->id) }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        @include('backend.partials.massages')
        <div class="form-group">
        <label for="name">Name</label>
        <input type="name" class="form-control" name="name" id="name" value="{{$brand->name}}" >
        </div>
        <div class="form-group">
        <label for="description">Description(Optional)</label>
        <textarea name="description" rows="8" cols="80" class="form-control" id="description"  >{!!$brand->description!!}</textarea>

        </div>



       <div class="form-group">
           <label for="old_image"> Old Brand Image</label><br>
           <img src="{!!asset('images/brands/'.$brand->image)!!}" width="100"/><br>
           <label for="old_image"> New Brand Image(Optional)</label><br>
      <input type="file" class="form-control" name="image" id="image"  >
       <!--<div class="row">-->
       <!--<div class="col-md-4">-->
       <!--<input type="file" class="form-control" name="image" id="image"  >-->
       <!--</div>-->

       <!--</div>-->
       </div>
       <button type="submit" class="btn btn-primary">Update Brand</button>

       </form>
       </div>
      </div>

    </div>
  </div>
  <!-- main-panel ends -->
@endsection
