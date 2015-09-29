<?php

class Adminify_Home_Controller extends Adminify_Base_Controller {

	public function get_index(){

		$models = Adminify\Libraries\Helpers::getModels();

		$this->layout->title = 'Dashboard';
		$this->layout->nest('content', 'adminify::dashboard.index', array('models' => $models));

	}

}