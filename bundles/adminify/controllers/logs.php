<?php

use Adminify\Libraries\Helpers as Helpers;

class Adminify_Logs_Controller extends Adminify_Base_Controller {

	public function get_index(){

		$logfiles = Helpers::logfiles();
		$logs = (!empty($logfiles)) ? Helpers::logs($logfiles[0]) : array();

		$this->layout->title = 'Logs';
		$this->layout->nest('content', 'adminify::logs.index', array(
			'logfiles' => $logfiles,
			'logs' => $logs,
		));

	}

	public function get_single($logfile){

		$logfiles = Helpers::logfiles();
		$logs = Helpers::logs($logfile);

		$this->layout->title = 'Logs';
		$this->layout->nest('content', 'adminify::logs.single', array(
			'logfiles' => $logfiles,
			'logfile' => $logfile,
			'logs' => $logs,
		));

	}

}