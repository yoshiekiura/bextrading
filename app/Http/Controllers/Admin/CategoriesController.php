<?php

namespace Tradesys\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Tradesys\Category;
use Tradesys\Http\Controllers\Controller;
use Tradesys\Http\Requests\CategoryStoreRequest;
use Tradesys\Trade;

class CategoriesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function index(Request $request)
    {
        $request->user()->authorizeRoles('admin');
        $categories = Category::all();
        $balance    = Trade::adminBalance();
        $equity     = Trade::adminEquity();
        $brokergu   = Trade::adminBrokerGuaranty();
        $deposits   = Trade::adminDeposits();

        return view('admin.categories.index', compact('categories', 'balance', 'equity', 'brokergu', 'deposits'));
    }

    public function create(Request $request)
    {
        $request->user()->authorizeRoles('admin');
        $balance  = Trade::adminBalance();
        $equity   = Trade::adminEquity();
        $brokergu = Trade::adminBrokerGuaranty();
        $deposits = Trade::adminDeposits();

        return view('admin.categories.create', compact('balance', 'equity', 'brokergu', 'deposits'));
    }

    public function store(CategoryStoreRequest $request)
    {
        $request->user()->authorizeRoles('admin');
        $category = Category::create($request->all());

        return redirect()->route('categories')->with('flash', 'Category has been created!');
    }

    public function edit($category)
    {
        Auth::user()->authorizeRoles('admin');
        $balance  = Trade::adminBalance();
        $equity   = Trade::adminEquity();
        $brokergu = Trade::adminBrokerGuaranty();
        $deposits = Trade::adminDeposits();
        $category = Category::find($category);

        return view('admin.categories.edit', compact('category', 'balance', 'equity', 'brokergu', 'deposits'));
    }

    public function update(Request $request, $category)
    {
        $request->user()->authorizeRoles('admin');

        $category = Category::find($category);
        $category->update($request->all());

        return redirect()->route('categories')
            ->with('flash', 'Category has been updated!');
    }

    public function destroy($category)
    {
        Auth::user()->authorizeRoles('admin');
        $category = Category::find($category)->delete();

        return back()->with('flash', 'Category has been deleted!');
    }

}
