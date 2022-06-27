<?php

namespace App\Http\Requests;

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
            'name'        => 'required',
            'code'        => 'required',
            'price'       => 'required',
            'image'       => '',
            'category_id' => 'required',
        ];
    }

    public function attributes()
    {
        return [
            'name'        => 'nombre',
            'code'        => 'código',
            'price'       => 'precio',
            'image'       => 'imagen',
            'category_id' => 'categoria',
        ];
    }
}
