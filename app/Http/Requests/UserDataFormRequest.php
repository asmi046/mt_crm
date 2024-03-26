<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserDataFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

        /**
     * Получить сообщения об ошибках для определенных правил валидации.
     *
     * @return array
     */

     public function messages()
     {
         return [
             'name.required' => 'Поле "Имя" должно быть заполнено',
             'phone.required' => 'Поле "телефон" должно быть заполнено',
             'email.required' => 'Поле "email" должно быть заполнено',
             'agency.required' => 'Поле "Агентство" должно быть заполнено',
         ];
     }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "name" => [ 'required', 'string' ],
            "email" => [ 'required', 'string' ],
            "phone" => [ 'required', 'string' ],
            "agency" => [ 'required', 'string' ]
        ];
    }
}
