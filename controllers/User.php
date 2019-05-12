<?php

class User extends Controller {
	protected function index() {
		die ('USER/INDEX');
	}

	protected function register() {
		$viewmodel = new UserModel();
		$this->returnView($viewmodel->register(), true);
	}

	protected function login() {
		$viewmodel = new UserModel();
		$this->returnView($viewmodel->login(), true);
	}

	protected function logout() {
		$viewmodel = new UserModel();
		$this->returnView($viewmodel->logout(), true);
	}
}
