<div class="text-center">
	<div class="jumbotron">
		<h1>Welcome to ShareBoard</h1>
		<p class="lead">Find something cool? Share it with our community. Look at some useful information shared by the other community members.</p>
		<?php if(UserModel::isLoggedIn()) : ?>
			<a class="btn btn-primary text-center" href="<?php echo ROOT_PATH?>share/add">Share Now</a>
		<?php else : ?>
			<a class="btn btn-success text-center" href="<?php echo ROOT_PATH?>user/login">Login</a>
			<a class="btn btn-primary text-center" href="<?php echo ROOT_PATH?>user/register">Register</a>
		<?php endif ; ?>
	</div>
</div>
