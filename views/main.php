<!DOCTYPE html>
<html>
	<head>
		<title>Shareboard by dzooli</title>
		<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->
		<link rel="stylesheet" type="text/css" href="<?php echo(ROOT_PATH); ?>assets/css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="<?php echo(ROOT_PATH); ?>assets/css/style.css">
	</head>
	<body>
		 <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
		  <a class="navbar-brand" href="<?php echo ROOT_URL; ?>">Shareboard</a>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarDefault" aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>

		  <div class="collapse navbar-collapse" id="navbarDefault">
		    <ul class="navbar-nav mr-auto">
		      <!-- <li class="nav-item active"> <a class="nav-link" href="<?php echo ROOT_URL; ?>">Home <span class="sr-only">(current)</span></a></li> -->
		      <li class="nav-item active"> <a class="nav-link" href="<?php echo ROOT_URL; ?>/share">Shares</a> </li>
		<!-- Disabled menuitem
		      <li class="nav-item"> <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a> </li>
		-->
		<!-- Dropdown menu example
		      <li class="nav-item dropdown">
		        <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
		        <div class="dropdown-menu" aria-labelledby="dropdown01">
		          <a class="dropdown-item" href="#">Action</a>
		          <a class="dropdown-item" href="#">Another action</a>
		          <a class="dropdown-item" href="#">Something else here</a>
		        </div>
		      </li>
		-->
		    </ul>

		<!--  Search field inside the NavBar 
		    <form class="form-inline my-2 my-lg-0">
		      <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
		      <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
		    </form>
		-->

		    <ul class="nav navbar-nav navbar-right">
			<?php if(UserModel::isLoggedIn()) : ?>
    			    <li class='nav-item active'>
    			    	<!-- Profile page link -->
    			    	<!-- <a class='nav-link' href="<?php echo ROOT_URL; ?>/user/profile">Welcome <?php echo $_SESSION['user_data']['name']; ?>!</a> -->
    			    	<a class='nav-link disabled'>Welcome <?php echo $_SESSION['user_data']['name']; ?>!</a>
    			    </li>
            		<li class='nav-item active'>
            			<a class='nav-link' href="<?php echo ROOT_URL; ?>/user/logout">Logout</a>
            		</li>
            		<?php else : ?>
    			    <li class='nav-item active'><a class='nav-link' href="<?php echo ROOT_URL; ?>/user/login">Login</a></li>
            		    <li class='nav-item active'><a class='nav-link' href="<?php echo ROOT_URL; ?>/user/register">Register</a></li>
            		<?php endif; ?>
          	    </ul>
		  </div>
		</nav>

		<!-- The main content goes here -->
		<div class="container">

		  <!-- <div class="row"> -->
		    <?php
		    // echo '<pre>', var_dump($_SESSION), '</pre>'; // for debugging purposes only
		    	Messages::display(); 
		    	require($view); 
		    ?>
		  <!-- </div> -->

		</div><!-- /.container -->

		<!-- Load the JavaScript programs after the main content to speed up the loading process -->
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

	</body>
</html>


