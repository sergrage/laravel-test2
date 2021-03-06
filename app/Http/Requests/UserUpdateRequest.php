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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,id,' . $user->id,
            'animalName' => ['nullable',
                             'min:3',
                             'max:255',
                            'required_with:animalType'],
            'animalType' => ['nullable',
                            'min:3',
                            'max:255',
                             'required_with:animalName'],
            'role' => Rule::in(['Admin', 'Moderator', 'User']),
        ];
    }
}
