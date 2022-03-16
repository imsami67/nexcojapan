 <?php 
include_once "includes/header.php";
include_once "inc/code.php";

?>
<!-- start page content -->
            <div class="page-content-wrapper">
                <div class="page-content">
                    <div class="page-bar">
                        <div class="page-title-breadcrumb">
                            <div class=" pull-left">
                                <div class="page-title">Users</div>
                            </div>
                            <ol class="breadcrumb page-breadcrumb pull-right">
                                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="dashboard.php">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li class="active">Users</li>
                            </ol>
                        </div>
                    </div>

	<div class="col-sm-12">
		<div class="panel">
	<div class="panel-heading panel-heading-red" align="center"><h4>Create Users</h4></div>
	<div class="panel-body">
		<?php getMessage(@$msg,@$sts); ?>
		<form class="form-horizontal" method="POST" action="" id="">
			  <div class="form-group row">
			    <label for="clientContact" class="col-sm-2 control-label">User Name</label>
			    <div class="col-sm-4">
			      <input type="text" class="form-control" id="username" name="username" placeholder="Username" autocomplete="off"  required  value="<?=@$fetchusers['username']?>" />
			    </div>
			     <label for="clientContact" class="col-sm-2 control-label">Email</label>
			    <div class="col-sm-4">
			      <input type="email" class="form-control" id="email" name="email" placeholder="Email" autocomplete="off"  required  value="<?=@$fetchusers['email']?>" />
			    </div>
			  </div> <!--/form-group-->		
			 	<div class="form-group row">
			    <label for="clientContact" class="col-sm-2 control-label">Phone Number</label>
			    <div class="col-sm-4">
			      <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone Number" autocomplete="off"  required  value="<?=@$fetchusers['phone']?>" />
			    </div>
			      <label for="clientContact" class="col-sm-2 control-label">Password </label>

			    <div class="col-sm-4">
			      <input type="text" class="form-control" id="password" name="password" placeholder="Password" autocomplete="off"  required  value="<?=@$fetchusers['password']?>" /><span style="color: red" class="text-center">Password Automatically encrypted due to security issues</span>
			    </div>
			  </div> <!--/form-group-->	

			  <div class="form-group row">
			    <label for="clientContact" class="col-sm-2 control-label">UserRole</label>
			    <div class="col-sm-4">
			    	  <select class="form-control" name="user_role">
			    	  	<?php
			    	  		if ($fetchusers['user_role']) {
			    	  			# code...
			    	  		
			    	  	?>
			     	<option value="<?=@$fetchusers['user_role']?>"><?=@$fetchusers['user_role']?></option>
			     	<?php
}else{
	?>
	<option value="">~~SELECT~~</option>
	<?php
}
			     	?>

			     	<option value="admin">Admin</option>
			     	<option value="subadmin">Sub Admin</option>
			     	<option value="manager">Manager</option>
			     	<option value="cashier">Cashier</option>
			     	<option value="localusers">Local USer</option>

			     </select>
			     
			    </div>
			      <label for="clientContact" class="col-sm-2 control-label">Status </label>

			    <div class="col-sm-4">
			       <select class="form-control" name="status">
			     	<option value="<?=@$fetchusers['status']?>"><?=@$fetchusers['status']?></option>

			     	<option value="1">Available</option>
			     	<option value="0">Not A vailable</option>
			     </select>
			    </div>
			  </div> <!--/form-group-->	

			  <div class="form-group row">
			    <label for="clientContact" class="col-sm-2 control-label">Address</label>
			    <div class="col-sm-6">
			    	 <input type="text" class="form-control" id="address" name="address" placeholder="Enter Address" autocomplete="off"  required  value="<?=@$fetchusers['address']?>" />
			     
			    </div>
			    <div class="col-sm-4">
			    		<?php if (@$userPrivileges['nav_add']==1 || $fetchedUserRole=="admin"): ?>
			    	<?=$users_button;?>
			    <?php endif; ?>
			    </div>
			    
			  </div> <!--/form-group-->			  
			 
			</form>
			<br><br>
		</div>
	</div>
</div>


<div class="col-sm-12">
		<div class="panel">
	<div class="panel-heading cyan-bgcolor" align="center"><h4>Users</h4></div>
	<div class="panel-body">
<?php getMessage(@$msg,@$sts); ?>
			<table class="table example1" id="myTable"  >
				<thead>
			<tr>	
				<th>User ID</th>
				<th>Username</th>
				<th>Email</th>
				<th>Phone</th>
				<th>Address</th>
				<th>User Role</th>
				<th>Status</th>
				<th>Action</th>
				<th>Set Privileges </th>
			</tr>
			</thead>
			<tbody>
			<?php 
				
			
			
			$sql = "SELECT * FROM users  ";
	
	$result = mysqli_query($dbc, $sql);
	
	if ( mysqli_num_rows($result) > 0) {
		while($row = mysqli_fetch_array($result)){
			?>
			<tr>
				<td><?=$row['user_id'];?></td>
				<td><?=$row['username'];?></td>
				<td><?=$row['email'];?></td>
				<!-- <td>Encrypted </td> -->
				<td><?=$row['phone']?></td>
				<td><?=$row['address'];?></td>
				<td><?=$row['user_role'];?></td>
				
				<td>
					<?php
					if ($row['status'] == '1') {
						?>
						 <span class="label label-lg label-info" style="font-size: ">Available</span>
						<?php
						# code...
					}else{
						?>
						<span class="label label-lg label-danger" style="font-size: "> Not Available</span>
						<?php
					}
					?>
				</td>
				<!-- <td><?=date('D, d-M-Y',strtotime($row['adddatetime'])) ;?> -->
					

				</td>
				<td>
					<?php if (@$userPrivileges['nav_delete']==1 || $fetchedUserRole=="admin"): 
 ?>
					<a href="users.php?user_del_id=<?=$row['user_id']?>" class="text-danger"><span class="fa fa-remove"></span></a> | 
					<?php endif; ?>
					<?php if (@$userPrivileges['nav_edit']==1 || $fetchedUserRole=="admin"): ?>
					<a href="users.php?user_edit_id=<?=$row['user_id']?>" class="text-success"><span class="fa fa-edit"></span></a>
					<?php endif; ?>
				</td>
				<td><a href="privileges.php?user_id=<?=base64_encode($row['user_id'])?>" target="_blank" class="text-danger btn btn-info"><span class="fa fa-user"></span></a> 
					</td>	
				
			</tr>
			</tbody>
		<?php 
}
	} 
		?>
			
			
			</table>
		
	</div>
</div>

</div>
	</div></div>
<?php
include_once "includes/footer.php";
?>