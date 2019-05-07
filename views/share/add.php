<br />
	<div class="card">
		<div class="card-body">
			<h3 class='card-title'>Share Something!</h3>
			<form method="post" action="<?php echo ROOT_PATH,'share/add'; ?>">
				<div class="form-group row">
					<label class='col-sm-2 col-form-label'>Shared Title: </label>
					<input type="text" name="title" class="col-sm-10 form-control" />
				</div>
				<div class="form-group row">
					<label class='col-sm-2 col-form-label'>Shared Link: </label>
					<input type="text" name="link" class="col-sm-10 form-control" />
				</div>
				<div class="form-group row">
					<label class='col-sm-2 col-form-label'>Shared Text: </label>
					<textarea type="text" name="body" rows=6 class="col-sm-10 form-control"></textarea>
				</div>
				<input class="btn btn-primary" type="submit" name="submit" value="Done" />
				<a class="btn btn-danger" href="<?php echo ROOT_PATH; ?>share">Cancel</a>
			</form>
		</div>
	</div>
