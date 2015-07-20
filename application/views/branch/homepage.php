<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>

    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>
	    <script type="text/javascript">
    var marker;
    var infowindow;
	var x=false;
    function initialize() {
      var latlng = new google.maps.LatLng(33.5000, 36.3000);
      var options = {
        zoom: 11,
        center: latlng,
        mapTypeId: google.maps.MapTypeId.ROADMAP
      }
      var map = new google.maps.Map(document.getElementById("map-canvas"), options);
      var html = "<table style='color: black;'>" +
                 "<tr> <center><td><?php echo $name?></td></center></tr>" +
                 "<tr><td><img style='width: 75px;height: 75px;' src='<?php echo base_url()?>uploads/<?php echo $logo;?>'/></td></tr>";
    infowindow = new google.maps.InfoWindow({
     content: html
    });

    google.maps.event.addListener(map, "click", function(event) {
       
	    if(x) marker.setMap(null);
		x=true;
		marker = new google.maps.Marker({
          position: event.latLng,
          map: map
        });
        google.maps.event.addListener(marker, "click", function() {
          infowindow.open(map, marker);
        });
		var latlng = marker.getPosition();
		document.getElementById("lat").value=latlng.lat();
	    document.getElementById("lng").value=latlng.lng();
    });
    }
    </script>
  </head>
<style>
.page { display: none; }
.active { display: inherit; }
</style>
 <body style="margin:0px; padding:0px;" onload="initialize()">
						<div class="row" style="direction: rtl;">
							<div class="col-lg-6 col-xs-6">
							  <!-- small box -->
							  <div class="small-box bg-yellow">
								<div class="inner">
								  <h3><?php echo $worker_number?></h3>
								  <p>عدد الموظفين الحاليين</p>
								</div>
								<div class="icon">
								  <i class="fa fa-users"></i>
								</div>
								<a href="<?php echo base_url()?>rest_admin/edit_workers" class="small-box-footer">
								 &nbsp;&nbsp;لوحة التحكم بالموظفين &nbsp;&nbsp;<i class="fa fa-arrow-circle-right"></i>
								</a>
							  </div>
							</div>
							<div class="col-lg-6 col-xs-6">
							  <!-- small box -->
							  <div class="small-box bg-red">
								<div class="inner">
								  <h3><?php echo $b_num ?></h3>
								  <p>عدد الفروعة الموجودة</p>
								</div>
								<div class="icon">
								  <i class="fa fa-sitemap"></i>
								</div>
								<a href="<?php echo base_url()?>rest_admin/all_branches" class="small-box-footer">
								  &nbsp;&nbsp;لوحة التحكم بالفروع&nbsp;&nbsp;<i class="fa fa-arrow-circle-right"></i>
								</a>
							  </div>
							</div>
						</div><!-- /.row -->
            <div class="inner" style="min-height:1200px;">
                <div class="row">
 <div class="col-lg-12">	
                       <?php if(isset($record)&&is_array($record)): ?>
					   
						<div class="box" style="direction: rtl;">
                <div class="box-header">
                  <h3 class="box-title">جدول مراقبة الفروع</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table class="table table-bordered" style="direction: rtl;text-align: right;">
                    <tbody ><tr>
                      <th style="width: 10px;text-align: right;">#</th>
                      <th style="text-align: right;">عنوان الفرع</th>
                      <th style="text-align: right;">الضغط على الفرع</th>
                      <th style="width: 40px" style="text-align: right;">رقما</th>
                    </tr>
					
                    <tr>
					<?php foreach ($record as $rows):?>
                      <td><?php echo $rows->id?></td>
                      <td><?php echo $rows->address?></td>
                      <td >
                        <div class="progress progress-xs">
                          <div class="progress-bar progress-bar-danger" style="width: 55%;float: right;"></div>
                        </div>
                      </td>
                      <td><span class="badge bg-red">55%</span></td>
                    </tr>
                   <?php endforeach; ?>
				    </tbody>
					</table >
                <div class="box-footer clearfix">
                  <ul class="pagination pagination-sm no-margin pull-right">
                  </ul>
                </div>
              </div>
					   <?php else :?>
					   		<div class="row" style="direction: rtl;">
  <div class="col-lg-12">
  <h1>إضافة فرع جديد</h1>
						
						<div class="panel panel-primary" >
                            <div class="panel-heading">
                                <h3 class="panel-title">بيانات الفرع الجديد</h3>
                            </div>
							<center>
								<div class="panel-body" style="width : 90%">
									<form enctype="multipart/form-data" action ="<?php echo base_url()?>rest_admin/add_branches" method="post">
										<div class="page active">
												<div class="row">
													<div class="form-group" style="direction: rtl;">
														<div class="col-lg-8">	
															<input type="text" class="form-control" id="inputSuccess" name="res_add" placeholder="عنوان الفرع">
														</div>	
														<div class="col-lg-4">
															<label >عنوان الفرع :</label>
														</div>
													</div>
												</div>
												<br><br>
												<div class="row">
													<section class="col-lg-12 connectedSortable">
														<div class="box box-solid bg-light-blue-gradient">
																<div class="box-header">
																  <!-- tools box -->
																  <div class="pull-right box-tools">
																	<button class="btn btn-primary btn-sm pull-right" data-widget='collapse' data-toggle="tooltip" title="Collapse" style="margin-right: 5px;"><i class="fa fa-minus"></i></button>
																  </div><!-- /. tools -->

																  <i class="fa fa-map-marker"></i>
																  <h3 class="box-title">
																	GOOGLE MAP حدد موقعك على خرائط <br>
																  </h3>
																</div>
																<div class="box-body">
																	<div id="map-canvas" style="width: 900px; height: 400px"></div>
																</div><!-- /.box-body-->
																<input type="hidden" id="lat" name="lat" value="0">
																<input type="hidden" id="lng" name="lng" value="0">
															</div>		
												   </section>
													<div id="message"></div>
												</div>
										</div>
											<div class="page">
												<div class="row">
													<div class="form-group" style="direction: rtl;">
													<div class="col-lg-2"></div>
														<div class="col-lg-6">	
															<input type="text" class="form-control" name="phone1" >
														</div>	
														<div class="col-lg-4">
															<label > رقم الهاتف 1</label>
														</div>
													</div>
												</div>
												<br><br>
												<div class="row">
													<div class="form-group" style="direction: rtl;">
													<div class="col-lg-2"></div>
														<div class="col-lg-6">	
															<input type="text" class="form-control" name="phone2" >
														</div>	
														<div class="col-lg-4">
															<label >رقم الهاتف 2</label>
														</div>
													</div>
												</div>
												<br><br>
												<div class="row">
													<div class="form-group" style="direction: rtl;">
													<div class="col-lg-2"></div>
														<div class="col-lg-6">	
															<input type="text" class="form-control" name="phone3" >
														</div>	
														<div class="col-lg-4">
															<label >رقم الهاتف 3</label>
														</div>
													</div>
												</div>
												<br><br>
												<div class="row">
													<div class="form-group" style="direction: rtl;">
													<div class="col-lg-2"></div>
														<div class="col-lg-6">	
														  <select class="form-control" name="delivered">
															<option value='0'>يوجد</option>
															<option value='1'>لا يوجد</option>
														  </select>
														</div>	
														<div class="col-lg-4">
															<label >التوصيل للمنازل</label>
														</div>
													</div>
												</div>
												<br><br>
										</div>	
										<div class="row">
											<p style="direction:rtl;">
											<input type="hidden" value="<?php echo $this->session->userdata('res_id');?>" name='id'>
											<button type="submit" class="btn btn-success" id="last_sub">إضافة الفرع الجديد</button>
											</p>
											</div>
									</form>
								</div>
									<div class="row" style="margin-bottom: 10px;width: 90%;">
										<div class="col-lg-4">
										<button class="btn btn-block btn-info btn-sm" id="next">التالي</button>
										</div>
										<div class="col-lg-4"></div>
										<div class="col-lg-4">
										<button class="btn btn-block btn-warning btn-sm" id="prev">السابق</button>
										</div>
									</div>
							</div>
               </center>         
	</div>
</div>
					   <?php endif; ?>		
	</div>				
</div>

                </div>
  </body>
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