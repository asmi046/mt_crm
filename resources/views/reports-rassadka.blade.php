@extends('layouts.all')

@php
    $title = ($reis)?"Рассадка на рейс № ". $reis->id:"Нет обратного рейса";
    $description = "Рассадка на рейс";
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
                    <x-reis.report-buss-table :schema="$schema" :reservesplaces="$reserves_places" ></x-reis.report-buss-table>
                @endif
            </div>
        </div>
    </div>
</section>



@endsection

