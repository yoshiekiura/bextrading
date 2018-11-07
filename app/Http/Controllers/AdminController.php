<?php

namespace Tradesys\Http\Controllers;

use Carbon\Carbon;
use ConsoleTVs\Charts\Facades\Charts;
use Illuminate\Http\Request;
use Tradesys\Exchange;
use Tradesys\Ticket;
use Tradesys\Trade;
use Tradesys\User;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->user()->authorizeRoles('admin');

        $totalcerrado  = 0;
        $abierto       = 0;
        $opentickets   = Ticket::where('status', '=', 'Open')->sum('total');
        $closedtickets = Ticket::where('status', '=', 'Closed')->sum('total');
        $hoy           = Carbon::now();
        $trades        = Exchange::statusOpen()->get();

        foreach ($trades as $trade) {
            $product = $trade->product->name;
            $amount  = $trade->total;
        }
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
            'Bitcoin'           => Ticket::where('status', '=', 'Open')->whereIn('product_id', [49])->sum('total'),
        ];

        $monedas = [
            'Bitcoin'          => Exchange::whereIn('product_id', [40])->sum('total'),
            'Ethereum'         => Exchange::whereIn('product_id', [41])->sum('total'),
            'Ripple'           => Exchange::whereIn('product_id', [42])->sum('total'),
            'Bitcoin Cash'     => Exchange::whereIn('product_id', [43])->sum('total'),
            'Litecoin'         => Exchange::whereIn('product_id', [44])->sum('total'),
            'Cardano'          => Exchange::whereIn('product_id', [45])->sum('total'),
            'Monero'           => Exchange::whereIn('product_id', [46])->sum('total'),
            'Dash'             => Exchange::whereIn('product_id', [47])->sum('total'),
            'Ethereum Classic' => Exchange::whereIn('product_id', [48])->sum('total'),
        ];

        //graficos Options
        $open = Charts::create('bar', 'highcharts')
            ->title('Open products')
            ->colors(['orange', 'pink', 'blue', 'red', 'purple', 'brown', 'yellow', 'green', 'black'])
            ->labels(['Gold', 'Silver', 'Palladium', 'Platinium', 'Crude Oil', 'Gasoline', 'Cotton', 'Heating Oil', 'Natural Gas', 'Dollar Index', 'Bitcoin'])
            ->values([
                $options['Gold'], $options['Silver'], $options['Palladium'],
                $options['Platinium'], $options['Crude Oil'], $options['Gasoline'], $options['Cotton'], $options['Heating Oil'],
                $options['Natural Gas'], $options['Dollar Index'], $options['Bitcoin'],
            ])
            ->dimensions(0, 350);

        //graficos opt positions
        $chart = Charts::create('pie', 'highcharts')
            ->title('Summary open positions vs closed positions')
            ->colors(['blue', 'orange'])
            ->labels(['Closed', 'Open'])
            ->values([$closedtickets, $opentickets])
            ->dimensions(0, 350);

        //grafico monedas
        $charty = Charts::create('bar', 'highcharts')
            ->title('Summary Crypto Exchange')
            ->colors(['blue', 'pink', 'orange', 'red', 'purple', 'brown', 'yellow', 'green', 'silver'])
            ->labels(['Bitcoin', 'Ethereum', 'Ripple', 'Bitcoin Cash', 'Litecoin', 'Cardano', 'Monero', 'Dash', 'Ethereum Classic'])
            ->values([
                $monedas['Bitcoin'], $monedas['Ethereum'], $monedas['Ripple'],
                $monedas['Bitcoin Cash'], $monedas['Litecoin'], $monedas['Cardano'], $monedas['Monero'],
                $monedas['Dash'], $monedas['Ethereum Classic'],
            ])
            ->dimensions(0, 400);
        // $users    = User::where('name', '!=', 'Admin')->get();
        $usersall = Charts::database(User::where('name', '!=', 'Admin')->get(), 'bar', 'highcharts')
            ->title('Register Clients')
            ->elementLabel("Total")
            ->dimensions(0, 350)
            ->responsive(false)
            ->lastByMonth();

        $geo = Charts::create('geo', 'highcharts')
            ->title('Users Location')
            ->elementLabel('Location')
            ->labels(['ES', 'MX', 'RU', 'CR', 'PE', 'CO', 'PA', 'CH', 'GU', 'EC', 'BO'])
            ->colors(['#C5CAE9', '#283593'])
            ->values([5, 10, 20, 40, 5, 3, 7])
            ->dimensions(0, 350)
            ->responsive(false);

        $balance  = Trade::adminBalance();
        $equity   = Trade::adminEquity();
        $brokergu = Trade::adminBrokerGuaranty();
        $deposits = Trade::adminDeposits();

        return view('admin', compact('open', 'chart', 'charty', 'hoy', 'usersall', 'geo', 'balance', 'equity', 'brokergu', 'deposits'));
    }

    public function indexAdmin(Request $request)
    {
        $request->user()->authorizeRoles('admin');

        return view('admin');
    }
}
