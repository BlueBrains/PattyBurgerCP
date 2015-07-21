		<?php $this->load->view('includes/header.php');  ?>

		<?php $this->load->view('includes/sidebar.php');  ?>
		
         <div class="content-wrapper">
			        <section class="content">
						<div class="row">
						<div class="col-md-12">
						<?php if($this->session->userdata('logged_in')&&($this->session->userdata('role')>2)): ?>
						<div class="row">
							<div class="col-md-3 col-sm-6 col-xs-12">
							  <div class="info-box bg-aqua">
								<span class="info-box-icon"><i class="fa fa-bell"></i></span>
								<div class="info-box-content">
								  <span class="info-box-text">Waiting Approve</span>
								  <span class="info-box-number">41,410</span>
								  <div class="progress">
									<div class="progress-bar" style="width: 70%"></div>
								  </div>
								  <span class="progress-description">
									70% Increase in 30 Days
								  </span>
								</div><!-- /.info-box-content -->
							  </div><!-- /.info-box -->
							</div><!-- /.col -->
							<div class="col-md-3 col-sm-6 col-xs-12">
							  <div class="info-box bg-green">
								<span class="info-box-icon"><i class="fa fa-barcode"></i></span>
								<div class="info-box-content">
								  <span class="info-box-text">Delivered Orders</span>
								  <span class="info-box-number">41,410</span>
								  <div class="progress">
									<div class="progress-bar" style="width: 70%"></div>
								  </div>
								  <span class="progress-description">
									70% Increase in 30 Days
								  </span>
								</div><!-- /.info-box-content -->
							  </div><!-- /.info-box -->
							</div><!-- /.col -->
							<div class="col-md-3 col-sm-6 col-xs-12">
							  <div class="info-box bg-yellow">
								<span class="info-box-icon"><i class="fa fa-truck"></i></span>
								<div class="info-box-content">
								  <span class="info-box-text">On the way</span>
								  <span class="info-box-number">41,410</span>
								  <div class="progress">
									<div class="progress-bar" style="width: 70%"></div>
								  </div>
								  <span class="progress-description">
									70% Increase in 30 Days
								  </span>
								</div><!-- /.info-box-content -->
							  </div><!-- /.info-box -->
							</div><!-- /.col -->
							<div class="col-md-3 col-sm-6 col-xs-12">
							  <div class="info-box bg-red">
								<span class="info-box-icon"><i class="fa fa-cutlery"></i></span>
								<div class="info-box-content">
								  <span class="info-box-text">Not ready</span>
								  <span class="info-box-number">41,410</span>
								  <div class="progress">
									<div class="progress-bar" style="width: 70%"></div>
								  </div>
								  <span class="progress-description">
									70% Increase in 30 Days
								  </span>
								</div><!-- /.info-box-content -->
							  </div><!-- /.info-box -->
							</div><!-- /.col -->
						  </div><!-- /.row -->
						  <?php endif; ?>
						  
								<?php $this->load->view($main_content);  ?>
							</div>
						</div>
					</section><!-- /.content -->
		</div><!-- /.content-wrapper -->
		
		<?php $this->load->view('includes/footer.php');  ?>