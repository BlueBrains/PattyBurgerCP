<div id="allmeal">	
	<div class="controls">
	  <select id="selectError" data-rel="chosen"  name="meal_id" style="width: 100%;">
		<?php if(isset($record1)&&is_array($record1)):?>
		<?php foreach ($record1 as $rows):?>
		 <option value="<?php echo $rows->id ?>" > <?php echo $rows->name?></option>
		<?php endforeach;?>
		<?php endif;?>
	  </select>
	</div>
</div>	