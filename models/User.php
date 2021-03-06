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
			   		Messages::setMsg('Password does not match!', 'danger');
			   		return;
				}
				// Check for the existing user
				$exusers = $this->searchByMail($post['email']);
				if (isset($exusers) && count($exusers)>0) {
					Messages::setMsg('User already registered! Please use a different e-mail address!', 'danger');
					return;
				}
				// Prepare the insert query using MD5-summed passwords
				$this->query('INSERT INTO users (name, email, password) VALUES (:name, :email, :password)');
				$this->bind(':name', $post['name']);
				$this->bind(':email', $post['email']);
				$this->bind(':password', md5($post['password']));	// Always use encrypted passwords
				// Insert the new user
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
					Messages::setMsg('Registration failed! Database error!', 'danger');
					return;
				}
			} else {
				// Missing input data
				Messages::setMsg('Please provide all information!', 'warning');
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
		$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

		// Submit pressed
		if ($post['submit']) {
		    // All data is provided
    		    if ($post['email'] && $post['password']) {
    			// Encode the password
			$password = md5($post['password']);
			// Search the user in the DB
			$this->query('SELECT * FROM users WHERE email = :email AND password = :password');
			$this->bind(':email', $post['email']);
			$this->bind(':password', $password);
			$this->execute();
			$result = $this->single();
			// Successfull user login -> redirect to the share/index page
			if ($result) {
			    // Setup the session data
			    $_SESSION['logged_in'] = true;
			    $_SESSION['user_data'] = array (
					'id' 	=> $result['id'],
					'name' 	=> $result['name'],
					'email' => $result['email']
			    );
			    // Redirect to the shares/index page
			    header('Location: '.ROOT_URL.'/share');
			    return;
			// Login failed
			} else {
			    Messages::setMsg('Incorrect login!', 'danger');
			    return;
			}
		    } else { // Missing input data
			Messages::setMsg('Please provide e-mail and password!', 'warning');
			return;
		    }
		}
	}

	public function logout() {
		unset($_SESSION['logged_in']);
		unset($_SESSION['user_data']);
		session_destroy();
		// Redirect to Landing page
		header('Location: '.ROOT_URL);
		return;
	}

	public static function isLoggedIn() {
		return (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true);
	}
}
