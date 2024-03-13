<div class="mobile_menu_btn">
    <i class="fa-solid fa-bars open"></i>
    <i class="fa-solid fa-xmark close"></i>
</div>

<div class="sidebar">
    <header>
        <x-logo-elements></x-logo-elements>
    </header>

    <div class="user_catd">
        <p>Агентство: <strong>{{ auth()->user()->agency }}</strong></p>
        <p>Пользователь: <strong>{{ auth()->user()->name }}</strong></p>
    </div>

    <x-sidebar.navigation></x-sidebar.navigation>

    <footer>
        <x-a-icon href="{{ route('logout') }}" icon="fa-solid fa-door-open">Выйти</x-a-icon>
        <x-a-icon href="{{ route('user-data') }}" icon="fa-regular fa-user">Мои данные</x-a-icon>
    </footer>
</div>
