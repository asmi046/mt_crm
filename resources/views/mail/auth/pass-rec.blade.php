@extends('layouts.mail')

@section('main')
    <h1>Восстановление пароля</h1>
    <p> Для восстановления пароля перейдите по ссылке ниже и следуйте инструкциям:</p>
    <br>
    <br>
    <p>
        <a style="border-radius: 5px; background-color: #00b4f1; color:white; padding: 8px 12px; text-decoration:none" href="{{ $url }}?email={{ $email }}">Восстановление пароля</a>
    </p>
    <br>
    <br>

@endsection
