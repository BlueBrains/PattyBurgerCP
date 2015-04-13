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
function meal_search()
{
	var str=document.getElementById("mealsearchname").value;
	if (str=="") {
    document.getElementById("mealform").innerHTML=xmlhttp.responseText;
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
      document.getElementById("mealform").innerHTML=xmlhttp.responseText;
    }
  }
  xmlhttp.open("GET",base_url+controller+"/view_searched_meal/id/"+<?php echo $this->session->userdata('res_id');?>+"/list_type/"+<?php echo $segments[7];?>+"/mid/"+str,true);/*DOMAIN URL ERROR*/
  xmlhttp.send();
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
  xmlhttp.open("GET",base_url+controller+"/view_meal_details/id/"+<?php echo $this->session->userdata('res_id');?>+"/mid/"+str+"/p/"+<?php if(isset($segments[8])) echo $segments[8]; else echo '0';?>+"/list_type/"+<?php echo $segments[7];?>,true);/*DOMAIN URL ERROR*/
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
xmlhttp.open("GET",base_url+controller+"/delete_meal/id/"+<?php echo $this->session->userdata('res_id');?>+"/mid/"+str+"/p/"+<?php if(isset($segments[8])) echo $segments[8]; else echo '0';?>+"/list_type/"+<?php echo $segments[7];?>,true);/*DOMAIN URL ERROR*/
  xmlhttp.send();
  }
}
</script>
<div class="row" style="text-align : right">
  <h1>
                         تعديل و عرض بيانات الوجبات
                        </h1>
 <div class="col-lg-6">
						<div  id="mealform" > 
						<div class="panel panel-primary" >
                            <div class="panel-heading">
                                <h3 class="panel-title">عرض نتيجة البحث</h3>
                            </div>
							<center>
								<div class="panel-body" style="width : 90%">
																				
										<?php if(isset($search_note) && (strlen($search_note)>1)):?>
										<div class="alert alert-<?php echo $search_class?> alert-dismissable">
											<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
											<?php echo $search_note?>.
										</div>
										<?php endif;?>
								</div>
							</center>
							</div>
                       </div> 
</div>	
  
  <div class="col-lg-6">
						<div class="panel panel-primary" >
                            <div class="panel-heading">
                                <h3 class="panel-title">ابحث عن الوجبة عن طريق الاسم</h3>
                            </div>
							<center>
								<div class="panel-body" style="width : 90%">
									
										<div class="row">
											    <div class="form-group" style="direction: rtl;">
													<label >اسم الوجبة</label>
													<input type="text" class="form-control" name="meal" id="mealsearchname" value="" placeholder="ادخل اسم الوجبة">
												</div>
											<div class="row">
											<p style="direction:rtl;">
											<input type="hidden" value="<?php echo $this->session->userdata('res_id');?>" name='id'>
											<button type="submit" onclick="meal_search()"  class="btn btn-success">جد لي وجبتي :D  </button>
											</p>
											</div>

											
										</div>	
						
								</div>

							</div>
               </center>         
	</div>
</div>
  <div class="row" style="text-align : right">
  <div class="col-lg-6">
  <h1>
                        لوحة التحكم بالوجبات
                        </h1>
						<div  id="itemform" > 
						<div class="panel panel-primary" >
                            <div class="panel-heading">
                                <h3 class="panel-title">عرض بيانات الوجبات</h3>
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
<h1>الوجبات المسجلة في هذه القائمة</h1>
<div class="table-responsive" style="direction: rtl;">
										<table class="table table-bordered table-hover table-striped" style="text-align: center;">
											<thead>
												<tr>
													<th style="text-align : right">اسم الوجبة</th>
													<th style="text-align : right">وصف الوجبة</th>
													<th style="text-align : right"></th>
												</tr>
											</thead>
											<tbody>	
											<?php if(isset($record) && is_array($record)):?>
											<?php foreach($record as $row):?>
											<tr>								
												<td><?php echo $row->meal_name;?></td>
												<td><?php echo $row->meal_description;?></td>
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