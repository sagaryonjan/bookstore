<div id="sidebar" class="sidebar">
            <!-- begin sidebar scrollbar -->
            <div data-scrollbar="true" data-height="100%">
                <!-- begin sidebar user -->
                <ul class="nav">
                    <li class="nav-profile">
                        <div class="image">
                            <a href="javascript:;"><img src="<?php echo PUBLIC_URL; ?>img/user-13.jpg" alt="" /></a>
                        </div>
                        <div class="info">
                            <?php echo $_SESSION['logged_in_user'] ?>
                            <small>List of Tables</small>
                        </div>
                    </li>
                </ul>
                <!-- end sidebar user -->
                <!-- begin sidebar nav -->
                <ul class="nav">
                    <li class=" <?php echo ($_SERVER['PHP_SELF'] == '/admin/dashboard.php'?'active':''); ?>">
                        <a  href="dashboard.php">
                            <i class="fa fa-laptop"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                     <li class=" <?php echo ($_SERVER['PHP_SELF'] == '/admin/user.php'?'active':''); ?>">
                        <a  href="users.php">
                            <i class="fa fa-user"></i>
                            <span>Users</span>
                        </a>
                    </li>

                    <li class=" <?php echo ($_SERVER['PHP_SELF'] == '/admin/book.php'?'active':''); ?>">
                        <a  href="book.php">
                            <i class="fa fa-book"></i>
                            <span>Books</span>
                        </a>
                    </li>
                    <li class=" <?php echo ($_SERVER['PHP_SELF'] == '/admin/order.php'?'active':''); ?>">
                        <a  href="order_list.php">
                            <i class="fa fa-cart-plus"></i>
                            <span>Orders</span>
                        </a>
                    </li>

                     <li class="has-sub ">
                        <a  href="login.php?action=logout">
                            <i class="fa fa-laptop"></i>
                            <span>Logout</span>
                        </a>
                    </li>
                    
                    <!-- begin sidebar minify button -->
                    <li><a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify"><i class="fa fa-angle-double-left"></i></a></li>
                    <!-- end sidebar minify button -->
                </ul>
                <!-- end sidebar nav -->
            </div>
            <!-- end sidebar scrollbar -->
        </div>
        <div class="sidebar-bg"></div>

   