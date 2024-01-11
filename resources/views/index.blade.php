@extends('layouts.all')

@php
    $title = "Cтудия Эпицентр ZVUK.FM | Изготовление радиорекламы | озвучка рекламы| дикторские голоса | аудиореклама | радиореклама";
    $description = "Изготовление радиорекламы, озвучка рекламы. Производство радиороликов,  Дикторские голоса, озвучка текста. Дикторская начитка.";
@endphp

@section('title', $title)
@section('description', $description)

@section('main')
    <main-form></main-form>

    <section class="section">
        <div class="container is-fullhd">

            <form class="box start-form">
                <header>
                    <x-logo-elements></x-logo-elements>
                </header>

                <div class="field">
                  <label class="label">E-mail</label>
                  <div class="control">
                    <input class="input" type="email" placeholder="e.g. alex@example.com">
                  </div>
                </div>

                <div class="field">
                  <label class="label">Пароль</label>
                  <div class="control">
                    <input class="input" type="password" placeholder="********">
                  </div>
                </div>

                <footer>
                    <a class="button ">Войти</a>
                    <a class="button" href="#">Забыл пароль?</a>
                </footer>

            </form>
        </div>
    </section>
@endsection

