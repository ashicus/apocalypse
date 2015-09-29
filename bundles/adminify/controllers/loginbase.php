<?php

class Adminify_Loginbase_Controller extends Controller {

	public $restful = true;

	public function __construct(){

		parent::__construct();

		Config::set('auth.driver', 'adminauth');

		Asset::add('bootstrap', 'bundles/adminify/css/bootstrap.min.css');
		Asset::add('style', 'bundles/adminify/css/style.css');

	}

	/**
	 * Catch-all method for requests that can't be matched.
	 *
	 * @param  string    $method
	 * @param  array     $parameters
	 * @return Response
	 */
	public function __call($method, $parameters){
		return Response::error('404');
	}

}