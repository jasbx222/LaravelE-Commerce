<?php 


namespace App\Http\Requests\Admin;  
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
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'price' => 'required|numeric|min:0',
            'is_active' => 'boolean',
            'discount_percent' => 'nullable|numeric|min:0|max:100',
            'category_id' => 'required|exists:categories,id',
            'seller_id' => 'required|exists:sellers,id',
        ];
    }
}