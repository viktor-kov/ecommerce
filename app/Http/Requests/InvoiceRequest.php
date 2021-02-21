<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InvoiceRequest extends FormRequest
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
            'lastname' => 'required',
            'town' => 'required',
            'psc' => 'required',
            'street' => 'required',
            'house_id' => 'required',
            'phone_number' => 'required',
            'card_number' => 'required|digits:16',
            'card_exp_month' => 'required|digits:2',
            'card_exp_year' => 'required|digits:4',
            'card_cvc' => 'required|digits:3',
        ];
    }
}
