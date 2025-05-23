<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSucursalRequest extends FormRequest
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
            'name'         => 'required',
            'state'        => 'required',
            'city'         => 'required',
            'address'      => 'nullable',
            'phone'        => 'nullable',
            'email'        => 'nullable',
            'encargado_id' => 'nullable',
            'empresa_id'   => 'nullable',
        ];
    }
}
