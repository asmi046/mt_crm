@extends('layouts.all')

@php
    $title = "Детали лога";
    $description = "Детали лога";
@endphp

@section('title', $title)
@section('description', $description)

@section('main')

<section class="cabinet_section">
    <x-sidebar.sidebar></x-sidebar.sidebar>

    <div class="main">
        <div class="page_container ">
            <div class="box">
                <h1>Запись №{{ $item->id }} {{ $item->event }}</h1>
                <p>Пользователь: {{ $item->user->name }} ({{ $item->user->agency }})</p>

            </div>

            <div class="box pt_10">
                <h2>{{date("d.m.Y H:i", strtotime($item->created_at))}}</h2>
                <h2>Описание события:</h2>
                {!! str_replace("\n\r","<br>",$item->info) !!}
                <br>
                <br>
                <x-a-icon href="{{ route('show_log') }}" icon="fa-solid fa-arrow-rotate-left pl_10">Назад</x-a-icon>
            </div>

        </div>
    </div>
</section>



@endsection

