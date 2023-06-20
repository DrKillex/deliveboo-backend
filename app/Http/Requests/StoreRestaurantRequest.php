<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRestaurantRequest extends FormRequest
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
            'name' => 'required|max:150|string|unique:restaurants',
            'address' => 'required|max:150|string',
            'telephone' => 'required|max:30|string',
            'email' => 'nullable|max:100|email|string',
            'p_iva' => 'required|max:11|string',
            'description' => 'nullable|string',
            'opening_hours' => 'required',
            'img' => 'required|image|max:2048|mimes:jpeg,jpg,png,gif',
            'categories'=>'required|exists:categories,id',
        ];
    }
}
