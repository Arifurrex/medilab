@extends('backend.layouts.master')

@section('content')
  <div class="main-panel">
    <div class="content-wrapper">

      <div class="card">
        <div class="card-header">
         Edit catagory
        </div>
        <div class="card-body">
            
        <form action="{{ route('admin.catagory.update', $catagory->id) }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        @include('backend.partials.massages')
        <div class="form-group">
        <label for="name">Name</label>
        <input type="name" class="form-control" name="name" id="name" value="{{$catagory->name}}" >
        </div>
        <div class="form-group">
        <label for="description">Description(Optional)</label>
        <textarea name="description" rows="8" cols="80" class="form-control" id="description"  >{!!$catagory->description!!}</textarea>

        </div>
            
       <div class="form-group">
        <label for="parent_id">Parent Catagory(Optional)</label>
        <select class="form-control" name="parent_id">
            <option value="">Please select a primary catagory</option>
        @foreach ($main_catagories as $cat)
        <option value="{{ $cat->id }}" {{ $cat->id == $catagory->parent_id ? 'selected' : ''}}>{{$cat->name}}</option>
        @endforeach
        </select>
        </div>
            
       <div class="form-group">
           <label for="old_image"> Old Catagory Image</label><br>
           <img src="{!!asset('images/catagories/'.$catagory->image)!!}" width="100"/><br>     
           <label for="old_image"> New Catagory Image(Optional)</label><br>
           <img src="{!!asset('images/catagories/'.$catagory->image)!!}" width="100"/><br>     
       <div class="row">
       <div class="col-md-4">
       <input type="file" class="form-control" name="image" id="image"  >
       </div>
                  
       </div>
       </div>
       <button type="submit" class="btn btn-primary">Update Catagory</button>
        
       </form>
       </div>
      </div>

    </div>
  </div>
  <!-- main-panel ends -->
@endsection
