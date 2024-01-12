<nav>
    <x-sb-nav-btn :active="(Route::currentRouteName() === 'dash-board')?true:''" href="#" icon="fa-solid fa-house">Главная</x-sb-nav-btn>
    <x-sb-nav-btn :active="(Route::currentRouteName() === 'proezd-board')?true:''" href="#" icon="fa-solid fa-bus">Проезд (+ отель)</x-sb-nav-btn>
    <x-sb-nav-btn :active="(Route::currentRouteName() === 'hotel-board')?true:''" href="#" icon="fa-solid fa-square-h">Бронирование отеля</x-sb-nav-btn>
    <x-sb-nav-btn :active="(Route::currentRouteName() === 'user-board')?true:''" href="#" icon="fa-solid fa-list">Мои брони</x-sb-nav-btn>
</nav>
