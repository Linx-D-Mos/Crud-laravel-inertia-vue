<?php

namespace App\Http\Requests\Contact;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "name" => "required|min:3|max:100",
            'phone' => "required|min:9|max:50",
            'avatar' => "nullable|mimes:jpeg,png,jpg,jpeg|max:2048",
            'privacity'=> "required|in:public,private",
        ];
    }
}
