@extends('layouts.all')

@php
    $title = "Формирование выгрузки";
    $description = "Формирование выгрузки";
@endphp

@section('title', $title)
@section('description', $description)

@section('main')

<section class="cabinet_section">
    <x-sidebar.sidebar></x-sidebar.sidebar>

    <div class="main">
        <div class="page_container ">
            <div class="box">
                <h1>Выгрузки</h1>
                <p>Отчеты и выгрузки по рейсам</p>
            </div>

            <div class="box pt_10">
                <div class="table_wrapper">
                    <table>
                        <thead>
                            <tr>
                                <th>Рейс</th>
                                <th>Направление</th>
                                <th>Выезд из Курска</th>
                                <th>Возвращение в Курск</th>
                                <th>Выгрузки</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($reises as $item)

                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ !empty($itts)?"Курск - ".$itts:$item->direction->start_punkt." - ".$item->direction->end_punkt }}</td>
                                    <td>{{ date("d.m.Y", strtotime($item->start_to_date)) }}</td>
                                    <td>{{ date("d.m.Y", strtotime($item->prib_out_date)) }}</td>
                                    <td>
                                        <x-a-icon href="{{route('rassadca', ['reis_id'=>$item->id, 'direction'=>'t'])}}" icon="fa-solid fa-arrow-right">Отвозим (Рассадка)</x-a-icon>
                                        <br>
                                        <x-a-icon href="{{route('rassadca', ['reis_id'=>$item->id, 'direction'=>'o'])}}" icon="fa-solid fa-arrow-left">Забираем (Рассадка)</x-a-icon>
                                        <br>
                                        <br>
                                        <x-a-icon href="{{route('list', ['reis_id'=>$item->id, 'direction'=>'t'])}}" icon="fa-solid fa-list">Отвозим (Список)</x-a-icon>
                                        <br>
                                        <x-a-icon href="{{route('list', ['reis_id'=>$item->id, 'direction'=>'o'])}}" icon="fa-solid fa-list">Забираем (Список)</x-a-icon>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>



@endsection

