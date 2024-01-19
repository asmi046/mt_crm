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
                <form class="city_select_form" method="GET" action="{{route('hotel-bron')}}">
                    <div class="field">
                        <label for="city_select">Выберите город</label>
                        <select name="city" id="city_select">

                            <option @selected($selcity === "" || $selcity === "%" ) value="%">Все города</option>
                            @foreach ($citys as $item)
                                <option @selected($selcity === $item->city) value="{{$item->city}}">{{$item->city}}</option>
                            @endforeach
                        </select>
                    </div>

                    <button class="button" type="submit">Выбрать отели</button>

                </form>

                <div class="hotel_list">
                    @foreach ($hotels as $item)
                        <x-hotel.card :item="$item"></x-hotel.card>
                    @endforeach

                </div>
            </div>

        </div>
    </div>
</section>



@endsection

