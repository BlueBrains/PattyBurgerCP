<link id="base-style" href="<?php echo base_url();?>select/style.css" rel="stylesheet">
<script type="text/javascript">
  // alert("yuiyiuyi");
        var base_url = "<?php echo base_url();?>";
        var controller = 'rest_admin';
    </script>
<script>
function view_details(str) {
//var str = document.getElementById("allmeal").value;
  if (str=="") {
    document.getElementById("itemform").innerHTML="";
    return;
  } 
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.getElementById("allmeal").innerHTML=xmlhttp.responseText;
	  
	 $.getScript('<?php echo base_url();?>select/js/jquery-1.9.1.min.js');
		$.getScript('<?php echo base_url();?>select/js/jquery-migrate-1.0.0.min.js');
		$.getScript('<?php echo base_url();?>select/js/jquery-ui-1.10.0.custom.min.js');
		$.getScript('<?php echo base_url();?>select/js/jquery.chosen.min.js');
$.getScript('<?php echo base_url();?>select/js/jquery.uniform.min.js');
	$.getScript('<?php echo base_url();?>select/js/jquery.cleditor.min.js');
	$.getScript('<?php echo base_url();?>select/js/custom.js');		
    }
  }
  xmlhttp.open("GET",base_url+controller+"/get_meals/id/"+str,true);
  xmlhttp.send();
}


</script>

<?php if(isset($note)):?>
<div class="alert alert-<?php echo $class?> alert-dismissable">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	<?php echo $note?>.
</div>
<?php endif;?>
  <div class="row" >			
  <div class="col-lg-2"></div>
<div class="col-lg-8" style="direction: rtl;">
<center>
  <h1>
                       إضافة وجبة جديدة
                        </h1>
</center>						
						<div class="panel panel-primary" >
                            <div class="panel-heading">
                                <h3 class="panel-title">بينات الوجبة</h3>
                            </div>
								<div class="panel-body" style="width : 90%;margin-right: 20px;">
									<form enctype="multipart/form-data" action ="<?php echo base_url()?>rest_admin/edit_meals" method="post">
										<div class="row">
											<div class="row">
											<div class="col-lg-6">	
														<div class="alert alert-warning alert-dismissable">
															<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
															<h4><i class="icon fa fa-warning"></i>تنبيه!</h4>
															<a style="color: orange;" href="<?php echo base_url()?>rest_admin/edit_meals_lists">إذا لم تجد القائمة المطلوبة أدخل قائمة جديدة من هنا</a>
														</div>
													</div>
												<div class="col-lg-6">	
												 <div class="control-group">
													<label >اختر قائمة الطعام</label>
													<div class="controls">
													  <select id="selectError1" data-rel="chosen" onchange="view_details(this.value)" name="list_id" style="width: 100%;">
														<?php if(isset($record)&&is_array($record)):?>
														<?php foreach ($record as $rows):?>
														 <option value="<?php echo $rows->id ?>" > <?php echo $rows->name?></option>
														<?php endforeach;?>
														<?php endif;?>
													</select>
													</div>
												  </div>
												 </div> 
												 </div> 												  
												<div class="row"> 
												<div class="col-lg-6">	
														<div class="alert alert-warning alert-dismissable">
															<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
															<h4><i class="icon fa fa-warning"></i> تنبيه!</h4>
															<a style="color: orange;" href="<?php echo base_url()?>rest_admin/add_meal">إذا لم تعثر على الوجبة التي تريد تقديمها أدخل وجبة جديدة من هنا</a>
														</div>
													</div>
													<div class="col-lg-6">												
														<div class="control-group">
															<label >اختر الوجبة التي ترغب بإضافتها إلى قائمة طعامك</label>
															<div id="allmeal">
																<div class="controls">
																  <select id="selectError" data-rel="chosen" name="meal_id" style="width: 100%;">
																	<?php if(isset($record1)&&is_array($record1)):?>
																	<?php foreach ($record1 as $rows):?>
																	 <option value="<?php echo $rows->id ?>" > <?php echo $rows->name?></option>
																	<?php endforeach;?>
																	<?php endif;?>
																  </select>
																</div>
															</div>
														  </div>		
													</div> 
												 </div> 
										</div>
										<hr>
										<div class="row">
											<div class="col-lg-6">
											    <div class="form-group" style="direction: rtl;">
													<label >ثمن الوجبة</label>
													<input type="text" class="form-control" name="price" id="phone2" value="" placeholder="Number please">
												</div>
												<div class="form-group" style="direction: rtl;">
													<label >الزمن المتوقع لتلبية طلب الوجبة</label>
													<input type="text" class="form-control" name="preparing_time" id="phone3" value="" placeholder="small words ">
												</div>
												<div class="form-group">
													 <label >صورة الوجبة</label>
													<input type="file" name="fic" id="fic"  />
											   </div>
											</div>
											<div class="col-lg-6">
											<div class="form-group" style="direction: rtl;">
													<label >وصفة الوجبة</label>
														<textarea name="details" style="height: 133px;width: 100%;"></textarea>
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
								</div>
							</div>
</div>
</div>
<script src="<?php echo base_url();?>js/jquery.min.js"></script>