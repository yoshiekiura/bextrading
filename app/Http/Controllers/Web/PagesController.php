<?php

namespace Tradesys\Http\Controllers\Web;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use function Sodium\compare;
use Tradesys\Http\Controllers\Controller;
use Tradesys\Mail\ContactPageForm;
use Tradesys\Trade;

class PagesController extends Controller
{
    // public function index()
    // {
    //     return view('auth.login');
    // }

    // public function about()
    // {
    //     return view('web.about');
    // }

    // public function service()
    // {
    //     return view('web.service');
    // }

    // public function options()
    // {
    //     return 'Commodities';
    // }

    // public function contact()
    // {
    //     return view('web.contact');
    // }

    // public function declaratoria()
    // {
    //     return view('web.declaratoria');
    // }



    //inicio imported controller

    public function index()
    {
        return view('web.index', compact('chart'));
    }

    public function contact()
    {
        return view('web.contact');
    }

    public function about()
    {
        return view('web.about');
    }

    public function faq()
    {
        return view('web.faq');
    }

    public function call()
    {
        return view('web.calling');
    }


    public function services()
    {
        return view('web.services');
    }

    public function management()
    {
        return view('web.management');
    }

    public function portal()
    {
        return view('web.portal');
    }

    public function reports()
    {
        return view('web.reports');
    }

    public function cuentas()
    {
        return view('web.cuentas');
    }

    public function products()
    {
        return view('web.productos');
    }

    public function contactForm(ContactFormRequest $request)
    {
        $fields = [
                'nombre'   => $request->input('nombre'),
                'email'    => $request->input('email'),
                'asunto'   => $request->input('asunto'),
                'telefono' => $request->input('telefono'),
                'mensaje'  => $request->input('mensaje'),
        ];

        Mail::send('emails.contacto', $fields, function ($message) use ($fields) {
            $message->from($fields['email']);
            $message->subject('Formulario Contactenos');
            $message->to('info@berlingercapital.com');
        });


        Session::flash('success', __("Message has been sent succesfully!. Our client service will responde you soon!"));
        return redirect()->route('contacto');
    }

    public function faqForm(FaqFormRequest $request)
    {
        $campos = [
                'nombre'   => $request->input('nombre'),
                'email'    => $request->input('email'),
                'telefono' => $request->input('telefono'),
                'discuss'  => $request->input('discuss'),
                'mensaje'  => $request->input('mensaje'),
        ];

        Mail::send('emails.asesoria', $campos, function ($message) use ($campos) {
            $message->from($campos['email']);
            $message->subject('Formulario Asesoría');
            $message->to('info@berlingercapital.com');
        });

        Session::flash('success', __("Message has been sent succesfully!. Our client service will responde you soon!"));

        return redirect()->route('requestcall');
    }
    //fin imported controller

    public function acuerdo()
    {
        $fecha = Carbon::now('America/Costa_Rica');
        return view('web.acuerdocliente', compact('fecha'));
    }

    public function sendcontact(Request $request)
    {

//        $this->validate(request(), [
        //            'name'    => 'required|min:3',
        //            'email'   => 'required|email',
        //            'mensaje' => 'required|min:10',
        //        ]);

        $data = [
                'name'    => $request->get('name'),
                'email'   => $request->get('email'),
                'mensaje' => $request->get('message'),
        ];

        Mail::to('info@berlingercapital.com')
                ->send(new ContactPageForm($data));

        return back()
                ->with('flash', 'Form sent out succesfully!');
    }

    public function socios()
    {
        return view('web.partners');
    }

    protected function userBalance()
    {
        $credit  = Trade::where('user_id', \Auth::user()->id)->sum('credit');
        $debit   = Trade::where('user_id', \Auth::user()->id)->sum('debit');
        $balance = $credit - $debit;

        return $balance;
    }

    protected function userEquity()
    {
        $creditEquity = Trade::where('user_id', \Auth::user()->id)->equity()->sum('credit');
        $debitEquity  = Trade::where('user_id', \Auth::user()->id)->equity()->sum('debit');
        $totalEquity  = $creditEquity - $debitEquity;

        return $totalEquity;
    }

    protected function userBrokerGuaranty()
    {
        $deuda       = Trade::where('user_id', \Auth::user()->id)->adeudadoGnrl()->sum('credit');
        $pagodeuda   = Trade::where('user_id', \Auth::user()->id)->adeudadoPagadoGnrl()->sum('debit');
        $guarantybal = $deuda - $pagodeuda;

        return $guarantybal;
    }

    protected function userDeposits()
    {
        $depo = Trade::where('user_id', \Auth::user()->id)->sumUserDeposit()->sum('credit');

        return $depo;
    }


    public function test()
    {
        $bal       = $this->userBalance();
        $equity    = $this->userEquity();
        $guaranty  = $this->userBrokerGuaranty();
        $depositos = $this->userDeposits();

        return view('test', compact('bal', 'guaranty', 'depositos', 'equity'));
    }

    public function prices()
    {
        return view('prices');
    }
}
