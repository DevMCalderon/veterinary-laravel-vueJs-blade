<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEmpresaRequest extends FormRequest
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
            'name'                  => 'nullable',
            'logo'                  => 'nullable',
            'phone'                 => 'nullable',
            'email'                 => 'nullable',
            'rfc'                   => 'nullable',
            'razon_social'          => 'nullable',
            'admin_id'              => 'nullable',
            'domicilio_empresa_id'  => 'nullable',
            'domicilio_fiscal_id'   => 'nullable'
        ];
    }
}
