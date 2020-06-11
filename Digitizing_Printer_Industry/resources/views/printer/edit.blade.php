@extends('master')

@section('content')

<div class="row">
 <div class="col-md-12">
  <br />
  <h3>Edit Record</h3>
  <br />
  @if(count($errors) > 0)

  <div class="alert alert-danger">
         <ul>
         @foreach($errors->all() as $error)
          <li>{{$error}}</li>
         @endforeach
         </ul>
       </div>
  @endif
   @if(\Session::has('success'))
  <div class="alert alert-success">
   <p>{{ \Session::get('success') }}</p>
  </div>
  @endif
  <form method="post" action="{{action('PrinterController@update', $id)}}">
   {{csrf_field()}}
   <input type="hidden" name="_method" value="PATCH" />
   <div class="form-group"><b>Order Id:</b>
    <input type="text" name="order_id" class="form-control" value="{{$printer->order_id}}" placeholder="Enter Order Id" />
   </div>
   <div class="form-group"><b>Document Needed:</b>
    <input type="text" name="document_needed" class="form-control" value="{{$printer->document_needed}}" placeholder="Enter Document Needed" />
   </div>
   <div class="form-group"><b>Quantity:</b>
    <input type="text" name="quantity" class="form-control" value="{{$printer->quantity}}" placeholder="Enter Quantity" />
   </div>
   <div class="form-group"><b>Area:</b>
    <input type="text" name="area" class="form-control" value="{{$printer->area}}" placeholder="Enter Area" />
   </div>
   <div class="form-group"><b>Order Status:</b>
    <input type="text" name="order_status" class="form-control" value="{{$printer->order_status}}" placeholder="Enter Order Status" />
   </div>
   <div class="form-group">
    <input type="submit" class="btn btn-primary" value="Edit" />
   </div>
  </form>
 </div>
</div>

@endsection
