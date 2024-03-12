<h1>Оформлена бронь</h1>
<p><strong>Оформил:</strong> {{ $formData['user']['name']}} ({{ $formData['user']['agency']}})</P>
<p><strong>Рейс:</strong> № {{ $formData['reis']['id']}} {{date("d.m.Y", strtotime($formData['reis']['start_to_date']))." ".date("d.m.Y", strtotime($formData['reis']['start_to_date']))}}
 {{ $formData['reis']['direction']['start_punkt'] }} {{ $formData['reis']['direction']['end_punkt'] }}
</p>
<p> <strong>Пункт прибывания</strong> {{  $formData['punkt'] }}</p>
<P><strong>Коментарий:</strong> {{ $formData['comment']}}</P>
<p><strong>Места:</strong></p>
@foreach ($formData['mesta'] as $item)
    @php
        $direction = ($item->direction === "t")?"Туда":"Обратно";
    @endphp
    <p>№ {{ $item->number }} {{ $direction }}</p>
@endforeach
