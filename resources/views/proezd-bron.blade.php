@extends('layouts.all')

@php
    $title = "Бронирование проезда";
    $description = "Бронирование проезда";
@endphp

@section('title', $title)
@section('description', $description)

@section('main')

<section class="cabinet_section">
    <x-sidebar.sidebar></x-sidebar.sidebar>

    <div class="main">
        <div class="page_container ">
            <div class="box">
                <h1>Бронирование презда</h1>
                <p>Бронирование презда на черноморском побереже</p>
            </div>

            <div class="box pt_10">
                <div class="directs">
                    @foreach ($direction as $item)
                        <x-direction :selecteddirection="$sel_d" :selected="$sel_p" :direction="$item->id" :puncts="$item->puncts"></x-direction>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
</section>



@endsection

