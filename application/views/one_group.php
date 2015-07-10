
<label><h3>تفاصيل المجموعة</h3></label><hr>
<center>
	<div class="panel-body" style="width : 90%">
				<form action ="<?php echo base_url()?>manager/update_group" method="post">
				
				<?php if(isset($record)&& is_array($record)):?>
				<?php foreach ($record as $rows):?>
				<div class="row">
					<div class="form-group" style="direction: rtl;">
							<label >اسم المجموعة</label>
							<input type="text" class="form-control" name="name" id="user" value="<?php echo $rows->name ?>">
					</div>
					<div class="form-group" style="direction: rtl;">
							<label >وصف المجموعة</label>
							<textarea  name="description" style="width: 100%;height: 100px;">
							<?php echo $rows->description?>
							</textarea>
					</div>
					<input type="hidden" name="id"  value="<?php echo $rows->id?>">
					<button type="submit" class="btn btn-warning">تعديل البيانات</button>
				</div>
				<?php endforeach; ?>
				<?php endif; ?>
	</div>