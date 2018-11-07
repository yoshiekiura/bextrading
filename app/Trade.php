<?php

namespace Tradesys;

use Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Trade extends Model
{
	protected $fillable = [
			'ticket_id', 'action', 'credit', 'debit', 'market_value', 'profit', 'total_profit', 'total', 'status',
	];

	protected $dates = ['expdate'];

	public function user()
	{
		return $this->belongsTo(User::class);
	}

	public function ticket()
	{
		return $this->belongsTo(Ticket::class);
	}

	public function exchange()
	{
		return $this->belongsTo(Exchange::class);
	}

	public function getMarketValue($ticketId)
	{
		$trademarketval = Trade::where('ticket_id', $ticketId);
		return $trademarketval->market_value;
	}

	public function scopeLatestFirst($query)
	{
		$query->whereNotNull('action')
				->orderBy('created_at', 'ASC');
	}

	public function scopeSoldStatus($query)
	{
		$query->whereNotNull('action')
				->whereIn('action', ['Sold Out'])
				->orderBy('created_at', 'DESC');
	}

	public function scopeEquity($query)
	{
		$query->whereNotNull('action')
				->whereNotIn('action', [
						'Account Funding', 'Additional Funds', 'Broker Guaranty Payment', 'Broker Guaranty',
						'Buy-Sold Out', 'Sell-Out Commission Fee', 'Sold Out'
				]);
	}


	public function scopeAdminSumDeposit($query)
	{
		$query->whereNotNull('action')
				->whereIn('action', ['Account Funding', 'Additional Funds']);
	}

	public function scopeSumaCredit()
	{
		$query->whereNotNull('action')
				->whereIn('action', ['Buy-Sold Out', 'Account Funding', 'Additional Funds', 'Broker Guaranty'])
				->orderBy('created_at', 'DESC');
	}

	public function scopeAdeudadoGnrl($query)
	{
		$query->whereNotNull('action')
				->whereIn('action', ['Broker Guaranty'])
				->orderBy('created_at', 'ASC');
	}

	public function scopeAdeudadoPagadoGnrl($query)
	{
		$query->whereNotNull('action')
				->whereIn('action', ['Broker Guaranty Payment'])
				->orderBy('created_at', 'ASC');
	}

	public function totalRango()
	{
		select('trades',
				DB::raw('SUM(credit) as credito'),
				DB::raw('SUM(debit) as debito'))
				->where('user_id', Auth::id())
				->groupBy('trades');
	}

	public function scopeMarketValOpen($query)
	{
		$query->where('ticket_id', '<>', 0)
				->whereIn('status', 'Open');
	}

	/*
	 *Funciones publicas para el admin
	 */

	public static function adminBalance()
	{
		$credito      = Trade::sum('credit');
		$debito       = Trade::sum('debit');
		$adminBalance = $credito - $debito;

		return $adminBalance;

	}

	public static function adminEquity()
	{
		$admincreditEquity = Trade::equity()->sum('credit') * -1;
		$admindebitEquity  = Trade::equity()->sum('debit') * -1;
		$adminTotalEquity  = $admincreditEquity - $admindebitEquity;

		return $adminTotalEquity;
	}

	public static function userBalance()
	{
		$credit  = Trade::where('user_id', \Auth::user()->id)->sum('credit');
		$debit   = Trade::where('user_id', \Auth::user()->id)->sum('debit');
		$balance = $credit - $debit;

		return $balance;
	}

	public static function userMarketValue()
	{
		$market = Trade::where('user_id', \Auth::user()->id)->where('action', 'Buy')->sum('total');

		return $market;
	}

	public static function adminUserMarketVal($user)
	{
		$market = Trade::where('user_id', $user)->where('action', 'Buy')->sum('total');

		return $market;
	}

	public function scopeDeposit($query)
	{
		$query->whereNotNull('action')
				->whereIn('action', ['Account Funding', 'Additional Funds'])
				->orderBy('created_at', 'ASC');
	}

	public static function scopeSumUserDeposit($query)
	{
		$query->where('user_id', Auth::user()->id)
				->whereNotNull('action')
				->whereIn('action', ['Account Funding', 'Additional Funds']);
	}

	public static function userEquity()
	{
		$creditEquity = Trade::where('user_id', \Auth::user()->id)->deposit()->sum('credit');
		$debitEquity  = Trade::where('user_id', \Auth::user()->id)->deposit()->sum('debit');
		$totalEquity  = $creditEquity - $debitEquity;

		return $totalEquity;
	}

	public static function adminBrokerGuaranty()
	{
		$adminDeuda       = Trade::adeudadoGnrl()->sum('credit');
		$adminPagodeuda   = Trade::adeudadoPagadoGnrl()->sum('debit');
		$adminGuarantybal = $adminDeuda - $adminPagodeuda;

		return $adminGuarantybal;
	}

	public static function adminDeposits()
	{
		$depositos = Trade::adminSumDeposit()->sum('credit');

		return $depositos;
	}

	public static function userBrokerGuaranty()
	{
		$deuda       = Trade::where('user_id', \Auth::user()->id)->adeudadoGnrl()->sum('credit');
		$pagodeuda   = Trade::where('user_id', \Auth::user()->id)->adeudadoPagadoGnrl()->sum('debit');
		$guarantybal = $deuda - $pagodeuda;

		return $guarantybal;
	}

	public static function userDeposits()
	{
		$depo = Trade::where('user_id', \Auth::user()->id)->sumUserDeposit()->sum('credit');

		return $depo;
	}

}
