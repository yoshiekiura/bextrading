<?php

namespace Tradesys\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientWithdrawFormRequest extends FormRequest
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
            'cuenta'         => 'required',
            'name'           => 'required|min:3',
            'email'          => 'required|min:10',
            'amount'         => 'required|regex:/^\d*(\.\d{1,2})?$/',
            'reason'         => 'required',
            'beneficiary'    => 'required',
            'direccion'      => 'required',
            'bank'           => 'required',
            'bintermediario' => 'required',
            'bancoaddress'   => 'required',
            'swift'          => 'required',
            'acount'         => 'required',
            'referencia'     => 'required',
            'firma'          => 'required',

        ];
    }
}
