<?php

namespace App\Http\Requests\UserDish;

use Illuminate\Foundation\Http\FormRequest;

class StoreDishRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'user_id'=> ['require', 'integer'],  
            'title' => ['required', 'string', 'max:255'],
            'price' => ['requeired', 'numeric'],
            'description' => ['min:5', 'max:500'],
            'image' => ['required', 'string', 'max:255']
        ];
    }
}
