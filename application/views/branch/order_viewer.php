									<div id="orderxs">
										<div class="page active" id="first_page_show">
											<p class="text-muted">1. معلومات الطلب</p>
												<div class="row">
												<div class="col-lg-2"></div>
												<div class="col-lg-8">	
												  <div class="form-group has-feedback">
													<input type="text" class="form-control" value="<?php if(isset($record)&&is_array($record)) echo $record[0]->c_name?>" disabled />
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
														<input type="text" class="form-control" value="<?php if(isset($record)&&is_array($record)) echo $record[0]->mobile_nbr ?>" disabled />
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
														<input type="text" class="form-control" value="<?php if(isset($record)&&is_array($record)) echo $record[0]->distination_address ?>" disabled />
														<span class="glyphicon glyphicon-home form-control-feedback"></span>
													  </div>
													</div>
													<div class="col-lg-2">	
													  <label> العنوان :</label>
													</div>
												</div>
												<div class="row" id="result_of">
												<div class="col-lg-4"></div>
												 <?php if(!isset($trusted_cust)||($trusted_cust==0)):?>
													<div class="col-lg-4"> 
													<button type="button" class="btn btn-block btn-info btn-xs" onclick='trust_him(<?php echo $record[0]->cid?>)'>إضافة إلى زبائن المطعم</button> 
													</div>
													<div class="col-lg-4">	
													  <a class="text-red">ليس من زبائن المطعم</a>
													</div>
												<?php else:?>	
													<div class="col-lg-4"> 
													<button type="button" class="btn btn-warning btn-info btn-xs" onclick='untrust_him(<?php echo $record[0]->cid?>)'>حذف من قائمة الزبائن</button> 
													</div>
													<div class="col-lg-4">	
													  <a class="text-green">زبون موثوق للمطعم</a>
													</div>
												<?php endif;?>
												</div>
												<hr>
												<div class="row">
												<div class="col-lg-2"><label> ليرة سورية </label></div>
												<div class="col-lg-6">	
												  <div class="form-group has-feedback">
													<input type="text" class="form-control" value="<?php if(isset($record)&&is_array($record)) echo $record[0]->bill_value?>" disabled />
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
													<input type="text" class="form-control" value="<?php if(isset($record)&&is_array($record)) echo $order_num?>" disabled />
													<span class="glyphicon glyphicon-plus-sign form-control-feedback"></span>
												  </div>
												</div>
												<div class="col-lg-4">	
												  <label> عدد الوجبات الكلية : </label>
												</div>
												</div>
										  </div>
									  <?php if(isset($record)&&is_array($record)):?>
										<?php foreach ($record as $rows):?>
										  <div class="page">
											<div class="row">
												<div class="col-lg-2"></div>
												<div class="col-lg-8">	
												  <div class="form-group has-feedback">
													<input type="text" class="form-control" value="<?php echo $rows->m_name?>" disabled />
													<span class="glyphicon glyphicon-cutlery form-control-feedback"></span>
												  </div>
												</div>
												<div class="col-lg-2">	
												  <label> اسم الوجبة : </label>
												</div>
											</div>
											<div class="row">
												<div class="col-lg-2"></div>
												<div class="col-lg-8">	
												  <div class="form-group has-feedback">
													<input type="text" class="form-control" value="<?php echo $rows->price?>" disabled />
													<span class="glyphicon glyphicon-usd form-control-feedback"></span>
												  </div>
												</div>
												<div class="col-lg-2">	
												  <label> سعر الوجبة : </label>
												</div>
											</div>
											<div class="row">
												<div class="col-lg-2"></div>
												<div class="col-lg-8">	
												  <div class="form-group has-feedback">
													<input type="text" class="form-control" value="<?php echo $rows->num?>" disabled />
													<span class="glyphicon glyphicon-paperclip form-control-feedback"></span>
												  </div>
												</div>
												<div class="col-lg-2">	
												  <label> العدد المطلوب : </label>
												</div>
											</div>
											<div class="row">
												<div class="col-lg-2"></div>
												<div class="col-lg-8">	
												  <div class="form-group has-feedback">
													<textarea disabled >
														<?php echo $rows->details?>
													</textarea>
												  </div>
												</div>
												<div class="col-lg-2">	
												  <label> وصف الوجبة : </label>
												</div>
											</div>
										  </div>
										  <?php endforeach;?>
										<?php endif;?>
										</div>  