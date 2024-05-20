<div class="direct">
    <div class="direct_line_wrapper">
        <div class="line"></div>

        <div @class(['punkt'])>
            <div class="circle"></div>
            <div class="text">Курск</div>
        </div>


        @foreach ($puncts as $item)

            @php
                $itt = ($item->name === "Ялта")?"Крым":$item->name;
            @endphp

            <a href="{{route('proezd-bron', ['direction' => $direction, 'punct' => $item->name])}}" @class(['punkt', 'active' => (($item->name === $selected) && ($selecteddirection == $direction) )])>
                <div class="circle"></div>
                <div class="text">{{ $itt }}</div>
            </a>
        @endforeach
    </div>



</div>
