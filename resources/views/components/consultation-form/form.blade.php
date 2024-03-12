<section class="help_form_section">
    <div class="container">
        <h2>Помощь специалиста</h2>
        <form method="POST" action="{{ route('send_consultation') }}" class="box"  action="">
            @csrf
            <div class="field">
                <label class="label">Имя<span class="required">*</span></label>
                <div class="control">
                    <input name="name" class="input" type="text" placeholder="">
                </div>

                @error('name')
                    <p class="error">{{$message}}</p>
                @enderror
            </div>

            <div class="field">
                <label class="label">Телефон<span class="required">*</span></label>
                <div class="control">
                    <input name="phone" class="input" type="tel" placeholder="">
                </div>

                @error('phone')
                    <p class="error">{{$message}}</p>
                @enderror
            </div>

            <div class="field">
                <label class="label">Сообщение</label>
                <div class="control">
                    <textarea rows="5" name="message" class="input" placeholder="Обязательно укажити, марку и модель авто и VIN"></textarea>
                </div>

                @error('name')
                    <p class="error">{{$message}}</p>
                @enderror
            </div>

            <button type="submit" class="button">Отправить</button>
        </form>
    </div>
</section>
