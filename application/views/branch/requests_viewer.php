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


function accepte_order(str) {

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
xmlhttp.open("GET",base_url+controller+"/order_active/id/"+str,true);
  xmlhttp.send();
}


function delete_order(str) {
var r=confirm("هل أنت متأكد من إلغاء الطلب");
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
xmlhttp.open("GET",base_url+controller+"/delete_order/id/"+str,true);
  xmlhttp.send();
  }
}

function block_cust(str) {
var r=confirm("هل أنت متأكد من حظر الزبون");
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
xmlhttp.open("GET",base_url+controller+"/block_cust/id/"+str,true);
  xmlhttp.send();
  }
}

function ch_to_ready(str) {
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
xmlhttp.open("GET",base_url+controller+"/ch_to_ready/id/"+str,true);
  xmlhttp.send();
 
}

function ch_to_finished(str){
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
xmlhttp.open("GET",base_url+controller+"/ch_to_finished/id/"+str,true);
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

			<div class="box" style="direction: rtl;text-align: right;">
                <div class="box-header">
                  <h3 class="box-title">قائمة بجميع الطلبات</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap"><div class="row"><div class="col-sm-6"></div><div class="col-sm-6"></div></div><div class="row"><div class="col-sm-12"><table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                    <thead>
                      <tr role="row">
						<th style="direction: rtl;text-align: right;"   >رقم الطلب</th>
						<th style="direction: rtl;text-align: right;"   >اسم الزبون</th>
						<th style="direction: rtl;text-align: right;"   >تاريخ الطلب</th>
						<th style="direction: rtl;text-align: right;"  >وقت التسليم</th>
						<th style="direction: rtl;text-align: right;"  >توصيل</th>
						<th style="direction: rtl;text-align: right;"  >حالة الطلب</th>
						<th style="direction: rtl;text-align: right;"  ></th>
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
							<td><?php if($rows->delivery==1) echo "مع توصيل"; else echo"بدون توصيل"; ?></td>
							<td>
								<?php 
									if($rows->order_status==-1)
										echo "الطلب ملغى";
									else if($rows->order_status==0) 
										echo "بانتظار القبول";
									else if($rows->order_status==1) 
										echo "جاري إعداد الطلب";	
									else if($rows->order_status==2) 
										echo "تم تجهيز الطلب";	
									else if($rows->order_status==3) 
										echo "بانتظار تسليم الطلب";		
									else if($rows->order_status==4) 
										echo "تم التسليم";			
								?>
									
							</td>
								<td>
								<input type="button" class="btn btn-info" onclick="view_details(<?php echo  $rows->id ;?>,<?php echo  $rows->cid ;?>)" value="عرض الطلب">								
								<?php if($rows->order_status>-1):?>
									<input type="button" 
									<?php if($rows->order_status==0):?>
										class="btn btn-warning" onclick="accepte_order(<?php echo  $rows->id ;?>)" value="قبول الطلب"
									<?php elseif($rows->order_status==1):?>
										class="btn btn-primary" onclick="ch_to_ready(<?php echo  $rows->id ;?>)" value="تم تحضير الطلب"
									<?php elseif($rows->order_status==2):?>	
										<?php if($rows->delivery==0): ?>
											class="btn btn-success" onclick="ch_to_finished(<?php echo  $rows->id ;?>)" value="تم التسليم"
										<?php else:?>
											class="btn btn-success" onclick="assign_to_boyoffice(<?php echo  $rows->id ;?>)" value="اسناد إلى عامل التوصيل"
										<?php endif;?>
									<?php elseif($rows->order_status==3):?>
										class="btn bg-purple margin" value="جاري التوصيل"
									<?php elseif($rows->order_status==4):?>	
										class="btn bg-olive margin" value="الطلب منتهي"
									<?php endif;?>	
									>
									<?php if($rows->order_status!=4):?>
										<input type="button" class="btn btn-danger" onclick="delete_order(<?php echo $rows->id ;?>)" value="إلغاء الطلب">
									<?php endif;?>		
								<?php else:?>
									<button class="btn bg-maroon margin">الطلب ملغى</button>
									 <button onclick="block_cust(<?php echo $rows->cid ;?>)" class="btn bg-navy margin">حظر الزبون</button>
								<?php endif;?>
								</td>
								
						</tr>			
						<?php endforeach;?>
						<?php endif;?>						
                    </tbody>
                  </table>
				  </div>
				  </div>
				  <div class="row">
					<div class="col-sm-7">
						<div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
							<ul class="pagination">
								<?php echo $this->pagination->create_links(); ?>
							</ul>
						</div>
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
						<button class="btn btn-block btn-info btn-sm" id="next">التالي</button>
						</div>
						<div class="col-lg-4"></div>
						<div class="col-lg-4">
						<button class="btn btn-block btn-warning btn-sm" id="prev">السابق</button>
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