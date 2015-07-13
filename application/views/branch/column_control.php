<div id='colomn_control'>
								<td>
								<input type="button" class="btn btn-info" onclick="view_details(<?php echo  $id ;?>,<?php echo  $cid ;?>)" value="عرض الطلب">								
								<?php if($order_status>-1):?>
									<input type="button" 
									<?php if($order_status==0):?>
										class="btn btn-warning" onclick="accepte_order(<?php echo  $id ;?>,<?php echo  $cid ;?>,<?php echo  $delivery ;?>)" value="قبول الطلب"
									<?php elseif($order_status==1):?>
										class="btn btn-primary" onclick="ch_to_ready(<?php echo  $id ;?>,<?php echo  $cid ;?>,<?php echo  $delivery ;?>)" value="تم تحضير الطلب"
									<?php elseif($order_status==2):?>	
										<?php if($delivery==0): ?>
											class="btn btn-success" onclick="ch_to_finished(<?php echo  $id ;?>,<?php echo  $cid ;?>,<?php echo  $delivery ;?>)" value="تم التسليم"
										<?php else:?>
											class="btn btn-success" onclick="ch_to_ready(<?php echo  $id ;?>,<?php echo  $cid ;?>,<?php echo  $delivery ;?>)" value="اسناد إلى عامل التوصيل"
										<?php endif;?>
									<?php elseif($order_status==3):?>
										class="btn bg-purple margin" value="جاري التوصيل"
									<?php elseif($order_status==4):?>	
										class="btn bg-olive margin" value="الطلب منتهي"
									<?php endif;?>	
									>
									<input type="button" class="btn btn-danger" onclick="delete_order(<?php echo $id ;?>,<?php echo  $cid ;?>,<?php echo  $delivery ;?>)" value="إلغاء الطلب">
								<?php else:?>
									<button class="btn bg-maroon margin">الطلب ملغى</button>
									 <button onclick="block_cust(<?php echo $cid ;?>,<?php echo  $id ;?>,<?php echo  $delivery ;?>,<?php echo $order_status ?>)" class="btn bg-navy margin">حظر الزبون</button>
								<?php endif;?>
								</td>
							</div>	