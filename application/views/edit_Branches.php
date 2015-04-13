﻿<script type="text/javascript">
  // alert("yuiyiuyi");
        var base_url = "<?php echo base_url();?>";
        var controller = 'rest_admin';
    </script>
<script type="text/javascript">
function view_details(str) {
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
  xmlhttp.open("GET",base_url+controller+"/view_details/id/"+<?php echo $this->session->userdata('res_id');?>+"/bid/"+str,true);
  xmlhttp.send();
}

function delete_res(str) {
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
xmlhttp.open("GET",base_url+controller+"/delete_res_branch/id/"+<?php echo $this->session->userdata('res_id');?>+"/bid/"+str,true);
  xmlhttp.send();
  }
}
</script>
<div class="row" style="text-align : right">
  <div class="col-lg-12">
  <h1>
                         إضافة فرع جديد 
                        </h1>
						
						<div class="panel panel-primary" >
                            <div class="panel-heading">
                                <h3 class="panel-title">قم بتعبئة بيانات الفرع</h3>
                            </div>
							<center>
								<div class="panel-body" style="width : 90%">
									<form enctype="multipart/form-data" action ="<?php echo base_url()?>rest_admin/add_branches" method="post">
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
											</div>
											<div class="col-lg-6">
												<div class="form-group">
													<label >عنوان الفرع</label>
													<input type="text" class="form-control" name="res_add" id="address_ar"value="" placeholder="">
												</div>
												<div class="form-group" style="direction: rtl;">
													<label >رقم الهاتف 1</label>
													<input type="text" class="form-control" name="phone1" id="phone1" value="" placeholder="رقم الهاتف الاول">
												</div>
											</div>
											
											<div class="row">
											<p style="direction:rtl;">
											<input type="hidden" value="<?php echo $this->session->userdata('res_id');?>" name='id'>
											<button type="submit" class="btn btn-success">إضافة الفرع الجديد </button>
											</p>
											</div>
										</div>	
									</form>
								</div>

							</div>
               </center>         
	</div>
</div>
  <div class="row" style="text-align : right">
  <div class="col-lg-6">
  <h1>
                         لوحة التحكم بالمطاعم
                        </h1>
						
						<div class="panel panel-primary" >
                            <div class="panel-heading">
                                <h3 class="panel-title">استعراض بيانات الفرع</h3>
                            </div>
							<center>
								<div class="panel-body" style="width : 90%">
									<div  id="itemform" > 
										<?php if(isset($note)):?>
											<div class="alert alert-<?php echo $class?> alert-dismissable">
												<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
												<?php echo $note?>.
											</div>
											<?php endif;?>
									</div>
								</div>
							</center>
							</div>
                        
	</div>				
<div class="col-lg-6">
<h1>العناوين الموجودة سابقا</h1>
<div class="table-responsive" style="direction: rtl;">
										<table class="table table-bordered table-hover table-striped" style="text-align: center;">
											<thead>
												<tr>
													<th style="text-align : right">عنوانه</th>
													<th style="text-align : right">رقم هاتف</th>
													<th style="text-align : right"></th>
												</tr>
											</thead>
											<tbody>	
											<?php if(isset($record) && is_array($record)):?>
											<?php foreach($record as $row):?>
											<tr>								
												<td><?php echo $row->Branch_Address;?></td>
												<td><?php echo $row->phone1;?></td>
												<td><input type="button" class="btn btn-info" onclick="view_details(<?php echo  $row->id ;?>)" value="استعراض">
												<input type="button" class="btn btn-danger" onclick="delete_res(<?php echo $row->id ;?>)" value="حذف">
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