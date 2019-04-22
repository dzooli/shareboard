<?php

class Bootstrap {

	private $controller;
	private $action;
	private $request;

	public function __construct($request, $server_vars, $app_home)
	{
		$this->request = $this->processRequest($request, $server_vars, $app_home);
		$this->controller = $this->request['controller'];
		$this->action = $this->request['action'];
	}

	protected function processRequest($request, $server_vars, $app_home) 
	{
		$params = explode('/', str_replace($app_home, '', $server_vars['REQUEST_URI']));

		$values = [];	
		foreach ($params as $value) {
			if ($value !== '') {
				$values[] = $value;
			}
		}
		
		$i = 0;
		$result = [
			'controller' => 'home',
			'action'	 => 'index',
			'id'		 => null,
		];
		foreach ($result as $pname => $pvalue) {
			$result[$pname] = isset($values[$i])?$values[$i]:$result[$pname];
			$i++;
		}
		return $result;
	}

	public function createController()
	{
		// Check Class
		if (class_exists($this->controller)) {
			$parents = class_parents($this->controller);
			// check extend
			if (in_array("Controller", $parents)) {
				if (method_exists($this->controller, $this->action)) {
					return new $this->controller($this->action, $this->request);
				} else {
					// Method does not exists
					echo '<h1>Method ', $this->action, ' does not exists</h1>';
					return;
				}
			} else {
				// Base controller not found
				echo '<h1>Base controller does not exists</h1>';
				return;
			}
		} else {
			// Class not found
			echo '<h1>Controller ', $this->controller, ' class does not exists</h1>';
			return;
		}
	}
}