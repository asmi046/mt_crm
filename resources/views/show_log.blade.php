@extends('layouts.all')

@php
    $title = "Лог системы";
    $description = "Лог системы";
@endphp

@section('title', $title)
@section('description', $description)

@section('main')

<section class="cabinet_section">
    <x-sidebar.sidebar></x-sidebar.sidebar>

    <div class="main">
        <div class="page_container ">
            <div class="box">
                <h1>Лог системы</h1>
                <p>Действия пользователей</p>
            </div>

            <div class="box pt_10">
                <form class="filter_form" action="{{ route('show_log') }}">
                    <div class="wrapper c_2">

                        <div class="field">
                            <label class="label">Событие</label>
                            <div class="control">
                                <select name="event" id="f_places_count">
                                    <option value="%" @selected(("%" == request('event')) || (empty(request('event'))) ) disabled>Все события</option>
                                    @foreach ($filter_settings['event'] as $key => $item)
                                        <option value="{{ $key }}" @selected($key === request('event'))>{{ $key }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="field">
                            <label class="label">Пользователь</label>
                            <div class="control">
                                <select name="user" id="f_places_count">
                                    <option value="%" @selected(("%" == request('user')) || (empty(request('user'))) ) disabled>Все пользователи</option>

                                    @foreach ($filter_settings['user'] as $key => $item)
                                        <option @selected($key == request('user')) value="{{$key}}" >{{ $item }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="button">Найти</button>
                    <x-a-icon href="{{ route('show_log') }}" icon="fa-solid fa-ban pl_10">Сбросить</x-a-icon>
                </form>
            </div>

            <div class="box pt_10">
                <div class="table_wrapper">
                    <table>
                        <thead>
                            <tr>
                                <th>Время</th>
                                <th>Событие</th>
                                <th>Пользователь</th>
                                <th>Упроавление</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($log as $item)
                                <tr>
                                    <td>{{date("d.m.Y H:i", strtotime($item->created_at))}}</td>
                                    <td>{{ $item->event }}</td>
                                    <td>{{ $item->user->name }} ({{ $item->user->agency }})</td>
                                    <td>
                                        <x-a-icon href="{{ route('show_log_detale', $item->id) }}" icon="fa-solid fa-pen-to-square">Детали</x-a-icon>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <x-pagination :tovars="$log"></x-pagination>
            </div>

        </div>
    </div>
</section>



@endsection

