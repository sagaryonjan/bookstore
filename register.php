<?php
session_start();

include 'admin/config/config.php';
include 'admin/config/db-connection.php';
include 'includes/function.php';

if(isset($_POST['register'])){
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $zip = $_POST['zip'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $credit_card_number = $_POST['credit_card_number'];
    $credit_card_type = $_POST['credit_card_type'];

    if ($first_name == '' || $last_name == '' || $address= '' || $city = '' || $state='' || $zip = '' || $phone = '' || $email ='' || $password ='' || $credit_card_number ='' || $credit_card_type = '') {
        $_SESSION['error'] = 'You must fill all the required field.';
        header('location:register.php');
        exit;
    }


    $sql = "INSERT INTO users (first_name,last_name,address,city,state,zip,phone,email,password,credit_card_number,credit_card_type,user_type,status) VALUE ('$first_name','$last_name','$address','$city','$state','$zip','$phone','$email','$password','$credit_card_number','$credit_card_type','customer',1)";
    $results = $conn->query($sql);
    if ($results === True) {
        $_SESSION['success'] = 'New ' . ucfirst($table) . ' has been added successfully';
        header('location:login.php');
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        die;
    }
}


include 'includes/header.php';
?>
<script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-2.1.3.min.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.0/jquery.validate.min.js"></script>
<script src="http://code.jquery.com/jquery-2.1.1.min.js"></script>
<section id="content-holder" class="container-fluid container">
    <!-- Start Main Content Holder -->
    <?php include CONFIG_PATH.'flash_message.php'; ?>
    <div class="span5 check-method-right"> <strong class="green-t">Login</strong>
        <p>Already registered? Please log in below:</p>
        <form class="form-horizontal" action="<?php echo $_SERVER['PHP_SELF']; ?>" id="form" method="post">
            <div class="control-group">
                <label class="control-label" for="inputEmail">First Name<sup>*</sup></label>
                <div class="controls">
                    <input type="text" id="first_name" name="first_name" placeholder="First Name">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inputEmail">Last Name<sup>*</sup></label>
                <div class="controls">
                    <input type="text" id="last_name" name="last_name" placeholder="Last Name">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inputEmail">Address<sup>*</sup></label>
                <div class="controls">
                    <input type="text" id="address" name="address" placeholder="Address">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inputEmail">City<sup>*</sup></label>
                <div class="controls">
                    <input type="text" id="city" name="city" placeholder="City">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inputEmail">State<sup>*</sup></label>
                <div class="controls">
                    <input type="text" id="state" name="state" placeholder="State">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inputEmail">Phone<sup>*</sup></label>
                <div class="controls">
                    <input type="text" id="phone" name="phone" placeholder="Phone">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inputEmail">Zip<sup>*</sup></label>
                <div class="controls">
                    <input type="text" id="zip" name="zip" placeholder="Zip">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inputEmail">Email<sup>*</sup></label>
                <div class="controls">
                    <input type="text" id="email" name="email" placeholder="Email">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inputEmail">Credit Card Number<sup>*</sup></label>
                <div class="controls">
                    <input type="text" id="credit_card_number" name="credit_card_number" placeholder="Credit Card Number">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inputEmail">Credit Card Type<sup>*</sup></label>
                <div class="controls">
                    <input type="text" id="credit_card_type" name="credit_card_type" placeholder="Credit Card Number">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inputPassword">Password <sup>*</sup></label>
                <div class="controls">
                    <input type="password" id="password" placeholder="" style="display: none;">
                </div>
            </div>

            <div class="control-group">
                <div class="controls">
                    <button type="submit" name="register" class="more-btn">Register</button>
                </div>
            </div>
        </form>
    </div>
</section>


<script src="<?php echo EXTRA_URL ?>jquery.min.js"></script>
<script src="<?php echo EXTRA_URL ?>jquery.validate.js"></script>
<script>

    $(document).ready(function() {
        $(function(){
            $("#form").validate({
                rules : {
                    first_name: {
                        required:true
                    },
                    'file[]': {
                        required:true
                    }
                },

                messages : {
                    first_name:
                    {
                        required : '<span style="color:red; padding-left: 6px;">Album  field is required.</span>',
                    },
                    'file[]':
                    {
                        required : '<span style="color:red; padding-left: 6px;">Image  field is required.</span>',
                    }
                }
            });
        });
</script>


<!-- End Main Content Holder -->
<?php
include 'includes/footer.php';
?>
