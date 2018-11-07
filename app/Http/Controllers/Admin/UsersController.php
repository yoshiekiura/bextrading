<?php

namespace Tradesys\Http\Controllers\Admin;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Tradesys\Exchange;
use Tradesys\Http\Controllers\Controller;
use Tradesys\Ticket;
use Tradesys\Trade;
use Tradesys\User;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function index(Request $request)
    {
        $request->user()->authorizeRoles('admin');
        $balance  = Trade::adminBalance();
        $equity   = Trade::adminEquity();
        $brokergu = Trade::adminBrokerGuaranty();
        $deposits = Trade::adminDeposits();

        // $users = User::where('name', '!=', 'Admin')->orderBy('id', 'ASC')->get();
        $users = User::where('name', '!=','Admin')->orderBy('id','DESC')->paginate(30);

        return view('admin.users.index', compact('users', 'balance', 'equity', 'brokergu', 'deposits'));
    }

    public function create(User $user, Request $request)
    {
        Auth::user()->authorizeRoles('admin');
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $request->all();

        //TODO: crear metodo para guardar los datos del usuario.
    }

    public function edit(User $user, Request $request)
    {
        $request->user()->authorizeRoles('admin');

        return view('admin.users.edit', compact('user'));
    }

    public function update(User $user, Request $request)
    {
        $user->update($request->all());

        return redirect()->back()->with('flash', 'Datos de usuario actualizados');
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

    public function ticketsByUser($user)
    {
        Auth::user()->authorizeRoles('admin');
        $hoy    = Carbon::now(); //fecha
        $client = User::where('id', $user)->first();

        $tickets = Ticket::where('user_id', $user)
        ->where('action', 'Sold Out')->orderBy('created_at', 'DESC')->get();

        $openTickets = Ticket::where('user_id', $user)
        ->whereIn('status', ['Open'])
        ->get();

        //forex crypto
        $exchanges = Exchange::where('user_id', $user)
        ->get();

        $coins = $this->sumCoinsUser($user);

        $allTrades = Trade::all()->where('user_id', $client->id);
        $total     = 0;
        $balances  = 0;

        foreach ($allTrades as $tradeu) {
            $sum   = 0;
            $sum   += ($tradeu->credit - $tradeu->debit);
            $total += $sum;
        }

        $guaranty = TicketsController::brokerGuaranty($client->id);

        $credit   = Trade::where('user_id', $client->id)->sum('credit');
        $debit    = Trade::where('user_id', $client->id)->sum('debit');
        $balances = ($credit - $debit);
        $balance  = Trade::adminBalance();
        $equity   = Trade::adminEquity();
        $brokergu = Trade::adminBrokerGuaranty();
        $deposits = Trade::adminDeposits();
        $marketValue = Trade::adminUserMarketVal($user);


        return view('admin.users.list', compact('tickets', 'client', 'hoy', 'openTickets', 'total', 'exchanges', 'coins', 'guaranty', 'balances', 'balance', 'equity', 'brokergu', 'deposits', 'marketValue'));
    }

    public function ausertrades($user, Request $request)
    {
        $request->user()->authorizeRoles('admin');
        $hoy    = Carbon::now();
        $trades = Trade::orderBy('id', 'ASC')->where('user_id', $user)
        ->where('ticket_id', '>', 0)
        ->paginate(20);

        $client   = User::find($user);
        $credit   = Trade::where('user_id', $user)->sum('credit');
        $debit    = Trade::where('user_id', $user)->sum('debit');
        $balances = ($credit - $debit);

        $guarantymake = Trade::where('user_id', $user)
        ->whereIn('action', ['CGO Broker Guaranty'])
        ->sum('credit');
        $guarantypay  = Trade::where('user_id', $user)
        ->whereIn('action', ['CGO Broker Guaranty Payment'])
        ->sum('debit');
        $guaranty     = $guarantymake - $guarantypay;

        $balance  = Trade::adminBalance();
        $equity   = Trade::adminEquity();
        $brokergu = Trade::adminBrokerGuaranty();
        $deposits = Trade::adminDeposits();
        $marketValue = Trade::adminUserMarketVal($user);

        return view('admin.users.userTradeList', compact('trades', 'client', 'hoy', 'balances', 'guaranty', 'balance', 'equity', 'brokergu', 'deposits','marketValue'));
    }

    public function debts()
    {
        $users = User::all();
        foreach ($users as $user) {
            $userId = $user->id;
        }

        $trades = Ticket::all()->where('user_id', $userId);
        $credit = Trade::sum('credit');
        $debit  = Trade::sum('debit');
        $total = 0;
        $total += $credit - $debit;

        return view('admin.users.debtlist', compact('total', 'trades', 'users'));
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id)->delete();

        return back()->with('flash'," Usuario con cuenta nº $id fue elimado correctamente");
    }
}
