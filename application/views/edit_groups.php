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
  xmlhttp.open("GET",base_url+controller+"/get_group/id/"+str,true);
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
xmlhttp.open("GET",base_url+controller+"/delete_group/id/"+str,true);
  xmlhttp.send();
  }
}
</script>

  <div class="row" style="text-align : right">
  <div class="col-lg-12">
  <h1>
                        إضافة مجموعات المستخدمين
                        </h1>
						
						<div class="panel panel-primary" >
                            <div class="panel-heading">
                                <h3 class="panel-title">مجموعات المستخدمين</h3>
                            </div>
							<center>
								<div class="panel-body" style="width : 80%">
									<form action ="<?php echo base_url()?>manager/add_group" method="post">
											<div class="row">
											
											<div class="row">	
												<div class="form-group" style="direction: rtl;">
													<div class="col-lg-8">
														<input type="text" class="form-control" name="name" >
													</div>	
													<div class="col-lg-4">
														<label >اسم المجموعة</label>
													</div>	
												</div>
											 </div>	
											 <br><br>
											<div class="row">	
												<div class="form-group" style="direction: rtl;">
													<div class="col-lg-8">
														<textarea name="description" style="width: 100%;height: 100px;">
														</textarea>
													</div>	
													<div class="col-lg-4">
														<label >وصف المجموعة</label>
													</div>
												</div>
											</div>
											
											<div class="row" style="margin-top: 20px">
												<button type="submit" class="btn btn-success">إضافة مجموعة </button>
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
<h1> المجموعات المضافة مسبقا</h1>
<div class="table-responsive" style="direction: rtl;">
										<table class="table table-bordered table-hover table-striped" style="text-align: center;">
											<thead>
												<tr>
													<th style="text-align : right">اسم المجموعة</th>
													<th style="text-align : right">وصف المجموعة</th>
													<th style="text-align : right"></th>
												</tr>
											</thead>
											<tbody>	
											<?php if(isset($record) && is_array($record)):?>
											<?php foreach($record as $row):?>
											<tr>								
												<td><?php echo $row->name;?></td>
												<td><?php echo $row->description;?></td>
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