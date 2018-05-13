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

                            <form class="form-horizontal form-bordered" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" data-parsley-validate="true" name="demo-form" enctype="multipart/form-data">
								<?php include CONFIG_PATH.'flash_message.php'; ?>
								<div class="form-group">
									<label class="col-md-3 control-label" for="title">Title :</label>
									<div class="col-md-9">
										<input class="form-control" type="text" id="title" name="title" value="<?php if(isset($data['title'])){ echo $data['title'];}?>" placeholder="Title" data-parsley-required="false" />
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label" for="subject">Subject :</label>
									<div class="col-md-9">
										<input class="form-control" type="text" id="subject" name="subject" value="<?php if(isset($data['subject'])){ echo $data['subject'];}?>" placeholder="Subject" data-parsley-required="false" />
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label" for="isbn">isbn :</label>
									<div class="col-md-9">
										<input class="form-control" type="text" id="isbn" name="isbn" value="<?php if(isset($data['isbn'])){ echo $data['isbn'];}?>" placeholder="isbn" data-parsley-required="false" />
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label" for="author">Author :</label>
									<div class="col-md-9">
										<input class="form-control" type="text" id="author" name="author" value="<?php if(isset($data['author'])){ echo $data['author'];}?>" placeholder="Author" data-parsley-required="false" />
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label" for="price">Price :</label>
									<div class="col-md-9">
										<input class="form-control" type="text" id="price" name="price" value="<?php if(isset($data['price'])){ echo $data['price'];}?>" placeholder="Price" data-parsley-required="false" />
									</div>
								</div>

								<div class="form-group">
									<label class="col-md-3 control-label" for="sort_order">sort_order :</label>
									<div class="col-md-9">
										<input class="form-control" type="text" id="sort_order" name="sort_order" value="<?php if(isset($data['sort_order'])){ echo $data['sort_order'];}?>" placeholder="Order" data-parsley-required="false" />
									</div>
								</div>

								  	<div class="form-group">
									        <label class="col-md-3 control-label">Image</label>
									        <div class="col-md-3">
									             <input type="file" name="image" />
									        </div>
									        <?php
									        if(isset($data['image']))
									        {
									            if($data['image']!="")
									            {?><div class="col-md-3">
									                <img src="<?php echo 'public/images/'.$data['image'] ;?>" width="80" height="60" />Existing Image:
									                </div>
									            <?php }
									            else
									            {
									                echo "no image";?>
									            <?php }
									        }
									        ?>
								  	</div>
								  	<div class="form-group">
                                    <label class="col-md-3 control-label">Description</label>
                                    <div class="col-md-9">
                                        <textarea class="form-control" name="description" placeholder="Textarea" rows="5"><?php if(isset($data['description'])){ echo $data['description'];}?></textarea>
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
								<?php if(isset($data['id'])){ ?>
									<input type="hidden" value="<?php echo $data['id'];?>" name="id" />
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