@extends('backend.layouts.master')

@section('content')
  <div class="main-panel">
    <div class="content-wrapper">

      <div class="card">
        <div class="card-header">
          Add Product
        </div>
        <div class="card-body">
            <form action="{{ route('admin.product.store') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            @include('backend.partials.massages')
            <div class="form-group">
              <label for="exampleInputEmail1">Title</label>
              <input type="text" class="form-control" name="title" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter product title">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Model</label>
              <input type="text" class="form-control" name="model" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter product model">
            </div>
            
             <div class="form-group">
              <label for="exampleInputEmail1">Select Brand</label>
              <select class="form-control" name="brand_id">
                <option value="">Please select a brand for the product</option>

                @foreach (App\Models\brand::orderBy('name', 'asc')->get() as $brand)
                <option value="{{ $brand->id }}"> {{ $brand->name }} </option>

                @endforeach

              </select>
            </div>
            
            <div class="form-group">
              <label for="exampleInputEmail1">Oirgin</label>
              <input type="text" class="form-control" name="origin" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter product origin">
            </div>
            
            <div class="form-group">
              <label for="exampleInputEmail1">condition</label>
              <input type="text" class="form-control" name="conditions" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter product condition">
            </div>
            
            <div class="form-group">
              <label for="exampleInputEmabrand_id l1">Price</label>
              <input type="number" class="form-control" name="price"  placeholder="Enter product price without comma">
            </div>
            <div class="form-group">
              <label for="exampleInputEmabrand_id l1">Price again</label>
              <input type="text" class="form-control" name="price_wth_comma"  placeholder="Enter product price with comma">
            </div>
            
             <div class="form-group">
              <label for="exampleInputEmail1">ask for price tag</label>
              <input type="text" class="form-control" name="ask_for_price" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="ask for price">
            </div>
            
            <div class="form-group">
              <label for="exampleInputEmail1">Quantity</label>
              <input type="number" class="form-control" name="quantity" placeholder="Enter product Quantity">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Select Catagory</label>
              <select class="form-control" name="catagory_id">
                <option value="">Please select a catagory for the product</option>

                @foreach (App\Models\catagory::orderBy('name', 'asc')->where('parent_id',NULL)->get() as $parent)
                <option value="{{ $parent->id }}"> {{ $parent->name }} </option>
                @foreach (App\Models\catagory::orderBy('name', 'asc')->where('parent_id', $parent->id)->get() as $child)
                  <option value="{{ $child->id }}">--> {{ $child->name }} </option>
                @endforeach
                @endforeach

              </select>
            </div>
            
            <div class="form-group">
              <label for="exampleInputPassword1">Description</label>
              <!--<textarea name="description" rows="8" cols="80" class="form-control"></textarea>-->
              <textarea name="description" id="mytextarea"></textarea>

            </div>
             
             
             <div class="form-group">
              <label for="exampleInputPassword1">How to order</label>
              <textarea name="how_to_order" rows="8" cols="80" class="form-control"></textarea>
              <!--<textarea name="description" id="mytextarea"></textarea>-->

            </div>
           


            <div class="form-group">
              <label for="product_image">product Image</label>

              <div class="row">
                  <div class="col-md-4">
                      <input type="file" class="form-control" id="product_image" name="product_image[]"  >
                  </div>
                  <div class="col-md-4">
                      <input type="file" class="form-control" id="product_image" name="product_image[]"  >
                  </div>
                  <div class="col-md-4">
                      <input type="file" class="form-control" id="product_image"  name="product_image[]"  >
                  </div>
                  <div class="col-md-4">
                      <input type="file" class="form-control" id="product_image"  name="product_image[]"  >
                  </div>
                  <div class="col-md-4">
                      <input type="file" class="form-control" id="product_image"  name="product_image[]"  >
                  </div>
              </div>
             </div>
            <button type="submit" class="btn btn-primary">Add Product</button>

          </form>

      </div>

    </div>
  </div>
  <!-- main-panel ends -->
@endsection
