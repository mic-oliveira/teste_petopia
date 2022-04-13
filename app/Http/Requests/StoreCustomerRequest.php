<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCustomerRequest extends FormRequest
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
            'name' => 'required',
            'address' => 'array | required',
            'address.public_place' => 'required',
            'address.number' => 'required',
            'address.neighborhood' => 'required',
            'address.city_id' => 'required | exists:cities,id',
            'document' => 'array | required'
        ];
    }

    public function attributes()
    {
        return [
            'address.public_place' => 'public place',
            'address.number' => 'number',
            'address.neighborhood' => 'neighborhood',
            'address.city_id' => 'city id'
        ];
    }

}
