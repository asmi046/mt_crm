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
                <div class="wrapper c_2">
                    <div class="coll">
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
                    <div class="coll">
                        <x-order.data-form :puncts="$puncts" :hotels="$hotels" :item="$order"></x-order.data-form>
                    </div>
                </div>

            </div>

            <div class="box pt_10">
                <h2>Зерезервированные места</h2>
                @if (session('success_user'))
                    <p class="success">{{ session('success_user') }}</p>
                @endif

                <div class="wrapper c_2 places_list">
                    <div class="coll">
                        <p class="mb_20"><strong>{{ $order->reis->direction->start_punkt }} - {{ $order->punkt }}</strong></p>

                        @foreach ($order->mesta as $item)
                            @if ($item->direction === 't')
                                <details
                                    @if (session('success_user_id') && session('success_user_id') == $item->id )
                                        open
                                    @endisset
                                >
                                    <summary>
                                        <span>
                                            Место №  {{$item->number}}
                                            @isset($item->i)
                                                {{ $item->i}}
                                            @endisset

                                            @isset($item->f)
                                                {{ $item->f}}
                                            @endisset
                                        </span>
                                    </summary>
                                    <div class="response">
                                        <x-places.data-form :item="$item"></x-places.data-form>
                                    </div>
                                </details>
                            @endif
                        @endforeach
                    </div>

                    <div class="coll">
                        <p class="mb_20"><strong>{{ $order->punkt }} - {{ $order->reis->direction->start_punkt }}</strong></p>
                        @foreach ($order->mesta as $item)
                            @if ($item->direction === 'o')
                            <details
                                @if (session('success_user_id') && session('success_user_id') == $item->id )
                                    open
                                @endisset
                            >
                                    <summary>
                                        <span>Место №  {{$item->number}}</span>
                                        @isset($item->i)
                                            {{ $item->i}}
                                        @endisset

                                        @isset($item->f)
                                            {{ $item->f}}
                                        @endisset
                                    </summary>
                                    <div class="response">
                                        <x-places.data-form :item="$item"></x-places.data-form>
                                    </div>
                                </details>
                            @endif
                        @endforeach
                    </div>
                </div>

            </div>

            <div class="box pt_10">
                <h2>Рассадка в автобусе</h2>
                <bron-place-view
                    :reis="{{ $order->reis->id }}"
                    punkt="{{ $order->punkt }}"
                    :mesta="{{ $order->mesta }}"
                    :schema="{{ json_encode(buss_schemm($order->reis->reis_bus->schema)) }}"
                ></bron-place-view>
            </div>

        </div>
    </div>
</section>



@endsection

