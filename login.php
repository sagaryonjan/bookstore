<?php
session_start();
include 'admin/config/config.php';
include 'admin/config/db-connection.php';
include 'includes/function.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = mysqli_real_escape_string($conn, trim($_POST['email']));
    $password = mysqli_real_escape_string($conn, trim($_POST['password']));

    // validate if username and password field is not set blank
    if ($email == '' || $password == '') {
        $_SESSION['error'] = 'You must fill Email and password field.';
        header('location:login.php');
        exit;
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error'] = 'Invalid Email Please add valid email!';
        header('location:login.php');
        exit;
    }

    $sql = "SELECT * FROM users WHERE email = '$email' && password = '$password' && user_type = 'customer' && status = 1";
    include 'admin/config/db-connection.php';
    $results = $conn->query($sql);

    if ($results->num_rows == 1 ){
        $userGet = mysqli_fetch_assoc($results);
        $_SESSION['logged_in_customer'] = $userGet['user_id'];
    

        header('location:index.php');
        exit;
    } else {
        $_SESSION['error'] = 'Invalid Email and Password.';
        header('location:login.php');
        exit;
    }

}

if(isset($_GET['action']) && $_GET['action'] == 'logout'){
    unset($_SESSION['logged_in_customer']);
    header('location:login.php');
}



include 'includes/header.php';
?>
<section id="content-holder" class="container-fluid container">
<!-- Start Main Content Holder -->
<div class="span5 check-method-right"> <strong class="green-t">Login  Or   <a href="register.php">Register Account</a></strong>
    <p>Already registered? Please log in below:</p> 
    
    <form class="form-horizontal" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <?php include CONFIG_PATH.'flash_message.php'; ?>
        <div class="control-group">
            <label class="control-label" for="inputEmail">Email Address <sup>*</sup></label>
            <div class="controls">
                <input type="text" name="email" id="inputEmail" placeholder="">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="inputPassword">Password <sup>*</sup></label>
            <div class="controls">
                <input type="password" name="password" id="inputPassword" placeholder="" style="display: none;">
            </div>
        </div>
        <p><a href="#">Forgot your password?</a></p>
        <div class="control-group">
            <div class="controls">
                <button type="submit" class="more-btn">Login</button>
            </div>
        </div>
    </form>
</div>
    </section>

<!-- End Main Content Holder -->
<?php
include 'includes/footer.php';
?>
