<?php

class UserModel extends Model {
	public function Index() {
		return;
	}

	public function register() {
		// Sanitize input
		$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
		// Process the POST data if any
		if ($post['submit']) {
		  // All data is provided
			if ($post['email'] && $post['name'] && $post['password'] && $post['passwordagain']) {
				// Check the matching passwords
		  		if ($post['password'] !== $post['passwordagain']) {
			   		echo "<div class='alert alert-danger' role='alert'>Password does not match!</div>\n";
			   		return;
				}
				// Check for the existing user
				$exusers = $this->searchByMail($post['email']);
				// echo '<pre>',var_dump($exusers),'</pre>\n';
				if (isset($exusers) && count($exusers)>0) {
					echo "<div class='alert alert-danger' role='alert'>User already registered! Please use a different e-mail address!</div>\n";
					return;
				}
				// Prepare the insert query using MD5-summed passwords
				$this->query('INSERT INTO users (name, email, password) VALUES (:name, :email, :password)');
				$this->bind(':name', $post['name']);
				$this->bind(':email', $post['email']);
				$this->bind(':password', md5($post['password']));	// Always use encrypted passwords
				// Insert the neq user
				$this->execute();
				// Verify
				if ($this->lastInsertId()) {
					// Successfull insert
					ob_start();
					header('Location: '.ROOT_URL.'user/login');
					ob_end_flush();
					die();
				} else {
					// User registration database error
					echo "<div class='alert alert-danger' role='alert'>Registration failed!</div>\n";
					return;
				}
			} else {
				// Missing input data
				echo "<div class='alert alert-danger' role='alert'>Please provide all information!</div>\n";
				return;
			}
		return;
		}
	}

	protected function searchByMail($mailaddr) {
		$this->query('SELECT * FROM users WHERE `email`=:mail');
		$this->bind(':mail', $mailaddr);
		$this->execute();
		return $this->resultSet();
	}

	public function login($value='')
	{
		die('NOT IMPLEMENTED');
	}
}
