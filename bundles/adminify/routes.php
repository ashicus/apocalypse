<?php

Route::get('/(:bundle)/models/(:any)', 'Adminify::models@index');
Route::get('/(:bundle)/logs/(:any)', 'Adminify::logs@single');

Route::controller(Controller::detect('adminify'));

Route::filter('auth', function()
{
	if (Auth::guest()) return Redirect::to(Adminify\Libraries\Helpers::handle().'/login');
});