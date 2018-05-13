	<!-- begin #content -->
		<div id="content" class="content">
			<?php include 'includes/breadcrumb.php'; ?>
			<!-- begin row -->
			<div class="row">
                <!-- begin col-6 -->
			    <div class="col-md-12">
			        <!-- begin panel -->
                    <div class="panel panel-inverse" data-sortable-id="form-validation-1">
                        <div class="panel-heading">
                            <div class="panel-heading-btn">
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                            </div>
                            <h4 class="panel-title"><?php echo ucfirst($table); ?> Table</h4>
                        </div>
                        <div class="panel-body panel-form">

                            <form class="form-horizontal form-bordered" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" data-parsley-validate="true" name="demo-form">
								<?php include CONFIG_PATH.'flash_message.php'; ?>
								<div class="form-group">
									<label class="col-md-3 control-label" for="first_name">First Name :</label>
									<div class="col-md-9">
										<input class="form-control" type="text" id="first_name" name="first_name" value="<?php if(isset($data['first_name'])){ echo $data['first_name'];}?>" placeholder="First Name" data-parsley-required="false" />
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label" for="last_name">Last Name :</label>
									<div class="col-md-9">
										<input class="form-control" type="text" id="last_name" name="last_name" value="<?php if(isset($data['last_name'])){ echo $data['last_name'];}?>" placeholder="Last Name" data-parsley-required="false" />
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label" for="email">Email :</label>
									<div class="col-md-9">
										<input class="form-control" type="text" id="email" name="email" value="<?php if(isset($data['email'])){ echo $data['email'];}?>" placeholder="Valid Email" data-parsley-required="false" />
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label" for="email">Password :</label>
									<div class="col-md-9">
										<input class="form-control" type="password" id="password" name="password" value="<?php if(isset($data['password'])){ echo $data['password'];}?>" placeholder="Password" data-parsley-required="false" />
									</div>
								</div>

								<div class="form-group">
									<label class="col-md-3 control-label">Status</label>
									<div class="col-md-9">
										<label class="radio-inline">
											<input type="radio" name="status" value="1" <?php if(isset($data['status'])){ echo $data['status'] == 1?'checked':''; } ?> checked>
											Active
										</label>
										<label class="radio-inline">
											<input type="radio" name="status" value="0"  <?php if(isset($data['status'])){ echo $data['status'] == 0?'checked':''; } ?>>
											Inactive
										</label>
									</div>
								</div>
								<?php if(isset($data['user_id'])){ ?>
									<input type="hidden" value="<?php echo $data['user_id'];?>" name="id" />
								<?php }?>
								<div class="form-group">
									<label class="col-md-3 control-label"></label>
									<div class="col-md-9">
										<button type="submit" name="form-submit" class="btn btn-primary">Submit</button>
									</div>
								</div>
                            </form>
                        </div>
                    </div>
                    <!-- end panel -->
                </div>
                <!-- end col-6 -->

            </div>
            <!-- end row -->
		</div>
		<!-- end #content -->