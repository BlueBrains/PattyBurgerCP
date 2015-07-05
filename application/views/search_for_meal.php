<script type="text/javascript">
  // alert("yuiyiuyi");
        var base_url = "<?php echo base_url();?>";
        var controller = 'rest_admin';
    </script>
<script type="text/javascript">
function meal_search()
{
	var str=document.getElementById("mealsearchname").value;
	var meal=document.getElementById("meal_list").value;
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
  xmlhttp.open("GET",base_url+controller+"/view_searched_meal/id/"+<?php echo $this->session->userdata('res_id');?>+"/list_type/"+meal+"/mid/"+str,true);/*DOMAIN URL ERROR*/
  xmlhttp.send();
}
</script>
<div class="row">
  <h1>
                       Fast Searching
                        </h1>
  <div class="col-lg-6">
						<div class="panel panel-primary" >
                            <div class="panel-heading">
                                <h3 class="panel-title">Enter The Meal Name</h3>
                            </div>
							<center>
								<div class="panel-body" style="width : 90%">
									
										<div class="row">
											    <div class="form-group" style="direction: rtl;">
													<label >Meal Name</label>
													<input type="text" class="form-control" name="meal" id="mealsearchname" value="" placeholder="">
												</div>
												<div class="form-group">
													<label >Meal Type</label>
													<select class="form-control chzn-select" name="meal_list" id="meal_list">
														<?php if(isset($record1)&&is_array($record1)):?>
														<?php foreach ($record1 as $rows):?>
														 <option value="<?php echo $rows->id ?>" > <?php echo $rows->lists_name?></option>
														<?php endforeach;?>
														<?php endif;?>
													</select>
												</div>
											<div class="row">
											<p style="direction:rtl;">
											<input type="hidden" value="<?php echo $this->session->userdata('res_id');?>" name='id'>
											<button type="submit" onclick="meal_search()"  class="btn btn-success">Find it ! </button>
											</p>
											</div>

											
										</div>	
						
								</div>

							</div>
               </center>         
	</div>						
 <div class="col-lg-6">
						<div  id="mealform" > 
						<div class="panel panel-primary" >
                            <div class="panel-heading">
                                <h3 class="panel-title">SHOW Results</h3>
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
  

</div>