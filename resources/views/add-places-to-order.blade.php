@extends('layouts.all')

@php
    $title = "Добавление места к заказу";
    $description = "Добавление места к заказу";
@endphp

@section('title', $title)
@section('description', $description)

@section('main')

<section class="cabinet_section">
    <x-sidebar.sidebar></x-sidebar.sidebar>

    <div class="main">
        <div class="page_container ">
            <div class="box">
                <h1>Добавление места к брони №{{$order->id}}</h1>
                <x-reis.page-reis-info :reis="$reis" :punkt="$punkt"></x-reis.page-reis-info>
                <br>
                <br>
                <x-a-icon href="{{route('order-edit', $order->id)}}" icon="fa-solid fa-arrow-rotate-left">Вернуться к редактированию брони №{{$order->id}}</x-a-icon>
            </div>

            <div class="box pt_10">
                <buss-schemm
                    :schema="{{ json_encode($schema); }}"
                    reis="{{ $reis->id }}"
                    punkt="{{ $punkt }}"
                    user="{{ auth()->user()->role }}"
                    action="add"
                    :order="{{ $order->id }}"
                    :reservedt="{{ json_encode($reserved_t); }}"
                    :reservedo="{{ json_encode($reserved_o); }}"
                    ></buss-schemm>
            </div>

        </div>
    </div>
</section>



@endsection

