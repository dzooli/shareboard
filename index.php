<?php

require 'classes/Database.php';

	// Connect to database or die
	$db = new Database();

	if (!$db) {
		die('Cannot connect to the database!');
	}

	if ($_POST['submit']) {
		// Get the values from the POST superglobal and sanitize it
		$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
		$title = $post['title'];
		$body = $post['body'];

		// Insert the arrived data
		$db->query('INSERT INTO posts (title, body) VALUES (:title, :body)');
		$db->bind(':title', $title);
		$db->bind(':body', $body);
		$db->execute();
	}

?>

<h1>Add Post</h1>
	<form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
		<label>Post Title:</label><br/>
		<input type="text" name="title", placeholder="Add a title here..." /><br/>
		<label>Post Body:</label><br/>
		<textarea name="body"></textarea><br/><br/>
		<input type="submit" name="submit" title="Submit" />
	</form>

<?php
	// Prepare and bind the values
	$db->query('SELECT * FROM posts');

	// Print the results
	echo '<pre>', print_r($db->resultset()), '</pre>';
?>	