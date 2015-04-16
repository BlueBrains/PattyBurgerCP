<?php 
for ($i=1 ; $i<7 ;$i++)
		{
			$data['active'.$i]='';
		}
$this->load->view('includes/header',$data); ?>
<div id="content" class="container" style="width:100%; margin-left: 0;">

<p>
	<h1>
		User Setings
	</h1>
	
</p>
<p></p>
<p></p>
<p></p>
<table class="table table-striped table-hover">
    <thead>
	<tr>
		<th><?php echo lang('index_fname_th');?></th>
		<th><?php echo lang('index_lname_th');?></th>
		<th><?php echo lang('index_email_th');?></th>
		<th><?php echo lang('index_groups_th');?></th>
		<th><?php echo lang('index_status_th');?></th>
		<th><?php echo lang('index_action_th');?></th>
	</tr>
    </thead>
    <tbody>
	<?php foreach ($users as $user):?>
		<tr>
			<td><?php echo $user->first_name;?></td>
			<td><?php echo $user->last_name;?></td>
			<td><?php echo $user->email;?></td>
			<td>
				<?php foreach ($user->groups as $group):?>
					<?php echo anchor("index.php/auth/edit_group/".$group->id, $group->name) ;?><br />
                <?php endforeach?>
			</td>
			<td><?php echo ($user->active) ? anchor("index.php/auth/deactivate/".$user->id, lang('index_active_link'), array('class' => 'btn btn-danger')) : anchor("auth/activate/". $user->id, lang('index_inactive_link'), array('class' => 'btn btn-danger'));?></td>
			<td><?php echo anchor("index.php/auth/edit_user/".$user->id, 'Edit', array('class' => 'btn btn-primary')) ;?></td>
		</tr>
	<?php endforeach;?>
    </tbody>
</table>



<?php $this->load->view('includes/footer'); ?>

