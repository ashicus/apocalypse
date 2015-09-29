<?php

return array(

	/*
	|--------------------------------------------------------------------------
	| General
	|--------------------------------------------------------------------------
	|
	| name: The name of the admin panel. Change it here to whitelabel it.
	|
	| perpage: The number of items you want to show per page
	|
	| logs: If false Adminify will hide this from the navbar but you'll still
	| be able to access it by visiting /logs
	|
	| console: If false Adminify will hide the SQL Console from the navbar but
	| you'll still be able to access it by visiting /console
	|
	*/

	'name' => 'Adminify',

	'perpage' => 10,

	'logs' => true,

	'console' => true,


	/*
	|--------------------------------------------------------------------------
	| Models
	|--------------------------------------------------------------------------
	|
	| We'll do our best to find all your models but if you want to map some
	| then you can do that in the 'include' array; don't forget your namespaces
	|
	| Should you wish to exclude any models then you can do that with 'exclude'
	|
	| e.g 
	|
	| 'exclude' => array(
	|	'User',
	|	'Post',
	| )
	|
	| Exclude certain fields such as timestamps and passwords for with the 
	| 'fields' array. Pop them in 'all' to exclude from all models or define
	| the model e.g.
	|
	| 'fields' => array(
	|	'all' => array(
	|		'created_at',
	|		'updated_at',
	|	),
	|	'User' => array(
	|		'password',
	|	)
	| )
	|
	|
	*/

	'include' => array(
	),

	'exclude' => array(
	),

	'fields' => array(
		'all' => array(
			'created_at',
			'updated_at',
			'id',
		),
	),

	/*
	|--------------------------------------------------------------------------
	| Validation
	|--------------------------------------------------------------------------
	| We can specify validation to fields in the standard method with the
	| 'validation' array e.g.
	|
	| 'validation' => array(
	|	'user' => 'required|alpha',
	|	'email' => 'required|unique:email',
	| )
	|
	| If you want to provide custom error messages then this can also be done
	| in the usual way via the 'messages' array e.g.
	|
	| 'messages' => array(
	|	'user_required' => 'Oops! Looks like you forgot your username',
	|	'email' => 'The :attribute doesn't look like an email to me'
	| )
	|
	*/

	'validation' => array(
	),

	'messages' => array(
	),

);