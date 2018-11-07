<?php

namespace Tradesys\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class TicketUpdateRequest extends FormRequest
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
            'fecha'=>'required|date|date_format:Y-m-d',
            'user' => 'required',
            'type' => 'required',
            'qty' => 'required',
            'precio'=>'required|regex:/^\d*(\.\d{1,2})?$/',
            'product' => 'required',
            'month' => 'required',
            'year' =>'required',
            'fee'=>'required',
            'strike'=>'required',
            'expdate'=>'required|date|date_format:Y-m-d|after:fecha',
        ];
    }
}
