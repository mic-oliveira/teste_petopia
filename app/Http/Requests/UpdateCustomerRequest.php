<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCustomerRequest extends FormRequest
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
            'name' => 'sometimes | required',
            'address' => 'sometimes | array | required',
            'address.public_place' => 'sometimes | required',
            'address.number' => 'sometimes | required',
            'address.neighborhood' => 'sometimes | required',
            'address.city_id' => 'sometimes | required',
            'document' => 'sometimes | array | required',
            'document.type' => 'sometimes | array | required',
            'document.document' => 'sometimes | array | required',
        ];
    }

    public function attributes()
    {
        return [
            'address.public_place' => 'public place',
            'address.number' => 'number',
            'address.neighborhood' => 'neighborhood',
            'address.city_id' => 'city id',
            'document.type' => 'document type',
            'document.document' => 'document'
        ];
    }
}
