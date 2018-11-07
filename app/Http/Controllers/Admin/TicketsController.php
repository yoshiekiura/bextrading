<?php

namespace Tradesys\Http\Controllers\Admin;

use Carbon\Carbon;
use ConsoleTVs\Charts\Facades\Charts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Tradesys\Fee;
use Tradesys\Http\Controllers\Controller;
use Tradesys\Http\Requests\TicketStoreRequest;
use Tradesys\Http\Requests\TicketUpdateRequest;
use Tradesys\Month;
use Tradesys\Product;
use Tradesys\Ticket;
use Tradesys\Trade;
use Tradesys\User;
use Tradesys\Year;

class TicketsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function index(Request $request)
    {
        $request->user()->authorizeRoles('admin');

        //sacamos los ticketes del usuario autenticado.
        //$tickets = Ticket::all()->where('user_id', Auth::user()->id);
        $tickets     = Ticket::statusOpen()->paginate(10);
        $soldtickets = Ticket::where('status', 'Closed')->where('action', 'sold out')->paginate(10);
        $total       = 0;
        $entrydate   = Carbon::now();
        $trade       = Trade::all();

        $options = [
            'Gold'              => Ticket::where('status', '=', 'Open')->whereIn('product_id', [1])->sum('total'),
            'Silver'            => Ticket::where('status', '=', 'Open')->whereIn('product_id', [2])->sum('total'),
            'Palladium'         => Ticket::where('status', '=', 'Open')->whereIn('product_id', [3])->sum('total'),
            'Platinium'         => Ticket::where('status', '=', 'Open')->whereIn('product_id', [4])->sum('total'),
            'Crude Oil'         => Ticket::where('status', '=', 'Open')->whereIn('product_id', [5])->sum('total'),
            'Gasoline'          => Ticket::where('status', '=', 'Open')->whereIn('product_id', [6])->sum('total'),
            'Cotton'            => Ticket::where('status', '=', 'Open')->whereIn('product_id', [7])->sum('total'),
            'Heating Oil'       => Ticket::where('status', '=', 'Open')->whereIn('product_id', [8])->sum('total'),
            'Natural Gas'       => Ticket::where('status', '=', 'Open')->whereIn('product_id', [9])->sum('total'),
            'Dollar Index'      => Ticket::where('status', '=', 'Open')->whereIn('product_id', [10])->sum('total'),
            'Euro'              => Ticket::where('status', '=', 'Open')->whereIn('product_id', [11])->sum('total'),
            'Yen'               => Ticket::where('status', '=', 'Open')->whereIn('product_id', [12])->sum('total'),
            'Australian Dollar' => Ticket::where('status', '=', 'Open')->whereIn('product_id', [13])->sum('total'),
            'Bitcoin'           => Ticket::where('status', '=', 'Open')->whereIn('product_id', [50])->sum('total'),
        ];
        //graficos Options
        $options = Charts::create('bar', 'highcharts')
            ->title('Summary Options Open Products')
            ->colors(['gold', 'silver', 'blue', 'red', 'black', 'brown', 'yellow', 'purple', 'green', 'gray', 'orange', 'pink', 'darkgreen'])
            ->labels(['Gold', 'Silver', 'Palladium', 'Platinium', 'Crude Oil', 'Gasoline', 'Cotton', 'Heating Oil', 'Natural Gas', 'Dollar Index', 'Bitcoin'])
            ->values([
                $options['Gold'], $options['Silver'], $options['Palladium'],
                $options['Platinium'], $options['Crude Oil'], $options['Gasoline'], $options['Cotton'], $options['Heating Oil'],
                $options['Natural Gas'], $options['Dollar Index'], $options['Bitcoin'],
            ])
            ->dimensions(0, 350);

        $balance  = Trade::adminBalance();
        $equity   = Trade::adminEquity();
        $brokergu = Trade::adminBrokerGuaranty();
        $deposits = Trade::adminDeposits();

        return view('admin.tickets.index', compact('options', 'tickets', 'soldtickets', 'trade', 'total', 'entrydate', 'balance', 'equity', 'brokergu', 'deposits'));
    }

    public function create()
    {
        Auth::user()->authorizeRoles('admin');

        $products = Product::orderBy('name', 'ASC')->where('category_id', 1)->get();
        $users    = User::orderBy('name', 'ASC')->where('name', '!=', 'Admin')->get();
        $months   = Month::all();
        $years    = Year::all();
        $fees     = Fee::orderBy('amount', 'ASC')->get();
        $fecha    = Carbon::now();
        $balance  = Trade::adminBalance();
        $equity   = Trade::adminEquity();
        $brokergu = Trade::adminBrokerGuaranty();
        $deposits = Trade::adminDeposits();

        return view('admin.tickets.create', compact('fecha', 'equity', 'brokergu', 'deposits', 'balance', 'years', 'users', 'products', 'fees', 'months'));
    }

    /*
     * checkea el balance del cliente seleccionado. con broker guaranty
     */
    public function checkBalance()
    {
        $userTrades = Trade::where('user_id', $request->input('user'))->get();
        $credit     = $userTrades->sum('credit');
        $debit      = $userTrades->sum('debit');
        $balance    = $credit - $debit;

        $name = User::find($request->input('user'));
        //uso adecuado de la funcion brokerGuaranty
        $guaranty = $this->brokerGuaranty($name->id);

        return back()->with('flash', "Balance $name->name is  $ $balance in a broker guaranty of $ $guaranty");
    }

    // guarda el new ticket
    public function store(TicketStoreRequest $request)
    {
        Auth::user()->authorizeRoles('admin');

        $fees = Fee::where('id', $request->input('fee'))->get();
        foreach ($fees as $fee) {
            $fee = $fee->amount;
        }

        $ticket              = new Ticket();
        $ticket->entrydate   = $request->get('fecha');
        $ticket->user_id     = $request->get('user');
        $ticket->qty         = $request->get('qty');
        $ticket->type        = $request->get('type');
        $ticket->product_id  = $request->get('product');
        $ticket->price       = $request->get('precio');
        $ticket->fee_id      = $request->get('fee');
        $ticket->month_id    = $request->get('month');
        $ticket->year_id     = $request->get('year');
        $ticket->strike      = $request->get('strike');
        $ticket->expdate     = $request->get('expdate');
        $ticket->action      = $request->get('action');
        $ticket->marketvalue = $request->get('precio');
        $ticket->status      = $request->get('status');
        $ticket->total       = ($request->get('precio') + $fee) * $request->get('qty');
        $ticket->save();
        // ======================
        // se guarda el trade con el id del ticket
        $ticketId            = Ticket::orderBy('id', 'desc')->first(); // user 1
        $trade               = new Trade();
        $trade->user_id      = $ticketId->user_id;
        $trade->ticket_id    = $ticketId->id;
        $trade->action       = $ticketId->action;
        $trade->credit       = '0';
        $trade->debit        = $ticketId->total;
        $trade->market_value = $ticketId->marketvalue;
        $trade->profit       = '0';
        $trade->total        = $ticketId->total;
        $trade->save();

        return redirect()->route('ticketuser', $trade->user_id)->with('flash', 'Ticket has been created!');
    }

    // esta funcion esta sobre escrita en la entidad Trade
    public static function brokerGuaranty($user)
    {
        // Auth::user()->authorizeRoles('admin');
        $guarantymake = Trade::where('user_id', $user)
            ->whereIn('action', ['CGO Broker Guaranty'])
            ->sum('credit');
        $guarantypay = Trade::where('user_id', $user)
            ->whereIn('action', ['CGO Broker Guaranty Payment'])
            ->sum('debit');
        $guaranty = $guarantymake - $guarantypay;

        return $guaranty;
    }

    // vende el tickete de un usuario en la vista user
    public function sellticket($ticket)
    {
        Auth::user()->authorizeRoles('admin');
        //$trades1 = Trade::all()->where('ticket_id', $ticket);
        //        $ticket = Ticket::all()->where('id',$ticket);
        $ticket   = Ticket::findOrFail($ticket);
        $guaranty = $this->brokerGuaranty($ticket->user_id);
        $hoy      = Carbon::now();
        $fees     = Fee::orderBy('porcentaje', 'ASC')->get();
        $balance  = Trade::adminBalance();
        $equity   = Trade::adminEquity();
        $brokergu = Trade::adminBrokerGuaranty();
        $deposits = Trade::adminDeposits();

        return view('admin.trades.tradeSellOut', compact('ticket', 'fees', 'guaranty', 'hoy', 'balance', 'equity', 'brokergu', 'deposits'));
    }

    public function edit(Ticket $ticket, Request $request)
    {
        $request->user()->authorizeRoles('admin');
        // Auth::user()->authorizeRoles('admin');

        $products = Product::all();
        $users    = User::where('name', '!=', 'Admin')->get();
        $months   = Month::all();
        $years    = Year::all();
        $fees     = Fee::all();
        $fecha    = Carbon::now();
        $balance  = Trade::adminBalance();
        $equity   = Trade::adminEquity();
        $brokergu = Trade::adminBrokerGuaranty();
        $deposits = Trade::adminDeposits();

        return view('admin.tickets.edit', compact('ticket', 'products', 'users', 'months', 'years', 'fees', 'fecha', 'balance', 'equity', 'brokergu', 'deposits'));
    }

    public function update(Ticket $ticket, TicketUpdateRequest $request)
    {
        $fee = $ticket->fee->amount;
        // $fees = Fee::where('id', $ticket->fee_id)->get();
        // foreach ($fees as $fee) {
        //     $fee = $fee->amount;
        // }
        $ticket->entrydate   = $request->get('fecha');
        $ticket->user_id     = $request->get('user');
        $ticket->qty         = $request->get('qty');
        $ticket->type        = $request->get('type');
        $ticket->product_id  = $request->get('product');
        $ticket->price       = $request->get('precio');
        $ticket->fee_id      = $request->get('fee');
        $ticket->month_id    = $request->get('month');
        $ticket->year_id     = $request->get('year');
        $ticket->strike      = $request->get('strike');
        $ticket->marketvalue = $request->get('precio') * $request->get('qty');
        $ticket->expdate     = $request->get('expdate');
        $ticket->action      = $request->get('action');
        $ticket->status      = $request->get('status');
        $ticket->total       = ($request->get('precio') + $fee) * $request->get('qty');
        $ticket->save();

        //===============================
        $ticketId = Ticket::orderBy('id', 'desc')->first();
        $ticket   = Ticket::findOrFail($ticketId->id);
        $trade    = Trade::findOrFail($ticket->trade->id);
        // $trade->ticket()->sync($trade->ticket->total);

        // nuevos valores...
        $trade->action       = 'Buy';
        $trade->credit       = 0;
        $trade->debit        = $trade->ticket->total;
        $trade->total        = $trade->ticket->total;
        $trade->ticket_id    = $ticket->id;
        $trade->market_value = $ticket->marketvalue;
        $trade->save();

        return redirect()->route('ticketuser', $ticket->user_id)->with('flash', 'Ticket has been updated!');
    }

    public function destroy($ticket)
    {
        request()->user()->authorizeRoles('admin');

        $ticket = Ticket::find($ticket)->delete();
        return back()->with('flash', 'Ticket has been deleted!');
    }
}
