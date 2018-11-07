<?php

namespace Tradesys\Http\Controllers;

use ConsoleTVs\Charts\Facades\Charts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Tradesys\Exchange;
use Tradesys\Ticket;
use Tradesys\Trade;
use Tradesys\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->user()->authorizeRoles(['user', 'admin']);  //'admin'
        $totalcerrado  = 0;
        $abierto       = 0;
        $opentickets   = Ticket::where('user_id', Auth::user()->id)->where('status', '=', 'Open')->sum('total');
        $closedtickets = Ticket::where('user_id', Auth::user()->id)->where('status', '=', 'Closed')->sum('total');
        $trades        = Exchange::statusOpen()->where('user_id', Auth::id())->get();

        foreach ($trades as $trade) {
            $product = $trade->product->name;
            $amount  = $trade->total;
        }
        $options = [
            'Gold'              => Ticket::where('user_id', Auth::user()->id)->where('status', '=', 'Open')->whereIn('product_id', [1])->sum('total'),
            'Silver'            => Ticket::where('user_id', Auth::user()->id)->where('status', '=', 'Open')->whereIn('product_id', [2])->sum('total'),
            'Palladium'         => Ticket::where('user_id', Auth::user()->id)->where('status', '=', 'Open')->whereIn('product_id', [3])->sum('total'),
            'Platinium'         => Ticket::where('user_id', Auth::user()->id)->where('status', '=', 'Open')->whereIn('product_id', [4])->sum('total'),
            'Crude Oil'         => Ticket::where('user_id', Auth::user()->id)->where('status', '=', 'Open')->whereIn('product_id', [5])->sum('total'),
            'Gasoline'          => Ticket::where('user_id', Auth::user()->id)->where('status', '=', 'Open')->whereIn('product_id', [6])->sum('total'),
            'Cotton'            => Ticket::where('user_id', Auth::user()->id)->where('status', '=', 'Open')->whereIn('product_id', [7])->sum('total'),
            'Heating Oil'       => Ticket::where('user_id', Auth::user()->id)->where('status', '=', 'Open')->whereIn('product_id', [8])->sum('total'),
            'Natural Gas'       => Ticket::where('user_id', Auth::user()->id)->where('status', '=', 'Open')->whereIn('product_id', [9])->sum('total'),
            'Dollar Index'      => Ticket::where('user_id', Auth::user()->id)->where('status', '=', 'Open')->whereIn('product_id', [10])->sum('total'),
            'Euro'              => Ticket::where('user_id', Auth::user()->id)->where('status', '=', 'Open')->whereIn('product_id', [11])->sum('total'),
            'Yen'               => Ticket::where('user_id', Auth::user()->id)->where('status', '=', 'Open')->whereIn('product_id', [12])->sum('total'),
            'Australian Dollar' => Ticket::where('user_id', Auth::user()->id)->where('status', '=', 'Open')->whereIn('product_id', [13])->sum('total'),
            'Bitcoin'           => Ticket::where('user_id', Auth::user()->id)->where('status', '=', 'Open')->whereIn('product_id', [49])->sum('total'),
        ];

        $monedas = [
            'Bitcoin'          => Exchange::where('user_id', Auth::user()->id)->whereIn('product_id', [40])->sum('total'),
            'Ethereum'         => Exchange::where('user_id', Auth::user()->id)->whereIn('product_id', [41])->sum('total'),
            'Ripple'           => Exchange::where('user_id', Auth::user()->id)->whereIn('product_id', [42])->sum('total'),
            'Bitcoin Cash'     => Exchange::where('user_id', Auth::user()->id)->whereIn('product_id', [43])->sum('total'),
            'Litecoin'         => Exchange::where('user_id', Auth::user()->id)->whereIn('product_id', [44])->sum('total'),
            'Cardano'          => Exchange::where('user_id', Auth::user()->id)->whereIn('product_id', [45])->sum('total'),
            'Monero'           => Exchange::where('user_id', Auth::user()->id)->whereIn('product_id', [46])->sum('total'),
            'Dash'             => Exchange::where('user_id', Auth::user()->id)->whereIn('product_id', [47])->sum('total'),
            'Ethereum Classic' => Exchange::where('user_id', Auth::user()->id)->whereIn('product_id', [48])->sum('total'),
        ];

        //graficos Options
        $options = Charts::create('line', 'highcharts')
        ->title('Summary Open Positions')
        ->colors(['lightblue', 'pink', 'blue', 'red', 'purple', 'brown', 'yellow', 'green', 'silver', 'black', 'gray'])
        ->labels(['Gold', 'Silver', 'Palladium', 'Platinium', 'Crude Oil', 'Gasoline', 'Cotton', 'Heating Oil', 'Natural Gas', 'Dollar Index', 'Bitcoin'])
        ->values([
            $options['Gold'], $options['Silver'], $options['Palladium'],
            $options['Platinium'], $options['Crude Oil'], $options['Gasoline'], $options['Cotton'], $options['Heating Oil'],
            $options['Natural Gas'], $options['Dollar Index'], $options['Bitcoin']
        ])
        ->dimensions(0, 350);

        //graficos opt positions
        $chart = Charts::create('pie', 'highcharts')
        ->title('Summary open positions vs closed positions')
        ->colors(['lightblue', 'orange'])

        ->labels(['Closed', 'Open'])
        ->values([$closedtickets, $opentickets])
        ->dimensions(0, 350);

        //grafico monedas
        $charty = Charts::create('bar', 'highcharts')
        ->title('Summary Crypto Exchange')
        ->colors(['lightblue', 'pink', 'orange', 'red', 'purple', 'brown', 'yellow', 'green', 'silver'])
        ->labels(['Bitcoin', 'Ethereum', 'Ripple', 'Bitcoin Cash', 'Litecoin', 'Cardano', 'Monero', 'Dash', 'Ethereum Classic'])
        ->values([
            $monedas['Bitcoin'], $monedas['Ethereum'], $monedas['Ripple'],
            $monedas['Bitcoin Cash'], $monedas['Litecoin'], $monedas['Cardano'], $monedas['Monero'],
            $monedas['Dash'], $monedas['Ethereum Classic']
        ])
        ->dimensions(0, 350);

        $bal       = Trade::userBalance();
        $equity    = Trade::userEquity();
        $uguaranty = Trade::userBrokerGuaranty();
        $depositos = Trade::userDeposits();


        return view('users.index', compact('options', 'chart', 'charty', 'bal', 'equity', 'uguaranty', 'depositos'));
    }
}
