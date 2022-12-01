<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDomicilioRequest extends FormRequest
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
            'street'        => 'required',
            'num_interior'  => 'nullable',
            'num_exterior'  => 'required',
            'cp'            => 'required',
            'country'       => 'required',
            'state'         => 'required',
            'city'          => 'required'
        ];
    }
}
