<nav>
    <x-sb-nav-btn :active="(Route::currentRouteName() === 'proezd-bron' || Route::currentRouteName() === 'select-places')?true:''" :href="route('proezd-bron')" icon="fa-solid fa-bus">Оформить бронь</x-sb-nav-btn>
    {{-- <x-sb-nav-btn :active="(Route::currentRouteName() === 'hotel-bron')?true:''" :href="route('hotel-bron')" icon="fa-solid fa-square-h">Бронирование отеля</x-sb-nav-btn> --}}
    <x-sb-nav-btn :active="(
            Route::currentRouteName() === 'all_orders' ||
            Route::currentRouteName() === 'order-edit' ||
            Route::currentRouteName() === 'add-places'

            )?true:''" :href="route('all_orders')" icon="fa-solid fa-list">Мои брони</x-sb-nav-btn>

    @can('see_stat')
        <x-sb-nav-btn :active="(Route::currentRouteName() === 'dash-board')?true:''" :href="route('dash-board')" icon="fa-solid fa-house">Статистика</x-sb-nav-btn>
    @endcan

    @can('see_stat')
        <x-sb-nav-btn :active="(Route::currentRouteName() === 'show_log')?true:''" :href="route('show_log')" icon="fa-solid fa-microscope">Лог системы</x-sb-nav-btn>
    @endcan

    @can('see_stat')
        <x-sb-nav-btn :active="(Route::currentRouteName() === 'user_list')?true:''" :href="route('user_list')" icon="fa-solid fa-users">Список пользователей</x-sb-nav-btn>
    @endcan

    @can('see_report')
        <x-sb-nav-btn :active="(
        (Route::currentRouteName() === 'reports')||
        (Route::currentRouteName() === 'rassadca')
        )?true:''" :href="route('reports')" icon="fa-solid fa-flag">Выгрузки</x-sb-nav-btn>
    @endcan

</nav>
