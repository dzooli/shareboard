<?php

class Share extends Controller {
	protected function Index() {
		$viewmodel = new ShareModel();
		$this->returnView($viewmodel->index(), true);
	}

	protected function Add() {
		if (!UserModel::isLoggedIn()) {
			header('Location: '.ROOT_URL.'share');
			return;
		}
		$viewmodel = new ShareModel();
		$this->returnView($viewmodel->add(), true);
	}
}