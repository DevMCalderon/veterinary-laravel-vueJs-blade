<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreWaitingListRequest extends FormRequest
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
            'clientType' => 'required',
            'client_id' => ['required_if:clientType,==,existente','exists:clients,id'],
            'date' => 'required|date',
            'time' => 'required|date_format:H:i',
            'client'=> 'required',
            'client.name'=> 'required',
            'client.phone'=> 'required',
            'client.email'=> 'nullable|email',
        ];
    }

    public function attributes()
    {
        return [
            'clientType' => 'tipo de cliente',
            'date' => 'fecha',
            'time' => 'hora',
            'client'=> 'cliente',
            'client_id'=> 'cliente',
            'client.name'=> 'nombre',
            'client.phone'=> 'teléfono',
            'client.email'=> 'correo electrónico'
        ];
    }
}
