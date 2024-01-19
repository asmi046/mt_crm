@extends('layouts.all')

@php
    $title = "Данные пользователя";
    $description = "Изменить данные пользователя";
@endphp

@section('title', $title)
@section('description', $description)

@section('main')

<section class="cabinet_section">
    <x-sidebar.sidebar></x-sidebar.sidebar>

    <div class="main">
        <div class="page_container ">
            <div class="box">
                <h1>Мои данные</h1>
                <p>Изменить мои учетные данные</p>
            </div>

            <div class="box pt_10">

            </div>

        </div>
    </div>
</section>



@endsection

