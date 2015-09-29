<?php

class Adminify_Console_Controller extends Adminify_Base_Controller {

	public function get_index(){

		$this->layout->title = 'SQL Console';
		$this->layout->nest('content', 'adminify::console.index');

	}

	public function post_index(){

		$sql = Input::get('console');
		$result = DB::query($sql);

		return Redirect::back()->with('result', $result);

	}

}