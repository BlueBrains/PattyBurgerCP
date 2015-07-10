<script type="text/javascript">
  // alert("yuiyiuyi");
        var base_url = "<?php echo base_url();?>";
        var controller = 'manager';
    </script>
<script>
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
  xmlhttp.open("GET",base_url+controller+"/view_details/id/"+str,true);
  xmlhttp.send();
}


function de_active(str) {
var r=confirm("سيتم إلغاء تفعيل المطعم");
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
xmlhttp.open("GET",base_url+controller+"/de_active/id/"+str,true);
  xmlhttp.send();
  }
}


function active(str) {
var r=confirm("سيتم تفعيل المطعم");
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
xmlhttp.open("GET",base_url+controller+"/active/id/"+str,true);
  xmlhttp.send();
  }
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
xmlhttp.open("GET",base_url+controller+"/delete_res/id/"+str,true);
  xmlhttp.send();
  }
}
</script>

  <div class="row" style="text-align : right">
  <div class="col-lg-6">
  <h1>
                         لوحة التحكم بالمطاعم
                        </h1>
						
						<div class="panel panel-primary" >
                            <div class="panel-heading">
                                <h3 class="panel-title">استعراض بيانات المطعم</h3>
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
<h1>العناوين الموجودة سابقا</h1>
<div class="table-responsive" style="direction: rtl;">
										<table class="table table-bordered table-hover table-striped" style="text-align: center;">
											<thead>
												<tr>
													<th style="text-align : right">اسم المطعم</th>
													<th style="text-align : right">نوعه</th>
													<th style="text-align : right">رقم الهاتف</th>
													<th style="text-align : right"></th>
												</tr>
											</thead>
											<tbody>	
											<?php if(isset($record) && is_array($record)):?>
											<?php foreach($record as $row):?>
											<tr>								
												<td><?php echo $row->r_name;?></td>
												<td><?php echo $row->c_name;?></td>
												<td><?php echo $row->phone_nbr;?></td>
												<td><input type="button" class="btn btn-info" onclick="view_details(<?php echo  $row->id ;?>)" value="استعراض">
												<?php if($row->accept==0):?>
													<input type="button" class="btn btn-success" onclick="active(<?php echo  $row->id ;?>)" value="تفعيل">
												<?php else:?>
													<input type="button" class="btn btn-warning" onclick="de_active(<?php echo  $row->id ;?>)" value="إلغاء تفعيل">
												<?php endif;?>
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