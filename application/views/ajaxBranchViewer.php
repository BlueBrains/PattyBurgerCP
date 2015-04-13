<div class="row" style="text-align : right">
  <div class="col-lg-12">
						<div class="panel panel-primary" >
                            <div class="panel-heading">
                                <h3 class="panel-title">يمكنك تعديل البيانات إن أردت</h3>
                            </div>
							<center>
								<div class="panel-body" style="width : 90%">
									<form enctype="multipart/form-data" action ="<?php echo base_url()?>rest_admin/update_branches" method="post">
										<?php if(isset($record)&&is_array($record)):?>
														<?php foreach ($record as $rows):?>
										<div class="row">
											<div class="col-lg-6">
											    <div class="form-group" style="direction: rtl;">
													<label >رقم الهاتف 2</label>
													<input type="text" class="form-control" name="phone2" id="phone2" value="<?php echo $rows->phone2?>" placeholder="رقم الهاتف الثاني">
												</div>
												<div class="form-group" style="direction: rtl;">
													<label >رقم الهاتف3</label>
													<input type="text" class="form-control" name="phone3" id="phone3" value="<?php echo $rows->phone3 ?>" placeholder="رقم الهاتف الثالث">
												</div>
											</div>
											<div class="col-lg-6">
												<div class="form-group">
													<label >عنوان الفرع</label>
													<input type="text" class="form-control" name="res_add" id="address_ar"value="<?php echo $rows->Branch_Address ?>" placeholder="">
												</div>
												<div class="form-group" style="direction: rtl;">
													<label >رقم الهاتف 1</label>
													<input type="text" class="form-control" name="phone1" id="phone1" value="<?php echo $rows->phone1 ?>" placeholder="رقم الهاتف الاول">
												</div>
											</div>
											</div>
											<div class="row">
											<p style="direction:rtl;">
											<input type="hidden" value="<?php echo $this->session->userdata('res_id');?>" name='id'>
											<input type="hidden" value="<?php echo $rows->id;?>" name='br_id'>
											<button type="submit" class="btn btn-warning">حفظ التعديلات</button>
											</p>
											</div>
										<?php endforeach;?>
										<?php endif;?>
									</form>
								</div>

							</div>
               </center>         
	</div>
</div>