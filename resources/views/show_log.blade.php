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
                <table>
                    <thead>
                        <tr>
                            <th>Время</th>
                            <th>Событие</th>
                            <th>Пользователь</th>
                            <th>Уроавление</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($log as $item)
                            <tr>
                                <td>{{date("d.m.Y H:i", strtotime($item->created_at))}}</td>
                                <td>{{ $item->event }}</td>
                                <td>{{ $item->user->name }} ({{ $item->user->agency }})</td>
                                <td></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</section>



@endsection

