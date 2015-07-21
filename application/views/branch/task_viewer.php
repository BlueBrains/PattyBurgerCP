									<div id="orderxs">
									<?php $i=0;?>
									 <?php if(isset($record)&&is_array($record)):?>
										<?php foreach ($record as $rows):?>
										<div class="page <?php if($i==0) {echo 'active'; $i++;}?>" id="first_page_show">
											<p class="text-muted">معلومات الطلب <?php echo "# ".$rows->o_id?></p>
												<div class="row">
												<div class="col-lg-2"></div>
												<div class="col-lg-8">	
												  <div class="form-group has-feedback">
													<input type="text" class="form-control" value="<?php echo $rows->c_name?>" disabled />
													<span class="glyphicon glyphicon-user form-control-feedback"></span>
												  </div>
												</div>
												<div class="col-lg-2">	
												  <label> اسم الزبون : </label>
												</div>
												</div>
												<div class="row">
													<div class="col-lg-2"></div>
													<div class="col-lg-8">	
													  <div class="form-group has-feedback">
														<input type="text" class="form-control" value="<?php echo $rows->mobile_nbr ?>" disabled />
														<span class="glyphicon glyphicon-phone form-control-feedback"></span>
													  </div>
													</div>
													<div class="col-lg-2">	
													  <label> رقم الهاتف :</label>
													</div>
												</div>
												<div class="row">
													<div class="col-lg-2"></div>
													<div class="col-lg-8">	
													  <div class="form-group has-feedback">
														<input type="text" class="form-control" value="<?php echo $rows->distination_address ?>" disabled />
														<span class="glyphicon glyphicon-home form-control-feedback"></span>
													  </div>
													</div>
													<div class="col-lg-2">	
													  <label> العنوان :</label>
													</div>
												</div>
												<hr>
												<div class="row">
												<div class="col-lg-2"><label> ليرة سورية </label></div>
												<div class="col-lg-6">	
												  <div class="form-group has-feedback">
													<input type="text" class="form-control" value="<?php echo $rows->bill_value?>" disabled />
													<span class="glyphicon glyphicon-usd form-control-feedback"></span>
												  </div>
												</div>
												<div class="col-lg-4">	
												  <label> السعر الكلي : </label>
												</div>
												</div>
												<div class="row">
												<div class="col-lg-2"></div>
												<div class="col-lg-6">	
												  <div class="form-group has-feedback">
													<input type="text" class="form-control" value="<?php echo $rows->expected_finish_time?>" disabled />
													<span class="glyphicon glyphicon-time form-control-feedback"></span>
												  </div>
												</div>
												<div class="col-lg-4">	
												  <label> الوقت المتوقع لتسليم الطلب : </label>
												</div>
												</div>
										  </div>
										  <?php endforeach;?>
										<?php endif;?>
										</div>  