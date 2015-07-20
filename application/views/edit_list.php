<?php 
$_SERVER['REQUEST_URI_PATH'] = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$segments = explode('/', $_SERVER['REQUEST_URI_PATH']);

?>

<script type="text/javascript">
  // alert("yuiyiuyi");
        var base_url = "<?php echo base_url();?>";
        var controller = 'rest_admin';
    </script>
<script type="text/javascript">
function move_it()
{
	var meal=document.getElementById("meal_list").value;
	location.href = '<?php echo base_url()?>rest_admin/edit_list/id/<?php echo $this->session->userdata('res_id'); ?>/list_type/'+meal;
}

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
  xmlhttp.open("GET",base_url+controller+"/view_meal_details/id/"+<?php echo $this->session->userdata('res_id');?>+"/mid/"+str+"/p/"+<?php if(isset($segments[8])) echo $segments[8]; else echo '0';?>+"/list_type/"+<?php if(isset($num)) echo $num; else echo $segments[7];?>,true);/*DOMAIN URL ERROR*/
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
xmlhttp.open("GET",base_url+controller+"/delete_meal/id/"+<?php echo $this->session->userdata('res_id');?>+"/mid/"+str+"/p/"+<?php if(isset($segments[8])) echo $segments[8]; else echo '0';?>+"/list_type/"+<?php if(isset($num)) echo $num; else echo $segments[7];?>,true);/*DOMAIN URL ERROR*/
  xmlhttp.send();
  }
}
</script>
<div class="row" style="direction: rtl;"> 
  <div class="col-lg-12">
						<div class="panel panel-primary" >
							<center>
								<div class="panel-body" style="width : 90%">
									
										<div class="row">
											 
											 <div class="col-lg-6">
											<input type="hidden" value="<?php echo $this->session->userdata('res_id');?>" name='id'>
											<button type="submit" onclick="move_it()"  class="btn btn-info" style="margin-top :25px ">إظهار جميع الوجبات في هذه القائمة</button>
											</div>	
											<div class="col-lg-6">
											  <div class="form-group">
													<label >قائمة الطعام</label>
													<select class="form-control chzn-select" name="meal_list" id="meal_list">
														<?php if(isset($record1)&&is_array($record1)):?>
														<?php foreach ($record1 as $rows):?>
														 <option value="<?php echo $rows->id ?>" <?php if (isset($num) && ($rows->id == $num )) echo "selected";?>> <?php echo $rows->name?></option>
														<?php endforeach;?>
														<?php endif;?>
													</select>
												</div>
											 </div>
										</div>	
						
								</div>

							</div>
               </center>         
	</div>
</div>
  <div class="row" style="direction: rtl;">			
  <div class="col-lg-6">
  <h1>
                        لوحة التحكم بالوجبات
                        </h1>
						<div  id="itemform" > 
						<div class="panel panel-primary" >
                            <div class="panel-heading">
                                <h3 class="panel-title">إظهار تفاصيل الوجبة</h3>
                            </div>
							<center>
								<div class="panel-body" style="width : 90%">
									
										<?php if(isset($note)&& (strlen($note)>1)):?>
											<div class="alert alert-<?php echo $class?> alert-dismissable">
												<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
												<?php echo $note?>.
											</div>
											<?php endif;?>
									</div>
								
							</center>
							</div>
                       </div> 
	</div>
<div class="col-lg-6">
<h1>الوجبات المضافة لدي</h1>
<div class="table-responsive" >
										<table class="table table-bordered table-hover table-striped" style="text-align:right;">
											<thead>
												<tr>
													<th style="text-align:right;">اسم الوجبة</th>
													<th style="text-align:right;">وصف الوجبة</th>
													<th style="text-align:right;"></th>
												</tr>
											</thead>
											<tbody>	
											<?php if(isset($record) && is_array($record)):?>
											<?php foreach($record as $row):?>
											<tr>								
												<td><?php echo $row->name;?></td>
												<td><?php echo $row->details;?></td>
												<td><input type="button" class="btn btn-info" onclick="view_details(<?php echo  $row->r_id ;?>)" value="عرض">
												<input type="button" class="btn btn-danger" onclick="delete_res(<?php echo $row->r_id ;?>)" value="حذف">
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