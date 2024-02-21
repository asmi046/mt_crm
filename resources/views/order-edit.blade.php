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
                <div class="page_reis_info">
                    <p><strong>Состояние: </strong> {{$order->state}}</p>
                    <p><strong>Направление: </strong> {{$order->reis->direction->name}}</p>
                    <p><strong>Пункт следования: </strong> {{$order->punkt}}</p>
                    <p><strong>Рейс: </strong> №{{ $order->reis->id }}
                        {{ date("d.m.Y", strtotime($order->reis->start_to_date))}}
                        {{ $order->reis->direction->start_punkt }} - {{ $order->reis->direction->end_punkt }}</p>
                </div>
                <br>
                <br>
                <x-a-icon href="{{ route('all_orders') }}" icon="fa-solid fa-arrow-rotate-left">К писку броней</x-a-icon>
            </div>

            <div class="box pt_10">
                @foreach ($order->mesta as $item)
                <details>
                    <summary>
                        <span>Место №  {{$item->number}}</span>
                    </summary>
                    <div class="response">
                        <form action="">

                            <button type="submit" class="button">Сохранит</button>
                        </form>
                    </div>
                </details>
                @endforeach
            </div>

        </div>
    </div>
</section>



@endsection

