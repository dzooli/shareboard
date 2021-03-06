<div>
	<?php if(UserModel::isLoggedIn()) : ?>
		<p><a class="btn btn-success btn-share" href="<?php echo ROOT_PATH; ?>share/add">Share Something</a></p>
	<?php else : ?>
	    <p></p>
	<?php endif ; ?>
	<?php foreach($viewmodel as $item) : ?>
		<div align='left' class="card">
		   <div class='card-body'>
			<h4 class='card-title'><?php echo $item['title']; ?></h4>
			<span><small><?php echo $item['create_date']; ?></small></span>
			<!-- <span class="text-right"><small><?php echo $item['user_id']; ?></small></span> -->
			<hr />
				<div class="card-text">
					<?php echo $item['body']; ?>
				</div>
				<hr />
				<a class="card-link" href="<?php echo $item['link']; ?>" target='_blank'>Read more</a>
		   </div>
		</div>
	<?php endforeach; ?>
</div>
