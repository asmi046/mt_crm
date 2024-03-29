@extends('layouts.all')

@php
    $title = "Данные пользователя";
    $description = "Изменить данные пользователя";
@endphp

@section('title', $title)
@section('description', $description)

@section('main')

<section class="cabinet_section">
    <x-sidebar.sidebar></x-sidebar.sidebar>

    <div class="main">
        <div class="page_container ">
            <div class="box">
                <h1>Мои данные</h1>
                <p>Изменить мои учетные данные</p>
            </div>

            <div class="box pt_10">
                <h3>Данные пользователя</h3>
                <form action="{{ route('save_user_data') }}" method="post">
                    @csrf
                    @if (session('success_user_data'))
                        <p class="success">{{ session('success_user_data') }}</p>
                    @endif
                    <div class="field">
                        <label class="label">Ф.И.О<span class="require">*</span></label>
                        <div class="control">
                          <input name="name" class="input" type="text" value="{{ $user->name }}" placeholder="Введите имя">
                        </div>

                        @error('name')
                          <p class="error">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="field">
                        <label class="label">E-mail</label>
                        <div class="control">
                          <input name="email" class="input" type="email" value="{{ $user->email }}" readonly placeholder="e.g. alex@example.com">
                        </div>

                        @error('email')
                            <p class="error">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="field">
                        <label class="label">Телефон<span class="require">*</span></label>
                        <div class="control">
                          <input name="phone" class="input" type="tel" value="{{ $user->phone }}" placeholder="Введите телефон">
                        </div>

                        @error('phone')
                          <p class="error">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="field">
                        <label class="label">Агентство<span class="require">*</span></label>
                        <div class="control">
                            <input name="agency" class="input" type="text" value="{{ $user->agency }}" placeholder="Введите название агентства">
                        </div>

                        @error('agency')
                          <p class="error">{{$message}}</p>
                        @enderror
                    </div>

                    <footer>
                        <button type="submit" class="button ">Сохранить</button>
                    </footer>

                </form>
                <br>
                <hr>
                <br>
                <h3>Смена пароля</h3>
                <form action="{{ route('chenge_user_password') }}" method="post">
                    @csrf

                    @if (session('success_user_pass'))
                        <p class="success">{{ session('success_user_pass') }}</p>
                    @endif

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
                        <button type="submit" class="button ">Сменить пароль</button>
                    </footer>

                </form>
            </div>

        </div>
    </div>
</section>



@endsection

