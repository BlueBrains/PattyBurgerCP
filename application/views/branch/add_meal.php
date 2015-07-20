  <div class="col-lg-3"></div>
  <div class="col-lg-6">
						<div  id="itemform" > 
						<div class="panel panel-primary" >
                            <div class="panel-heading">
                                <h3 class="panel-title">إضافة وجبة جديدة</h3>
                            </div>
							<center>
								<div class="panel-body" style="width : 90%">
									
										<form action ="<?php echo base_url()?>rest_admin/add_meal" method="post">
										 <div class="control-group" style="direction: rtl;">
													<label >اختر قائمة الطعام</label>
													<div class="controls">
													  <select id="selectError1" data-rel="chosen"  name="list_id" style="width: 100%;">
														<?php if(isset($record)&&is_array($record)):?>
														<?php foreach ($record as $rows):?>
														 <option value="<?php echo $rows->id ?>" > <?php echo $rows->name?></option>
														<?php endforeach;?>
														<?php endif;?>
													</select>
													</div>
												  </div>
										<div class="row">
											    <div class="form-group" style="direction: rtl;">
													<label >اسم الوجبة</label>
													<input type="text" class="form-control" name="name" value="" placeholder="احرص على أن لا تكون وجبة موجودة">
												</div>
										</div>
										<div class="row">
												<div class="form-group" style="direction: rtl;">
														<label >وصف الوجبة</label>
															<textarea name="description" style="height: 133px;width: 100%;"></textarea>
												</div>
										</div>	
											<div class="row">
											<center>
											<p style="direction:rtl;">

											<button type="submit" class="btn btn-success">إضافة الوجبة</button>
											</p>
											</center>
											</div>
									</form>
									</div>
								
							</center>
							</div>
                       </div> 
	</div>	
	<div class="col-lg-3"></div>