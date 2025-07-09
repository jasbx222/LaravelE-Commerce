<?php


namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;


class StoreProductRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [    
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'price' => 'required|numeric|min:0',
            'is_active' => 'boolean',
            'discount_percent' => 'nullable|numeric|min:0|max:100',
            'category_id' => 'required|exists:categories,id',
            'seller_id' => 'required|exists:users,id',
        ];
    }
    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {

        return [
            'name.required' => 'The product name is required.',
            'name.string' => 'The product name must be a string.',
            'name.max' => 'The product name may not be greater than 255 characters.',
            'description.string' => 'The description must be a string.',
            'image.image' => 'The image must be an image file.',
            'image.mimes' => 'The image must be a file of type: jpeg, png, jpg, gif, svg.',
            'image.max' => 'The image may not be greater than 2048 kilobytes.',
            'price.required' => 'The price is required.',
            'price.numeric' => 'The price must be a number.',
            'price.min' => 'The price must be at least 0.',
            'is_active.boolean' => 'The active status must be true or false.',
            'discount_percent.numeric' => 'The discount percent must be a number.',
            'discount_percent.min' => 'The discount percent must be at least 0.',
            'discount_percent.max' => 'The discount percent may not be greater than 100.',
            'category_id.required' => 'The category is required.',
            'category_id.exists' => 'The selected category does not exist.',
            'seller_id.required' => 'The seller is required.',
            'seller_id.exists' => 'The selected seller does not exist.',
        ];

    }
}