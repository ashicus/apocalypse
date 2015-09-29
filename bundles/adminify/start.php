<?php

/*
						 _           _       _  __       
		/\      | |         (_)     (_)/ _|      
	 /  \   __| |_ __ ___  _ _ __  _| |_ _   _ 
	/ /\ \ / _` | '_ ` _ \| | '_ \| |  _| | | |
 / ____ \ (_| | | | | | | | | | | | | | |_| |
/_/    \_\__,_|_| |_| |_|_|_| |_|_|_|  \__, |
																				__/ |
																			 |___/ 
*/

Autoloader::map(array(
	'Adminify_Base_Controller' => Bundle::path('adminify').'controllers/base.php',
	'Adminify_Loginbase_Controller' => Bundle::path('adminify').'controllers/loginbase.php',
));

Autoloader::namespaces(array(
	'Adminify\Models' => Bundle::path('adminify').'models',
	'Adminify\Libraries' => Bundle::path('adminify').'libraries',
));

// Load up the app models

Autoloader::directories(array(
	path('app').'models',
));

// Extend auth to get it to work

Auth::extend('adminauth', function(){
	 return new Adminify\Libraries\AdminAuth;
});