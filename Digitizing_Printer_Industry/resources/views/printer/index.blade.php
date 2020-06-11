@extends('master')

@section('content')

<div class="row">
 <div class="col-md-12">
  <br />
  <h3 align="center">Digitizing Printer Industry</h3>
  <br />
  @if($message = Session::get('success'))
  <div class="alert alert-success">
   <p>{{$message}}</p>
  </div>
  @endif
  <div align="right">
   <a href="{{route('printer.create')}}" class="btn btn-primary">Add</a>
   <br />
   <br />
  </div>
  <table class="table table-bordered table-striped">
   <tr>
    <th>Order Id</th>
    <th>Document Needed</th>
    <th>Quantity</th>
    <th>Area</th>
    <th>Order Status</th>
    <th>Edit</th>
    <th>Delete</th>
   </tr>
   @foreach($printers as $row)
   <tr>
    <td>{{$row['order_id']}}</td>
    <td>{{$row['document_needed']}}</td>
    <td>{{$row['quantity']}}</td>
    <td>{{$row['area']}}</td>
    <td>{{$row['order_status']}}</td>
    <td><a href="{{action('PrinterController@edit', $row['id'])}}" class="btn btn-warning">Edit</a></td>
    <td>
      <form method="post" class="delete_form" action="{{action('PrinterController@destroy', $row['id'])}}">  <!--directly delee from DB-->
        {{csrf_field()}}
        <input type="hidden" name="_method" value="DELETE" />
        <button type="submit" class="btn btn-danger">Delete</button>  <!-- ask for confirmation-->
      </form>
    </td>
   </tr>
   @endforeach
  </table>
 </div>
</div>
<script>
  $(document).ready(function(){
    $('.delete_form').on('submit', function(){
      if(confirm("Are you sure you want to delete it?"))
      {
        return true;
      }
      else
      {
        return false;
      }
    });
  });
</script>

@endsection