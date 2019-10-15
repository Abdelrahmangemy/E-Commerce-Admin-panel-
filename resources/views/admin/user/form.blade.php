<div class="form-group">
    <label for="{{trans ('admin.name')}}">{{trans ('admin.name')}}</label>
                {!! form::text("name",null,[
                'class'       => 'form-control',
                'placeholder' => trans ('admin.name'),
                'required'                       
                ]) !!}
</div>

<div class="form-group">
    <label for="{{trans ('admin.username')}}">{{trans ('admin.username')}}</label>
                {!! form::text("username",null,[
                'class'       => 'form-control',
                'placeholder' => trans ('admin.username'),
                'required'                       
                ]) !!}
</div>

<div class="form-group">
    <label for="{{trans ('admin.email')}}">{{trans ('admin.email')}}</label>
                {!! form::text("email",null,[
                'class'       => 'form-control',
                'placeholder' =>trans ('admin.email'),
                'required'                       
                ]) !!}
</div>

<div class="form-group">
    <label for="{{trans ('admin.role')}}">{{trans ('admin.role')}}</label>
                {!! form::select("role",role(),null,[
                'class'       => 'form-control',
                'placeholder' => trans ('admin.role'),
                'required'                       
                ]) !!}
</div>
