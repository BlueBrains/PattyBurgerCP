<?php if(isset($note)):?>
<div class="alert alert-<?php echo $class?> alert-dismissable">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	<?php echo $note?>.
</div>
<?php endif;?>
  <div class="row" style="text-align : right">
  
  <div class="col-lg-6">
<h1>
                         التحكم بقوائم الطعام
                        </h1>
						<div class="panel panel-primary" >
                            <div class="panel-heading">
                                <h3 class="panel-title">إضافة /تعديل القوائم</h3>
                            </div>
							<center>
								<div class="panel-body" style="width : 90%">
								<div class="row">
									<form action ="<?php echo base_url()?>rest_admin/edit_list" method="post">
										<label>اختر القائمة </label>
										<div class="row">
										
										<div class="col-lg-6">
												<div class="form-group" style="direction: rtl;">
													<label >تعديل قائمة الوجبات</label>
													<select class="form-control chzn-select" name="list_type">
														<?php if(isset($record1)&&is_array($record1)):?>
														<?php foreach ($record1 as $rows):?>
														 <option value="<?php echo $rows->id ?>" > <?php echo $rows->lists_name?></option>
														<?php endforeach;?>
														<?php endif;?>
													</select>
												</div>
										</div>
										<input type="hidden" value="<?php echo $this->session->userdata('res_id');?>" name='id'>
											<div class="col-lg-6"><button type="submit" class="btn btn-success">الانتقال إلى القائمة </button></div>
										</div>	
									</form>
									</div>
									<hr>
									
									<form action ="<?php echo base_url()?>rest_admin/add_list" method="post">
										<div class="row">
										<div class="col-lg-6">
											    <div class="form-group" style="direction: rtl;">
													
													<input type="text" class="form-control" name="listname" id="phone2" value="" placeholder="ادخل اسم قائمة غير موجود مسبقا">
												</div>
										</div>
										<div class="col-lg-6">
										<label >اسم القائمة الجديدة</label>
										</div>
										</div>
										<div class="row">
											
												<div class="col-lg-4">
													<button type="submit" class="btn btn-success" style="margin-left: 150%;">إضافة القائمة </button>
												</div>
											
										</div>
									</form>
									
								</div>
							</center>
							</div>
                        
	</div>				
<div class="col-lg-6">
  <h1>
                         إضافة وجبة
                        </h1>
						
						<div class="panel panel-primary" >
                            <div class="panel-heading">
                                <h3 class="panel-title">أدخل الوجبة</h3>
                            </div>
							<center>
								<div class="panel-body" style="width : 90%">
									<form enctype="multipart/form-data" action ="<?php echo base_url()?>rest_admin/edit_meals" method="post">
										<div class="row">
											<div class="form-group" style="direction: rtl;">
													<label >اسم الوجبة</label>
													<input type="text" class="form-control" name="meal_name" id="user" value="" placeholder="اسم الوجبة">
												</div>
										</div>
										<hr>
										<div class="row">
											<div class="col-lg-6">
											    <div class="form-group" style="direction: rtl;">
													<label >سعر الوجبة</label>
													<input type="text" class="form-control" name="meal_price" id="phone2" value="" placeholder=" سعر الوجبة">
												</div>
												<div class="form-group" style="direction: rtl;">
													<label >تخفيض على الوجبة</label>
													<input type="text" class="form-control" name="meal_discount" id="phone3" value="" placeholder="نسبة التخفيض أو العرض ">
												</div>
												<div class="form-group">
													 <label >رفع صورة الوجبة</label>
													<input type="file" name="fic" id="fic"  />
											   </div>
											</div>
											<div class="col-lg-6">
												<div class="form-group" style="direction: rtl;">
													<label >نوع الوجبة</label>
													<select class="form-control chzn-select" name="meal_list">
														<?php if(isset($record)&&is_array($record)):?>
														<?php foreach ($record as $rows):?>
														 <option value="<?php echo $rows->id ?>" > <?php echo $rows->lists_name?></option>
														<?php endforeach;?>
														<?php endif;?>
													</select>
												</div>
											
											<div class="form-group" style="direction: rtl;">
													<label >وصف الوجبة</label>
														<textarea name="meal_description" style="height: 133px;width: 100%;"></textarea>
												</div>
											</div>
											
											<div class="row">
											<center>
											<input type="hidden" value="<?php echo $this->session->userdata('res_id');?>" name='id'>	
											<p style="direction:rtl;">

											<button type="submit" class="btn btn-success">إضافة الوجبة</button>
											</p>
											</center>
											</div>
									</form>
								</div>
							</center>
								</div>
							</center>
							</div>
</div>
</div>
