<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:100',
            'information' => 'required|string|max:1000',
            'price' => 'required|integer',
            'is_selling' => 'required|boolean',
            'sort_order' => 'nullable|integer',
            'quantity' => 'required|integer|between:0,99',
            'category' => 'required|string',
            'image1' => 'nullable|exists:images,id',
            'image2' => 'nullable|exists:images,id',
            'image3' => 'nullable|exists:images,id',
            'image4' => 'nullable|exists:images,id',
        ];
    }
}
