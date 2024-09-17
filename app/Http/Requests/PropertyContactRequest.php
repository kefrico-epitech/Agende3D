<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PropertyContactRequest extends FormRequest
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
            'firstname' =>'required|string|min:2',
            'lastname' =>'required|string|min:2',
            'phone' =>'required|string|max:20',
            'email' =>'required|email|max:255',
            'message' =>'required|string|max:500',
        ];
    }
}
