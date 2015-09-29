<?php

class Adminify_Login_Controller extends Adminify_Loginbase_Controller {

	public function get_index(){

		$name = Config::get('adminify::settings.name');
		return View::make('adminify::login.index')->with('name', $name);

	}

	public function post_index(){

		$creds = array(
			'username' => Input::get('username'),
			'password' => Input::get('password'),
		);

		if(Auth::attempt($creds)){
			return Redirect::to(Adminify\Libraries\Helpers::handle());
		} else {
			return Redirect::back()->with('error', true);
		}
		
	}

	public function get_logout(){
		Auth::logout();
		return Redirect::to(Adminify\Libraries\Helpers::handle());
	}

}