<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\FindOutNumberRule;

class ProductStore extends FormRequest
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
            'product_name' => ['required', new FindOutNumberRule],
            'product_short_description' => ['required', new FindOutNumberRule],
            'product_long_description' => ['required', new FindOutNumberRule],
            'product_quantity' => 'required|numeric',
            'product_alert_quantity' => 'required|numeric',
            'product_price' => 'required|numeric'
        ];
    }

    public function messages()
    {
        return [
            'product_name' => 'You must give name of the product..',
            'product_short_description' => 'You must input product short description..',
            'product_long_description' => 'You must input product long description..',
            'product_quantity' => 'You should declare the quantity of the product..',
            'product_quantity.numeric' => 'This field contains only numeric number..',
            'product_alert_quantity' => 'You must declare the product quantity alert..',
            'product_alert_quantity.numeric' => 'This field contains only numeric number....',
            'product_price' => 'You have to input product price..',
            'product_price.numeric' => 'This field contains only numeric number......'
        ];
    }
}
