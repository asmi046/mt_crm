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

                    <br>
                    <br>
                    <x-a-icon href="{{route('list_csv', ['reis_id' => $reis->id,'direction' => $direction])}}" icon="fa-solid fa-file-csv">Сохранить в CSV</x-a-icon>
                @endif
            </div>

            <div class="box pt_10">
                @if ($reis)
                    <table>
                        <thead>
                            <tr>
                                <th>Бронь №</th>
                                <th>Ф.И.О</th>
                                <th>Дата рождения</th>
                                <th>Телефон</th>
                                <th>Документ</th>
                                <th>Забронировал</th>
                                <th>Проживание</th>
                                <th>Пункт прибытия</th>
                                <th>Комментарий</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($reserves_places as $item)
                                <tr>
                                    <td>{{ $item->order->id }}</td>
                                    <td>{{ $item->f }} {{ $item->i }} {{ $item->o }}</td>
                                    <td>{{ $item->dr }}</td>
                                    <td>{{ $item->phone }}</td>
                                    <td>{{ $item->doc_n }}</td>
                                    <td>{{ ($item->order->user->role === 'agent')?"(Агент) ".$item->order->user->agency:"Мир туризма" }}</td>
                                    <td>{{ ($item->order->hotel)?$item->order->hotel->name:"Проезд" }}</td>
                                    <td>{{ $item->order->punkt }}</td>
                                    <td>{{ $item->comment }}</td>
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

