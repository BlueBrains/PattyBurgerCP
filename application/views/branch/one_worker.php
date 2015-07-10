
<label><h3>بيانات الموظف</h3></label>
<center>
	<div class="panel-body" style="width : 90%">
	        <form action="<?php echo base_url()?>rest_admin/update_worker" method="POST">
				<?php if(isset($record)&& is_array($record)):?>
				<?php foreach ($record as $row):?>
				<div class="row" style="direction: rtl;">
				<div class="row">
						<div class="form-group" style="direction: rtl;">
							<label >اسم المستخدم</label>
							<input type="text" class="form-control"  value="<?php echo $row->first_name." ".$row->last_name?>" disabled>
						</div>
						<div class="form-group" style="direction: rtl;">
							<label >رقم الهاتف النقال</label>
							<input type="text" class="form-control"  value="<?php echo $row->phone?>" disabled>
						</div>
						<div class="form-group" style="direction: rtl;">
							<label >البريد الالكتروني</label>
							<input type="text" class="form-control" value="<?php echo $row->email?>" disabled>
						</div>
						<input type="hidden" name="w_id" value="<?php echo $row->w_id?>" />
						<input type="hidden" name="u_id" value="<?php echo $row->u_id?>" />
				</div>
				<hr>
				<div class="row">
					<div class="col-lg-12">
						<div class="row" style="width: 95%;margin-right: 10px;">
					<div class="form-group" >
						<div class="row">
							<label >الفرع الذي سيعمل به</label>
						</div>
						<div class="row">	
						  <select class="form-control" name="branch_id">
							<?php if(isset($record1)&&is_array($record1)):?>
								<?php foreach ($record1 as $rows):?>
									<option value='<?php echo $rows->id ?>' <?php if($rows->id==$row->res_id) echo "selected";?>><?php echo $rows->address ?></option>
								<?php endforeach;?>
							<?php endif;?>
						  </select>
						</div>	
					</div>
					<br><br>
 				 </div>
				<div class="row" style="width: 95%;margin-right: 10px;">
					<div class="form-group" >
					<div class="row">
							<label >الشاغر الذي سيشغله</label>
						</div>
						<div class="row">	
						  <select class="form-control" name="group">
							<?php if(isset($record2)&&is_array($record2)):?>
								<?php foreach ($record2 as $rows):?>
									<option value='<?php echo $rows->id ?>' <?php if($rows->id==$row->group_id) echo "selected";?>><?php echo $rows->name ?></option>
								<?php endforeach;?>
							<?php endif;?>
						  </select>
						</div>	
					</div>
					<br><br>
 				 </div>
					</div>
				</div>
				<?php endforeach; ?>
				<?php endif; ?>
	</div>
	<input type="submit" class="btn btn-primary btn-block btn-flat" value="حفظ التعديلات" id="last_sub">
	</form>
</div>	
</center>