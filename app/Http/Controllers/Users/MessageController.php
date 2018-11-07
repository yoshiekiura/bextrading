<?php

namespace Tradesys\Http\Controllers\Users;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Tradesys\Events\ContactAdviser;
use Tradesys\Http\Controllers\Controller;
use Tradesys\Trade;
use Tradesys\User;

class MessageController extends Controller
{
    public function index()
    {
        $bal       = Trade::userBalance();
        $equity    = Trade::userEquity();
        $uguaranty = Trade::userBrokerGuaranty();
        $depositos = Trade::userDeposits();
        $marketValue = Trade::userMarketValue();

        return view('users.contact.index', compact('bal', 'equity', 'uguaranty', 'depositos', 'marketValue'));
    }

    public function sendMessage(Request $request)
    {
        $user = Auth::user();
        $this->validate($request, [
      'mensaje' => 'required|min:4',
    ]);

        //envia notificacion al cliente.
        event(new ContactAdviser($user));

        return redirect()->route('contactbroker')->with('flash', 'Message was sent succesfully. Your advisor will contacting you soon!');
    }
}
