<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductSearchRequest extends FormRequest
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
     */
    public function rules(): array
    {
        return [
            'q' => 'nullable|string|max:255',
            'category' => 'nullable|array',
            'category.*' => 'integer|exists:categories,id',
            'min_price' => 'nullable|numeric|min:0',
            'max_price' => 'nullable|numeric|min:0|gte:min_price',
            'sort' => 'nullable|in:newest,price_low,price_high,name',
        ];
    }

    /**
     * Get custom messages for validator errors.
     */
    public function messages(): array
    {
        return [
            'max_price.gte' => 'Maximum price must be greater than or equal to minimum price.',
            'category.*.exists' => 'One or more selected categories are invalid.',
        ];
    }

    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation(): void
    {
        // Ensure min_price and max_price are numeric
        if ($this->has('min_price') && !is_numeric($this->min_price)) {
            $this->merge(['min_price' => null]);
        }
        
        if ($this->has('max_price') && !is_numeric($this->max_price)) {
            $this->merge(['max_price' => null]);
        }
    }
}
