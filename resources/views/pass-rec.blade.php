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

            <form action="{{route('pass_rec_do')}}" method="post" class="box start-form">
                @csrf

                <header>
                    <x-logo-elements></x-logo-elements>
                </header>
                @if (Session::has('status'))
                    <p class="success">Ссылка на восстановление пароля отправлен на электронную почту аккаунта</p>

                    <footer>
                        <a class="button" href="{{route('login')}}">Войти в систему</a>
                    </footer>
                @else
                    <h3>Восстановить пароль</h4>
                    <div class="field">
                        <label class="label">E-mail</label>
                        <div class="control">
                            <input name="email" class="input" type="email" placeholder="e.g. alex@example.com">
                        </div>

                        @error('email')
                            <p class="error">{{$message}}</p>
                        @enderror
                    </div>

                    <footer>
                        <button type="submit" class="button ">Восстановить</button>
                        <a class="button" href="{{route('login')}}">Войти в систему</a>
                    </footer>
                @endif
            </form>
        </div>
    </section>
@endsection

