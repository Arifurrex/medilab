@extends('backend.layouts.master')

@section('content')
<div class="main-panel">
  <div class="content-wrapper">

    <div class="card">
      <div class="card-header">
        Add Divisions
      </div>

      <div class="card-body">
        <form action="{{ route('admin.division.store') }}" method="post">
          {{ csrf_field() }}

          @include('backend.partials.massages')

          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Division name">
          </div>

          <div class="form-group">
            <label for="piority">Piority</label>
            <input type="text" class="form-control" name="piority" id="piority" placeholder="Piority Division">
          </div>


          <button type="submit" class="btn btn-primary">Add Division</button>

        </form>

      </div>

    </div>
  </div>
</div>
  <!-- main-panel ends -->
  @endsection
