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
function view_details(str) {
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
  xmlhttp.open("GET",base_url+controller+"/view_task_details/id/"+str,true);
  xmlhttp.send();
}

function view_road(str) {
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
  xmlhttp.open("GET",base_url+controller+"/view_road/id/"+str,true);
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
                  <h3 class="box-title">قائمة بجميع مهمات التوصيل</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap"><div class="row"><div class="col-sm-6"></div><div class="col-sm-6"></div></div><div class="row"><div class="col-sm-12"><table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                    <thead>
                      <tr role="row">
						<th style="direction: rtl;text-align: right;"   >رقم المهمة</th>
						<th style="direction: rtl;text-align: right;"  >اسم عامل التوصيل</th>
						<th style="direction: rtl;text-align: right;"   >زمن اسناد المهمة</th>
						<th style="direction: rtl;text-align: right;"  >الوقت المستغرق لإنهائها</th>
						<th style="direction: rtl;text-align: right;"   >عدد الطلبات الموصلة</th>
						<th style="direction: rtl;text-align: right;"  ></th>
						</tr>
                    </thead>
                    <tbody>                    
                   
                        
						<?php if(isset($record)&&is_array($record)):?>
						<?php foreach ($record as $rows):?>
						 <tr role="row" class="odd">
							<td ><?php echo $rows->d_tid ?></td>
							<td><?php echo $rows->c_name ?></td>
							<td><?php echo $rows->del_time?></td>
							<td><?php echo $rows->established_time ?></td>
							<td><?php echo $rows->orders_num ?></td>
							<td>
								<button type="button" class="btn btn-info" onclick="view_details(<?php echo  $rows->d_tid ;?>)">عرض الطلبات</button>
								<button class="btn bg-purple margin" onclick="view_road(<?php echo $rows->d_tid ;?>)" >الطريق المسلوك</button>
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