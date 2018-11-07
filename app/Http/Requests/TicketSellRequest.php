<?php

namespace Tradesys\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class TicketSellRequest extends FormRequest
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
      'fecha' => 'required|date|date_format:Y-m-d',
      'qty'   => 'required',
      'fee'   => 'required',
//            'sellprice'   => 'required|regex:/^\d*(\.\d{1,2})?$/',
    ];
  }
}
