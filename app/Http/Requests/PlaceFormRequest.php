<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PlaceFormRequest extends FormRequest
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
             'dr.date' => 'Неверный формат даты',
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
            'f' => [],
            'i' => [],
            'o' => [],
            'doc_type' => [],
            'doc_n' => [],
            'dr' => ['nullable', 'date'],
            'phone' => [],
            'comment' => [],
        ];
    }
}
