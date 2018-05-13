<?php
session_start();
include 'config/config.php';

if($_SESSION['logged_in_user']){

}else{
    header('location:index.php');
    exit;
}

include 'includes/dashboard-header.php';
?>
		<!-- begin #content -->
		<div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li><a href="javascript:;">Home</a></li>
				<li class="active">Dashboard</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">Dashboard <small>Welcome to dashboard <?php echo $_SESSION['logged_in_user'];?></small></h1>
			<!-- end page-header -->

		</div>
		<!-- end #content -->
		
       
		
		<!-- begin scroll to top btn -->
		<a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
		<!-- end scroll to top btn -->
<?php 
	include 'includes/dashboard-footer.php'
?>