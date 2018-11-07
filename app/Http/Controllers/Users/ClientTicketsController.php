<?php

namespace Tradesys\Http\Controllers\Users;

use Carbon\Carbon;
use ConsoleTVs\Charts\Facades\Charts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mail;
use Tradesys\Events\NotifyClientAfterBuy;
use Tradesys\Http\Controllers\Controller;
use Tradesys\Mail\ClientNewBuy;
use Tradesys\Ticket;
use Tradesys\Trade;
use Tradesys\User;

class ClientTicketsController extends Controller
{

    public function __construct()
    {
        return $this->middleware('auth');
        //  $request->user()->authorizeRoles('suspendido');
        //
    }

    public function index()
    {

        $hoy         = Carbon::now();
        $user        = Auth::id();
        $bal         = Trade::userBalance();
        $equity      = Trade::userEquity();
        $uguaranty   = Trade::userBrokerGuaranty();
        $depositos   = Trade::userDeposits();
        $marketValue = Trade::userMarketValue();

        // dd($marketValue);

        $ticketsall = Ticket::all();
        foreach ($ticketsall as $tic) {
            $tic;
        }
        // $tickets = auth()->user()->tickets;
        $tickets      = Ticket::statusOpen()->where('user_id', Auth::user()->id)->paginate(10);
        $closeTickets = Ticket::statusClosed()->where('user_id', Auth::user()->id)->where('action', 'sold out')->paginate(10);
        $total        = 0;
        $product      = '';
        $date         = Carbon::now();

        $options = [
            'Gold'              => Ticket::statusOpen()->where('user_id', Auth::user()->id)->whereIn('product_id', [1])->sum('total'),
            'Silver'            => Ticket::statusOpen()->where('user_id', Auth::user()->id)->whereIn('product_id', [2])->sum('total'),
            'Palladium'         => Ticket::statusOpen()->where('user_id', Auth::user()->id)->whereIn('product_id', [3])->sum('total'),
            'Platinium'         => Ticket::statusOpen()->where('user_id', Auth::user()->id)->whereIn('product_id', [4])->sum('total'),
            'Crude Oil'         => Ticket::statusOpen()->where('user_id', Auth::user()->id)->whereIn('product_id', [5])->sum('total'),
            'Gasoline'          => Ticket::statusOpen()->where('user_id', Auth::user()->id)->whereIn('product_id', [6])->sum('total'),
            'Cotton'            => Ticket::statusOpen()->where('user_id', Auth::user()->id)->whereIn('product_id', [7])->sum('total'),
            'Heating Oil'       => Ticket::statusOpen()->where('user_id', Auth::user()->id)->whereIn('product_id', [8])->sum('total'),
            'Natural Gas'       => Ticket::statusOpen()->where('user_id', Auth::user()->id)->whereIn('product_id', [9])->sum('total'),
            'Dollar Index'      => Ticket::statusOpen()->where('user_id', Auth::user()->id)->whereIn('product_id', [10])->sum('total'),
            'Euro'              => Ticket::statusOpen()->where('user_id', Auth::user()->id)->whereIn('product_id', [11])->sum('total'),
            'Yen'               => Ticket::statusOpen()->where('user_id', Auth::user()->id)->whereIn('product_id', [12])->sum('total'),
            'Australian Dollar' => Ticket::statusOpen()->where('user_id', Auth::user()->id)->whereIn('product_id', [13])->sum('total'),
            'Bitcoin'           => Ticket::statusOpen()->where('user_id', Auth::user()->id)->whereIn('product_id', [49])->sum('total'),
        ];
        //graficos Options
        $options = Charts::create('bar', 'highcharts')
            ->title('Resumen Posiciones Abiertas')

            ->colors(['lightblue', 'Silver', 'Gold', 'red', 'black', 'brown', 'yellow', 'purple', 'green', 'gray', 'pink', 'darkgreen', 'orange'])
            ->labels(['Gold', 'Silver', 'Palladium', 'Platinium', 'Crude Oil', 'Gasoline', 'Cotton', 'Heating Oil', 'Natural Gas', 'Dollar Index', 'Euro', 'Bitcoin'])

            ->values([
                $options['Gold'], $options['Silver'], $options['Palladium'],
                $options['Platinium'], $options['Crude Oil'], $options['Gasoline'], $options['Cotton'], $options['Heating Oil'],
                $options['Natural Gas'], $options['Dollar Index'], $options['Euro'], $options['Bitcoin'],
            ])
            ->dimensions(0, 350);

        return view('users.tickets.index', compact('tickets', 'hoy', 'closeTickets', 'total', 'options', 'bal', 'equity', 'uguaranty', 'depositos', 'marketValue'));
    }

    public function closedTickets()
    {

        $bal          = Trade::userBalance();
        $equity       = Trade::userEquity();
        $uguaranty    = Trade::userBrokerGuaranty();
        $depositos    = Trade::userDeposits();
        $marketValue  = Trade::userMarketValue();
        $closeTickets = Ticket::statusClosed()
            ->where('user_id', Auth::user()
                    ->id)->where('action', 'Sold Out')
            ->paginate(10);

        return view('users.tickets.closed', compact('bal', 'equity', 'uguaranty', 'depositos', 'closeTickets', 'marketValue'));
    }

    public function purchase()
    {

        $bal         = Trade::userBalance();
        $equity      = Trade::userEquity();
        $uguaranty   = Trade::userBrokerGuaranty();
        $depositos   = Trade::userDeposits();
        $marketValue = Trade::userMarketValue();

        return view('users.tickets.buy', compact('bal', 'equity', 'uguaranty', 'depositos', 'marketValue'));
    }

    /**
     * @param Request $request
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function userpurchase(Request $request)
    {

        $this->validate(request(), [
            'cantidad' => 'required',
            'tipo'     => 'required',
            'producto' => 'required',
        ]);
        $fields = [
            'cantidad' => request('cantidad'),
            'producto' => request('producto'),
            'tipo'     => request('tipo'),
        ];

        Mail::to('clients@mycgo.net')
            ->send(new ClientNewBuy(Auth::user(), $fields));

        event(new NotifyClientAfterBuy(Auth::user()));

        return redirect()->route('usertickets')
            ->with('flash', 'Su transacción fue enviada con éxito y será procesada en las próximas horas. La confirmación de orden ha sido enviada a su correo.');
    }

}
