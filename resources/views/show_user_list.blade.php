@extends('layouts.all')

@php
    $title = "Пользователи системы";
    $description = "Пользователи системы";
@endphp

@section('title', $title)
@section('description', $description)

@section('main')

<section class="cabinet_section">
    <x-sidebar.sidebar></x-sidebar.sidebar>

    <div class="main">
        <div class="page_container ">
            <div class="box">
                <h1>Пользователи системы</h1>
                <p>Список пользователей</p>
            </div>

            <div class="box pt_10">
                <form class="filter_form" action="{{ route('user_list') }}">
                    <div class="field">
                        <label class="label">Писк пользователя</label>
                        <div class="control">
                            <input type="text" name="search" placeholder="Поиск по имени, названию агентства, телефону" value="{{request('search')}}">
                        </div>
                    </div>

                    <button type="submit" class="button">Найти</button>
                    <x-a-icon href="{{ route('user_list') }}" icon="fa-solid fa-ban pl_10">Сбросить</x-a-icon>
                </form>
            </div>

            <div class="box pt_10">
                <table>
                    <thead>
                        <tr>
                            <th>Имя</th>
                            <th>Агентство</th>
                            <th>Телефон</th>
                            <th>e-mail</th>
                            <th>Статус</th>
                            <th>Упроавление</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $item)
                            <tr>
                                <td>{{ $item->name }} </td>
                                <td>{{ $item->agency }} </td>
                                <td>{{ $item->phone }} </td>
                                <td>{{ $item->email }} </td>
                                @if ($item->email_verified_at)
                                    <td><span style="color:green">Активен</span></td>
                                @else
                                    <td><span style="color:red">Заблокирован</span></td>
                                @endif

                                <td>
                                    @if ($item->email_verified_at)
                                        <x-a-icon href="{{ route('user_deactivate', $item->id) }}" icon="fa-solid fa-pen-to-square">Заблокировать</x-a-icon>
                                    @else
                                        <x-a-icon href="{{ route('user_activate', $item->id) }}" icon="fa-solid fa-pen-to-square">Активировать</x-a-icon>
                                    @endif

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <x-pagination :tovars="$users"></x-pagination>
            </div>

        </div>
    </div>
</section>



@endsection

