@extends('layouts.all')

@php
    $title = "Регистрация - Система бронировани Мир Туризма";
    $description = "Регистрация - Система бронировани проезда Мир Туризма";
@endphp

@section('title', $title)
@section('description', $description)

@section('main')
    <main-form></main-form>

    <section class="section">
        <div class="container is-fullhd">

            <form action="{{ route('register_do') }}" method="post" class="box start-form">
                @csrf

                <header>
                    <x-logo-elements></x-logo-elements>
                </header>
                    <h3>Регистрация в системе</h3>

                    @if (Session::has('user_registred'))
                        <p class="success">{{ session('user_registred') }}</p>

                        <footer>
                            <a class="button" href="{{route('login')}}">Войти в систему</a>
                        </footer>
                    @else
                        <div class="field">
                            <label class="label">Имя<span class="required">*</span></label>
                            <div class="control">
                                <input name="name" class="input" type="text">
                            </div>

                            @error('name')
                                <p class="error">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="field">
                            <label class="label">Агентство<span class="required">*</span></label>
                            <div class="control">
                                <input name="agency" class="input" type="text">
                            </div>

                            @error('agency')
                                <p class="error">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="field">
                            <label class="label">Телефон<span class="required">*</span></label>
                            <div class="control">
                                <input name="phone" class="input" type="tel">
                            </div>

                            @error('phone')
                                <p class="error">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="field">
                            <label class="label">E-mail<span class="required">*</span></label>
                            <div class="control">
                                <input name="email" class="input" type="email">
                            </div>

                            @error('email')
                                <p class="error">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="field">
                            <label class="label">Введите пароль</label>
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
                            <button type="submit" class="button ">Регистрация</button>
                            <a class="button" href="{{route('login')}}">Войти в систему</a>
                        </footer>
                    @endif
            </form>
        </div>
    </section>
@endsection

