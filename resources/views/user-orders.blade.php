@extends('layouts.all')

@php
    $title = "Брони пользователя";
    $description = "Брони пользователя";
@endphp

@section('title', $title)
@section('description', $description)

@section('main')

<section class="cabinet_section">
    <x-sidebar.sidebar></x-sidebar.sidebar>

    <div class="main">
        <div class="page_container ">
            <div class="box">
                <h1>Мои брони</h1>
                <p>Полный список моих заказов</p>
            </div>

            <div class="box pt_10">
                <form class="filter_form" action="{{ route('all_orders') }}">
                    <div class="wrapper c_3">

                        <div class="field">
                            <label class="label">Пункт следования</label>
                            <div class="control">
                                <select name="punkt" id="f_places_count">
                                    <option value="%" @selected(("%" == request('punkt')) || (empty(request('punkt'))) ) disabled>Все пункты</option>
                                    @foreach ($filter_settings['punkt'] as $key => $item)
                                        <option value="{{ $key }}" @selected($key === request('punkt'))>{{ $key }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="field">
                            <label class="label">Выберите рейс</label>
                            <div class="control">
                                <select name="reis_id" id="f_places_count">
                                    <option value="%" @selected(("%" == request('reis_id')) || (empty(request('reis_id'))) ) disabled>Все рейсы</option>

                                    @foreach ($filter_settings['reis'] as $key => $item)
                                        <option @selected($key == request('reis_id')) value="{{$key}}" >{{ $item }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="field">
                            <label class="label checkbox_label">
                                <input @checked( (request('only_agency') === "on") ) type="checkbox" name="only_agency" id="">
                                <span>Показать агентские брони</span>
                            </label>
                        </div>
                    </div>

                    <div class="wrapper c_1">
                        <div class="field">
                            <label class="label">Свободный поиск</label>
                            <div class="control">
                                <input name="serch" class="input" type="text" placeholder="Введите часть комментария, или часть имени клиента">
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="button">Найти</button>
                    <x-a-icon href="{{ route('all_orders') }}" icon="fa-solid fa-ban pl_10">Сбросить</x-a-icon>
                </form>
            </div>

            <div class="box pt_10">
                @if ($all_order->count() > 0 )
                <div class="table_wrapper">
                    <table>
                        <thead>
                            <tr>
                                <th>№ брони</th>
                                <th>Забронировал</th>
                                <th>Дата брони</th>
                                <th>Рейс</th>
                                <th>Пункт следования</th>
                                <th>Мест</th>
                                <th>Управление</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($all_order as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>
                                        {{ $item->user->name }} <br>({{ $item->user->agency }})
                                        @if ($item->user->role === "agent")
                                            <span class="agent_label">Агент</span>
                                        @endif
                                    </td>
                                    <td>{{ date("d.m.Y H:i", strtotime($item->created_at)) }}</td>
                                    <td>№{{ $item->reis->id }}
                                        <strong>{{ date("d.m.Y", strtotime($item->reis->start_to_date))}}</strong>
                                        {{ $item->reis->direction->start_punkt }} - {{ $item->reis->direction->end_punkt }}</td>
                                    <td>{{ $item->punkt }}</td>
                                    <td>{{ count($item->mesta)}}</td>
                                    <td>

                                        <x-a-icon href="{{ route('order-edit', $item->id) }}" icon="fa-solid fa-pen-to-square">Редактировать</x-a-icon>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @else
                    <p>Нет ни одной брони. <br><br><a class="button" href="{{ route('proezd-bron') }}">Оформить бронь</a></p>
                @endif

            </div>

        </div>
    </div>
</section>



@endsection

