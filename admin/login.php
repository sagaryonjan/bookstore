<?php
session_start();

include_once 'config/function.php';

include_once 'config/db-connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = mysqli_real_escape_string($conn, trim($_POST['email']));
    $password = mysqli_real_escape_string($conn, trim($_POST['password']));

    // validate if username and password field is not set blank
    if ($email == '' || $password == '') {
        $_SESSION['error'] = 'You must fill Email and password field.';
        header('location:index.php');
        exit;
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error'] = 'Invalid Email Please add valid email!';
        header('location:index.php');
        exit;
    }

    $sql = "SELECT * FROM users WHERE email = '$email' && password = '$password' && user_type = 'admin' && status = 1";
    $results = $conn->query($sql);

    if ($results->num_rows == 1  ){
        $userGet = mysqli_fetch_assoc($results);
        $_SESSION['logged_in_user'] = $userGet['first_name'];

        header('location:dashboard.php');
    } else {
        $_SESSION['error'] = 'Invalid Email and Password.';
        header('location:index.php');
        exit;
    }


}

if(isset($_GET['action']) && $_GET['action'] == 'logout'){
    unset($_SESSION['logged_in_user']);
    header('location:index.php');
}
