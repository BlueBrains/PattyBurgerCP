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
		<input type="button" class="btn btn-info" onclick="view_details(<?php echo  $rows->id ;?>,<?php echo  $rows->cid ;?>)" value="عرض الطلب">								
			<div class="col-sm-8">
			  <div class="input-group">
				<span class="input-group-addon">
				  <input type="checkbox" name="order_check[]" class="order_check" value="<?php echo  $rows->id ;?>">
				</span>&nbsp;&nbsp;
				<label><p class="text-green"> تحديد الطلب </p></label>
			  </div><!-- /input-group -->
			</div>
			<?php if($rows->order_status!=3):?>
				
			<?php endif;?>
		</td>
	</tr>			
	<?php endforeach;?>
	<?php endif;?>
</tbody>	