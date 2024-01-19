<div class="hotel_card">
    <div class="img_wrapper">
        @if (!empty($item->img))
            <img src="{{$item->img}}" alt="{{$item->name}}">
        @else
            <img src="{{asset('img/no_photo.webp')}}" alt="{{$item->name}}">
        @endif

    </div>
    <div class="hotel_info">
        <h2>{{$item->name}}</h2>
        <p>{{$item->short_description}}</p>
        <x-a-icon href="#" icon="fa-solid fa-square-h">Подробнее об отеле</x-a-icon>
    </div>
</div>
