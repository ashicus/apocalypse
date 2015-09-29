<?php

use Laravel\CLI\Command as Command;
use Adminify\Models\User as User;

class Adminify_Setup_Task {

	public function run($arguments){

		if(empty($arguments) || count($arguments) < 5){
			die("Error: Please enter first name, last name, username, email address and password\n");
		}

		Command::run(array('bundle:publish', 'adminify'));

		$role = (!isset($arguments[5])) ? 'admin' : $arguments[5];

		$data = array(
			'name' => $arguments[0].' '.$arguments[1],
			'username' => $arguments[2],
			'email' => $arguments[3],
			'password' => Hash::make($arguments[4]),
			'role' => $role,
		);

		$user = User::create($data);

		echo ($user) ? 'User created successfully!' : 'Error creating user!';

	}

}