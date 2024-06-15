@extends('layouts.all')

@php
    $title = ($reis)?"Список на рейс № ". $reis->id:"Нет обратного рейса";
    $description = "Список на рейс";
@endphp

@section('title', $title)
@section('description', $description)

@section('main')

<section class="cabinet_section">
    <x-sidebar.sidebar></x-sidebar.sidebar>

    <div class="main">
        <div class="page_container ">
            <div class="box">
                <h1>{{ $title }}</h1>
                @if ($reis)
                    <x-reis.page-reis-info :reis="$reis"></x-reis.page-reis-info>
                @endif
            </div>

            <div class="box pt_10">
                @if ($reis)
                    <table>
                        <thead>
                            <tr>
                                <th>Ф.И.О</th>
                                <th>Телефон</th>
                                <th>Документ</th>
                                <th>Забронировал</th>
                                <th>Пункт прибытия</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($reserves_places as $item)
                                <tr>
                                    <td>{{ $item->f }} {{ $item->i }} {{ $item->o }}</td>
                                    <td>{{ $item->phone }}</td>
                                    <td>{{ $item->doc_type }} {{ $item->doc_n }}</td>
                                    <td>{{ ($item->order->user->role === 'agency')?"Агент":"Мир туризма" }}</td>
                                    <td>{{ $item->order->punkt }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>
</section>



@endsection

