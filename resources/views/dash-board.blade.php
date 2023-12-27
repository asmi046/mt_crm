@extends('layouts.all')

@php
    $title = "Система бронирования";
    $description = "Система бронирования";
@endphp

@section('title', $title)
@section('description', $description)

@section('main')
<nav class="navbar" role="navigation" aria-label="main navigation">
    <div class="navbar-brand">
      <a class="navbar-item has-text-primary logo_ndp" href="https://bulma.io">
        <span class="icon mr-2"><i class="fas fa-solid fa-earth-americas"></i></span> Мир Туризма

      </a>

      <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
        <span aria-hidden="true"></span>
        <span aria-hidden="true"></span>
        <span aria-hidden="true"></span>
      </a>
    </div>

    <div id="navbarBasicExample" class="navbar-menu">
      <div class="navbar-start">
        <div class="navbar-item has-dropdown is-hoverable">
            <a class="navbar-link">
              Бронирование
            </a>

            <div class="navbar-dropdown">
              <a class="navbar-item">
                Бронирование проезда
              </a>
              <a class="navbar-item">
                Бронирование отеля
              </a>
              <hr class="navbar-divider">
              <a class="navbar-item">
                Мои брони
              </a>
            </div>
        </div>

        <div class="navbar-item has-dropdown is-hoverable">
            <a class="navbar-link">
              Администрирование
            </a>

            <div class="navbar-dropdown">
              <a class="navbar-item">
                Панель администратора сервиса
              </a>
              <a class="navbar-item">
                Лог изменений
              </a>
              <a class="navbar-item">
                Агентства
              </a>
              <hr class="navbar-divider">
              <a class="navbar-item">
                Заполняемость
              </a>
            </div>
        </div>


        {{-- <a class="navbar-item">
          Home
        </a> --}}

      </div>

      <div class="navbar-end">
        <div class="navbar-item">
          <div class="buttons">
            <a class="button is-primary">
              <strong>Мои данные</strong>
            </a>
            <a class="button is-light">
              Выход
            </a>
          </div>
        </div>
      </div>
    </div>
  </nav>

<section class="section">
    <div class="container is-fullhd">
        <h1 class="is-size-4 is-size-2-tablet is-size-2-desktop  has-text-weight-bold">Добро пожаловать в систему бронирования</h1>
        <p class="my-3">В данной системе Вы можете произвести бронирование проезда а так же бронирования отелей</p>
    </div>
</section>


@endsection

