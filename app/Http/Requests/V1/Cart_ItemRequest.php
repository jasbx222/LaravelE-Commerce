<?php


namespace App\Http\Requests\Admin;
use Illuminate\Foundation\Http\FormRequest;

class Cart_ItemRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules()
    {
        return [
    
            'cart_id' => 'required',
            'produtc_id' => 'required',
            'quantity' => 'required',
            'unit_price' => 'required',
            'total_price' => 'required',
        ];
    }
    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
    
        return [
            'cart_id.required' => 'The cart_id field is required.',
            'produtc_id.required' => 'The produtc_id field is required.',
            'quantity.required' => 'The quantity field is required.',
            'unit_price.required' => 'The unit_price field is required.',
            'total_price.required' => 'The total_price field is required.',
        ];
    }
}