@extends('layouts.all')

@php
    $title = "Система бронирования";
    $description = "Система бронирования";
@endphp

@section('title', $title)
@section('description', $description)

@section('main')

<section class="cabinet_section">
    <x-sidebar.sidebar></x-sidebar.sidebar>

    <div class="main">
        <div class="page_container ">
            <div class="box">
                <h1>Статистика по системе бронирования</h1>
                <p>Основные показатели по бронированию проезда на море</p>
            </div>
            <br>
            <div class="box">
                <h2>Актуальная информация:</h2>
                <div class="informers informers_i3">

                    <div class="informer ">
                        <p class="carecter">{{ $place_count }}</p>
                        <p class="info">Забронированно мест на всех рейсах</p>
                    </div>

                    <div class="informer ">
                        <p class="carecter">{{ $reis_count }}</p>
                        <p class="info">рейсов суммарно по всем направлениям</p>
                    </div>

                    <div class="informer ">
                        <p class="carecter">{{ $actual_reis_count }}</p>
                        <p class="info">рейсов актуально к бронированию на данный момен</p>
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>



@endsection

