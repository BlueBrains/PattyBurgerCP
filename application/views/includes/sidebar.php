<script src="<?php echo base_url()?>js/jquery.min.js" type="text/javascript"></script> 
 <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="<?php echo base_url()?>assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
              <p>Welcome Admin Name</p>

              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <!-- search form -->
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN Control Panel</li>
			<?php if($this->session->userdata('logged_in')&&($this->session->userdata('role')==1)): ?>
			<li class="treeview">
              <a href="#">
                <i class="fa fa-user"></i>
                <span>Main tools</span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo base_url();?>manager"><i class="fa fa-circle-o"></i>Main Page</a></li>
				<li><a href="<?php echo base_url();?>manager/edit_types"><i class="fa fa-circle-o"></i>Edit Global shops Type</a></li>
				<li><a href="<?php echo base_url();?>manager/edit_groups"><i class="fa fa-circle-o"></i>Edit users Group</a></li>
                <li><a href="<?php echo base_url();?>manager/edit_resturants"><i class="fa fa-circle-o"></i>Edit Restaurants Activations</a></li>
              </ul>
            </li>
			
			<?php endif; ?>
			<?php if($this->session->userdata('logged_in')&&($this->session->userdata('role')==2)): ?>

			<li class="active treeview">
              <a href="#">
                <i class="fa fa-bar-chart-o"></i> <span>Statistics</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li class="active"><a href="index.html"><i class="fa fa-circle-o"></i> Basic Statistics</a></li>
                <li><a href="index2.html"><i class="fa fa-pie-chart"></i>Deep Statistics</a></li>
              </ul>
            </li>
			<li class="treeview">
              <a href="#">
                <i class="fa fa-code-fork"></i>
                <span>Branches</span><i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo base_url();?>rest_admin/add_branches/id/<?php echo $this->session->userdata('res_id')?>"><i class="fa fa-circle-o"></i>ADD New Branch</a></li>
                <li><a href="<?php echo base_url();?>rest_admin/all_branches/id/<?php echo $this->session->userdata('res_id')?>"><i class="fa fa-circle-o"></i>Edit Branches</a></li>
              </ul>
            </li>
			<li class="treeview">
              <a href="#">
                <i class="fa fa-users"></i>
                <span>الموظفون</span><i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo base_url();?>rest_admin/add_worker"><i class="fa fa-circle-o"></i> إضافة موظف</a></li>
                <li><a href="<?php echo base_url();?>rest_admin/edit_workers"><i class="fa fa-circle-o"></i>تعديل قائمة الموظفين</a></li>
              </ul>
            </li>
			<?php else :?>
			
			<?php if($this->session->userdata('logged_in')&&($this->session->userdata('role')==4)): ?>
			<li class="active treeview">
              <a href="#">
                <i class="fa fa-bar-chart-o"></i> <span>Statistics</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li class="active"><a href="index.html"><i class="fa fa-circle-o"></i> Basic Statistics</a></li>
                <li><a href="index2.html"><i class="fa fa-pie-chart"></i>Deep Statistics</a></li>
              </ul>
            </li>
			<?php endif;?>
			<li><a href=""><i class="fa fa-bell-o"></i> <span>APPROVE Request</span> <small class="label pull-right bg-green">new</small></a></li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-cutlery"></i>
                <span>Meals</span><i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo base_url();?>rest_admin/searching_for_meal/id/<?php echo $this->session->userdata('res_id')?>"><i class="fa fa-circle-o"></i> Search Meals</a></li>
                <li><a href="<?php echo base_url();?>rest_admin/edit_meals/id/<?php echo $this->session->userdata('res_id')?>"><i class="fa fa-circle-o"></i> Add New Meal</a></li>
                <li><a href="<?php echo base_url();?>rest_admin/edit_list/id/<?php echo $this->session->userdata('res_id')?>"><i class="fa fa-circle-o"></i> Edit Meal</a></li>
              </ul>
            </li>
            <li>
              <a href="<?php echo base_url()?>rest_admin/edit_meals_lists/id/<?php echo $this->session->userdata('res_id')?>">
                <i class="fa fa-plus-circle"></i> <span>Add new menu tab</span> 
              </a>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-money"></i>
                <span>Requests</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href=""><i class="fa fa-circle-o text-aqua"></i>ALL Requests<span class="label label-info pull-right">12</span></a></li>
                <li><a href=""><i class="fa fa-circle-o text-red"></i>Not Ready Requests<span class="label label-danger pull-right">2</span></a></li>
                <li><a href=""><i class="fa fa-circle-o text-yellow"></i>ON the way<span class="label label-warning pull-right">7</span></a></li>
                <li><a href=""><i class="fa fa-circle-o text-green"></i>Delivered Requests<span class="label label-success pull-right">3</span></a></li>
              </ul>
            </li>
			<?php endif; ?>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

 