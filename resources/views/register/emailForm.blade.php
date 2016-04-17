<div class="row">
    {!! Form::open(['action' => ['RegisterController@sendEmail'],  'role' => 'form']) !!}
    <div class="form-group">
        {!! Form::text('email', old('email'), ['placeholder'=>'myemail@mail.com', 'class'=>'form-control', 'required'=>true]) !!}
        @if($errors->has('email'))
            <div class="alert-danger alert">{!! $errors->first('email') !!}</div>
        @endif
    </div>
    {!! Form::submit('Далее',['class'=>'btn btn-success']) !!}
    {!! Form::close() !!}
</div>
