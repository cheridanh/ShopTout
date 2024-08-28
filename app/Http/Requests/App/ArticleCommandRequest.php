<?php

namespace App\Http\Requests\App;

use Illuminate\Foundation\Http\FormRequest;

class ArticleCommandRequest extends FormRequest
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
            'firstname' => 'required|string|min:2',
            'lastname' => 'required|string|min:2',
            'phone' => 'required|string|min:9|max:9',
            'quarter' => 'required|string|min:5',
        ];
    }

    public function filled()
    {

    }
}
