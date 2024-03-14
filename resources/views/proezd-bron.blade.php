@extends('layouts.all')

@php
    $title = "Бронирование проезда";
    $description = "Бронирование проезда";
@endphp

@section('title', $title)
@section('description', $description)

@section('main')

<section class="cabinet_section">
    <x-sidebar.sidebar></x-sidebar.sidebar>

    <div class="main">
        <div class="page_container ">
            <div class="box">
                <h1>Бронирование презда</h1>
                <p>Бронирование презда на черноморском побереже</p>
            </div>

            <div class="box pt_10">
                <div class="directs">
                    @foreach ($direction as $item)
                        <x-direction :selecteddirection="$sel_d" :selected="$sel_p" :direction="$item->id" :puncts="$item->puncts"></x-direction>
                    @endforeach

                    <div class="direct">
                        <a class="button" href="{{route('proezd-bron')}}">Показать все</a>
                    </div>
                </div>
            </div>

            <div class="box pt_10">
                <h2>Актуальные рейсы</h2>
                @if (!$reises)
                    <p>К сожалению актуальные рейсы не найдены</p>
                @else
                    <div class="table_wrapper">
                        <table>
                            <thead>
                                <tr>
                                    <th>Рейс</th>
                                    <th>Направление</th>
                                    <th>Выезд из Курска</th>
                                    <th>Возвращение в Курск</th>
                                    <th>Действие</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($reises as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ !empty($sel_p)?"Курск - ".$sel_p:$item->direction->start_punkt." - ".$item->direction->end_punkt }}</td>
                                        <td>{{ date("d.m.Y", strtotime($item->start_to_date)) }}</td>
                                        <td>{{ date("d.m.Y", strtotime($item->prib_out_date)) }}</td>
                                        <td>
                                            <x-a-icon href="{{ route('select-places', ['reis' => $item->id, 'punkt' => $sel_p], ) }}" icon="fa-solid fa-ticket">Купить билет</x-a-icon>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>

                @endif
            </div>
        </div>
    </div>
</section>



@endsection

