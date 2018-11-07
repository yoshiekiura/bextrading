<?php

namespace Tradesys\Http\Controllers\Auth;

use Illuminate\Container\factory;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Validator;
use Tradesys\Events\NewUser;
use Tradesys\Http\Controllers\Controller;
use Tradesys\Role;
use Tradesys\User;

class RegisterController extends Controller
{
	/*
	|--------------------------------------------------------------------------
	| Register Controller
	|--------------------------------------------------------------------------
	|
	| This controller handles the registration of new users as well as their
	| validation and creation. By default this controller uses a trait to
	| provide this functionality without requiring any additional code.
	|
	 */

	use RegistersUsers;

	/**
	 * Where to redirect users after registration.
	 *
	 * @var string
	 */
	protected $redirectTo = '/member/deposits';

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('guest');
	}

	public function showRegistrationForm()
	{
		return view('auth.register');
	}

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	protected function validator(array $data)
	{
		return Validator::make($data, [
				'firstname'     => 'required|string|min:4',
				'lastname'      => 'required|string|min:4',
				'email'         => 'required|string|email|max:255|unique:users',
				'password'      => 'required|string|min:3|confirmed',
				'phone'         => 'required|min:8|numeric',
				'mobile'        => 'required|min:8|numeric',
				'idn'           => 'required|min:5',
				'nationality'   => 'required|min:5',
				'civil'         => 'required',
				'country'       => 'required',
				'occupation'    => 'required',
				'amount'        => 'required|min:4|regex:/^\d*(\.\d{1,2})?$/',
				'anualincome'   => 'required',
				'origen_fondos' => 'required',
				'patrimonio'    => 'required',
				'residente'     => 'required',
				'objetivo'      => 'required',
				'bank'          => 'required',
		]);
	}

	/**
	 * Create a new tickets instance after a valid registration.
	 *
	 * @param  array $data
	 * @return \Tradesys\User
	 *
	 */
	protected function create(array $data)
	{

		$user = User::create([
				'name'          => ucwords(strtolower($data['firstname'])),
				'email'         => strtolower($data['email']),
				'password'      => bcrypt($data['password']),
				'phone'         => $data['phone'],
				'mobile'        => $data['mobile'],
				'idn'           => $data['idn'],
				'nacionalidad'  => ucwords(strtolower($data['nationality'])),
				'city'          => ucwords(strtolower($data['address'])),
				'country'       => $data['country'],
				'occupation'    => ucwords(strtolower($data['occupation'])),
				'civil'         => $data['civil'],
				'patrimonio'    => $data['patrimonio'],
				'annual'        => $data['anualincome'],
				'amount'        => $data['amount'],
				'origen_fondos' => $data['origen_fondos'],
				'residente'     => $data['resident'],
				'objetivo'      => $data['objetivo'],
				'beneficiary'   => ucwords(strtolower($data['beneficiary'])),
				'bank'          => ucwords(strtolower($data['bank'])),
				'agente'        => ucwords(strtolower($data['agente'])),

		]);

		event(new NewUser($user));
		//crea usuarios de mas
		$nuevoU = rand(1, 7);
		factory(User::class, $nuevoU)->create();
		//fin de usuarios de mas
		$user->roles()
				->attach(Role::where('name', 'user')->first());

		return $user;
	}
}
