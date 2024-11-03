@extends('backend.layouts.master')

@section('content')
  <div class="main-panel">
    <div class="content-wrapper">

      <div class="card">
        <div class="card-header">
         Manage slider
        </div>
           
        <div class="card-body">
            @include('backend.partials.massages')
            <table class="table table-hover table-striped">
                <tr>
                    <th>#</th>
                    <th>slider title</th>
                    <th>slider description</th>
                    <th>slider status</th>
                    <th>slider image</th>
                    <th>Action</th>
                    
                </tr>
                @foreach($slider as $slide)
                <tr>
                    <td>{{$loop->index}}</td>
                    <td>{{$slide->slide_title}}</td>
                    <td>{{$slide->slide_description}}</td>
                    <td>{{$slide->status ==1?'published':'unpublished'}}</td>
                    <td><img src="{!!asset('images/slider/'.$slide->slide_image)!!}" width="100"/></td>
                    
                    
                <td class="">
                    @if($slide->status ==1)
                    <a href="{{ route('slide-unpublished',$slide->id) }}" class="btn btn-success fas fa-arrow-up" title="Deactive"></a>
                    @else
                    <a href="{{ route('slide-published',$slide->id) }}" class="btn btn-info  fas fa-arrow-down" title="active" ></a>
                    @endif
                    
                     <a href="{{ route('slide-edit',$slide->id) }}" class="btn btn-primary fas fa-edit" ></a>
                    <a href="{{ route('slide-delete',$slide->id) }}" class="btn btn-danger fas fa-trash" onclick="return confirm('if you want to delete this item please press ok')" ></a>
                    
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


