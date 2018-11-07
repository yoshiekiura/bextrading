<?php

// Route::get('/declaratoria', 'Web\PagesController@declaratoria')->name('declaratoria');
// Route::get('/acuerdo', 'Web\PagesController@acuerdo')->name('acuerdo');
// Route::get('/', 'Web\PagesController@index')->name('inicio');
// Route::get('/commodities', 'Web\PagesController@options')->name('options');
// Route::post('/contact', 'Web\PagesController@sendcontact')->name('sendcontact');

//nuevas rutas

Route::get('/', 'Web\PagesController@index')->name('main');
Route::get('/contact', 'Web\PagesController@contact')->name('contacto');
Route::get('/about', 'Web\PagesController@about')->name('about');
Route::post('/contact', 'Web\PagesController@contactForm')->name('contactForm');
Route::get('/faq', 'Web\PagesController@faq')->name('faq');
Route::post('/faq', 'Web\PagesController@faqForm')->name('faqForm');
Route::get('/call', 'Web\PagesController@call')->name('requestcall');
Route::get('/productos', 'Web\PagesController@products')->name('products');
Route::get('/services', 'Web\PagesController@services')->name('services');
Route::get('/reports', 'Web\PagesController@reports')->name('reports');
Route::get('/accounts', 'Web\PagesController@cuentas')->name('cuentas');
Route::get('/management', 'Web\PagesController@management')->name('manage');
Route::get('/clientportal', 'Web\PagesController@portal')->name('portal');


//fin de nuevas rutas

Auth::routes();
Route::get('/set_language/{lang}', 'web\AppController@setLanguage')->name('set_language');
 // Registration Routes...
 Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
 Route::post('register', 'Auth\RegisterController@register');
// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin', 'AdminController@index')->name('admin');

Route::prefix('admin')->group(function () {
    //trades
    Route::get('trades', 'Admin\TradesController@index')->name('trades');
    Route::get('trades/create', 'Admin\TradesController@create')->name('trade.create');
    Route::get('trades/markets', 'Admin\TradesController@marketValue')->name('trade.markets');
    Route::post('trades/create', 'Admin\TradesController@store')->name('trade.store');
    Route::get('trades/{trade}', 'Admin\TradesController@show')->name('trade_show');
    Route::get('trades/sell/{ticket}', 'Admin\TradesController@createSell')->name('trade.createsell');
    Route::put('trades/sold/{trade}', 'Admin\TradesController@sold')->name('trade.sold');
    Route::get('trades/sellout/{trade}', 'Admin\TradesController@tradeSellOut')->name('trade.sellout');
    Route::put('trades/sellticket/{ticket}', 'Admin\TradesController@makeSellFromTrade')->name('soldout');
    Route::post('trades/sellticket/{trade}', 'Admin\TradesController@checkPorcent')->name('checkporcent');
    Route::delete('trades/{trade}', 'Admin\TradesController@destroy')->name('trade.delete');
    Route::post('trades/markets/', 'Admin\TradesController@storeMarketVal')->name('store.marketval');
    //tickets
    Route::get('tickets/', 'Admin\TicketsController@index')->name('tickets');
    Route::get('tickets/create', 'Admin\TicketsController@create')->name('crear_tickets');
    Route::get('tickets/{ticket} ', 'Admin\TicketsController@edit')->name('edit_ticket');
    Route::get('ticketsell/{ticket}', 'Admin\TicketsController@sellticket')->name('sellticket');
    Route::post('tickets/sell/{ticket} ', 'Admin\TicketsController@ticketSellOut')->name('ticket_sell');
    Route::post('tickets/create/check', 'Admin\TicketsController@checkBalance')->name('checkbalance');
    Route::post('tickets/create', 'Admin\TicketsController@store')->name('store_ticket');
    Route::put('tickets/{ticket}', 'Admin\TicketsController@update')->name('update_tradeticket');
    Route::delete('tickets/{ticket}', 'Admin\TicketsController@destroy')->name('delete_ticket');
    //products
    Route::get('products/', 'Admin\ProductsController@index')->name('prod.index');
    Route::get('products/create', 'Admin\ProductsController@create')->name('prod.create');
    Route::get('products/{product}', 'Admin\ProductsController@edit')->name('prod.edit');
    Route::post('products/create', 'Admin\ProductsController@store')->name('prod.post');
    Route::put('products/{product}', 'Admin\ProductsController@update')->name('prod.update');
    Route::delete('products/{product}', 'Admin\ProductsController@destroy')->name('prod.delete');
    //categories
    Route::get('categories/', 'Admin\CategoriesController@index')->name('categories');
    Route::get('categories/create', 'Admin\CategoriesController@create')->name('newcat');
    Route::get('categories/{category}', 'Admin\CategoriesController@edit')->name('editcat');
    Route::post('categories/create', 'Admin\CategoriesController@store')->name('categpostnew');
    Route::put('categories/{category}', 'Admin\CategoriesController@update')->name('updatecat');
    Route::delete('categories/{category}', 'Admin\CategoriesController@destroy')->name('deletecat');
    //fees
    Route::get('fee/', 'Admin\FeeController@index')->name('fee.index');
    Route::get('fee/create', 'Admin\FeeController@create')->name('fee.create');
    Route::get('fee/{fee}', 'Admin\FeeController@edit')->name('fee.edit');
    Route::post('fee/create', 'Admin\FeeController@store')->name('fee.post');
    Route::put('fee/{fee}', 'Admin\FeeController@update')->name('fee.update');
    Route::delete('fee/{fee}', 'Admin\FeeController@destroy')->name('fee.delete');
    //Admin users
    Route::get('users/trades/{user}', 'Admin\UsersController@ausertrades')->name('ausertrades');
    Route::get('users/{user}/ticket', 'Admin\UsersController@ticketsByUser')->name('ticketuser');
    Route::get('users/debts', 'Admin\UsersController@debts')->name('debtusers');
    Route::get('users/', 'Admin\UsersController@index')->name('usuarios');
    Route::get('users/create', 'Admin\UsersController@create')->name('createuser');
    Route::get('users/{user}/edit', 'Admin\UsersController@edit')->name('edituseradmin');
    Route::post('users/create', 'Admin\UsersController@store')->name('storeuser');
    Route::put('users/{user}', 'Admin\UsersController@update')->name('updateuseradmin');
    Route::delete('users/{user}', 'Admin\UsersController@destroy')->name('delete.user');

    //Route::delete('users/{user}', 'Admin\UsersController@destroy')->name('admindeleteuser');
    //crypto admin
    Route::get('crypto', 'Admin\ExchangeController@index')->name('exchange');
    Route::get('crypto/create', 'Admin\ExchangeController@create')->name('exchangecreate');
    Route::get('crypto/{exchange}', 'Admin\ExchangeController@edit')->name('editexchange');
    Route::get('crypto/suma', 'Admin\ExchangeController@sumamoneda')->name('suma');
    Route::post('crypto/create', 'Admin\ExchangeController@store')->name('exchangestore');
    Route::get('crypto/sell/{exchange}', 'Admin\ExchangeController@createSellExchange')->name('sellexchange');
    Route::post('crypto/usersell/{user}', 'Admin\ExchangeController@sellCoinUser')->name('sellcoin'); //paso 2
    Route::post('crypto/usersell/', 'Admin\ExchangeController@getUserExchange')->name('userexchange'); //paso 1
    Route::put('crypto/{exchange}', 'Admin\ExchangeController@update')->name('updateexchange');
    Route::put('crypto/sell/{exchange}', 'Admin\ExchangeController@sellExchange')->name('soldexchange');
    Route::delete('crypto/{exchange}', 'Admin\ExchangeController@destroy')->name('deleteexchange');
});

Route::prefix('member')->group(function () {
    //vista usuarios
    Route::get('profile', 'Users\ClientProfilesController@index')->name('userperfil');
    Route::get('tickets', 'Users\ClientTicketsController@index')->name('usertickets');
    Route::get('tickets/closed', 'Users\ClientTicketsController@closedTickets')->name('userticketsclose');
    Route::get('purchase/', 'Users\ClientTicketsController@purchase')->name('usercompra');
    Route::post('purchase/', 'Users\ClientTicketsController@userpurchase')->name('sendusercompra');
    Route::get('deposits', 'Users\ClientProfilesController@deposit')->name('userdeposit');
    Route::get('withdrawal', 'Users\ClientProfilesController@withdraw')->name('userwithdraw');
    Route::post('withdrawal', 'Users\ClientProfilesController@senwithdraw')->name('sendwithdraw');
    Route::put('{user}/update', 'Users\ClientProfilesController@update')->name('userupdate');
    Route::get('settings', 'Users\ClientProfilesController@configuser')->name('userconfig');
    Route::get('users/', 'HomeController@index')->name('graficas');
    Route::get('contactus', 'Users\MessageController@index')->name('contactbroker');
    Route::post('contactus', 'Users\MessageController@sendMessage')->name('sendmensaje');
    Route::get('trades/', 'Users\ClientTradesController@index')->name('usertrades');
    Route::get('balance/', 'Users\ClientTradesController@balance')->name('userbalance');
    Route::get('exchange/', 'Users\ClientExchangeController@index')->name('exchangeindex');
    Route::get('trades/{trade}', 'Users\ClientTradesController@show')->name('usertradeshow');
    Route::get('trades/{user}/sumary', 'Users\ClientTradesController@tradeSumary')->name('usertradesumary');
});
