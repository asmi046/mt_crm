<form method="POST" action="{{ route('place_edit', $item->id) }}">
    <div class="wrapper c_3 mb_20">
        <div class="coll">
            <x-a-icon href="#" dataname="placeid" datavalue="{{ $item->id }}" wrapclass="place_copy" icon="fa-solid fa-copy">Копировать</x-a-icon>
        </div>

        <div class="coll">
            <x-a-icon href="#" dataname="placeid" datavalue="{{ $item->id }}" wrapclass="place_paste" icon="fa-solid fa-paste ">Вставить</x-a-icon>
        </div>

        <div class="coll">
            <plice-replace
                title="Пересадка"
                :item="{{ json_encode($item) }}"
                :reis="{{ $item->reis->id }}"
                punkt="{{ $item->order->punkt }}"
                :schema="{{ json_encode(buss_schemm($item->reis->reis_bus->schema)) }}"
            ></plice-replace>
        </div>

    </div>
    @csrf
    <input type="hidden" name="order_id" value="{{ $item->order_id }}">
    <input type="hidden" name="pid" value="{{ $item->id }}">

    <div class="field">
        <label class="label">Фамилия</label>
        <div class="control">
            <input name="f" class="input" type="text" value="{{ $item->f }}" id="place_f_{{$item->id}}" placeholder="">
        </div>

        @error('f')
            <p class="error">{{$message}}</p>
        @enderror
    </div>

    <div class="field">
        <label class="label">Имя</label>
        <div class="control">
            <input name="i" class="input" type="text" value="{{ $item->i }}" id="place_i_{{$item->id}}" placeholder="">
        </div>

        @error('i')
            <p class="error">{{$message}}</p>
        @enderror
    </div>

    <div class="field">
        <label class="label">Отчество</label>
        <div class="control">
            <input name="o" class="input" type="text" value="{{ $item->o }}" id="place_o_{{$item->id}}" placeholder="">
        </div>

        @error('o')
            <p class="error">{{$message}}</p>
        @enderror
    </div>

    <div class="field">
        <label class="label">Вид документа</label>
        <div class="control">
            <select name="doc_type" id="">
                <option value="" disabled selected>Выберите вид документа</option>
                <option @selected($item->doc_type === "Паспорт") value="Паспорт">Паспорт</option>
                <option @selected($item->doc_type === "Свидетельство о рождении") value="Свидетельство о рождении">Свидетельство о рождении</option>
            </select>
        </div>

        @error('doc_type')
            <p class="error">{{$message}}</p>
        @enderror
    </div>


    <div class="field">
        <label class="label">№ документа</label>
        <div class="control">
            <input name="doc_n" class="input" type="text" id="place_nd_{{$item->id}}" value="{{ $item->doc_n }}" placeholder="">
        </div>

        @error('doc_n')
            <p class="error">{{$message}}</p>
        @enderror
    </div>

    <div class="field">
        <label class="label">Дата рождения</label>
        <div class="control">
            {{-- <input name="dr" class="input" type="date" id="place_dr_{{$item->id}}" value="{{ $item->dr }}" placeholder=""> --}}
            <input name="dr" class="input input_date" type="text" id="place_dr_{{$item->id}}" value="{{ $item->dr }}" placeholder="__.__.____">
        </div>

        @error('dr')
            <p class="error">{{$message}}</p>
        @enderror
    </div>

    <div class="field">
        <label class="label">Телефон</label>
        <div class="control">
            <input name="phone" class="input" type="tel" value="{{ $item->phone }}" id="place_phone_{{$item->id}}" placeholder="">
        </div>

        @error('phone')
            <p class="error">{{$message}}</p>
        @enderror
    </div>

    <div class="field">
        <label class="label">Комментарий</label>
        <div class="control">
            <textarea name="comment" value="{{ $item->comment }}" id="place_comment_{{$item->id}}" rows="5"></textarea>
        </div>

        @error('comment')
            <p class="error">{{$message}}</p>
        @enderror
    </div>

    <div class="wrapper c2">
        <div class="coll">
            <button type="submit" class="button">Сохранить</button>
        </div>

        <div class="coll">
            <a href="{{ route('place_delete', $item->id) }}" onclick="if (!confirm('Место будет удалено из заказа! Вы уверенны?')) return false;" class="button b_red">Удалить место</a>
        </div>
    </div>
</form>
