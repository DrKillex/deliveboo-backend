<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
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
            'name' => 'required|string|max:50',
            'surname' => 'required|string|max:50',
            'address' => 'required|max:150|string',
            'email' => 'nullable|max:100|string|email',
            'telephone' => 'required|max:30|string',
            'total_price' => 'required|numeric|decimal:2',
            'payment_state' => 'required|boolean'
        ];
    }
}
