@extends('backend.layouts.master')

@section('content')
  <div class="main-panel">
    <div class="content-wrapper">

      <div class="card">
        <div class="card-header">
         Manage Order
        </div>
           
        <div class="card-body">
            @include('backend.partials.massages')
            <table class="table table-hover table-striped">
                <tr>
                    <th>#</th>
                    <th>Order id</th>
                    <th>Orderer Name</th>
                    <th>Order Phone No</th>
                    <th>Order Status</th>
                    <th>Action</th>
                    
                </tr>
                @foreach($orders as $order)
                <tr>
                    <td>{{$loop->index+1}}</td>
                    <td>{{$order->id}}</td>
                    <th>{{$order->name}}</td>
                    <th>{{$order->phone_no}}</td>
                    <th>
                      
                        @if($order->is_seeen_by_admin)
                       <button type="button" class="btn btn-success">seen</button>
                      @else
                        <button type="button" class="btn btn-warning">Unseen</button>
                    
                    @endif
                      </p>

                        <p>
                        @if($order->is_completed)
                       <button type="button" class="btn btn-success">Completed</button>
                      @else
                        <button type="button" class="btn btn-warning">Uncompleted</button>
                    
                    @endif
                      </p>

                      <p>
                        @if($order->is_paid)
                       <button type="button" class="btn btn-success">Paid</button>
                      @else
                        <button type="button" class="btn btn-danger">Unpaid</button>
                    
                    @endif
                      </p>
                      <p>

                    </td>
                    <th>
                       
                        <a href="{{ route('admin.order.show', $order->id)}}"  class="btn btn-info"  >view order</a>
                        <a href="#deleteModal{{$order->id}}"  class="btn btn-danger" data-Toggle="modal" >Delete</a>
                        
                        <!-- Modal -->
                  <div class="modal fade" id="deleteModal{{$order->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                 <div class="modal-dialog" role="document">
                  <div class="modal-content">
                 <div class="modal-header">
                   <h5 class="modal-title" id="exampleModalLabel">Are sure to delete</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                 </button>
                 </div>
                      
                  <div class="modal-body">
                      <form action="{{route('admin.order.delete',$order->id)}}" method="post">
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
