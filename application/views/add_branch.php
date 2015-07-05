
<label><h3>Type of Shop</h3></label><hr>
<center>
	<div class="panel-body" style="width : 90%">
				<form action ="<?php echo base_url()?>manager/update_type" method="post">
				
				<?php if(isset($record)&& is_array($record)):?>
				<?php foreach ($record as $rows):?>
				<div class="row">
					<div class="form-group" style="direction: rtl;">
							<label >Name</label>
							<input type="text" class="form-control" name="name" id="user" value="<?php echo $rows->name ?>">
					</div>
					<input type="hidden" name="id"  value="<?php echo $rows->id?>">
					<button type="submit" class="btn btn-warning">Edit Name</button>
				</div>
				<?php endforeach; ?>
				<?php endif; ?>
	</div>