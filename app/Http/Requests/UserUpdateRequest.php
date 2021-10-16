<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['string', 'max:225'],
            'email' => ['email', 'string', 'max:225', 'unique:users'],
            'password' => ['string', 'min:8', 'max:225'],
            'role' => ['string'],
        ];
    }
}
