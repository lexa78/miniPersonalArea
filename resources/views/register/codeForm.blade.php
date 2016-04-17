<div class="row">
    {!! Form::open(['action' => ['RegisterController@checkCode'], 'role' => 'form']) !!}
    <div class="form-group">
        {!! Form::text('code', old('code'), ['placeholder'=>'1234', 'class'=>'form-control', 'required'=>true]) !!}
        @if($errors->has('code'))
            <div class="alert-danger alert">{!! $errors->first('code') !!}</div>
        @endif
    </div>
    {!! Form::submit('Далее',['class'=>'btn btn-success']) !!}
    {!! Form::close() !!}
</div>
