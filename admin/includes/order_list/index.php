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
                                <th>Email</th>
                                <th>date</th>
                                <th>isbn</th>
                                <th>Author</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i = 1;
                        foreach ($datas as $data) { ?>
                            <tr class="odd gradeX">
                                <td><?php echo $i++; ?></td>
                                <td><?php echo $data['user_email']; ?></td>
                                  <td><?php echo $data['received_date']; ?></td>
                                <td><?php echo $data['isbn']; ?></td>
                                 <td><?php echo $data['order_no']; ?></td>
                                <td>
                                    <a href="<?php echo $table.'.php?action=edit&id=' . $data['id']; ?>" type="button"
                                       class="btn btn-info m-r-5 m-b-5">View Order</a>
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