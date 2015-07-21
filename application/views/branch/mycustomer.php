												<div class="row" id="result_of" style="margin-right: 10px;">
												<div class="col-lg-4"></div>
												 <?php if(!isset($trusted_cust)||($trusted_cust==0)):?>
													<div class="col-lg-4"> 
													<button type="button" class="btn btn-block btn-info btn-xs" onclick='trust_him(<?php echo $cid?>)'>إضافة إلى زبائن المطعم</button> 
													</div>
													<div class="col-lg-4">	
													  <a class="text-red">ليس من زبائن المطعم</a>
													</div>
												<?php else:?>	
													<div class="col-lg-4"> 
													<button type="button" class="btn btn-warning btn-info btn-xs" onclick='untrust_him(<?php echo $cid?>)'>حذف من قائمة الزبائن</button> 
													</div>
													<div class="col-lg-4">	
													  <a class="text-green">زبون موثوق للمطعم</a>
													</div>
												<?php endif;?>
												</div>