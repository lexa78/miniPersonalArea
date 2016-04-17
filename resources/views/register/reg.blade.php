@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="flash-message">
                    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                        @if(Session::has('alert-' . $msg))
                            <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                        @endif
                    @endforeach
                </div>

                <div class="panel panel-default">
                    <?
                        switch($what) {
                            case 'email':
                    ?>
                                <div class="panel-heading">Введите ваш email</div>
                                <div class="panel-body">
                                    @include('register.emailForm')
                                </div>
                    <?
                                break;
                            case 'code':
                    ?>
                                <p class="alert alert-success">На указанный вами email, отправлено письмо с проверочным кодом. Введите его. <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                                <div class="panel-heading">Введите полученный код</div>
                                <div class="panel-body">
                                    @include('register.codeForm')
                                </div>
                    <?
                                break;
                            case 'name':
                    ?>
                                <div class="panel-heading">Введите вашe имя</div>
                                <div class="panel-body">
                                    @include('register.nameForm')
                                </div>
                    <?
                                break;
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
@stop
