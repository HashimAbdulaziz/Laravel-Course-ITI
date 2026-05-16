<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use App\Rules\NoBannedWords;

class StorePostRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => ['required', 'min:3', new NoBannedWords()],

            'description' => ['required', 'min:10', new NoBannedWords()],
            'user_id' => ['required', 'exists:users,id'],

            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048']
        ];
    }


    // we can overide the message 
}