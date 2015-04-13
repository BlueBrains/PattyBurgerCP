<div class="row" style="text-align : right">
  <div class="col-lg-12">
						<div class="panel panel-<?php if(isset($search) && strlen($search)>2) echo "warning"; else echo 'danger' ;?>" >
                            <div class="panel-heading">
                                <h3 class="panel-title">نتيجة البحث</h3>
                            </div>
							<center>
								<div class="panel-body" style="width : 90%">
									<?php if(isset($search) && strlen($search)>2):?>
									<img  style="margin-top: 20px;"src="<?php echo base_url().'uploads/default/notfound.JPG'?>" alt="" />
									<div class="alert alert-warning" style="margin-top: 10px;">
										لا يوجد نتائج مطابقة لـ  <?php echo $search?>.
									</div>
									<?php else :?>
									<img  style="margin-top: 20px;"src="<?php echo base_url().'uploads/default/angry.JPG'?>" alt="" />
									<div class="alert alert-danger"style="margin-top: 10px;">
										كلمة البحث قصيرة للغاية جرب مرة أخرى.
									</div>
									<?php endif;?>
								</div>

							</div>
               </center>         
	</div>
</div>