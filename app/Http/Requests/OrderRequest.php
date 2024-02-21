<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
            'state.required' => 'Неизвестно состояние заказа',
            'punkt.required' => 'Неизвестен пункт назначения',

            'email.required' => 'Неизвестен номер рейса',
            'email.integer' => 'Номер рейса не целое число',

            'price.required' => 'Поле Цена не должна быть пустой',
            'price.integer' => 'Поле Цена должна быть числом',

            'avanc.required' => 'Поле Аванс не должна быть пустой',
            'avanc.integer' => 'Поле Аванс должна быть числом',
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
            "comment" => [],
            "reis_id" => ['required', 'integer'],
            "tuda" => [],
            "obratno" => [],
            "price" => ['required', 'integer'],
            "avanc" => ['required', 'integer'],
            "state" => ['required', 'string'],
            "punkt" => ['required', 'string'],
        ];
    }
}
