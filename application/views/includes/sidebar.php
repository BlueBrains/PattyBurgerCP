 <!-- MENU SECTION -->
       <div id="left">
            <ul id="menu" class="collapse">

				<li class="panel">
                    <a href="<?php echo base_url();?>manager" >
                        <i class="icon-table"></i> الرئيسية
                    </a>                   
                </li>
				
				<li class="panel">
                    <a href="<?php echo base_url();?>manager/edit_types" >
                        <i class="icon-table"></i> إضافة / تعديل أنواع المطاعم
                    </a>                   
                </li>

                <li class="panel ">
                    <a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#component-nav">
                        <i class="icon-tasks"> </i> إدارة المطاعم   
	   
                        <span class="pull-right">
                          <i class="icon-angle-left"></i>
                        </span>
                    </a>
                    <ul class="collapse" id="component-nav">
                        <li class=""><a href="<?php echo base_url();?>manager/edit_resturants"><i class="icon-angle-right"></i> قبول / إلغاء تفعيل المطعم </a></li>
						<li class=""><a href="<?php echo base_url();?>dashboard/add_branches"><i class="icon-angle-right"></i> إضافة فروع للمطاعم </a></li>
                    </ul>
                </li>
            </ul>

        </div>
        <!--END MENU SECTION -->