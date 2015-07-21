<div id='colomn_control'>
								<td>
								<button type="button" class="btn btn-info" onclick="view_details(<?php echo  $id ;?>,<?php echo  $cid ;?>)" >عرض الطلب</button>	
								<?php if($order_status>-1):?>
									<input type="button"></button>
									<?php if($order_status==0):?>
									<input type="button" class="btn btn-warning" onclick="accepte_order(<?php echo  $id ;?>,<?php echo  $cid ;?>,<?php echo  $delivery ;?>)" >قبول الطلب</button>
									<?php elseif($order_status==1):?>
									<input type="button" class="btn btn-primary" onclick="ch_to_ready(<?php echo  $id ;?>,<?php echo  $cid ;?>,<?php echo  $delivery ;?>)"> تم تحضير الطلب</button>
									<?php elseif($order_status==2):?>	
										<?php if($delivery==0): ?>
									<input type="button" class="btn btn-success" onclick="ch_to_finished(<?php echo  $id ;?>,<?php echo  $cid ;?>,<?php echo  $delivery ;?>)" >تم التسليم</button>
										<?php else:?>
									<input type="button" class="btn btn-success" onclick="ch_to_ready(<?php echo  $id ;?>,<?php echo  $cid ;?>,<?php echo  $delivery ;?>)">اسناد إلى عامل التوصيل</button>
										<?php endif;?>
									<?php elseif($order_status==3):?>
									<input type="button" class="btn bg-purple margin" >جاري التوصيل</button>
									<?php elseif($order_status==4):?>	
									<input type="button" class="btn bg-olive margin">الطلب منتهي</button>
									<?php endif;?>	
									
									<button type="button" class="btn btn-danger" onclick="delete_order(<?php echo $id ;?>,<?php echo  $cid ;?>,<?php echo  $delivery ;?>)">إلغاء الطلب</button>
								<?php else:?>
									<button type="button" class="btn bg-maroon margin">الطلب ملغى</button>
									 <button  type="button" onclick="block_cust(<?php echo $cid ;?>,<?php echo  $id ;?>,<?php echo  $delivery ;?>,<?php echo $order_status ?>)" class="btn bg-navy margin">حظر الزبون</button>
								<?php endif;?>
								</td>
							</div>	