
<label><h3>بيانات المطعم </h3></label><hr>
<center>
	<div class="panel-body" style="width : 90%">
				<?php if(isset($record)&& is_array($record)):?>
				<?php foreach ($record as $row):?>
				<div class="row">
				<div class="row">
					<div class="form-group" style="direction: rtl;">
							<label >اسم المستخدم</label>
							<input type="text" class="form-control" name="username" id="user" value="<?php echo $row->username?>" disabled>
						</div>
						<div class="form-group" style="direction: rtl;">
							<label >الحساب الالكتروني</label>
							<input type="text" class="form-control" name="email" id="email" value="<?php echo $row->email?>" disabled>
						</div>
				</div>
				<hr>
				<div class="row">
					<div class="col-lg-6">
						<div class="form-group" style="direction: rtl;">
							<label >رقم الهاتف 2</label>
							<input type="text" class="form-control" name="phone2" id="phone2" value="<?php echo $row->phone2?>" disabled>
						</div>
						<div class="form-group" style="direction: rtl;">
							<label >رقم الهاتف3</label>
							<input type="text" class="form-control" name="phone3" id="phone3" value="<?php echo $row->phone3?>" disabled>
						</div><!--
						<div class="form-group">
							 <img  style="height: 130px;"class="img-thumbnail" src="<?php echo base_url()."upload/".$row->res_logo?>" alt="">
					   </div>-->
					</div>
					<div class="col-lg-6">
						<div class="form-group">
							<label >اسم المطعم</label>
							<input type="text" class="form-control" name="res_name" id="address_ar" value="<?php echo $row->res_name?>" disabled>
						</div>
						<div class="form-group" style="direction: rtl;">
							<label >نوع المطعم</label>
							<input type="text" class="form-control" name="type" id="address_en" value="<?php echo $row->name?>" disabled>
						</div>
						<div class="form-group" style="direction: rtl;">
							<label >رقم الهاتف 1</label>
							<input type="text" class="form-control" name="phone1" id="phone1" value="<?php echo $row->phone1?>" disabled>
						</div>
						<div class="form-group" style="direction: rtl;">
							<label >عنوان الفرع الرئيسي</label>
							<input type="text" class="form-control" name="res_address" id="res_address" value="<?php echo $row->res_address?>" disabled>
						</div>
					</div>
				</div>
				<?php endforeach; ?>
				<?php endif; ?>
	</div>
</div>	