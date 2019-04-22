<?php

class Share extends Controller {
	protected function Index() {
		$viewmodel = new ShareModel();
		$this->returnView($viewmodel->index(), true);
	}
}