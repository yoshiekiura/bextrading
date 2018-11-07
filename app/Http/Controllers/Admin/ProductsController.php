<?php

namespace Tradesys\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Tradesys\Category;
use Tradesys\Http\Controllers\Controller;
use Tradesys\Http\Requests\ProductStoreRequest;
use Tradesys\Product;
use Tradesys\Trade;

class ProductsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function index(Request $request)
    {
        $request->user()->authorizeRoles('admin');

        $products = Product::paginate(50);
        $balance  = Trade::adminBalance();
        $equity   = Trade::adminEquity();
        $brokergu = Trade::adminBrokerGuaranty();
        $deposits = Trade::adminDeposits();

        return view('admin.products.index', compact('products', 'balance', 'equity', 'brokergu', 'deposits'));
    }

    public function create(Request $request)
    {
        $request->user()->authorizeRoles('admin');

        $categories = Category::all();
        $balance    = Trade::adminBalance();
        $equity     = Trade::adminEquity();
        $brokergu   = Trade::adminBrokerGuaranty();
        $deposits   = Trade::adminDeposits();

        return view('admin.products.create', compact('categories', 'balance', 'equity', 'brokergu', 'deposits'));
    }

    public function store(ProductStoreRequest $request)
    {
        $request->user()->authorizeRoles('admin');

        $product              = new product();
        $product->category_id = $request->input('category_id');
        $product->name        = $request->input('name');
        $product->symbol      = $request->input('symbol');
        $product->leverage    = $request->input('leverage');
        $product->marketval   = $request->input('marketval');
        $product->save();

        return redirect()->route('prod.index')->with('flash', 'Product has been created!');

    }

    public function edit(Product $product, Request $request)
    {
        $request->user()->authorizeRoles('admin');
        $categories = Category::all();
        $product    = Product::find($product);
        $balance    = Trade::adminBalance();
        $equity     = Trade::adminEquity();
        $brokergu   = Trade::adminBrokerGuaranty();
        $deposits   = Trade::adminDeposits();

        return view('admin.products.edit', compact('product', 'categories', 'balance', 'equity', 'brokergu', 'deposits'));
    }

    public function update(Request $request, $product)
    {
        $request->user()->authorizeRoles('admin');

        $product = Product::find($product);
        $product->update($request->all());

        return redirect()->route('prod.index')->with('flash', 'Product has been updated!');
    }

    public function destroy(Product $product, Request $request)
    {
        $request->user()->authorizeRoles('admin');

        $product = Product::find($product)->delete();

        return back()->with('flash', 'Product has been deleted!');
    }
}
