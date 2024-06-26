<form method="POST" action="{{route("save_order", $item->id)}}">
@csrf
<input type="hidden" name="reis_id" value="{{ $item->reis_id }}">
<input type="hidden" name="punkt" value="{{ $item->punkt }}">
<div class="wrapper c_2">
    <div class="field">
        <label class="label">Цена</label>
        <div class="control">
            <input name="price" class="input" type="text" value="{{ $item->price }}" placeholder="">
        </div>

        @error('price')
            <p class="error">{{$message}}</p>
        @enderror
    </div>

    <div class="field">
        <label class="label">Аванс</label>
        <div class="control">
            <input name="avanc" class="input" type="text" value="{{ $item->avanc }}" placeholder="">
        </div>

        @error('avanc')
            <p class="error">{{$message}}</p>
        @enderror
    </div>

</div>

<input name="state" type="hidden" value="Подтвержден">

<div class="field">
    <label class="label">Проживание в отеле</label>
    <div class="control">
        <select name="hotel_id" id="hotel_select_ch">
            <option value="" @selected($item->hotel_id == null)>Без проживания</option>

            @foreach ($hotels as $hotel)
                <option @selected($item->hotel_id === $hotel->id) value="{{ $hotel->id }}">{{ $hotel->name }}</option>
            @endforeach

        </select>
    </div>

    @error('state')
        <p class="error">{{$message}}</p>
    @enderror
</div>

<div class="field">
    <label class="label">Пункт следования</label>
    <div class="control">
        <select onchange="hotel_select_ch.value=''" name="punkt" id="">

            <option disabled value="" @selected($item->punkt == null)>Выберите пункт следования</option>

            @foreach ($puncts as $punct)
                <option @selected($item->punkt === $punct->name) value="{{ $punct->name }}">{{ $punct->name }}</option>
            @endforeach

        </select>
    </div>

    @error('state')
        <p class="error">{{$message}}</p>
    @enderror
</div>

<div class="field">
    <label class="label">Комментарий</label>
    <div class="control">
        <textarea name="comment" value="{{ $item->comment }}" rows="5"></textarea>
    </div>

    @error('comment')
        <p class="error">{{$message}}</p>
    @enderror
</div>
@if (session('success_order'))
    <p class="success">{{ session('success_order') }}</p>
@endif
<div class="wrapper c3">
    <div class="coll">
        <button type="submit" class="button">Сохранить</button>
    </div>

    <div class="coll">
        <a class="button b_green" href="{{ route('add-places', ['reis' => $item->reis_id, 'order' => $item->id]) }}">Добавить место</a>

    </div>

    <div class="coll">
        <a href="{{ route('delete_order', $item->id) }}" onclick="if (!confirm('Бронь будет удалена! Вы уверенны?')) return false;" class="button b_red">Удалить бронь</a>
    </div>
</div>

</form>
