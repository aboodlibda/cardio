<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;


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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name.*'          => 'required|string|min:3|max:100',
            'description.*'   => 'nullable|string',
            'price'           => 'required|integer|numeric',
            'status'          => 'required|in:published,unpublished,draft',
            'slug'            => 'required|string|unique:products,slug',
            'quantity'        => 'required|numeric',
            'SKU'             => 'required|string|min:5|max:30',
            'category_id'     => 'required|int|exists:categories,id',
            'discount_type'   => 'required|in:no_discount,percentage,fixed_price',
            'tax_type'        => 'required|in:free,taxable_goods,downloadable_product',
            'vat_amount'      => 'nullable|numeric',
            'discounted_price'=> 'nullable|numeric',
            'images.*'        => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'tag_id'          => 'nullable|string|exists:tags,id',
        ];
    }
}
