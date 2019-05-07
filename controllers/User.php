<?php

class User extends Controller {
	protected function index() {
		echo 'USER/INDEX';
	}

	protected function register() {
		$viewmodel = new UserModel();
		$this->returnView($viewmodel->register(), true);
	}
}
