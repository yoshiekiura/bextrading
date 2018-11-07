<?php

namespace Tradesys\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Tradesys\Fee;
use Tradesys\Http\Controllers\Controller;
use Tradesys\Http\Requests\FeeStoreRequest;
use Tradesys\Trade;

class FeeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function index(Request $request)
    {
        $request->user()->authorizeRoles('admin');

        $fees     = Fee::all();
        $balance  = Trade::adminBalance();
        $equity   = Trade::adminEquity();
        $brokergu = Trade::adminBrokerGuaranty();
        $deposits = Trade::adminDeposits();

        return view('admin.fees.index', compact('fees', 'balance', 'equity', 'brokergu', 'deposits'));
    }

    public function create(Request $request)
    {
        $request->user()->authorizeRoles('admin');
        $balance  = Trade::adminBalance();
        $equity   = Trade::adminEquity();
        $brokergu = Trade::adminBrokerGuaranty();
        $deposits = Trade::adminDeposits();
        return view('admin.fees.create', compact('balance', 'equity', 'brokergu', 'deposits'));
    }

    public function store(FeeStoreRequest $request)
    {
        $request->user()->authorizeRoles('admin');
        $fee = Fee::create($request->all());

        return redirect()->route('fee.index')
        ->with('flash', 'Fee has been created!');
    }

    public function edit(Fee $fee, Request $request)
    {
        $request->user()->authorizeRoles('admin');

        $balance  = Trade::adminBalance();
        $equity   = Trade::adminEquity();
        $brokergu = Trade::adminBrokerGuaranty();
        $deposits = Trade::adminDeposits();

        $fee = fee::find($fee);

        return view('admin.fees.edit', compact('fee', 'balance', 'equity', 'brokergu', 'deposits'));
    }

    public function update(Request $request, Fee $fee)
    {
        $request->user()->authorizeRoles('admin');
        $fee = Fee::find($fee);
        $fee->update($request->all());
        return redirect()->route('fee.index')
        ->with('flash', 'Fee amount has been updated!');
    }

    public function destroy(Fee $fee, Request $request)
    {
        $request->user()->authorizeRoles('admin');
        $fee = Fee::find($fee)->delete();

        return back()->with('flash', 'Fee has been deleted!');
    }

}
