<?php $this->load->view('includes/header.php');  ?>
	 <!--PAGE CONTENT -->
        <div id="content">

            <div class="inner" style="min-height:1200px;">
                <div class="row">
                    <div class="col-lg-12">
            <div class="inner" style="min-height:1200px;">
                <div class="row">
 <div class="col-lg-12">
						
						<div class="panel panel-primary" >
                            <div class="panel-heading">
                                <h3 class="panel-title"> قم بإضافة محلك هنا</h3>
                            </div>
							<center>
								<div class="panel-body" style="width : 90%">
									<form enctype="multipart/form-data" action ="<?php echo base_url()?>manager/singup" method="post">
										<div class="row">
											<div class="col-lg-6">
											    <div class="form-group" style="direction: rtl;">
													<label >رقم الهاتف 2</label>
													<input type="text" class="form-control" name="phone2" id="phone2" value="" placeholder="رقم الهاتف الثاني">
												</div>
												<div class="form-group" style="direction: rtl;">
													<label >رقم الهاتف3</label>
													<input type="text" class="form-control" name="phone3" id="phone3" value="" placeholder="رقم الهاتف الثالث">
												</div>
												<div class="form-group">
													 <label >رفع الشعار</label>
													<input type="file" name="fic" id="fic"  />
											   </div>
											</div>
											<div class="col-lg-6">
												<div class="form-group">
													<label >اسم المطعم</label>
													<input type="text" class="form-control" name="res_name" id="address_ar"value="" placeholder="">
												</div>
												<div class="form-group" style="direction: rtl;">
													<label >نوع المجل التجاري</label>
													<select name="type">
														<?php if(isset($record)&&is_array($record)):?>
														<?php foreach ($record as $rows):?>
														 <option value="<?php echo $rows->id ?>" > <?php echo $rows->name?></option>
														<?php endforeach;?>
														<?php endif;?>
													</select>
												</div>
												<div class="form-group" style="direction: rtl;">
													<label >رقم الهاتف 1</label>
													<input type="text" class="form-control" name="phone1" id="phone1" value="" placeholder="رقم الهاتف الاول">
												</div>
												<div class="form-group" style="direction: rtl;">
													<label >عنوان الفرع الرئيسي</label>
													<input type="text" class="form-control" name="res_address" id="res_address" value="" placeholder="">
												</div>
											</div>
											
											<div class="row">
											<center>
												
											<p style="direction:rtl;">

											<button type="submit" class="btn btn-success">إضافة المطعم </button>
											</p>
											</center>
											</div>
									</form>
								</div>
							</center>
						</div>
                        
	</div>				
</div>
                </div>

                <hr />




            </div>
	
                    </div>
                </div>

            




            </div>




        </div>
       <!--END PAGE CONTENT -->

<?php $this->load->view('includes/footer.php');  ?>