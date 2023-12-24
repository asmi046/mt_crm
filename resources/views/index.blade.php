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

            <form class="column is-half is-offset-one-quarter box">
                <div class="nb_login_form_head block columns">
                    <div class="nb_icon column is-3">
                        <figure class="image is-96x96 mr-5">
                            <img class="is-rounded" src="{{ asset('img/logo.png')}}">
                        </figure>
                    </div>

                    <div class="nb_text column is-9">
                        <h2 class="title is-3">Система <br>бронирования</h2>
                    </div>
                </div>

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

                <div class="boxcolumns is-flex is-justify-content-space-between is-mobile">
                    <button class="button is-primary">Войти</button>
                    <a class="button is-white " href="#">Забыл пароль?</a>
                </div>

            </form>
        </div>
    </section>
@endsection

