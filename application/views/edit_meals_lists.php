<script type="text/javascript">
  // alert("yuiyiuyi");
        var base_url = "<?php echo base_url();?>";
        var controller = 'rest_admin';
    </script>
<script type="text/javascript">
function delete_list() {
var str=document.getElementById('list_type').value;
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
xmlhttp.open("GET",base_url+controller+"/delete_list/id/"+<?php echo $this->session->userdata('res_id');?>+"/list_id/"+str,true);/*DOMAIN URL ERROR*/
  xmlhttp.send();
  }
}
</script>
<?php if(isset($note)):?>
<div class="alert alert-<?php echo $class?> alert-dismissable">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	<?php echo $note?>.
</div>
<?php endif;?>  
  <div class="row">
<h1>
                         Menu Lists Editions
                        </h1>
					<div class="col-lg-6">
						<div class="panel panel-primary" >
                            <div class="panel-heading">
                                <h3 class="panel-title">Move to List Meals</h3>
                            </div>
							<center>
								<div class="panel-body" style="width : 90%">
									<form action ="<?php echo base_url()?>rest_admin/edit_list" method="post">
										<div class="row">
											<div class="col-lg-8">
												<div class="form-group">
													<label >Meal's Tabs</label>
													<select class="form-control chzn-select" name="list_type" id="list_type">
														<?php if(isset($record1)&&is_array($record1)):?>
														<?php foreach ($record1 as $rows):?>
														 <option value="<?php echo $rows->id ?>" > <?php echo $rows->lists_name?></option>
														<?php endforeach;?>
														<?php endif;?>
													</select>
												</div>
											</div>
										<input type="hidden" value="<?php echo $this->session->userdata('res_id');?>" name='id'>
											<div class="col-lg-2"><button type="submit" class="btn btn-success" style="margin-top: 25px;">GO</button></div>
											<div class="col-lg-2"><input type="button" onclick="delete_list()" class="btn btn-danger" style="margin-top: 25px;" value="DELETE"></div>
										</div>	
									</form>
									</div>
							</div>
						</div>
					<div class="col-lg-6">
						<div class="panel panel-primary" >
                            <div class="panel-heading">
								<h3 class="panel-title">ADD New Menu Tab</h3>
                            </div>
							<center>
								<div class="panel-body" style="width : 90%">
									<form action ="<?php echo base_url()?>rest_admin/add_list" method="post">
										<div class="row">
										<div class="col-lg-8">
										<div class="form-group">
										<label >New Tab Name :</label>
											    <div class="form-group" style="direction: rtl;">
													
													<input type="text" class="form-control" name="listname" id="phone2" value="" placeholder="ADD No existing Tab">
												</div>

										</div>
										</div>
										<div class="col-lg-4">
													<button type="submit" class="btn btn-success" style="margin-top: 25px;">ADD This List </button>
										</div>
										</div>
										</form>
									</div>
								</div>
							</center>
							</div>
                        
	</div>