<nav>
    <x-sb-nav-btn :active="(Route::currentRouteName() === 'proezd-bron' || Route::currentRouteName() === 'select-places')?true:''" :href="route('proezd-bron')" icon="fa-solid fa-bus">Оформить бронь</x-sb-nav-btn>
    <x-sb-nav-btn :active="(Route::currentRouteName() === 'hotel-bron')?true:''" :href="route('hotel-bron')" icon="fa-solid fa-square-h">Бронирование отеля</x-sb-nav-btn>
    <x-sb-nav-btn :active="(Route::currentRouteName() === 'all_orders' || Route::currentRouteName() === 'order-edit')?true:''" :href="route('all_orders')" icon="fa-solid fa-list">Мои брони</x-sb-nav-btn>
    <x-sb-nav-btn :active="(Route::currentRouteName() === 'dash-board')?true:''" :href="route('dash-board')" icon="fa-solid fa-house">Статистика</x-sb-nav-btn>
</nav>
