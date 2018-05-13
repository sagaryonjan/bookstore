<?php
session_start();

include_once 'config/config.php';

include_once 'includes/login-header.php';
?>

<!-- begin #page-container -->
<div id="page-container" class="fade">
    <!-- begin login -->
    <div class="login bg-black animated fadeInDown">
        <!-- begin brand -->
        <div class="login-header">
            <div class="brand">
                <span class="logo"></span> Book Store
                <small>This is for admin login</small>
            </div>
            <div class="icon">
                <i class="fa fa-sign-in"></i>
            </div>
        </div>
        <!-- end brand -->
        <div class="login-content">
            <form action="login.php" method="POST" class="margin-bottom-0">
                <?php include_once CONFIG_PATH.'flash_message.php'; ?>
                <div class="form-group m-b-20">
                    <input type="email" name="email" class="form-control input-lg" placeholder="Email Address" />
                </div>
                <div class="form-group m-b-20">
                    <input type="password" name="password" class="form-control input-lg" placeholder="Password" />
                </div>
                <div class="login-buttons">
                    <button type="submit" class="btn btn-success btn-block btn-lg">Sign me in</button>
                </div>
            </form>
        </div>
    </div>
    <!-- end login -->
</div>
<!-- end page container -->

<?php
include_once 'includes/login-footer.php';
?>