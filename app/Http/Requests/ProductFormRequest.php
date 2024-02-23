<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductFormRequest extends FormRequest
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
        $isEdit =  str_contains(request()->route()->uri(), 'update');
        return [
            "name" => ['required'],
            "image" => [!$isEdit ? 'required' : 'nullable', 'image'],
            "description" => ['required'],
            "price" => ['required'],
            "quantity" => ['required'],
            
            "slug" => ['required'],
           
           
            "category_id" => ['required', Rule::exists('categories', 'id')],
        ];
    }
}
