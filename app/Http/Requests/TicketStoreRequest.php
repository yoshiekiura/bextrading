<?php

namespace Tradesys\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class TicketStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::user();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'fecha'   => 'required|date',
            'user'    => 'required',
            'precio'  => 'required|regex:/^\d*(\.\d{1,2})?$/',
            'expdate' => 'required|date|date_format:Y-m-d|after:fecha',
            'month'   => 'required',
            'fee'     => 'required',
            'year'    => 'required',
            'strike'  => 'required|',

        ];
    }
}
