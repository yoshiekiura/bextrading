<?php

namespace Tradesys\Http\Controllers\Admin;

use Carbon\Carbon;
use ConsoleTVs\Charts\Facades\Charts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Tradesys\Category;
use Tradesys\Exchange;
use Tradesys\Fee;
use Tradesys\Http\Controllers\Controller;
use Tradesys\Http\Requests\ExchangeStoreRequest;
use Tradesys\Http\Requests\ExchangeUpdateRequest;
use Tradesys\Product;
use Tradesys\Trade;
use Tradesys\User;

class ExchangeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function index(Request $request)
    {
        $request->user()->authorizeRoles('admin');

        // saca la categoria de cryptomoneda
        $category = Category::orderBy('name', 'ASC')->where('id', 2)->get();
        $users    = User::where('name', '!=', 'Admin')->get();

        foreach ($category as $key) {
            $categoryId = $key->id;
        }

        //genera los productos que pertenecen a la cryptomoneda
        $products = Product::all()->where('category_id', $categoryId);
        foreach ($products as $product) {
            $pid = $product->id;
        }
        // suma la totalidad de monedas para el admin
        $suma = $this->sumAllCoins();

        $trades  = Exchange::statusOpen()->orderBy('id', 'ASC')->paginate(5);
        $ctrades = Exchange::statusClosed()->orderBy('id', 'ASC')->paginate(5);

        $monedas = [
            'Bitcoin'          => Exchange::whereIn('product_id', [40])->sum('qty'),
            'Ethereum'         => Exchange::whereIn('product_id', [41])->sum('qty'),
            'Ripple'           => Exchange::whereIn('product_id', [42])->sum('qty'),
            'Bitcoin Cash'     => Exchange::whereIn('product_id', [43])->sum('qty'),
            'Litecoin'         => Exchange::whereIn('product_id', [44])->sum('qty'),
            'Cardano'          => Exchange::whereIn('product_id', [45])->sum('qty'),
            'Monero'           => Exchange::whereIn('product_id', [46])->sum('qty'),
            'Dash'             => Exchange::whereIn('product_id', [47])->sum('qty'),
            'Ethereum Classic' => Exchange::whereIn('product_id', [48])->sum('qty'),
        ];

        $charty = Charts::create('bar', 'highcharts')
            ->title('Posiciones de Criptomonedas')
            ->colors(['blue', 'pink', 'orange', 'red', 'purple', 'brown', 'yellow', 'green', 'black', 'gray'])
            ->labels(['Bitcoin', 'Ethereum', 'Ripple', 'Bitcoin Cash', 'Litecoin', 'Cardano', 'Monero', 'Dash', 'Ethereum Classic'])
            ->values([
                $monedas['Bitcoin'], $monedas['Ethereum'], $monedas['Ripple'],
                $monedas['Bitcoin Cash'], $monedas['Litecoin'], $monedas['Cardano'], $monedas['Monero'],
                $monedas['Dash'], $monedas['Ethereum Classic'],
            ])
            ->dimensions(0, 400);
        $fecha    = Carbon::now();
        $balance  = Trade::adminBalance();
        $equity   = Trade::adminEquity();
        $brokergu = Trade::adminBrokerGuaranty();
        $deposits = Trade::adminDeposits();

        return view('admin.exchange.index', compact('products', 'fecha', 'ctrades', 'monedas', 'users', 'trades', 'suma', 'charty', 'users', 'balance', 'equity', 'brokergu', 'deposits'));
    }

    public function highchart(Request $request)
    {
        $request->user()->authorizeRoles('admin');

        $viewer = View::select(DB::raw("SUM(numberofview) as count"))
            ->orderBy("created_at")
            ->groupBy(DB::raw("year(created_at)"))
            ->get()->toArray();
        $viewer = array_column($viewer, 'count');

        $click = Click::select(DB::raw("SUM(numberofclick) as count"))
            ->orderBy("created_at")
            ->groupBy(DB::raw("year(created_at)"))
            ->get()->toArray();
        $click = array_column($click, 'count');
        return view('highchart')
            ->with('viewer', json_encode($viewer, JSON_NUMERIC_CHECK))
            ->with('click', json_encode($click, JSON_NUMERIC_CHECK));
    }

    /*
     * retorna la suma total de todas las monedas para el admin.
     */

    public function sumAllCoins()
    {
        $monedas = [
            'Bitcoin'          => Exchange::whereIn('product_id', [40])->sum('qty'),
            'Ethereum'         => Exchange::whereIn('product_id', [41])->sum('qty'),
            'Ripple'           => Exchange::whereIn('product_id', [42])->sum('qty'),
            'Bitcoin Cash'     => Exchange::whereIn('product_id', [43])->sum('qty'),
            'Litecoin'         => Exchange::whereIn('product_id', [44])->sum('qty'),
            'Cardano'          => Exchange::whereIn('product_id', [45])->sum('qty'),
            'Monero'           => Exchange::whereIn('product_id', [46])->sum('qty'),
            'Dash'             => Exchange::whereIn('product_id', [47])->sum('qty'),
            'Ethereum Classic' => Exchange::whereIn('product_id', [48])->sum('qty'),
        ];

        return $monedas;
    }

    //Array que suma el total de cada moneda por cliente.
    public function sumCoinsUser($userId)
    {
        $coins = [
            'Bitcoin'          => Exchange::whereIn('product_id', [40])->where('user_id', $userId)->sum('qty'),
            'Ethereum'         => Exchange::whereIn('product_id', [41])->where('user_id', $userId)->sum('qty'),
            'Ripple'           => Exchange::whereIn('product_id', [42])->where('user_id', $userId)->sum('qty'),
            'Bitcoin Cash'     => Exchange::whereIn('product_id', [43])->where('user_id', $userId)->sum('qty'),
            'Litecoin'         => Exchange::whereIn('product_id', [44])->where('user_id', $userId)->sum('qty'),
            'Cardano'          => Exchange::whereIn('product_id', [45])->where('user_id', $userId)->sum('qty'),
            'Monero'           => Exchange::whereIn('product_id', [46])->where('user_id', $userId)->sum('qty'),
            'Dash'             => Exchange::whereIn('product_id', [47])->where('user_id', $userId)->sum('qty'),
            'Ethereum Classic' => Exchange::whereIn('product_id', [48])->where('user_id', $userId)->sum('qty'),
        ];

        return $coins;
    }

    public function create(Request $request)
    {
        $request->user()->authorizeRoles('admin');

        $users    = User::orderBy('name', 'ASC')->where('name', '!=', 'Admin')->get();
        $fees     = Fee::orderBy('porcentaje', 'ASC')->get();
        $fecha    = Carbon::now();
        $category = Category::where('id', 2)->get();
        foreach ($category as $key) {
            $categoryId = $key->id;
        }

        $products = Product::orderBy('name', 'ASC')->where('category_id', $categoryId)->get();

        $balance  = Trade::adminBalance();
        $equity   = Trade::adminEquity();
        $brokergu = Trade::adminBrokerGuaranty();
        $deposits = Trade::adminDeposits();

        return view('admin.exchange.create', compact('category', 'products', 'fecha', 'users', 'fees', 'balance', 'equity', 'brokergu', 'deposits'));
    }

    /*
     * funcion guarda el tickete de crear en la tabla exchanges y luego
     * guarda parte de esos datos en la tabla trades.
     */

    public function store(ExchangeStoreRequest $request)
    {
        $request->user()->authorizeRoles('admin');

        $formula     = $request->get('amount'); // cantidad cash del cliente
        $comision    = $request->get('amount') * $request->get('fee') / 100; // comision %
        $totalcompra = $formula - $comision; //total cash - comision.

        $exchange             = new Exchange();
        $exchange->entry      = $request->input('fecha');
        $exchange->user_id    = $request->input('user');
        $exchange->product_id = $request->input('product');
        $exchange->action     = $request->input('action');
        $exchange->qty        = $totalcompra / $request->input('exchange');
        $exchange->total      = $totalcompra;
        $exchange->amount     = $request->input('amount');
        $exchange->fee        = $request->input('fee');
        $exchange->rate       = $request->input('exchange');
        $exchange->status     = $request->input('status');

        $exchange->save();

        //==============
        $exchangeId = Exchange::orderBy('id', 'desc')->first();

        $trade               = new Trade();
        $trade->user_id      = $request->input('user');
        $trade->exchange_id  = $exchangeId->id;
        $trade->action       = $exchangeId->action;
        $trade->credit       = '0';
        $trade->debit        = $exchangeId->amount;
        $trade->market_value = $exchangeId->exchange;
        $trade->total        = $exchangeId->total;
        $trade->save();

        return redirect()->route('exchange')->with('flash', 'Trade has been created!');

    }

    public function edit($exchange)
    {
        Auth::user()->authorizeRoles('admin');
        $exchange = Exchange::find($exchange);

//        dd($exchange);
        $fecha    = Carbon::now();
        $users    = User::where('name', '!=', 'Admin')->get();
        $products = Product::all();
        $balance  = Trade::adminBalance();
        $equity   = Trade::adminEquity();
        $brokergu = Trade::adminBrokerGuaranty();
        $deposits = Trade::adminDeposits();

        return view('admin.exchange.edit', compact('exchange', 'fecha', 'users', 'products', 'balance', 'equity', 'brokergu', 'deposits'));
    }

    /*
     * Actualiza los datos de la tabla exchange y la tabla trade
     */
    public function update(ExchangeUpdateRequest $request, Exchange $exchange)
    {
        $request->user()->authorizeRoles('admin');

        $exchange->entry      = $request->input('fecha');
        $exchange->user_id    = $request->input('user');
        $exchange->product_id = $request->input('product');
        $exchange->action     = $request->input('action');
        $exchange->qty        = $request->input('amount') / $request->input('exchange');
        $exchange->total      = $request->input('amount') / $request->input('exchange');
        $exchange->amount     = $request->input('amount');
        $exchange->rate       = $request->input('exchange');
        $exchange->status     = $request->input('status');
        $exchange->save();
        //===========================================
        $exchangeId = Exchange::orderBy('id', 'desc')->first(); //ultimo exchange ticket ID NUMBER
        // $exchange = Exchange::findOrFail($exchangeId->id);
        $tradet               = Trade::find($exchangeId->id);
        $tradet->user_id      = $request->input('user');
        $tradet->exchange_id  = $exchangeId->id;
        $tradet->action       = $exchangeId->action;
        $tradet->credit       = '0';
        $tradet->debit        = $exchangeId->amount;
        $tradet->market_value = $exchangeId->exchange;
        $tradet->total        = $exchangeId->total;
        $tradet->save();

        return redirect()->route('exchange')->with('flash', 'Exchange has been updated!');
    }

    public function createSellExchange(Exchange $exchange, Request $request)
    {
        $request->user()->authorizeRoles('admin');

        $exchange = Exchange::find($exchange);
        //$coins saca le valor de monedas x usuario.
        $coins    = $this->sumCoinsUser($exchange->user->id);
        $fecha    = Carbon::now();
        $users    = User::where('name', '!=', 'Admin')->get();
        $products = Product::all();

        return view('admin.exchange.sellout', compact('exchange', 'fecha', 'users', 'products', 'coins'));

    }

    /*
     *genera el detalle de cada cliente con las monedas para las ventas en el exchange
     */
    public function getUserExchange(Request $request)
    {
//        $request->user()->authorizeRoles('admin');
        Auth::user()->authorizeRoles('admin');

        $this->validate($request, [
            'user' => 'required',
        ]);
        $user     = $request->input('user'); //num de user_id = 4
        $client   = User::find($user);
        $products = Product::distinct()->where('id', '>', 39)->get();
        // $products = Product::where('category_id','Crypto Currency')->get();
        $exchanges = Exchange::distinct()->select('product_id')->where('status', 'Open')->get();
        $coins     = $this->sumCoinsUser($user);
        $fees      = Fee::all();

        return view('admin.exchange.selluser', compact('coins', 'user', 'client', 'exchanges', 'products', 'fees'));
    }

    public function sellCoinUser(Request $request, User $user)
    {
        $request->user()->authorizeRoles('admin');

        $request->validate([
            'fecha'   => 'required|date',
            'product' => 'required',
            'qty'     => 'required',
            'rate'    => 'required',
            'fee'     => 'required',
        ]);
        $pid      = $request->input('product');
        $user     = $request->input('user');
        $qty      = $request->input('qty');
        $fee      = $request->get('fee');
        $formula  = $request->get('rate') * $request->get('qty');
        $comision = $request->get('fee') * $formula / 100;
        $extotal  = $formula - $comision;
        $product  = Product::find($pid);
        //suma toda la cantida del producto para vender
        $totalcurrency = Exchange::all()->where('product_id', $product->id)->where('user_id', $user)->sum('qty');

        if ($qty < $totalcurrency) {
            $exchange             = new Exchange();
            $exchange->entry      = $request->get('fecha');
            $exchange->user_id    = $request->get('user');
            $exchange->product_id = $request->get('product');
            $exchange->action     = "Sell Out";
            $exchange->qty        = -$qty;
            $exchange->total      = $extotal;
            $exchange->fee        = $request->get('fee');
            $exchange->amount     = $request->get('rate') * $request->get('qty'); //formula 1000 *0.5 = 5000
            $exchange->rate       = $request->get('rate');
            $exchange->status     = "Closed";
            $exchange->save();
            //========================================
            $exchangeId           = Exchange::orderBy('id', 'desc')->first(); //ultimo exchange ticket ID NUMBER
            $tradex               = new Trade();
            $tradex->user_id      = $request->input('user');
            $tradex->exchange_id  = $exchangeId->id;
            $tradex->action       = $exchangeId->action;
            $tradex->credit       = $extotal;
            $tradex->debit        = 0;
            $tradex->market_value = $exchangeId->rate;
            $tradex->total        = $exchangeId->total;
            $tradex->save();
        } else {
            return redirect()->route('exchange')->with('error', 'Quantity must be minor of current user quantity');
        }
        return redirect()->route('exchange')->with('flash', 'Trade Exchange has been sold out succesfully!');
    }

    public function destroy(Exchange $exchange, Request $request)
    {
        $request->user()->authorizeRoles('admin');
        $exchange = Exchange::find($exchange)->delete();
        return back()->with('flash', 'Transaction has been deleted!.');
    }
}
