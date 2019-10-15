@extends('layouts.app')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2> Show Page</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('pages.index') }}"> Back</a>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Title:</strong>
            {{ $page->title }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>User:</strong>
            {{ $page->creator }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Content:</strong>
            {{ $page->content }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            
             @if($page->image != null)
             <tr>
                <th> <strong>image:</strong> </th>
                <td><img src="{{ $page->photo }}" style="width:450px ; height:450px"> </td>
             </tr>
             @endif
            
        </div>
    </div>
    
</div>
@endsection