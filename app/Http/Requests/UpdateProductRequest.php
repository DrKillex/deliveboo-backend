<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
            'name' => [
                'required',
                Rule::unique('products')->ignore($this->product),
                'string',
            ],
            'description' => 'nullable',
            'price' => 'nullable',
            'image' => 'nullable|image',
            'visible' => 'nullable',
            'gluten_free' => 'nullable',
            'vegan' => 'nullable',
            // 'restaurant_id' => 'nullable|exists:restaurant,id',
        ];
    }
}
