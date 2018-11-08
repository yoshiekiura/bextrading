<?php

namespace Tradesys\Http\Controllers\Admin;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Tradesys\Admin;
use Tradesys\Fee;
use Tradesys\Http\Controllers\Controller;
use Tradesys\Http\Requests\TicketSellRequest;
use Tradesys\Http\Requests\TradeStoreRequest;
use Tradesys\Mail\ClientNewTrans;
use Tradesys\Month;
use Tradesys\Product;
use Tradesys\Ticket;
use Tradesys\Trade;
use Tradesys\User;
use Tradesys\Year;

class TradesController extends Controller
{
    public function __construct()
    {
        return $this->middleware('admin');
        return $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $request->user()->authorizeRoles('admin');

        $trades = Trade::whereNotNull('ticket_id')
                ->paginate(20);

        $tradexs = Trade::whereNotNull('exchange_id')
                ->paginate(20);
        $user    = Auth::id();

        $credit         = Trade::all()->sum('credit');
        $debit          = Trade::all()->sum('debit');
        $depositbalance = Trade::deposit()->sum('credit');
        $total          = 0;
        $balance        = ($credit - $debit);
        $deuda          = Trade::adeudadoGnrl()->sum('credit');
        $pagodeuda      = Trade::adeudadoPagadoGnrl()->sum('debit');
        $deuda          = $deuda - $pagodeuda;
        $deudabalance   = $depositbalance - $deuda; // para restar con la deuda.
        $soldtrades     = Trade::soldStatus()->paginate(10);
        $soldOutTotal   = Trade::soldStatus()->sum('credit');
        $deposits       = Trade::deposit()->paginate(10);

        return view(
            'admin.trades.index',
            compact(
                        'trades',
            'tradexs',
            'deposits',
            'soldtrades',
            'balance',
            'total',
                        'depositbalance',
            'soldOutTotal',
            'deuda',
            'qty'
        )
        );
    }

    // add credit
    public function create(Request $request)
    {
        $request->user()->authorizeRoles('admin');

        $tickets  = Ticket::all();
        $users    = User::where('name', '!=', 'Admin')
                ->orderBy('name', 'ASC')
                ->get();
        $fecha    = Carbon::now();
        $balance  = Trade::adminBalance();
        $equity   = Trade::adminEquity();
        $brokergu = Trade::adminBrokerGuaranty();
        $deposits = Trade::adminDeposits();
        return view('admin.trades.create', compact('tickets', 'fecha', 'users', 'balance', 'equity', 'brokergu', 'deposits'));
    }

    // sellout ticket from trades in admin user panel

    public function tradeSellOut(Trade $trade)
    {
        Auth::user()->authorizeRoles('admin');
        $ticket   = Ticket::find($trade->ticket->id);
        $trades   = Trade::all()->where('id', $trade);
        $fees     = Fee::orderBy('porcentaje', 'ASC')->get();
        $guaranty = TicketsController::brokerGuaranty($trade);
        $hoy      = Carbon::now();
        //////////////////////
        $balance  = Trade::adminBalance();
        $equity   = Trade::adminEquity();
        $brokergu = Trade::adminBrokerGuaranty();
        $deposits = Trade::adminDeposits();

        return view('admin.trades.tradeSellOut', compact('trades', 'fees', 'guaranty', 'hoy', 'balance', 'equity', 'brokergu', 'deposits', 'ticket'));
    }

    public function checkPorcent(Request $request)
    {
        $request->user()->authorizeRoles('admin');
        $ganancia     = $this->getGainLost($request->input('checkporcent'), 980);
        $porcen       = $request->input('checkporcent');
        $sellPriceAll = (980 + $ganancia) * $request->input('cantidad');
        $sellprice    = 980 + $ganancia;
        if ($sellprice <= 0) {
            $comision = 0;
        } else {
            //TODO:arreglar el * 25 por el campo de porcentaje por defecto
            // comision es siempre es 25 pero en este caso se quiere sacar
            // un x porcentaje del proceso de venta.
            $comision = $ganancia * 25 / 100;
        }

        return back()->with('flash', "  $porcen %  Total Sell Out is $ $sellPriceAll ** | **--Sell Price per option is $ $sellprice --**  |**-- Gain or Loss would be $ $ganancia!**--");
    }

    /*
     * Esta function crea el margen entre ganancia y perdida
     */
    public function getGainLost($porcent, $price)
    {
        if (!is_null($porcent)) {
            $ganancia = $price * $porcent / 100;
            return $ganancia;
        }
        return false;
    }

    /*
     *  hace la venta del ticket desde cualquier vista con el id del ticket
     */
    public function makeSellFromTrade($ticket, TicketSellRequest $request)
    {
        //autoriza el usuario
        Auth::user()->authorizeRoles('admin');
        //genera la entidad del trade
        $trade = Trade::where('ticket_id', $ticket)->first();
        //si la cant que hay menos la cantidad que vendo.
        $qty = $trade->ticket->qty - $request->input('qty');

        $fees = Fee::where('id', $request->input('fee'))->get();
        foreach ($fees as $fee) {
            if ($fee->porcentaje == null) {
                $fee = 0;
            } else {
                $fee = $fee->porcentaje;
            }
        }

        /*
         * correccion para vender en porcentaje el precio es el precio de compra
         */
        $ganancia = $this->getGainLost($request->input('porcent'), $request->input('precio'));

        if ($ganancia <= 0) {
            $comisionVenta = 0;
        } else {
            $comisionVenta = $ganancia * $fee / 100;
        }

        $sellprice = $request->input('precio') + $ganancia;

        // si cant producto vendida es menor que cant que tengo
        if ($request->input('qty') < $trade->ticket->qty) {
            $qty = $trade->ticket->qty - $request->input('qty');
            Ticket::where('id', $trade->ticket->id)->update([
                    'qty'         => $qty,
                    'marketvalue' => $sellprice,
                    'total'       => $trade->ticket->fee->amount * $qty + $trade->ticket->price * $qty,
            ]);
            //todo: agregar market value al trade con el valor de la venta.

            Trade::where('id', $trade->id)
                    ->update([
                            'market_value' => $sellprice,
                            'total'        => $sellprice,
                    ]);
        } else {
            Ticket::where('id', $trade->ticket->id)->update([
                    'status' => 'Closed',
            ]);
            Trade::where('id', $trade->id)->update([
                    'action'       => 'Buy-Sold Out',
                    'market_value' => $sellprice,
            ]);
        }

        $newticket              = new Ticket();
        $newticket->entrydate   = $request->input('fecha');
        $newticket->user_id     = $request->input('user');
        $newticket->qty         = $request->input('qty');
        $newticket->type        = $request->input('type');
        $newticket->product_id  = $request->input('product');
        $newticket->price       = $sellprice;
        $newticket->fee_id      = $request->input('fee');
        $newticket->month_id    = $request->input('month');
        $newticket->year_id     = $request->input('year');
        $newticket->strike      = $request->input('strike');
        $newticket->expdate     = $request->input('expdate');
        $newticket->action      = $request->input('action');
        $newticket->status      = $request->input('status');
        $newticket->marketvalue = $sellprice;
        $newticket->total       = $sellprice * $request->input('qty');
        $newticket->save();
        // // ======================
        //toma el ultimo tiquete creado y accedemos a el
        $ticketId            = Ticket::orderBy('id', 'desc')->first();
        $trade               = new Trade();
        $trade->user_id      = $ticketId->user_id;
        $trade->ticket_id    = $ticketId->id;
        $trade->action       = $ticketId->action;
        $trade->credit       = $ticketId->total;
        $trade->debit        = '0';
        $trade->market_value = $ticketId->price;
        $trade->profit       = $ganancia * $request->input('qty');
        $trade->total        = $ticketId->total;
        $trade->save();

        //===========Inicio transaction comision==============
        $feeticket             = new Ticket();
        $feeticket->entrydate  = $request->input('fecha');
        $feeticket->user_id    = $request->input('user');
        $feeticket->qty        = null;
        $feeticket->type       = null;
        $feeticket->product_id = null;
        $feeticket->price      = null;
        $feeticket->fee_id     = null;
        $feeticket->month_id   = null;
        $feeticket->year_id    = null;
        $feeticket->strike     = null;
        $feeticket->expdate    = null;
        $feeticket->action     = 'Sell-Out Commission Fee';
        $feeticket->status     = 'Debited';
        $feeticket->total      = $comisionVenta * $request->input('qty');
        $feeticket->save();
        // // ======================
        $feeticketId = Ticket::orderBy('id', 'desc')->first();

        $feetrade               = new Trade();
        $feetrade->user_id      = $feeticketId->user_id;
        $feetrade->ticket_id    = $feeticketId->id;
        $feetrade->action       = $feeticketId->action;
        $feetrade->credit       = '0';
        $feetrade->debit        = $comisionVenta * $request->input('qty');
        $feetrade->market_value = null;
        $feetrade->profit       = null;
        $feetrade->total        = $comisionVenta * $request->input('qty');
        $feetrade->save();

        // ========Fin transaction comision============
        return redirect()->route('ticketuser', $feetrade->user_id)->with('flash', 'Trade Ticket has been sold out!');
    }

    //sellout from tickets
    public function createSell($trade)
    {
        $trade    = Trade::findorFail($trade);
        $products = Product::all();
        $users    = User::where('name', '!=', 'Admin')->get();
        $months   = Month::all();
        $years    = Year::all();
        $fees     = Fee::all();
        $fecha    = Carbon::now();

        return view('admin.trades.createsell', compact('trade', 'products', 'users', 'months', 'years', 'fees', 'fecha'));
    }

    public function store(TradeStoreRequest $request)
    {
        $request->user()->authorizeRoles('admin');

        $ticket = new Ticket();
        if ($request->input('action') == "Broker Guaranty Payment" or $request->input('action') == "Bank Trans Fee" or $request->input('action') == "Withdrawal Funds") {
            $ticketStatus = 'Debited';
        } else {
            $ticketStatus = 'Credited';
        }
        $ticket->entrydate = $request->input('fecha');
        $ticket->user_id   = $request->input('user');
        $ticket->qty       = $request->input('qty');
        $ticket->action    = $request->input('action');
        $ticket->total     = $request->input('amount');
        $ticket->status    = $ticketStatus;
        $ticket->save();
        //=====================

        $ticketId = Ticket::orderBy('id', 'desc')->first();
        $trade    = new Trade();

        if ($ticketId->action == "Broker Guaranty Payment" or $ticketId->action == "Bank Trans Fee" or $ticketId->action == "Withdrawal Funds") {
            $trade->user_id   = $ticketId->user_id;
            $trade->ticket_id = $ticketId->id;
            $trade->action    = $ticketId->action;
            $trade->credit    = 0;
            $trade->debit     = $ticketId->total;
            $trade->total     = $ticketId->total;
        } else {
            $trade->user_id   = $ticketId->user_id;
            $trade->ticket_id = $ticketId->id;
            $trade->action    = $ticketId->action;
            $trade->credit    = $ticketId->total;
            $trade->debit     = 0;
            $trade->total     = $ticketId->total;


            $fields = ['descripcion' => $request->input('action'), 'total' => $request->input('amount')];

            // Mail::to(config('app.guard'))
            //         ->send(new ClientNewTrans($trade->user, $fields));
        }

        $trade->save();

        //        return redirect()->route('trades')->with('flash', 'Deposit has been added!');
        return redirect()->route('ticketuser', $trade->user_id)->with('flash', 'Deposit has been added!');
    }

    public function show(Trade $trade)
    {
        // $request->user()->authorizeRoles('admin');

        $trade = Trade::findOrFail($trade);
        if ($trade->action != 'Buy') {
            return view('admin.trades.funds', compact('trade'));
        }

        return view('admin.trades.show', compact('trade'));
    }

    public function sold(Trade $trade, Request $request)
    {
        $ticket = Ticket::where('id', $trade->ticket->id)
                ->update([
                        'status' => $request->input('status'),
                ]);
        $trade  = Trade::where('ticket_id', $trade->ticket->id)->update([
                'action' => $request->input('action'),
        ]);

        $fee = 0;
        // if ($request->input('fee') == 1) {
        //     $fee = 0;
        // } elseif ($request->input('fee') == 2) {
        //     $fee = 10;
        // } elseif ($request->input('fee') == 3) {
        //     $fee = 15;
        // } elseif ($request->input('fee') == 4) {
        //     $fee = 20;
        // }

        $newticket = new Ticket();

        $newticket->entrydate  = $request->input('fecha');
        $newticket->user_id    = $request->input('user');
        $newticket->qty        = $request->input('qty');
        $newticket->type       = $request->input('type');
        $newticket->product_id = $request->input('product');
        $newticket->price      = $request->input('sellprice');
        $newticket->fee_id     = $request->input('fee');
        $newticket->month_id   = $request->input('month');
        $newticket->year_id    = $request->input('year');
        $newticket->strike     = $request->input('strike');
        $newticket->expdate    = $request->input('expdate');
        $newticket->action     = 'Sold Out';
        // $newticket->action = $request->input('action');
        $newticket->status = $request->input('status');
        $newticket->total  = $request->input('sellprice') * $request->input('qty');
        $newticket->save();
        // // ======================
        $ticketId = Ticket::orderBy('id', 'desc')->first();

        $trade = new Trade([
                'ticket_id' => $ticketId->id,
                'action'    => 'Sold Out',
                'credit'    => $ticketId->total,
                'debit'     => '0',
                'total'     => $ticketId->total,
        ]);

        $trade->save();
        // =============================

        //        return redirect()->route('tickets')->with('flash', 'Trade Ticket has been sold out!');
        return redirect()->route('ticketuser', $newticket->user_id)->with('flash', 'Trade Ticket has been sold out!');
    }

    public function marketValue(Request $request)
    {
        $request->user()->authorizeRoles('admin');

        $tickets = Ticket::where('status', 'Open')->distinct()
                ->get(['id', 'product_id', 'strike', 'type', 'month_id', 'year_id', 'marketvalue'])
                ->where('product_id', '>', 0);

        $products = Ticket::distinct()
                ->select('product_id', 'strike', 'type', 'month_id', 'year_id', 'marketvalue')
                ->where('status', 'Open')
                ->get();

        foreach ($products as $product) {
            $productid = $product->product_id;
        }

        //selecionamos el producto filtrado.
        $productslist = Product::orderBy('name', 'ASC')->pluck('name', 'id');

        $strikes = Ticket::distinct()->select('strike')->where('status', 'Open')->get();

        $months = Ticket::distinct()->select('month_id')->where('status', 'Open')->get();

        //selecionamos el producto filtrado.
        $productslist = Product::pluck('name', 'id');

        $strikes = Ticket::distinct()->select('strike')->where('status', 'Open')->get();

        $months   = Ticket::distinct()->select('month_id')->where('status', 'Open')->get();
        $balance  = Trade::adminBalance();
        $equity   = Trade::adminEquity();
        $brokergu = Trade::adminBrokerGuaranty();
        $deposits = Trade::adminDeposits();

        return view('admin.trades.marketvalue', compact('tickets', 'products', 'productslist', 'balance', 'equity', 'brokergu', 'deposits'));
    }

    /*
     * @mix request esta funcion es de naturaleza post.
     */
    public function storeMarketVal(Request $request)
    {
        $request->user()->authorizeRoles('admin');

        //        la  consulta genera resp en JSON
        //        "{"id":4,"product_id":1,"strike":1333,"type":"Call","month_id":6,"year_id":1}"
        $product      = $request->get('product');
        $marketValue  = $request->get('marketval');
        $productitems = json_decode($product, true); // pasamos de json a php en arrray
        $productId    = $productitems['product_id'];
        $strike       = $productitems['strike'];
        $type         = $productitems['type'];
        $month        = $productitems['month_id'];
        $year         = $productitems['year_id'];

        // get all trades with product referance
        $gettickets = Ticket::where('action', 'Buy')->where('id', '>', 0)
                ->where('strike', $strike)->where('type', $type)
                ->where('month_id', $month)->where('year_id', $year)
                ->get();

        //cambia los valores del mercado.
        foreach ($gettickets as $ticket) {
            echo '<li>' . $ticket->id . '</li>';
            //actualiza los valores del mercado
            $trade       = Trade::where('ticket_id', $ticket->id)->update([
                // 'market_value' => $marketValue * $ticket->qty,
                'market_value' => $marketValue,
                'total'        => $marketValue * $ticket->qty,
            ]);
            $tradeTicket = Ticket::where('id', $ticket->id)->update([
                // 'marketvalue' => $marketValue * $ticket->qty,
                'marketvalue' => $marketValue,
                'total'       => $marketValue * $ticket->qty,
            ]);
        }

        return back()->with('flash', "Market Value for $ $marketValue has been apply for strike: $strike and type: $type and updated successfully!");
    }


    public function destroy($trade)
    {
        Auth::user()->authorizeRoles('admin');

        $trade = Trade::find($trade)->delete();
        return back()
                ->with('flash', 'Transaction has been deleted!. Make sure you also delete the ticket transaction');
    }
}
