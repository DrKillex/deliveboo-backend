<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'nullable|string|max:100',
            'description' => 'nullable|string',
            'price' => 'nullable|numeric|decimal:0,2|min:0',
            'image' => 'nullable|image|max:2048|mimes:jpeg,jpg,png,gif',
            'visible' => 'nullable|boolean',
            'gluten_free' => 'nullable|boolean',
            'vegan' => 'nullable|boolean',
        ];
    }
}
