<div>
	<p><a class="btn btn-success btn-share" href="<?php echo ROOT_PATH; ?>share/add">Share Something</a></p>
	<!-- <ul> -->
	<?php foreach($viewmodel as $item) : ?>
		<!-- <li> -->
		<div class="btn btn-info text-left btn-share">
			<h4><?php echo $item['title']; ?></h4>
			<span><small><?php echo $item['create_date']; ?></small></span>
			<!-- <span class="text-right"><small><?php echo $item['user_id']; ?></small></span> -->
			<hr />
				<div class="form-control">
					<?php echo $item['body']; ?>
				</div>
				<hr />
				<a class="btn btn-success" href="<?php echo $item['link']; ?>" target='_blank'>Go To Website</a>
		</div>
		<!-- </li> -->
	<?php endforeach; ?>
	<!-- </ul> -->
</div>