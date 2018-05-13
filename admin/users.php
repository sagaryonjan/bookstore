<?php
session_start();

include 'config/config.php';
include "config/db-connection.php";

$table = 'users';

if ($_SESSION['logged_in_user']) {

    if (isset($_POST['form-submit'])) {
        extract($_POST);
        if (empty($_POST['id'])) {
            if ($email == '' || $first_name == '' || $last_name == '' || $password == '') {
                $_SESSION['error'] = 'Please fill all the required field';
                header('location:' . $table . '.php?action=add');
                exit;
            }
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $_SESSION['error'] = 'Invalid Email Please add valid email!';
                header('location:' . $table . '.php?action=add');
                exit;
            }
            $sql = "SELECT * FROM $table WHERE email = '$email'";
            $results = $conn->query($sql);
            if ($results->num_rows == 1) {
                $_SESSION['error'] = 'This Email is already taken!';
                header('location:' . $table . '.php?action=add');
                exit;
            }

            $sql = "INSERT INTO $table (first_name,last_name,email,password,status,user_type) VALUE ('$first_name','$last_name','$email','$password','$status','admin')";
            $results = $conn->query($sql);
            if ($results === True) {
                $_SESSION['success'] = 'New ' . ucfirst($table) . ' has been added successfully';
                header('location:' . $table . '.php');
                exit;
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
                die;
            }
        } else {

            $id = $_POST['id'];
            if ($email == '' || $first_name == '' || $last_name == '' || $password == '') {
                $_SESSION['error'] = 'Please fill all the required field';
                header('location:' . $table . '.php?action=edit&id=' . $id);
                exit;
            }
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $_SESSION['error'] = 'Invalid Email Please add valid email!';
                header('location:' . $table . '.php?action=edit&id=' . $id);
                exit;
            }
            $sql = "SELECT * FROM $table where user_id != '$id' AND email = '$email'";
            $results = $conn->query($sql);
            if ($results->num_rows == 1) {
                $_SESSION['error'] = 'Your Email field is already added.';
                header('location:' . $table . '.php?action=edit&id=' . $id);
                exit;
            }
            $sql = "UPDATE $table SET first_name = '$first_name', last_name = '$last_name', email = '$email', password = '$password', status = '$status' WHERE user_id = $id";

            $results = $conn->query($sql);
            if ($results === TRUE) {
                $_SESSION['success'] = 'Data Updated Successfully';

                header('location:' . $table . '.php');
                exit;
            }
        }
    }
    elseif (isset($_GET['action']) && $_GET['action'] == 'edit') {
        $data = array();
        $id = $_GET['id'];
        $sql = "SELECT * FROM $table where user_id = $id";
        $results = $conn->query($sql);
        $data = $results->fetch_assoc();
    }
    elseif (isset($_GET['action']) && $_GET['action'] == 'delete') {
        $id = $_GET['id'];
        $sql = "DELETE FROM $table where user_id = $id";
        $results = $conn->query($sql);
        if ($results === True) {
            $_SESSION['success'] = 'Data deleted successfully';
            header('location:' . $table . '.php');
            exit;
        }
    }
    else {
        $sql = "SELECT * FROM $table where user_type ='admin'";
        $results = $conn->query($sql);
        $datas = array();
        if ($results->num_rows > 0) {

            while ($tmp = $results->fetch_assoc()) {
                $datas[] = $tmp;
            }
        }
    }
}
else {
    header('location:index.php');
    exit;
}
include 'includes/style.php';
include 'includes/dashboard-header.php';


//for include folder
if (isset($_GET['action']) && $_GET['action'] == 'add' || isset($_GET['action']) && $_GET['action'] == 'edit') {
    include 'includes/' . $table . '/general.php';
} else {
    include 'includes/' . $table . '/index.php';
}

include 'includes/dashboard-footer.php';
include 'includes/script.php';
?>



