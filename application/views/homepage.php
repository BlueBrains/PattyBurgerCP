<style>
.page { display: none; }
.active { display: inherit; }
</style>
            <div class="inner" style="min-height:1200px;">
                <div class="row">
 <div class="col-lg-12">
						
						<div class="panel panel-primary" >
                            <div class="panel-heading">
                                <h3 class="panel-title"> إضافة مطعم جديد</h3>
                            </div>
							<center>
								<div class="panel-body" style="width : 90%">
									<form enctype="multipart/form-data" action ="<?php echo base_url()?>manager/signup" method="post">
										<div class="page active">
												<div class="row">
													<div class="form-group" style="direction: rtl;">
														<div class="col-lg-2"></div>
														<div class="col-lg-6">													
															<input type="text" class="form-control" name="first_name" value="" placeholder="">
														</div>	
														<div class="col-lg-4">
															<label >الاسم الأول</label>
														</div>
													</div>
												</div>
												<br><br>
												<div class="row">
													<div class="form-group" style="direction: rtl;">
													<div class="col-lg-2"></div>
														<div class="col-lg-6">	
															<input type="text" class="form-control" name="last_name" value="" placeholder="">
														</div>
														<div class="col-lg-4">
															<label >الاسم الأخير</label>
														</div>															
													</div>
												</div>
												<br><br>
												<div class="row">
													<div class="form-group" style="direction: rtl;">
													<div class="col-lg-2"></div>
														<div class="col-lg-6">	
															<input type="text" class="form-control" name="mobile_num" >
														</div>	
														<div class="col-lg-4">
															<label >رقم الهاتف النقال</label>
														</div>
													</div>
												</div>
												<br><br>
												<div class="row">
													<div class="form-group" style="direction: rtl;">
													<div class="col-lg-2"></div>
														<div class="col-lg-6">	
														  <select class="form-control" name="gender">
															<option value='0'>ذكر</option>
															<option value='1'>أنثى</option>
														  </select>
														</div>	
														<div class="col-lg-4">
															<label >الجنس</label>
														</div>
													</div>
												</div>
										</div>
										<div class="page">
												<div class="row">
													<div class="form-group" style="direction: rtl;">
													<div class="col-lg-2"></div>
														<div class="col-lg-6">	
															<input type="text" class="form-control" name="email" id="email">
														</div>	
														<div class="col-lg-4">
															<label >البريد الالكتروني</label>
														</div>
													</div>
												</div>
												<br><br>
												<div class="row">
													<div class="form-group" style="direction: rtl;">
													<div class="col-lg-2"></div>
														<div class="col-lg-6">	
															<input type="password" class="form-control" name="password" value="" placeholder="">
														</div>
														<div class="col-lg-4">
															<label >رمز المرور</label>
														</div>															
													</div>
												</div>
												<br><br>
												<div class="row">
													<div class="form-group" style="direction: rtl;">
													<div class="col-lg-2"></div>
														<div class="col-lg-6">	
															<input type="rpassword" class="form-control" name="password" value="" placeholder="">
														</div>
														<div class="col-lg-4">
															<label >أعد كتابة رمز المرور</label>
														</div>															
													</div>
												</div>
												<br><br>
										</div>
										<div class="page">
											<div class="row">
												<div class="col-lg-6">
													<div class="form-group" style="direction: rtl;">
														<label >وصف المطعم</label>
														<textarea  class="form-control" name="disc" style="height: 100px;">
														</textarea>
													</div>
													<div class="form-group">
														 <label >رفع الشعار</label>
														<input type="file" name="fic" id="fic"  />
												   </div>
												</div>
												<div class="col-lg-6">
												    <div class="row">
														<div class="form-group">
															<div class="col-lg-8">
																<input type="text" class="form-control" name="res_name" id="address_ar"value="" placeholder="">
															</div>
															<div class="col-lg-4">
																<label >اسم المطعم</label>
															</div>																
														</div>	
													</div>
													<br><br>
													<div class="form-group" style="direction: rtl;" >
														<label style="margin-left: 44px;">نوع المحل التجاري</label>
														<select name="type" style="width: 59%;">
															<?php if(isset($record)&&is_array($record)):?>
															<?php foreach ($record as $rows):?>
															 <option value="<?php echo $rows->id ?>" > <?php echo $rows->name?></option>
															<?php endforeach;?>
															<?php endif;?>
														</select>
													</div>
													<br><br>
													 <div class="row">	
														<div class="form-group" style="direction: rtl;">
														    <div class="col-lg-8">
																<input type="text" class="form-control" name="phone1" id="phone1" value="" >
															</div>	
															<div class="col-lg-4">
																<label >رقم الهاتف الأساسي</label>
															</div>	
														</div>
													 </div>	
													 <br><br>
													<div class="row">	
														<div class="form-group" style="direction: rtl;">
														    <div class="col-lg-8">
																<input type="text" class="form-control" name="min" id="phone1" value="" >
															</div>	
															<div class="col-lg-4">
																<label >الحد الأدنى للأسعار</label>
															</div>	
														</div>
													 </div>	
												</div>
												
													
												<p style="direction:rtl;">
												
												</p>
											</div>
										</div>	
									
								</div>
								<hr>
									<div class="row" style="margin-bottom: 10px;width: 90%;">
										<div class="col-lg-4">
											<button type="submit" class="btn btn-success" id="last_sub" style="width:100%;">إضافة المطعم </button>
										</form>
										<button class="btn btn-block btn-info btn-sm" id="next">التالي</button>
										</div>
										<div class="col-lg-4"></div>
										<div class="col-lg-4">
										<button class="btn btn-block btn-warning btn-sm" id="prev">السابق</button>
										</div>
									</div>
							</center>
						</div>
                        
	</div>				
</div>
                </div>
<script src="<?php echo base_url()?>js/jquery.min.js" type="text/javascript"></script>
<script>
	if($(".page.active").index() == 0)
		{
			var link = document.getElementById('prev');
			link.style.display = 'none';
			var link = document.getElementById('last_sub');
			link.style.display = 'none';
		}
$("#prev").on("click", function(){
    if($(".page.active").index() > 0)
        $(".page.active").removeClass("active").prev().addClass("active");
	if($(".page.active").index() == 0)
		{
			var link = document.getElementById('prev');
			link.style.display = 'none';
		}
	if($(".page.active").index() != $(".page").length-1)
		{
			var link = document.getElementById('next');
			link.style.display = '';
			var link = document.getElementById('last_sub');
			link.style.display = 'none';
		}	
});
$("#next").on("click", function(){
    if($(".page.active").index() < $(".page").length-1)
        $(".page.active").removeClass("active").next().addClass("active");
	if($(".page.active").index() == $(".page").length-1)
		{
			var link = document.getElementById('next');
			link.style.display = 'none';
			var link = document.getElementById('last_sub');
			link.style.display = '';
		}
			var link = document.getElementById('prev');
			link.style.display = '';
			
});
</script>