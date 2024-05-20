@extends('layouts.all')

@php
    $title = "Система бронирования";
    $description = "Система бронирования";
@endphp

@section('title', $title)
@section('description', $description)

@section('main')

<section class="cabinet_section">
    <x-sidebar.sidebar></x-sidebar.sidebar>

    <div class="main">
        <div class="page_container ">
            <div class="box">
                <h1>Статистика по системе бронирования</h1>
                <p>Основные показатели по бронированию проезда на море</p>
            </div>
            <br>
            <div class="box">
                <h2>Общие информация по рейсам:</h2>
                <div class="informers informers_i3">

                    <div class="informer ">
                        <p class="carecter">{{ $place_count }}</p>
                        <p class="info">Забронированно мест на всех рейсах</p>
                    </div>

                    <div class="informer ">
                        <p class="carecter">{{ $reis_count }}</p>
                        <p class="info">рейсов суммарно по всем направлениям</p>
                    </div>

                    <div class="informer ">
                        <p class="carecter">{{ $actual_reis_count }}</p>
                        <p class="info">рейсов актуально к бронированию на данный момен</p>
                    </div>

                </div>
            </div>
            <br>

            @can('see_stat_finance')
                <div class="box">
                    <h2>Финансы:</h2>
                    <p>по данным введенным в систему</p>
                    <br>
                    <div class="informers informers_i2">

                        <div class="informer ">
                            <p class="carecter sm_size">{{ number_format($many['total_sum'], 2, ',', ' ') }} ₽</p>
                            <p class="info">Cумма проданных туров</p>
                        </div>

                        <div class="informer ">
                            <p class="carecter sm_size">{{ number_format($many['avanc_sum'], 2, ',', ' ') }} ₽</p>
                            <p class="info">Внесенная предоплата</p>
                        </div>

                    </div>
                </div>
                <br>
            @endcan

            <div class="box">
                <h2>Загрузка по рейсам:</h2>
                <div class="table_wrapper">
                    <table>
                        <thead>
                            <tr>
                                <th>Направление</th>
                                <th>Даты выезда</th>
                                <th>Продано мест</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($zagruzka as $key => $item)
                                @php
                                    $index = 0;
                                @endphp
                                @foreach ($item as $skey => $sitem )
                                    <tr>
                                        @if ($index == 0)
                                            <td rowspan="{{ count($item) }}">{{ $key }}</td>
                                        @endif

                                        <td>{{ $skey }}</td>
                                        <td>{{ $sitem }}</td>
                                    </tr>
                                    @php
                                        $index++;
                                    @endphp
                                @endforeach

                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</section>



@endsection

