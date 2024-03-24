@extends('layouts.mail')

@section('main')
    <h1>Консультация</h1>
    <P><strong>Имя:</strong> {{ $formData['name']}}</P>
    <P><strong>Телефон:</strong> {{ $formData['phone']}}</P>
    <P><strong>Коментарий:</strong> {{ $formData['message']}}</P>
@endsection
