@extends('backend.layouts.master')

@section('content')
  <div class="main-panel">
    <div class="content-wrapper">

      <div class="card">
        <div class="card-header">
         Manage Product
        </div>
           
        <div class="card-body">
            @include('backend.partials.massages')
            <table class="table table-hover table-striped">
                <tr>
                    <th>#</th>
                    <th>Product Title</th>
                    <th>price</th>
                    <th>quantity</th>
                    <th>Action</th>
                    
                </tr>
                @foreach($products as $product)
                <tr>
                    <td>{{$loop->index+1}}</td>
                    <td>{{$product->title}}</td>
                    <th>{{$product->price}}</td>
                    <th>{{$product->quantity}}</td>
                    <th>
                        <a href="{{route('admin.product.edit',$product->id)}}" class="btn btn-success">Edit</a>
                        <a href="#deleteModal{{$product->id}}"  class="btn btn-danger" data-Toggle="modal" >Delete</a>
                        
                        <!-- Modal -->
                  <div class="modal fade" id="deleteModal{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                 <div class="modal-dialog" role="document">
                  <div class="modal-content">
                 <div class="modal-header">
                   <h5 class="modal-title" id="exampleModalLabel">Are sure to delete</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                 </button>
                 </div>
                      
                  <div class="modal-body">
                      <form action="{{route('admin.product.delete',$product->id)}}" method="post">
                          {{csrf_field()}}
                      <button type="submit" class="btn btn-danger" >Permanent Delete</button>    
                      </form>
                      
                     </div>
               <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancle</button>
              
                   </div>
               </div>
                  </div>
                  </div>
                    
                    </th> 
                    
                    
                    
                </tr>
                @endforeach
                
            </table>
        </div>
      </div>

    </div>
  </div>
  <!-- main-panel ends -->
@endsection
