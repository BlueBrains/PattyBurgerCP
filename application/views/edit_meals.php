<?php if(isset($note)):?>
<div class="alert alert-<?php echo $class?> alert-dismissable">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	<?php echo $note?>.
</div>
<?php endif;?>
  <div class="row" >			
<div class="col-lg-12">
  <h1>
                       ADD New Meal
                        </h1>
						
						<div class="panel panel-primary" >
                            <div class="panel-heading">
                                <h3 class="panel-title">Enter Meal Data</h3>
                            </div>
							<center>
								<div class="panel-body" style="width : 90%">
									<form enctype="multipart/form-data" action ="<?php echo base_url()?>rest_admin/edit_meals" method="post">
										<div class="row">
											<div class="form-group" style="direction: rtl;">
													<label >Meal Name</label>
													<input type="text" class="form-control" name="meal_name" id="user" value="" placeholder="">
												</div>
										</div>
										<hr>
										<div class="row">
											<div class="col-lg-6">
											    <div class="form-group" style="direction: rtl;">
													<label >Meal Price</label>
													<input type="text" class="form-control" name="meal_price" id="phone2" value="" placeholder="Number please">
												</div>
												<div class="form-group" style="direction: rtl;">
													<label >Discount on the meal</label>
													<input type="text" class="form-control" name="meal_discount" id="phone3" value="" placeholder="small words ">
												</div>
												<div class="form-group">
													 <label >Meal Pic</label>
													<input type="file" name="fic" id="fic"  />
											   </div>
											</div>
											<div class="col-lg-6">
												<div class="form-group">
													<label >Meal Type</label>
													<select class="form-control chzn-select" name="meal_list">
														<?php if(isset($record)&&is_array($record)):?>
														<?php foreach ($record as $rows):?>
														 <option value="<?php echo $rows->id ?>" > <?php echo $rows->lists_name?></option>
														<?php endforeach;?>
														<?php endif;?>
													</select>
												</div>
											
											<div class="form-group" style="direction: rtl;">
													<label >Description</label>
														<textarea name="meal_description" style="height: 133px;width: 100%;"></textarea>
												</div>
											</div>
											
											<div class="row">
											<center>
											<input type="hidden" value="<?php echo $this->session->userdata('res_id');?>" name='id'>	
											<p style="direction:rtl;">

											<button type="submit" class="btn btn-success">ADD It !</button>
											</p>
											</center>
											</div>
									</form>
								</div>
							</center>
								</div>
							</center>
							</div>
</div>
</div>
