<style>
.page { display: none; }
.active { display: inherit; }
</style>
<script type="text/javascript">
  // alert("yuiyiuyi");
        var base_url = "<?php echo base_url();?>";
        var controller = 'rest_admin';
    </script>
<script>
function view_details(str,cust) {
  if (str=="") {
    document.getElementById("orderx").innerHTML="";
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
      document.getElementById("orderx").innerHTML=xmlhttp.responseText;
	  show_modal();
    }
  }
  xmlhttp.open("GET",base_url+controller+"/view_order_details/id/"+str+"/cust/"+cust,true);
  xmlhttp.send();
}

function trust_him(str){
if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {	
		document.getElementById("result_of").innerHTML=xmlhttp.responseText;
    }
  } 
xmlhttp.open("GET",base_url+controller+"/trust_him/id/"+str,true);
  xmlhttp.send();
 
}

function untrust_him(str){
if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
		document.getElementById("result_of").innerHTML=xmlhttp.responseText;
    }
  } 
xmlhttp.open("GET",base_url+controller+"/untrust_him/id/"+str,true);
  xmlhttp.send();
 
}
</script>
<form action="<?php echo base_url()?>rest_admin/assign_task" method="POST">
			<div class="box" style="direction: rtl;text-align: right;">
                <div class="box-header">
                  <h3 class="box-title">قائمة بجميع الطلبات</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
					<div class="row" id="delievred_boy">
						<div class="col-lg-4">	
							<?php if(isset($rec)&&is_array($rec)):?>
								<input type="submit" class="btn btn-success" value="اسناد الطلبات المحددة لعامل التوصيل" style="margin-right: 5%;margin-bottom: 10px;" >
							<?php else:?>
								<input type="submit" class="btn btn-success" value="لا تملك عامل توصيل" style="margin-right: 5%;margin-bottom: 10px;" id="delievred_boy" disabled>
							<?php endif;?>
						</div>
						<div class="col-lg-8">
							<div class="form-group" style="margin-right: 25px;direction: rtl;">
								<label style="margin-left: 44px;">اسم عامل التوصيل</label>
								<select name="delivery_boy_id" style="width: 50%;">
									<?php if(isset($rec)&&is_array($rec)):?>
									<?php foreach ($rec as $r):?>
									 <option value="<?php echo $r->id ?>" > <?php echo $r->name?></option>
									<?php endforeach;?>
									<?php endif;?>
								</select>
							</div>
						</div>							
					</div>
                  <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap"><div class="row"><div class="col-sm-6"></div><div class="col-sm-6"></div></div><div class="row"><div class="col-sm-12"><table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                    <thead>
                      <tr role="row">
						<th style="direction: rtl;text-align: right;"   >رقم الطلب</th>
						<th style="direction: rtl;text-align: right;"   >اسم الزبون</th>
						<th style="direction: rtl;text-align: right;"   >تاريخ الطلب</th>
						<th style="direction: rtl;text-align: right;"  >وقت التسليم</th>
						<th style="direction: rtl;text-align: right;"  >مكان التسليم</th>
						<th style="direction: rtl;text-align: right;"  >تحديد الطلبات ليتم توصيلها</th>
						</tr>
                    </thead>
                    <tbody> 
						<?php if(isset($record)&&is_array($record)):?>
						<?php foreach ($record as $rows):?>
						 <tr role="row" class="odd">
							<td ><?php echo $rows->id ?></td>
							<td><?php echo $rows->c_name ?></td>
							<td><?php echo $rows->Order_time?></td>
							<td><?php echo $rows->expected_finish_time ?></td>
							<td><?php echo $rows->distination_address; ?></td>
								<td>
								<button type="button" class="btn btn-info" onclick="view_details(<?php echo  $rows->id ;?>,<?php echo  $rows->cid ;?>)" >عرض الطلب</button>
									<div class="col-sm-8">
									  <div class="input-group">
										<span class="input-group-addon">
										  <input type="checkbox" name="order_check[]" class="order_check" value="<?php echo  $rows->id ;?>">
										</span>&nbsp;&nbsp;
										<label><p class="text-green"> تحديد الطلب </p></label>
									  </div><!-- /input-group -->
									</div>
								</td>
								
						</tr>			
						<?php endforeach;?>
						<?php endif;?>		
                    </tbody>
                  </table>
			</form>				  
				  </div>
				  </div>
				  <hr>
				  <div class="row">
						<div >
							    <input type="hidden" id="offset" value="2">
								<?php if(isset($record)&&is_array($record)):?>
								<button type="button" class="btn btn-info" onclick="more()" style="width: 50%;margin-right: 25%;" id="more_res">عرض المزيد</button>
								<?php else :?>
								<button type="button" class="btn btn-warning"  style="width: 50%;margin-right: 25%;" >لا توجد نتائج لعرضها</button>
								<?php endif;?>
						</div>
				  </div>
				</div>
                </div>
				<div id="myModal" class="modal fade" role="dialog">
				  <div class="modal-dialog">
					<!-- Modal content-->
					<div class="modal-content">
					  <div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">بيانات الطلب</h4>
					  </div>
					  <div class="modal-body">
							<div id="orderx">
							
							</div>
					  </div>
					  <div class="modal-footer">
					  <div class="row" >
						<div class="col-lg-4">
						<button type="button" class="btn btn-block btn-info btn-sm" id="next">التالي</button>
						</div>
						<div class="col-lg-4"></div>
						<div class="col-lg-4">
						<button type="button" class="btn btn-block btn-warning btn-sm" id="prev">السابق</button>
						</div>
					</div>
					<hr>
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					  </div>
					</div>

				  </div>
				</div>
              </div>
<script type="text/javascript">
	//hide the button onload	
		var link = document.getElementById('delievred_boy');
		link.style.display = 'none'; 
		
$(document).ready(function(){
    $("#btn").click(function(){
        $("#myModal").modal('show');
    });
});
function show_modal()
{
	$("#myModal").modal('show');
	if($(".page.active").index() != 0){
		var elems = document.querySelectorAll(".page.active");

		[].forEach.call(elems, function(el) {
			el.classList.remove("active");
		});
		var link = document.getElementById('first_page_show');
			link.className = link.className + 'active';
			}
}


function more(){
var offset=document.getElementById("offset").value;
if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
		$("#example2").append(xmlhttp.responseText);
		offset+=2;
		document.getElementById("offset").value = offset;
			if(offset><?php if(isset($all)) echo $all; else echo '0';?>){
				document.getElementById('more_res').innerHTML="لا يوجد نتائج إضافية";
				document.getElementById("more_res").className="btn btn-warning";
			}
    }
  } 
xmlhttp.open("GET",base_url+controller+"/more_to_deliever/offset/"+offset,true);
  xmlhttp.send();
}

$('body').on('change','.order_check', function(e){
    var link = document.getElementById('delievred_boy');
    if ($('.order_check:checked').length == 0) {
		link.style.display = 'none';  
    }
	else
		link.style.display = '';
});
</script>
<script>
$("#prev").on("click", function(){
    if($(".page.active").index() > 0)
        $(".page.active").removeClass("active").prev().addClass("active");
});
$("#next").on("click", function(){
    if($(".page.active").index() < $(".page").length-1)
        $(".page.active").removeClass("active").next().addClass("active");
});
</script>