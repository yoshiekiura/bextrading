<?php

namespace Tradesys\Http\Controllers\Users;

use Carbon\Carbon;
use ConsoleTVs\Charts\Facades\Charts;
use Illuminate\Support\Facades\Auth;
use Tradesys\Exchange;
use Tradesys\Http\Controllers\Controller;
use Tradesys\Trade;

class ClientExchangeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $userId  = Auth::user()->id;
        $tickets = Exchange::StatusOpen()->where('user_id', $userId)->paginate(10);
        $product = '';
        $date    = Carbon::now();
        foreach ($tickets as $tic) {
            $cant = $tic->qty;
            $pro  = $tic->product_id;
        }

        $suma = Exchange::sumaCurrency()->get();

        $sumabit = 0;
        foreach ($suma as $valor) {
            $sumabit += $valor->qty;
        }

        $monedas = [

            'Bitcoin'          => Exchange::where('user_id', Auth::user()->id)->whereIn('product_id', [40])->sum('qty'),
            'Ethereum'         => Exchange::where('user_id', Auth::user()->id)->whereIn('product_id', [41])->sum('qty'),
            'Ripple'           => Exchange::where('user_id', Auth::user()->id)->whereIn('product_id', [42])->sum('qty'),
            'Bitcoin Cash'     => Exchange::where('user_id', Auth::user()->id)->whereIn('product_id', [43])->sum('qty'),
            'Litecoin'         => Exchange::where('user_id', Auth::user()->id)->whereIn('product_id', [44])->sum('qty'),
            'Cardano'          => Exchange::where('user_id', Auth::user()->id)->whereIn('product_id', [45])->sum('qty'),
            'Monero'           => Exchange::where('user_id', Auth::user()->id)->whereIn('product_id', [46])->sum('qty'),
            'Dash'             => Exchange::where('user_id', Auth::user()->id)->whereIn('product_id', [47])->sum('qty'),
            'Ethereum Classic' => Exchange::where('user_id', Auth::user()->id)->whereIn('product_id', [48])->sum('qty'),
        ];

        $charty = Charts::create('area', 'highcharts')
            ->title('Resumen Gráfico Criptomonedas')
            ->colors(['lightblue', 'pink', 'orange', 'red', 'purple', 'brown', 'yellow', 'green', 'silver'])
            ->labels(['Bitcoin', 'Ethereum', 'Ripple', 'Bitcoin Cash', 'Litecoin', 'Cardano', 'Monero', 'Dash', 'Ethereum Classic'])
            ->values([
                $monedas['Bitcoin'], $monedas['Ethereum'], $monedas['Ripple'],
                $monedas['Bitcoin Cash'], $monedas['Litecoin'], $monedas['Cardano'], $monedas['Monero'],
                $monedas['Dash'], $monedas['Ethereum Classic'],
            ])
            ->dimensions(0, 350);
        $suma = $this->sumAllCoins();

        $bal       = Trade::userBalance();
        $equity    = Trade::userEquity();
        $uguaranty = Trade::userBrokerGuaranty();
        $depositos = Trade::userDeposits();
        $marketValue = Trade::userMarketValue();
        $hoy       = Carbon::now();

        return view('users.exchange.index', compact('tickets', 'bal', 'equity', 'date', 'hoy', 'uguaranty', 'depositos', 'sumabit', 'suma', 'charty','marketValue'));
    }

    public function sumAllCoins()
    {
        $monedas = [
            'Bitcoin'          => Exchange::where('user_id', Auth::user()->id)->whereIn('product_id', [40])->sum('qty'),
            'Ethereum'         => Exchange::where('user_id', Auth::user()->id)->whereIn('product_id', [41])->sum('qty'),
            'Ripple'           => Exchange::where('user_id', Auth::user()->id)->whereIn('product_id', [42])->sum('qty'),
            'Bitcoin Cash'     => Exchange::where('user_id', Auth::user()->id)->whereIn('product_id', [43])->sum('qty'),
            'Litecoin'         => Exchange::where('user_id', Auth::user()->id)->whereIn('product_id', [44])->sum('qty'),
            'Cardano'          => Exchange::where('user_id', Auth::user()->id)->whereIn('product_id', [45])->sum('qty'),
            'Monero'           => Exchange::where('user_id', Auth::user()->id)->whereIn('product_id', [46])->sum('qty'),
            'Dash'             => Exchange::where('user_id', Auth::user()->id)->whereIn('product_id', [47])->sum('qty'),
            'Ethereum Classic' => Exchange::where('user_id', Auth::user()->id)->whereIn('product_id', [48])->sum('qty'),
        ];

        return $monedas;
    }
}
