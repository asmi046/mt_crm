<form method="POST" action="{{ route('place_edit', $item->id) }}">
    <div class="wrapper c_2 mb_20">
        <div class="coll">
            <x-a-icon href="#" icon="fa-solid fa-copy">Копировать</x-a-icon>
        </div>

        <div class="coll">
            <x-a-icon href="#" icon="fa-solid fa-paste">Вставить</x-a-icon>
        </div>
    </div>
    @csrf
    <input type="hidden" name="order_id" value="{{ $item->order_id }}">

    <div class="field">
        <label class="label">Фамилия</label>
        <div class="control">
            <input name="f" class="input" type="text" value="{{ $item->f }}" placeholder="">
        </div>

        @error('f')
            <p class="error">{{$message}}</p>
        @enderror
    </div>

    <div class="field">
        <label class="label">Имя</label>
        <div class="control">
            <input name="i" class="input" type="text" value="{{ $item->i }}" placeholder="">
        </div>

        @error('i')
            <p class="error">{{$message}}</p>
        @enderror
    </div>

    <div class="field">
        <label class="label">Отчество</label>
        <div class="control">
            <input name="o" class="input" type="text" value="{{ $item->o }}" placeholder="">
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
            <input name="doc_n" class="input" type="text" value="{{ $item->doc_n }}" placeholder="">
        </div>

        @error('doc_n')
            <p class="error">{{$message}}</p>
        @enderror
    </div>

    <div class="field">
        <label class="label">Дата рождения</label>
        <div class="control">
            <input name="dr" class="input" type="date" value="{{ $item->dr }}" placeholder="">
        </div>

        @error('dr')
            <p class="error">{{$message}}</p>
        @enderror
    </div>

    <div class="field">
        <label class="label">Телефон</label>
        <div class="control">
            <input name="phone" class="input" type="tel" value="{{ $item->phone }}" placeholder="">
        </div>

        @error('phone')
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

    <button type="submit" class="button">Сохранит</button>
</form>
