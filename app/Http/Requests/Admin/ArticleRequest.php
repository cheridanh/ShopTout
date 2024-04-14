<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
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
            'name' => 'required|min:10',
            'price' => 'required|integer|min:4',
            'stock' => 'required|integer|min:1',
            'description' => 'required',
            'sold' => 'required|boolean',
            'sizes' => ['array', 'exists:sizes,id', 'required'],
            'colors' => ['array', 'exists:colors,id', 'required'],
            'pictures' => ['array'],
            'pictures.*' => ['image', 'max:2000'],
        ];
    }
}
