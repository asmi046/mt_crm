@extends('layouts.all')

@php
    $title = "Брони пользователя";
    $description = "Брони пользователя";
@endphp

@section('title', $title)
@section('description', $description)

@section('main')

<section class="cabinet_section">
    <x-sidebar.sidebar></x-sidebar.sidebar>

    <div class="main">
        <div class="page_container ">
            <div class="box">
                <h1>Мои брони</h1>
                <p>Забронировано моей учетной записью</p>
            </div>

            <div class="box pt_10">

            </div>

        </div>
    </div>
</section>



@endsection

