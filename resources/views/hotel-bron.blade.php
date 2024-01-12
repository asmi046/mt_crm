@extends('layouts.all')

@php
    $title = "Бронирование отеля";
    $description = "Бронирование отеля";
@endphp

@section('title', $title)
@section('description', $description)

@section('main')

<section class="cabinet_section">
    <x-sidebar.sidebar></x-sidebar.sidebar>

    <div class="main">
        <div class="page_container ">
            <div class="box">
                <h1>Бронирование отеля</h1>
                <p>Бронирование отеля на черноморском побереже</p>
            </div>

            <div class="box pt_10">
                <div class="directs">
                    <x-direction></x-direction>
                    <x-direction></x-direction>
                    <x-direction></x-direction>
                    <x-direction></x-direction>
                </div>
            </div>

        </div>
    </div>
</section>



@endsection

