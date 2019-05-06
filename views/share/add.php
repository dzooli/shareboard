<div>
	<div class="panel panel-default">
		<div class="panel-title">
			<h3 class="panel-title">Share Something!</h3>
		</div>
		<div class="panel-body">
			<form method="post" action="<?php echo ROOT_PATH,'share/add'; ?>">
				<div class="form-inline">
					<label>Shared Title: </label>
					<input type="text" name="title" class="form-control" />
				</div>
				<div class="form-inline">
					<label>Shared Link: </label>
					<input type="text" name="link" class="form-control" />
				</div>
				<div class="form-inline">
					<label>Shared Text: </label>
					<textarea type="text" name="body" class="form-control"></textarea>
				</div>
				<br />
				<input class="btn btn-primary" type="submit" name="submit" value="Done" />
				<a class="btn btn-danger" href="<?php echo ROOT_PATH; ?>share">Cancel</a>
			</form>
		</div>
	</div>
</div>