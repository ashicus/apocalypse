<?php

class Home_Controller extends Base_Controller {

	public function action_index()
	{
		$data = array();

		$data['past_apocalypses'] = array();
		$data['future_apocalypses'] = array();

		if(Input::get("birthday")) {
			$birthday = Input::get("birthday");

			$timestamp = strtotime($birthday);
			if($timestamp) {
				$dateTime = new DateTime($birthday);

				if($timestamp > time()) {
					return Redirect::to_action("/")->with("error", "That shit's not even possible!");
				}
			} else {
				return Redirect::to_action("/")->with("error", "That ain't a fucking date!");
			}

			$data['past_apocalypses'] = Apocalypse::lookupByDate($dateTime)->get();
			$data['future_apocalypses'] = Apocalypse::lookupForFuture()->get();
		}

		return View::make('home.index', $data);
	}

}