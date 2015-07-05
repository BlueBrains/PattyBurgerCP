<div class="row" >
  <div class="col-lg-12">
  <h1>
                         ADD New Branch
                        </h1>
						
						<div class="panel panel-primary" >
                            <div class="panel-heading">
                                <h3 class="panel-title">ADD Branch Details</h3>
                            </div>
							<center>
								<div class="panel-body" style="width : 90%">
									<form enctype="multipart/form-data" action ="<?php echo base_url()?>rest_admin/add_branches" method="post">
										<div class="row">
											<div class="col-lg-6">
											    <div class="form-group" style="direction: rtl;">
													<label >Phone Number</label>
													<input type="text" class="form-control" name="phone2" id="phone2" value="" placeholder="">
												</div>
												<div class="form-group" style="direction: rtl;">
													<label >Phone Number</label>
													<input type="text" class="form-control" name="phone3" id="phone3" value="" placeholder="">
												</div>
											</div>
											<div class="col-lg-6">
												<div class="form-group">
													<label >Branch Address</label>
													<input type="text" class="form-control" name="res_add" id="address_ar"value="" placeholder="">
												</div>
												<div class="form-group" style="direction: rtl;">
													<label >Phone Number</label>
													<input type="text" class="form-control" name="phone1" id="phone1" value="" placeholder="">
												</div>
											</div>
											
											<div class="row">
											<p style="direction:rtl;">
											<input type="hidden" value="<?php echo $this->session->userdata('res_id');?>" name='id'>
											<button type="submit" class="btn btn-success">ADD New Branch </button>
											</p>
											</div>
										</div>	
									</form>
								</div>

							</div>
               </center>         
	</div>
</div>