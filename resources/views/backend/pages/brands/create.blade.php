@extends('backend.layouts.master')

@section('content')
  <div class="main-panel">
    <div class="content-wrapper">

      <div class="card">
        <div class="card-header">
          Add Brands
        </div>
        <div class="card-body">
            <form action="{{ route('admin.brand.store') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            @include('backend.partials.massages')
            <div class="form-group">
              <label for="name">Name</label>
              <input type="name" class="form-control" name="name" id="name" aria-describedby="emailHelp" placeholder="Enter name">
            </div>
            <div class="form-group">
              <label for="description">Description</label>
              <textarea name="description" rows="8" cols="80" class="form-control" id="description"  ></textarea>

            </div>

          

            <div class="form-group">
              <label for="image">Brand Image</label>

              <div class="row">
                  <div class="col-md-4">
                      <input type="file" class="form-control" name="image" id="image"  >
                  </div>

              </div>
            </div>
            <button type="submit" class="btn btn-primary">Add Brand</button>

       </form>

      </div>

    </div>
  </div>
  <!-- main-panel ends -->
@endsection
