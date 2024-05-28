<div class="page_reis_info">
    @if (isset($punkt))
        <p><strong>Пункт следования: </strong> {{$punkt}}</p>
        <br>
    @endif
    <p><strong>Направление: </strong> {{$reis->direction->name}}</p>
    <p><strong>Выезд из Курска: </strong> {{date("d.m.Y", strtotime($reis->start_to_date)) }}</p>
    <p><strong>Прибытие на место: </strong>{{date("d.m.Y", strtotime($reis->prib_to_date)) }}</p>
    <p><strong>Выезд обратно: </strong>{{date("d.m.Y", strtotime($reis->start_out_date)) }}</p>
    <p><strong>Прибытие в Курск: </strong>{{date("d.m.Y", strtotime($reis->prib_out_date)) }}</p>
    <p><strong>Автобус: </strong>{{ $reis->reis_bus->name }}</p>
</div>
