@extends('backend.layouts.master')

@section('content')
  <div class="main-panel">
    <div class="content-wrapper">

      <div class="card">
        <div class="card-header">
         Manage Catagory
        </div>
           
        <div class="card-body">
            @include('backend.partials.massages')
            <table class="table table-hover table-striped">
                <tr>
                    <th>#</th>
                    <th>Catagories Name</th>
                    <th>Catagories image</th>
                    <th>Description</th>
                    <th>Parent catagory</th>
                    <th>Action</th>
                    
                </tr>
                @foreach($catagories as $catagory)
                <tr>
                    <td>#</td>
                    <td>{{$catagory->name}}</td>
                    <td><img src="{!!asset('images/catagories/'.$catagory->image)!!}" width="100"/></td>
                    <td>{{$catagory->description}}</td>
                    <td>
                        @if($catagory->parent_id == NULL)
                        
                        primary catagory
                        
                        @else
                        {{$catagory->parent->name}}
                         
                        @endif 
                    </td>
                    <td>
                        <a href="{{route('admin.catagory.edit',$catagory->id)}}" class="btn btn-success">Edit</a>
                        <a href="#deleteModal{{$catagory->id}}"  class="btn btn-danger" data-Toggle="modal" >Delete</a>
                        
                        <!-- Modal -->
                  <div class="modal fade" id="deleteModal{{$catagory->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                 <div class="modal-dialog" role="document">
                  <div class="modal-content">
                 <div class="modal-header">
                   <h5 class="modal-title" id="exampleModalLabel">Are sure to delete</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                 </button>
                 </div>
                      
                  <div class="modal-body">
                      <form action="{{route('admin.catagory.delete',$catagory->id)}}" method="post">
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
                    
                    </td> 
                    
                    
                    
                </tr>
                @endforeach
                
            </table>
        </div>
      </div>

    </div>
  </div>
  <!-- main-panel ends -->
@endsection
