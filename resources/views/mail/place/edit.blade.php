@extends('layouts.mail')

@section('main')
    <h1>Удалено место</h1>
    <p><strong>№ места:</strong> {{ $formData['number'] }} </P>
    <p><strong>№ заказа:</strong> {{ $formData['order_id'] }} </P>
    <p><strong>Рейс:</strong> № {{ $formData['reis']['id']}} {{date("d.m.Y", strtotime($formData['reis']['start_to_date']))." ".date("d.m.Y", strtotime($formData['reis']['start_to_date']))}}
    {{ $formData['reis']['direction']['start_punkt'] }} {{ $formData['reis']['direction']['end_punkt'] }}
    </p>

    <p><strong>Пункт следования:</strong> {{ $formData['punkt'] }} </P>
    <p><strong>Направление:</strong> {{ $formData['direction_text'] }} </P>
    <p><strong>Пасажир:</strong> {{ $formData['f'] }} {{ $formData['i'] }} {{ $formData['o'] }}</P>
    <p><strong>Документ:</strong> {{ $formData['doc_type'] }}</P>
    <p><strong>№ документа:</strong> {{ $formData['doc_n'] }}</P>
    <p><strong>Дата рождения:</strong> {{ date("d.m.Y", strtotime($formData['dr'])) }}</P>
    <p><strong>Телефон:</strong> {{ $formData['phone'] }}</P>
    <h2>Изменения внес:</h2>
    <p>{{ auth()->user()->name }} ({{ auth()->user()->agency }})</p>
    <p><strong>Комментарий:</strong> {{ $formData['comment'] }}</P>
@endsection
