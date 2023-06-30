<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateRestaurantRequest extends FormRequest
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
            'user_id' => 'nullable|exists:users,id',
            'name' => [
                'nullable',
                Rule::unique('products')->ignore($this->product),
                'max:150',
            ],
            'address' => 'nullable|max:150|string',
            'telephone' => 'nullable|max:30|string',
            'email' => 'nullable|max:100|email|string',
            'p_iva' => 'nullable|max:11|string',
            'description' => 'nullable',
            'opening_hours' => 'nullable',
            'img' => 'nullable',
            'categories'=>'exists:categories,id',
        ];
    }
}
