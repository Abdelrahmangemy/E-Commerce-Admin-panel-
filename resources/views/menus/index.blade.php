@extends('layouts.app')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Menus</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('menus.create') }}"> Create New Menu</a>
        </div>
    </div>
</div>


@if ($message = Session::get('success'))
<div class="alert alert-success">
  <p>{{ $message }}</p>
</div>
@endif


<table class="table table-bordered">
 <tr>
   <th>ID</th>
   <th>Title</th>
   <th>Link</th>

   <th width="280px">Action</th>
 </tr>
 @foreach ($data as $key => $menu)
  <tr>
    <td>{{ ++$i }}</td>
    <td>{{ $menu->title }}</td>
    <td>{{ $menu->link }}</td>

    <td>
       <a class="btn btn-info" href="{{ route('menus.show',$menu->id) }}">Show</a>
       <a class="btn btn-primary" href="{{ route('menus.edit',$menu->id) }}">Edit</a>
        {!! Form::open(['method' => 'DELETE','route' => ['menus.destroy', $menu->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
        {!! Form::close() !!}
    </td>
  </tr>
 @endforeach
</table>


{!! $data->render() !!}


<p class="text-center text-primary"><small>Tutorial by ItSolutionStuff.com</small></p>
@endsection