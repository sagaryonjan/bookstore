<?php 
		if(isset($_GET['action']) && $_GET['action'] == 'add'){
?>
<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li><a href="dashboard.php">Home</a></li>
				<li><a href="setting.php"><?php echo ucfirst($table); ?> Add</a></li>
				<li class="active">Add User</li>
			</ol>
			<!-- end breadcrumb -->
		<!-- begin page-header -->
			<h1 class="page-header">Manage <?php echo ucfirst($table); ?> <small style="padding-right: 15px;">Here you can add,edit,delete the data</small><a href="<?php echo $table ?>.php"><button type="button"  class="btn btn-success m-r-5 m-b-5"><?php echo ucfirst($table); ?> List</button></a></h1>
			<!-- end page-header -->
			<?php 
		}
			else{
			?>
			<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li><a href="dashboard.php">Home</a></li>
				<li class="active">List <?php echo ucfirst($table); ?></li>
			</ol>
			<!-- end breadcrumb -->
		<!-- begin page-header -->
			<h1 class="page-header">Manage <?php echo ucfirst($table); ?> <small style="padding-right: 15px;">Here you can add,edit,delete the data</small><a href="<?php echo $table ?>.php?action=add"><button type="button"  class="btn btn-success m-r-5 m-b-5"><?php echo ucfirst($table); ?> Add</button></a></h1>
			<!-- end page-header -->
			<?php } ?>