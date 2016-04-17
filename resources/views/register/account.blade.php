@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Личный кабинет пользователя {{ $user->name }}</div>
                    <div class="panel-body">
                        <p>Имя: {{ $user->name }}</p>
                        <p>Дату не стал форматировать, т.к. в задании ничего о ней не сказано. Просто показал, что она есть.</p>
                        <p>Зарегистрирован: {{ $user->created_at }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
