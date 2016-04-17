<div class="row">
    {!! Form::open(['action' => ['RegisterController@setUserName'],  'role' => 'form']) !!}
    <div class="form-group">
        {!! Form::text('name', old('name'), ['placeholder'=>'Таня', 'class'=>'form-control', 'required'=>true]) !!}
        @if($errors->has('name'))
            <div class="alert-danger alert">{!! $errors->first('name') !!}</div>
        @endif
    </div>
    {!! Form::submit('Далее',['class'=>'btn btn-success']) !!}
    {!! Form::close() !!}
</div>
