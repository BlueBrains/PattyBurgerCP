<script type="text/javascript">
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
  <div class="row">
<div class="col-lg-6">
<h1>Previous Branches Addresses</h1>
<div class="table-responsive">
										<table class="table table-bordered table-hover table-striped" style="text-align: center;">
											<thead>
												<tr>
													<th >Address</th>
													<th >Phone Number</th>
													<th ></th>
												</tr>
											</thead>
											<tbody>	
											<?php if(isset($record) && is_array($record)):?>
											<?php foreach($record as $row):?>
											<tr>								
												<td><?php echo $row->Branch_Address;?></td>
												<td><?php echo $row->phone1;?></td>
												<td><input type="button" class="btn btn-info" onclick="view_details(<?php echo  $row->id ;?>)" value="View">
												<input type="button" class="btn btn-danger" onclick="delete_res(<?php echo $row->id ;?>)" value="Delete">
												</td>												
											</tr>
											<?php endforeach;?>
											<?php endif; ?>
										</tbody>
</table>
<?php echo $this->pagination->create_links(); ?>
</div>
</div>
<div class="col-lg-6">
						<div class="panel panel-primary" >
                            <div class="panel-heading">
                                <h3 class="panel-title">View Branches Details</h3>
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
</div>