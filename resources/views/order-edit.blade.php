@extends('layouts.all')

@php
    $title = "Редактирование заказа";
    $description = "Редактирование оформленного заказа";
@endphp

@section('title', $title)
@section('description', $description)

@section('main')

<section class="cabinet_section">
    <x-sidebar.sidebar></x-sidebar.sidebar>

    <div class="main">
        <div class="page_container ">
            <div class="box">
                <h1>Редактирование заказа №{{$order->id}}</h1>
                {{-- <div class="page_reis_info">
                    <p><strong>Пункт следования: </strong> {{$punkt}}</p>
                    <br>
                    <p><strong>Направление: </strong> {{$reis->direction->name}}</p>
                    <p><strong>Выезд из Курска: </strong> {{date("d.m.Y", strtotime($reis->start_to_date)) }}</p>
                    <p><strong>Прибытие на место: </strong>{{date("d.m.Y", strtotime($reis->prib_to_date)) }}</p>
                    <p><strong>Выезд обратно: </strong>{{date("d.m.Y", strtotime($reis->start_out_date)) }}</p>
                    <p><strong>Прибытие в Курск: </strong>{{date("d.m.Y", strtotime($reis->prib_out_date)) }}</p>
                    <p><strong>Автобус: </strong>{{ $reis->reis_bus->name }}</p>
                </div> --}}
                <br>
                <br>
                <x-a-icon href="{{ route('all_orders') }}" icon="fa-solid fa-arrow-rotate-left">К писку броней</x-a-icon>
            </div>

            <div class="box pt_10">

            </div>

        </div>
    </div>
</section>



@endsection

