@extends('layouts.all')

@php
    $title = "Система бронирования";
    $description = "Система бронирования";
@endphp

@section('title', $title)
@section('description', $description)

@section('main')

<section class="cabinet_section">
    <div class="sidebar">
        <header>
            <x-logo-elements></x-logo-elements>
        </header>

        <nav>
            <x-sb-nav-btn active href="#" icon="fa-solid fa-house">Главная</x-sb-nav-btn>
            <x-sb-nav-btn href="#" icon="fa-solid fa-bus">Проезд (+ отель)</x-sb-nav-btn>
            <x-sb-nav-btn href="#" icon="fa-solid fa-square-h">Бронирование отеля</x-sb-nav-btn>
            <x-sb-nav-btn href="#" icon="fa-solid fa-list">Мои брони</x-sb-nav-btn>
        </nav>

        <footer>
            <x-a-icon href="#" icon="fa-solid fa-door-open">Выйти</x-a-icon>
        </footer>
    </div>

    <div class="main">
        <div class="page_container box">

        </div>
    </div>
</section>



@endsection

