<script type="text/javascript">
  // alert("yuiyiuyi");
        var base_url = "<?php echo base_url();?>";
        var controller = 'rest_admin';
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
  xmlhttp.open("GET",base_url+controller+"/view_worker_details/id/"+str,true);
  xmlhttp.send();
}


function delete_res(str,str1) {
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
xmlhttp.open("GET",base_url+controller+"/delete_worker/id/"+str+"/u_id/"+str1,true);
  xmlhttp.send();
  }
}
</script>

  <div class="row" style="text-align : right">
  <div class="col-lg-6">
  <h1>
                         لوحة التحكم بالموظفين
                        </h1>
						
						<div class="panel panel-primary" >
                            <div class="panel-heading">
                                <h3 class="panel-title">عرض بيانات الموظف</h3>
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
<h1>الموظفين الذين يعملون لدينا</h1>
<div class="table-responsive" style="direction: rtl;">
										<table class="table table-bordered table-hover table-striped" style="text-align: center;">
											<thead>
												<tr>
													<th style="text-align : right">اسم الموظف</th>
													<th style="text-align : right">الفرع الذي يعمل به</th>
													<th style="text-align : right">منصبه</th>
													<th style="text-align : right"></th>
												</tr>
											</thead>
											<tbody>	
											<?php if(isset($record) && is_array($record)):?>
											<?php foreach($record as $row):?>
											<tr>								
												<td><?php echo $row->first_name." ".$row->last_name;?></td>
												<td><?php echo $row->address;?></td>
												<td><?php echo $row->gname;?></td>
												<td><input type="button" class="btn btn-info" onclick="view_details(<?php echo  $row->w_id ;?>)" value="استعراض">
												<input type="button" class="btn btn-danger" onclick="delete_res(<?php echo $row->w_id ;?>,<?php echo $row->user_id;?>)" value="حذف">
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