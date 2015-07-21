 <link href="<?php echo base_url()?>assets/plugins/jquery.fancybox-1.3.4/fancybox/jquery.fancybox-1.3.4.css" rel="stylesheet" />
<link rel="stylesheet" href="<?php echo base_url()?>assets/css/bootstrap-fileupload.min.css" />
<div class="row" style="text-align : right">
  <div class="col-lg-12">
						<div class="panel panel-primary" >
                            <div class="panel-heading">
                                <h3 class="panel-title">يمكنك تعديل بيانات الوجبة</h3>
                            </div>
							
							<?php if(isset($num)&&($num>1)):?>
								<div class="alert alert-info">
									عدد الوجبات المتطابقة <?php echo $num;?><a href='<?php echo base_url()?>rest_admin/searched_res/id/<?php echo $id ?>/list_type/<?php echo $list_type ?>/mid/<?php echo $result ?>' class="alert-link">عرض جميع النتائج</a>.
                                </div>
							<?php endif; ?>
							
							<center>
								<div class="panel-body" style="width : 90%">
									<form enctype="multipart/form-data" action ="<?php echo base_url()?>rest_admin/update_meal" method="post">
										<?php if(isset($record)&&is_array($record)):?>
											<?php foreach ($record as $rows):?>
												<div class="row">
													<div class="form-group" style="direction: rtl;">
															<label >اسم الوجبة</label>
															<input type="text" class="form-control" id="user" value="<?php echo $rows->name ?>" placeholder="اسم الوجبة" disabled>
														</div>
												</div>
												<hr>
												<div class="row">
													<div class="col-lg-6">
														<div class="form-group" style="direction: rtl;">
															<label >سعر الوجبة</label>
															<input type="text" class="form-control" name="meal_price"  value="<?php echo $rows->price ?>" placeholder=" سعر الوجبة">
														</div>
														<div class="form-group" style="direction: rtl;">
															<label >الوقت المتوقع لإنهاء الطلب</label>
															<input type="text" class="form-control" name="meal_discount"  value="<?php echo $rows->preparing_time ?>" placeholder="">
														</div>
														<div class="form-group" style="direction: rtl;">
															<label >القائمة التي تنتمي إليها</label>
															<select class="form-control chzn-select" name="meal_list">
																<?php if(isset($record1)&&is_array($record1)):?>
																<?php foreach ($record1 as $row):?>
																 <option value="<?php echo $row->id ?>" <?php if($row->id == $rows->category_id) echo "selected"; ?>> <?php echo $row->name?></option>
																<?php endforeach;?>
																<?php endif;?>
															</select>
														</div>
														<?php if(strlen($rows->image)>1):?>
														<a  id="example1" href="<?php echo base_url().'uploads/res'.$this->session->userdata('branch_id').'/mealimg/'.$rows->image?>"  title="<?php echo $rows->name ?>"><img  style="width: 100%;margin-top: 25px;"src="<?php echo base_url().'uploads/res'.$this->session->userdata('branch_id').'/mealimg/'.$rows->image?>" alt="" /></a>
														<?php else:?>
														<a  id="example1" href="<?php echo base_url().'uploads/default/meal.jpg'?>"  title="ارفع صورة وجبتك"><img  style="width: 100%;margin-top: 20px;"src="<?php echo base_url().'uploads/default/meal.jpg'?>" alt="" /></a>
														<?php endif;?>
													</div>
													<div class="col-lg-6">
													<div class="form-group" style="direction: rtl;">
															<label >التفاصيل</label>
																<textarea name="meal_description" style="height: 200px;width: 100%;"><?php echo $rows->details ?></textarea>
													</div>
														<div class="row">
															<label class="control-label">تغيير صورة الوجبة</label>
														</div>
														<div class="row">
															<div class="form-group">
																	<div class="fileupload fileupload-new" data-provides="fileupload">
																		<div class="fileupload-preview thumbnail" style="width: 200px; height: 150px;"></div>
																		<div>
																			<span class="btn btn-file btn-success"><span class="fileupload-new">اختر صورة جديدة</span><span class="fileupload-exists">تغيير الصورة</span><input type="file" name="fic" id="fic"/></span>
																			<a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload">حذف</a>
																		</div>
																	</div>
															</div>
														</div>	
													</div>
													
													<div class="row">
													<center>
													<input type="hidden" value="<?php echo $this->session->userdata('branch_id');?>" name='id'>
													<input type="hidden" value="<?php echo $p;?>" name='p'>	
													<input type="hidden" value="<?php echo $list_type;?>" name='list_type'>	
													<input type="hidden" value="<?php echo $rows->id;?>" name='meal_id'>
													<input type="hidden" value="<?php echo $rows->image;?>" name='meal_image'>													
													
													<p style="direction:rtl;">

													<button type="submit" class="btn btn-info">حفظ التعديلات</button>
													</p>
													</center>
													</div>
											<?php break; endforeach;?>
										<?php endif;?>
									</form>
								</div>

							</div>
								
               </center>         
	</div>
</div>
    