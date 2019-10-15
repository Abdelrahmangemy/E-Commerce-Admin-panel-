@extends('admin.layouts.master')
@section('title'){{trans('admin.create',['name' => 'trans('admin.user')'])}}
@endsection 
@section('content')
<div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">{{trans('admin.create',['name' => 'trans('admin.user')'])}}</h3>
              </div>
              {!!
                  Form::open([
                    'url'    => route('user.store'),
                    'method' => 'POST',
                    'role'   => 'form'    
                ])
              !!}
              <div class="box-body">
               @include('admin.user.form')   
              
              
              <div class="card-footer">
                  <button type="submit" class="btn btn-primary">{{trans('admin.submit')}}</button>
                </div>
                </div>
              {!!
                  form::close()
              !!}
              
            </div>
            <!-- /.card -->

            
</div>      
@endsection