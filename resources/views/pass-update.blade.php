@extends('layouts.all')

@php
    $title = "Смена пароля - Система бронировани Мир Туризма";
    $description = "Смена пароля - Система бронировани проезда Мир Туризма";
@endphp

@section('title', $title)
@section('description', $description)

@section('main')
    <main-form></main-form>

    <section class="section">
        <div class="container is-fullhd">

            <form action="{{route('password.update')}}" method="post" class="box start-form">
                @csrf

                <input type="hidden" name="token" value="{{ $token }}">
                <input type="hidden" name="email" value="{{ $email }}">

                <header>
                    <x-logo-elements></x-logo-elements>
                </header>
                <h3>Введите новый пароль</h4>
                <div class="field">
                    <label class="label">Введите новый пароль</label>
                    <div class="control">
                      <input name="password" class="input" type="password" placeholder="********">
                    </div>

                    @error('password')
                        <p class="error">{{$message}}</p>
                    @enderror
                </div>

                <div class="field">
                    <label class="label">Подтвердите пароль</label>
                    <div class="control">
                      <input name="password_confirmation" class="input" type="password" placeholder="********">
                    </div>

                    @error('password_confirmation')
                        <p class="error">{{$message}}</p>
                    @enderror
                </div>

                <footer>
                    <button type="submit" class="button ">Сохранить</button>
                </footer>

            </form>
        </div>
    </section>
@endsection

