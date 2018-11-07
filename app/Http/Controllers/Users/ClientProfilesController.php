<?php

namespace Tradesys\Http\Controllers\Users;

use Carbon\Carbon;
use ConsoleTVs\Charts\Facades\Charts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Tradesys\Exchange;
use Tradesys\Http\Controllers\Controller;
use Tradesys\Http\Requests\ClientWithdrawFormRequest;
use Tradesys\Mail\ClientWithdrawalForm;
use Tradesys\Ticket;
use Tradesys\Trade;
use Tradesys\User;

class ClientProfilesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = User::where('id', Auth::user()->id)->first();

        $opentickets   = Ticket::where('user_id', Auth::user()->id)->where('status', '=', 'Open')->sum('total');
        $closedtickets = Ticket::where('user_id', Auth::user()->id)->where('status', '=', 'Closed')->sum('total');

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
        $options = Charts::create('area', 'highcharts')
            ->title('Open positions summary')
            ->colors(['lightblue', 'pink', 'blue', 'red', 'purple', 'brown', 'yellow', 'green', 'silver', 'black', 'yellow'])
            ->labels(['Gold', 'Silver', 'Palladium', 'Platinium', 'Crude Oil', 'Gasoline', 'Cotton', 'Heating Oil', 'Natural Gas', 'Dollar Index', 'Bitcoin'])
            ->values([
                $options['Gold'], $options['Silver'], $options['Palladium'],
                $options['Platinium'], $options['Crude Oil'], $options['Gasoline'], $options['Cotton'], $options['Heating Oil'], $options['Natural Gas'], $options['Dollar Index'], $options['Bitcoin'],
            ])
            ->dimensions(0, 350);

        //graficos opt positions
        $chart = Charts::create('area', 'highcharts')
            ->title('Resumen Posiciones Abiertas vs Cerradas')
            ->colors(['lightblue', 'orange'])
            ->labels(['Closed', 'Open'])
            ->values([$closedtickets, $opentickets])
            ->dimensions(0, 350);

        //grafico monedas
        $charty = Charts::create('bar', 'highcharts')
            ->title('Resumen Criptodivisas')
            ->colors(['lightblue', 'pink', 'orange', 'red', 'purple', 'brown', 'yellow', 'green'])
            ->labels(['Bitcoin', 'Ethereum', 'Ripple', 'Bitcoin Cash', 'Litecoin', 'Cardano', 'Monero', 'Dash', 'Ethereum Classic'])
            ->values([
                $monedas['Bitcoin'], $monedas['Ethereum'], $monedas['Ripple'],
                $monedas['Bitcoin Cash'], $monedas['Litecoin'], $monedas['Cardano'], $monedas['Monero'],
                $monedas['Dash'], $monedas['Ethereum Classic'],
            ])
            ->dimensions(0, 350);

        return view('users.profile.index', compact('user', 'options', 'chart', 'charty'));
    }

    public function configuser()
    {
        return view('users.profile.settings');
    }

    public function update(Request $request, User $user)
    {
        $user->update($request->all());

        return redirect()->route('userconfig');
    }

    public function withdraw()
    {
        $hora        = Carbon::now();
        $IPnumber    = getenv("REMOTE_ADDR"); //IP
        $bal         = Trade::userBalance();
        $equity      = Trade::userEquity();
        $uguaranty   = Trade::userBrokerGuaranty();
        $depositos   = Trade::userDeposits();
        $marketValue = Trade::userMarketValue();

        return view('users.profile.withdraw', compact('hora', 'marketValue', 'IPnumber', 'bal', 'equity', 'uguaranty', 'depositos'));
    }

    public function senwithdraw(ClientWithdrawFormRequest $request)
    {
        $uguaranty = Trade::userBrokerGuaranty();
        $bal       = Trade::userBalance();

        if ($uguaranty > 0 and $bal > $request->get('amount')) {
            return back()->with('error', "Su cuenta tiene una deuda por broker guaranty por $ $uguaranty. Antes de hacer un retiro debe cancelar su deuda.Favor comuniquese con su agente para instrucciones.");
        }

        $data = [
            'cuenta'         => $request->get('cuenta'),
            'name'           => $request->get('name'),
            'email'          => $request->get('email'),
            'amount'         => $request->get('amount'),
            'reason'         => $request->get('reason'),
            'beneficiary'    => $request->get('beneficiary'),
            'direccion'      => $request->get('direccion'),
            'bank'           => $request->get('bank'),
            'bintermediario' => $request->get('bintermediario'),
            'bancoaddress'   => $request->get('bancoaddress'),
            'swift'          => $request->get('swift'),
            'acount'         => $request->get('acount'),
            'referencia'     => $request->get('referencia'),
            'firma'          => $request->get('firma'),
            'nip'            => $request->get('nip'),
        ];

        Mail::to('clients@mycgo.net')
            ->send(new ClientWithdrawalForm(Auth::user(), $data));

        return back()->with('flash', 'Su Formulario de retiro fue enviado exitósamente!');
    }

    public function deposit()
    {
        $user        = User::find(Auth::id());
        $bal         = Trade::userBalance();
        $equity      = Trade::userEquity();
        $uguaranty   = Trade::userBrokerGuaranty();
        $depositos   = Trade::userDeposits();
        $marketValue = Trade::userMarketValue();

        return view('users.profile.deposit', compact('user', 'bal', 'equity', 'uguaranty', 'depositos', 'marketValue'));
    }
}
