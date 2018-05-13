<div id="content" class="content">

    <?php include 'includes/breadcrumb.php'; ?>

    <!-- begin row -->
    <div class="row">
        <!-- begin col-12 -->
        <div class="col-md-12 ui-sortable">
            <!-- begin panel -->
            <div class="panel panel-inverse" data-sortable-id="table-basic-7">
                <div class="panel-heading">
                    <div class="panel-heading-btn">
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default"
                           data-click="panel-expand"><i class="fa fa-expand"></i></a>
                    </div>
                    <h4 class="panel-title"><?php echo ucfirst($table); ?> Table</h4>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <?php include CONFIG_PATH.'flash_message.php'; ?>
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                 <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i = 1;
                        foreach ($datas as $data) { ?>
                            <tr class="odd gradeX">
                                <td><?php echo $i++; ?></td>
                                <td><?php echo $data['first_name']; ?></td>
                                  <td><?php echo $data['last_name']; ?></td>
                                <td><?php echo $data['email']; ?></td>
                                <td>
                                    <?php if ($data['status'] == 1) { ?>
                                        <span class="label label-success status">Active</span>
                                    <?php } else { ?>
                                        <span class="label label-danger status">InActive</span>
                                    <?php } ?>
                                </td>
                                <td>
                                    <a href="<?php echo $table.'.php?action=edit&id=' . $data['user_id']; ?>" type="button"
                                       class="btn btn-info m-r-5 m-b-5">Edit</a>
                                    <a href="<?php echo $table.'.php?action=delete&id=' . $data['user_id']; ?>" type="button"
                                       class="btn btn-danger m-r-5 m-b-5" onclick="return confirm('Are you sure??')">Delete</button></a>
                                </td>
                            </tr>
                        <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- end panel -->
        </div>
        <!-- end col-12 -->
    </div>
    <!-- end row -->

    <!-- begin scroll to top btn -->
    <a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i
            class="fa fa-angle-up"></i></a>
    <!-- end scroll to top btn -->