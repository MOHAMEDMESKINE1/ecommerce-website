<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\ReCaptcha;
class ContactRequest extends FormRequest
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
            "name"=>"required|max:50",
            "email"=>"required|email|unique:contacts,email",
            "city"=>"required|max:50",
            "phone"=>"required|max:50",
            'g-recaptcha-response' => ['required', new ReCaptcha]        
        ];
    }
}
