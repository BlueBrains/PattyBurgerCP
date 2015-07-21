<script type="text/javascript">
  // alert("yuiyiuyi");
        var base_url = "<?php echo base_url();?>";
        var controller = 'manager';
    </script>
<script>
function view_add(str) {
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
		
      document.getElementById("itemform").innerHTML=xmlhttp.responseText;
    }
  }
  xmlhttp.open("GET",base_url+controller+"/get_type/id/"+str,true);
  xmlhttp.send();
}

function delete_add(str) {
var r=confirm("هل انت متأكد من الحذف ؟؟؟؟");
if(r)
{
if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
     location.reload(true);
    }
  } 
xmlhttp.open("GET",base_url+controller+"/delete_type/id/"+str,true);
  xmlhttp.send();
  }
}
</script>

  <div class="row" style="text-align : right">
  <div class="col-lg-12">
  <h1>
                         إضافة أنواع المطاعم
                        </h1>
						
						<div class="panel panel-primary" >
                            <div class="panel-heading">
                                <h3 class="panel-title"> إضافة نوع جديد</h3>
                            </div>
							<center>
								<div class="panel-body" style="width : 90%">
									<form action ="<?php echo base_url()?>manager/add_type" method="post">
											<div class="row">
											
											<div class="col-lg-6">
												<button type="submit" class="btn btn-success">إضافة نوع </button>
											</div>
											<div class="col-lg-6">
												<div class="form-group">
													<label >اسم النوع</label>
													<input type="text" class="form-control" name="name" id="address_ar"value="" placeholder="نوع المحل">
												</div>
											</div>
											</div>
									</form>
								</div>
							</center>
						</div>
                        
	</div>				
</div>

  <div class="row" style="text-align : right">
  <div class="col-lg-6">
  <h1>
                          تعديل الاسم
                        </h1>
						
						<div class="panel panel-primary" >
                            <div class="panel-heading">
                                <h3 class="panel-title">تعديل الاسم </h3>
                            </div>
							<center>
								<div class="panel-body" style="width : 90%">
									<div  id="itemform" > 

									</div>
								</div>
							</center>
							</div>
                        
	</div>				
<div class="col-lg-6">
<h1>الأنواع المضافة مسبقا</h1>
<div class="table-responsive" style="direction: rtl;">
										<table class="table table-bordered table-hover table-striped" style="text-align: center;">
											<thead>
												<tr>
													<th style="text-align : right">أنواع المحال التجارية</th>
													<th style="text-align : right"></th>
												</tr>
											</thead>
											<tbody>	
											<?php if(isset($record) && is_array($record)):?>
											<?php foreach($record as $row):?>
											<tr>								
												<td><?php echo $row->name;?></td>
												<td><input type="button" class="btn btn-info" onclick="view_add(<?php echo  $row->id ;?>)" value="تعديل">
												<input type="button" class="btn btn-danger" onclick="delete_add(<?php echo $row->id ;?>)" value="حذف">
												</td>												
											</tr>
											<?php endforeach;?>
											<?php endif; ?>
										</tbody>
</table>
<?php echo $this->pagination->create_links(); ?>
</div>
</div>
</div>