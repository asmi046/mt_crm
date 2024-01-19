@extends('layouts.all')

@php
    $title = "Приобретение билетов";
    $description = "Приобретение билетов на проезд до черноморского побережя";
@endphp

@section('title', $title)
@section('description', $description)

@section('main')

<section class="cabinet_section">
    <x-sidebar.sidebar></x-sidebar.sidebar>

    <div class="main">
        <div class="page_container ">
            <div class="box">
                <h1>Купить билет на рейс №{{$reis->id}}</h1>
                <div class="page_reis_info">
                    <p><strong>Пункт следования: </strong> {{$punkt}}</p>
                    <br>
                    <p><strong>Направление: </strong> {{$reis->direction->name}}</p>
                    <p><strong>Выезд из Курска: </strong> {{$reis->start_to_date}}</p>
                    <p><strong>Прибытие на место: </strong>{{$reis->prib_to_date}}</p>
                    <p><strong>Выезд обратно: </strong>{{$reis->start_out_date}}</p>
                    <p><strong>Прибытие в Курск: </strong>{{$reis->prib_out_date}}</p>
                </div>
                <br>
                <br>
                <x-a-icon href="{{route('proezd-bron', ['direction' => $reis->direction->id, 'punct' => $punkt])}}" icon="fa-solid fa-arrow-rotate-left">Выбрать другой рейс</x-a-icon>
            </div>

            <div class="box pt_10">

            </div>

        </div>
    </div>
</section>



@endsection

