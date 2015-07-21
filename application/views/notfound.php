<div class="row">
  <div class="col-lg-12">
						<div class="panel panel-<?php if(isset($search) && strlen($search)>2) echo "warning"; else echo 'danger' ;?>" >
                            <div class="panel-heading">
                                <h3 class="panel-title">Search Results</h3>
                            </div>
							<center>
								<div class="panel-body" style="width : 90%">
									<?php if(isset($search) && strlen($search)>2):?>
									<img  style="margin-top: 20px;"src="<?php echo base_url().'uploads/default/notfound.JPG'?>" alt="" />
									<div class="alert alert-warning" style="margin-top: 10px;">
										There is No Results Matching [ <?php echo $search?> ] .
									</div>
									<?php else :?>
									<img  style="margin-top: 20px;"src="<?php echo base_url().'uploads/default/angry.JPG'?>" alt="" />
									<div class="alert alert-danger"style="margin-top: 10px;">
										Too short word to search try again .
									</div>
									<?php endif;?>
								</div>

							</div>
               </center>         
	</div>
</div>