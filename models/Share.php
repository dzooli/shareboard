<?php

class ShareModel extends Model {
	public function Index() {
		$this->query('SELECT * FROM shares');
		$rows = $this->resultSet();
		return $rows;
	}

	public function add() {
		// Sanitize the POST array
		$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
		
		// Process the POST data if any
		if ($post['submit']) {
			// Count current shares
			//$this->query('SELECT * FROM shares');
			//$excount = count($this->resultSet());
			// Insert into mysql
			$this->query('INSERT INTO shares (title, body, link, user_id) VALUES (:title, :body, :link, :user_id)');
			$this->bind(':title', $post['title']);
			$this->bind(':body', $post['body']);
			$this->bind(':link', $post['link']);
			$this->bind(':user_id', 1);
			$this->execute();
			// Verify by counting again
			//$this->query('SELECT * FROM shares');
			//$ccount = count($this->resultSet());
			if ($this->lastInsertId()) {
				// Redirect
				header('Location: '.ROOT_URL.'share');
			}
		}
		return;
	}
}
