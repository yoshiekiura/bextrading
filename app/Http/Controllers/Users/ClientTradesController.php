<?php

namespace Tradesys\Http\Controllers\Users;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Tradesys\Exchange;
use Tradesys\Http\Controllers\Controller;
use Tradesys\Ticket;
use Tradesys\Trade;
use Tradesys\User;

class ClientTradesController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }

    public function index()
    {
        $hoy  = Carbon::now();
        $user = Auth::id();
        //$this->authorize('tradePass', $user);
        $credit = Trade::where('user_id', Auth::id())->sum('credit');
        $debit  = Trade::where('user_id', Auth::id())->sum('debit');

        // $ticketsall = Ticket::all()->where('user_id', Auth::user()->id);
        // $trades = Trade::where('user_id',$user)->get();
        $trades = Trade::orderBy('Created_at', 'ASC')->whereNotNull('ticket_id')
            ->where('user_id', Auth::id())
            ->paginate(10);

        $tradexs = Trade::orderBy('Created_at', 'ASC')->whereNotNull('exchange_id')
            ->where('user_id', Auth::id())
            ->paginate(10);

        $closeTickets = Ticket::orderBy('Created_at', 'ASC')->StatusClosed()
            ->where('user_id', Auth::id())
            ->paginate(5);
        $total = 0;

        $balance = $credit - $debit;

        $guaranty = Trade::where('user_id', $user)
            ->whereIn('action', ['Broker Guaranty'])
            ->sum('credit');

        $bal         = Trade::userBalance();
        $equity      = Trade::userEquity();
        $uguaranty   = Trade::userBrokerGuaranty();
        $depositos   = Trade::userDeposits();
        $marketValue = Trade::userMarketValue();

        return view('users.trades.index', compact('hoy', 'total', 'user', 'credit', 'debit', 'depositbalance', 'trades', 'closeTickets', 'tradexs', 'balance', 'guaranty', 'bal', 'equity', 'uguaranty', 'depositos', 'marketValue'));
    }

    public function show($trade)
    {
        $trade = Trade::findOrFail($trade);

        return view('users.trades.show', compact('trade'));
    }

    //funciones recientes

    //  protected function userBalance()
    // {
    //     $credit  = Trade::where('user_id', \Auth::user()->id)->sum('credit');
    //     $debit   = Trade::where('user_id', \Auth::user()->id)->sum('debit');
    //     $balance = $credit - $debit;

    //     return $balance;
    // }

    // protected function userEquity()
    // {
    //     $creditEquity = Trade::where('user_id', \Auth::user()->id)->equity()->sum('credit');
    //     $debitEquity  = Trade::where('user_id', \Auth::user()->id)->equity()->sum('debit');
    //     $totalEquity  = $creditEquity - $debitEquity;

    //     return $totalEquity;
    // }

    // protected function userBrokerGuaranty()
    // {
    //     $deuda       = Trade::where('user_id', \Auth::user()->id)->adeudadoGnrl()->sum('credit');
    //     $pagodeuda   = Trade::where('user_id', \Auth::user()->id)->adeudadoPagadoGnrl()->sum('debit');
    //     $guarantybal = $deuda - $pagodeuda;

    //     return $guarantybal;
    // }

    // protected function userDeposits()
    // {
    //     $depo = Trade::where('user_id', \Auth::user()->id)->sumUserDeposit()->sum('credit');

    //     return $depo;
    // }

    //fin funciones

    /*
    function que genera el summary de cada cliente en la vista
    del cliente.
     */

    public function tradeSumary(User $user, Trade $trade)
    {
        $user = Auth::user();

        $hoy        = Carbon::now(); //fecha
        $openTrades = Ticket::where('user_id', $user->id)
            ->whereIn('status', ['Open'])
            ->get();

        $closeTrades = Ticket::where('user_id', $user->id)
            ->whereIn('status', ['Closed'])->where('action', 'Sold Out')
            ->get();

        $allTrades = Trade::all()->where('user_id', $user->id);

        $exchanges = Exchange::all()->where('user_id', $user->id);

        $coins = $this->sumCoinsUser($user->id);

        $total = 0;

        foreach ($allTrades as $tradeu) {
            $sum = 0;
            $sum += ($tradeu->credit - $tradeu->debit);
            $total += $sum;
        }

        $bal         = Trade::userBalance();
        $equity      = Trade::userEquity();
        $uguaranty   = Trade::userBrokerGuaranty();
        $depositos   = Trade::userDeposits();
        $marketValue = Trade::userMarketValue();

        return view('users.trades.balance', compact('total', 'user', 'alltrades', 'hoy', 'openTrades', 'closeTrades', 'exchanges', 'coins', 'bal', 'equity', 'uguaranty', 'depositos', 'marketValue'));
    }

    public function sumCoinsUser($user)
    {
        $coins = [
            'Bitcoin'          => Exchange::whereIn('product_id', [40])->where('user_id', $user)->sum('qty'),
            'Ethereum'         => Exchange::whereIn('product_id', [41])->where('user_id', $user)->sum('qty'),
            'Ripple'           => Exchange::whereIn('product_id', [42])->where('user_id', $user)->sum('qty'),
            'Bitcoin Cash'     => Exchange::whereIn('product_id', [43])->where('user_id', $user)->sum('qty'),
            'Litecoin'         => Exchange::whereIn('product_id', [44])->where('user_id', $user)->sum('qty'),
            'Cardano'          => Exchange::whereIn('product_id', [45])->where('user_id', $user)->sum('qty'),
            'Monero'           => Exchange::whereIn('product_id', [46])->where('user_id', $user)->sum('qty'),
            'Dash'             => Exchange::whereIn('product_id', [47])->where('user_id', $user)->sum('qty'),
            'Ethereum Classic' => Exchange::whereIn('product_id', [48])->where('user_id', $user)->sum('qty'),
        ];

        return $coins;
    }
}
