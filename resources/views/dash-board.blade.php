@extends('layouts.all')

@php
    $title = "Система бронирования";
    $description = "Система бронирования";
@endphp

@section('title', $title)
@section('description', $description)

@section('main')

<div class="columns">
    <div class="column is-2 has-background-primary">

    </div>

    <div class="column is-10">
        <section class="section">
            <div class="container is-fullhd">
                <h1 class="is-size-4 is-size-2-tablet is-size-2-desktop  has-text-weight-bold">Добро пожаловать в систему бронирования</h1>
                <p class="my-3">В данной системе Вы можете произвести бронирование проезда а так же бронирования отелей</p>
            </div>
        </section>
    </div>
</div>



@endsection

