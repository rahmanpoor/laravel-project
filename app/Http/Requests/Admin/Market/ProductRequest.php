<?php

namespace App\Http\Requests\Admin\Market;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $commonRules = [
            'name' => 'required|min:2|max:220',
            'introduction' => 'required|min:5|max:3000',
            'weight' => 'nullable|numeric|max:1000',
            'length' => 'nullable|numeric|max:1000',
            'width' => 'nullable|numeric|max:1000',
            'height' => 'nullable|numeric|max:1000',
            'price' => 'required|numeric',
            'status' => 'required|numeric|in:0,1',
            'marketable' => 'nullable|numeric|in:0,1',
            'tags' => 'required|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي., ]+$/u',
            'category_id' => 'required|integer|exists:product_categories,id',
            'brand_id' => 'required|integer|exists:brands,id',
            'published_at' => 'nullable|numeric',
            'meta_key.*' => 'required',
            'meta_value.*' => 'required',
        ];

        // قانون تصویر
        if ($this->isMethod('post')) {
            $commonRules['image'] = 'required|image|mimes:jpeg,jpg,png,gif,webp';
        } else {
            $commonRules['image'] = 'nullable|image|mimes:jpeg,jpg,png,gif,webp';
        }

        return $commonRules;
    }
}
