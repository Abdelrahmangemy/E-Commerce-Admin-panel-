@extends('layouts.app')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Pages</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('pages.create') }}"> Create New Page</a>
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
   <th>Slug</th>
   <th width="280px">Action</th>
 </tr>
 @foreach ($data as $key => $page)
  <tr>
    <td>{{ ++$i }}</td>
    <td>{{ $page->title }}</td>
    <td>{{ $page->slug }}</td>

    <td>
       <a class="btn btn-info" href="{{ route('pages.show',$page->id) }}">Show</a>
       <a class="btn btn-primary" href="{{ route('pages.edit',$page->id) }}">Edit</a>
        {!! Form::open(['method' => 'DELETE','route' => ['pages.destroy', $page->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
        {!! Form::close() !!}
    </td>
  </tr>
 @endforeach
</table>


{!! $data->render() !!}


<p class="text-center text-primary"><small>Tutorial by ItSolutionStuff.com</small></p>
@endsection