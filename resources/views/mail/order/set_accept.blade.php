@extends('layouts.mail')

@section('main')
    <h1>Оформлена бронь №{{  $formData['id'] }}</h1>
    <p><strong>Пользователь:</strong> {{ $formData['user']['name']}} ({{ $formData['user']['agency']}})</P>
    <p><strong>Рейс:</strong> № {{ $formData['reis']['id']}} {{date("d.m.Y", strtotime($formData['reis']['start_to_date']))." ".date("d.m.Y", strtotime($formData['reis']['start_to_date']))}}
    {{ $formData['reis']['direction']['start_punkt'] }} {{ $formData['reis']['direction']['end_punkt'] }}
    </p>
    <p> <strong>Пункт прибывания</strong> {{  $formData['punkt'] }}</p>
    <P><strong>Коментарий:</strong> {{ $formData['comment']}}</P>
    <h2>Места:</h2>
    @foreach ($formData['mesta'] as $item)

        <p><strong>№ {{ $item->number }}</strong> {{ $item->direction_text }}</p>
        <strong>Пасажир:</strong> {{ $item->f }} {{ $item->i }} {{ $item->o }}<br>
        <strong>Документ:</strong> {{ $item->doc_type }}<br>
        <strong>№ документа:</strong> {{ $item->doc_n }}<br>
        <strong>Дата рождения:</strong> {{ date("d.m.Y", strtotime($item->dr)) }}<br>
        <strong>Телефон:</strong> {{ $item->phone }}<br>
        <strong>Комментарий:</strong> {{ $item->comment }}<br>
        <br>
    @endforeach
@endsection
