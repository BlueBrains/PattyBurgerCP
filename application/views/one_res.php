
<label><h3>بيانات المطعم </h3></label>
<center>
	<div class="panel-body" style="width : 90%">
				<?php if(isset($record)&& is_array($record)):?>
				<?php foreach ($record as $row):?>
				<div class="row">
				<div class="row">
					<div class="form-group" style="direction: rtl;">
							<label >اسم المستخدم</label>
							<input type="text" class="form-control"  value="<?php echo $row->first_name." ".$row->last_name?>" disabled>
						</div>
						<div class="form-group" style="direction: rtl;">
							<label >رقم الهاتف النقال</label>
							<input type="text" class="form-control"  value="<?php echo $row->phone?>" disabled>
						</div>
				</div>
				<hr>
				<div class="row">
					<div class="col-lg-6">
						<div class="form-group" style="direction: rtl;">
							<label >الحد الأدنى للأسعار</label>
							<input type="text" class="form-control" name="phone2" id="phone2" value="<?php echo $row->price_range?>" disabled>
						</div>
						<div class="form-group" style="direction: rtl;">
							<label >عدد فروع المطعم</label>
							<input type="text" class="form-control" value="<?php echo $number?>" disabled>
						</div>
						<div class="form-group">
							 <img  style="height: 130px;"class="img-thumbnail" src="<?php echo base_url()."uploads/".$row->logo?>" alt="">
					   </div>
					</div>
					<div class="col-lg-6">
						<div class="form-group">
							<label >اسم المطعم</label>
							<input type="text" class="form-control"  value="<?php echo $row->r_name?>" disabled>
						</div>
						<div class="form-group" style="direction: rtl;">
							<label >نوع المطعم</label>
							<input type="text" class="form-control" value="<?php echo $row->c_name?>" disabled>
						</div>
						<div class="form-group" style="direction: rtl;">
							<label >رقم هاتف المطعم</label>
							<input type="text" class="form-control"  value="<?php echo $row->phone_nbr?>" disabled>
						</div>
					</div>
				</div>
				<?php endforeach; ?>
				<?php endif; ?>
	</div>
</div>	
</center>