<?php
session_start();
include 'config/config.php';

include "config/db-connection.php";

$table = 'order_list';

    if($_SESSION['logged_in_user']){

        if(isset($_POST['form-submit'])){
           extract($_POST);
        
            if(empty($_POST['id'])) {

                 if ($title == '' || $subject =='' || $isbn == '' || $author == '' || $price == '') {
                $_SESSION['error'] = 'Please fill all the required field';
                header('location:' . $table . '.php?action=add');
                exit;
                 }
                $sql = "SELECT * FROM $table WHERE title = '$title'";
                $results = $conn->query($sql);
                if ($results->num_rows == 1) {
                    $_SESSION['error'] = ' Title is already added !';
                    header('location:' . $table . '.php?action=add');
                    exit;
                }

                $sql = "INSERT INTO $table (title,subject,isbn,author,price,sort_order,status) VALUE ('$title','$subject','$isbn','$author','$price','$sort_order','$status')";
                $results = $conn->query($sql);
                    if ($results === True) {
                        $_SESSION['success'] = 'New ' . ucfirst($table) . ' has been added successfully';
                        header('location:'. $table .'.php');
                        exit;
                    } else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                        die;
                    }
            }
            else{
                $id = $_POST['id'];
                $sql = "SELECT * FROM $table where user_id != '$id' AND title = '$title'";
                $results = $conn->query($sql);
                if($results->num_rows == 1){
                    $_SESSION['error'] = 'Your Title field is already added.';
                    header('location:'.$table.'.php?action=edit&id='.$id);
                    exit;
                }
                $sql = "UPDATE $table SET title = '$title', subject = '$subject', isbn = '$isbn', author = '$author',price = '$price',sort_order = '$sort_order', status = '$status' WHERE id = $id";
                  
                $results = $conn->query($sql);
                if($results === TRUE){
                    $_SESSION['success'] = 'Data Updated Successfully';

                    header('location:'.$table.'.php');
                    exit;
                }
            }
        }

        elseif (isset($_GET['action']) && $_GET['action'] == 'edit' )
         {
            $data = array();
            $id = $_GET['id'];
            $sql = "SELECT * FROM $table where id = $id";
            $results = $conn->query($sql);
            $data = $results->fetch_assoc();
        }

        elseif (isset($_GET['action']) && $_GET['action'] == 'delete' )
         {
            $id = $_GET['id'];
            $sql = "DELETE FROM $table where id = $id";
            $results = $conn->query($sql);
            if($results === True){
                $_SESSION['success'] = 'Data deleted successfully';
                header('location:'.$table.'.php');
                exit;
            }
        }

        else{
           $sql = "select *,(select email from users where user_id = users_id) as user_email from $table";
            $results = $conn->query($sql);
                $datas = array();
                if ($results->num_rows > 0) {

                    while ($tmp = $results->fetch_assoc()) {
                        $datas[] = $tmp;
                    }

                }
            }
    }
    else{
        header('location:index.php');
        exit;
    }

include 'includes/style.php';

include 'includes/dashboard-header.php';

//for include folder
if(isset($_GET['action']) && $_GET['action'] == 'add' || isset($_GET['action']) && $_GET['action'] == 'edit' ){
	include 'includes/'.$table.'/general.php';
}
else{
	include 'includes/'.$table.'/index.php';
}

include 'includes/dashboard-footer.php';

include 'includes/script.php';

?>



