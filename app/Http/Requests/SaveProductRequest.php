<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveProductRequest extends FormRequest
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
            'name' => 'required|min:3|max:80',
            'description' => 'required|min:3|max:1000',
            'img' => [
                $this->route('product') ? 'nullable' : 'required',
                'image'
            ],
            'price' => 'required|numeric|min:3|max:30000',
            'stock' => 'required|min:1|max:1',
        ];
    }
}
