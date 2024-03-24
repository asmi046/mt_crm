@extends('layouts.mail')

@section('main')
    <h1>Восстановлен пароль</h1>
    <p>Ваш новый пароль</p>
    <p>{{ $formData }}</p>

@endsection
