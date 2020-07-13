<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\FindOutNumberRule;


class CategoryForm extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true ;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
        // 'category_name' => 'required|unique:categories,category_name',
        'category_name' => ['required', 'unique:categories,category_name', new FindOutNumberRule],
        'category_description' => ['required', new FindOutNumberRule],
        ];
    }

    public function messages()
    {
        return [
        'category_name.required' => 'You must add the category name.',
        'category_name.unique' => 'This name is taken..You have to choose new one..',
        'category_description.required' => 'You must input category description..',
        'category_description.alpha' => 'Alphp character valid only...',
        ];
    }
}
