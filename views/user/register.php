<br />
	<div class="card">
		<div class="card-body">
			<h3 class='card-title'>User Registration</h3>
			<form method="post" action="<?php echo ROOT_PATH,'user/register'; ?>">
				<div class="form-group row">
					<label class='col-sm-2 col-form-label'>Name: </label>
					<input type="text" name="name" class="col-sm-10 form-control" />
				</div>
				<div class="form-group row">
					<label class='col-sm-2 col-form-label'>E-mail:  </label>
					<input type="text" name="email" class="col-sm-10 form-control" />
				</div>
				<div class="form-group row">
					<label class='col-sm-2 col-form-label'>Password: </label>
					<input type="password" name="password" rows=6 class="col-sm-10 form-control"></textarea>
				</div>
				<div class="form-group row">
					<label class='col-sm-2 col-form-label'>Password Confirmation: </label>
					<input type="password" name="passwordagain" class="col-sm-10 form-control" />
				</div>
				<input class="btn btn-primary" type="submit" name="submit" value="Register" />
				<!-- a class="btn btn-danger" href="<?php echo ROOT_PATH; ?>home">Cancel</a> -->
			</form>
		</div>
	</div>
