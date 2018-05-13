<?php
session_start();

include 'config/config.php';
include "config/db-connection.php";

$table = 'book';

if ($_SESSION['logged_in_user']) {

    if (isset($_POST['form-submit'])){
        $title = $_POST['title'];
        $subject = $_POST['subject'];
        $isbn = $_POST['isbn'];
        $author = $_POST['author'];
        $price = $_POST['price'];
        $sort_order = $_POST['sort_order'];
        $description = $_POST['description'];
        $status = $_POST['status'];
      

        if (empty($_POST['id'])) {

            if ($title == '' || $subject == '' || $isbn == '' || $author == '' || $price == '' || $image = '') {
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
            $sql = "SELECT * FROM $table WHERE isbn = '$isbn'";
            $results = $conn->query($sql);
            if ($results->num_rows == 1) {
                $_SESSION['error'] = ' Isbn must be unique!';
                header('location:' . $table . '.php?action=add');
                exit;
            }
            $image = rand(3647,8768).'_'.$_FILES['image']['name'];
            $sql = "INSERT INTO $table (title,subject,isbn,author,price,sort_order,image,description,status) VALUE ('$title','$subject','$isbn','$author','$price','$sort_order','$image','$description','$status')";
           

            $results = $conn->query($sql);
            if ($results === True) {
                $temp_path = $_FILES['image']['tmp_name'];
                 
                $picture = 'public/images/';
                move_uploaded_file($temp_path,$picture.$image);
                $_SESSION['success'] = 'New ' . ucfirst($table) . ' has been added successfully';
                header('location:' . $table .'.php');
                exit;
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
                die;
            }
        } else {
            $id = $_POST['id'];
             $image = rand(3647,8768).'_'.$_FILES['image']['name'];
            $img = "SELECT image FROM $table where id='$id'";
            $results = $conn->query($img);
            $imgGet = $results->fetch_assoc();
            if($image!='')
            {
                $file = 'public/images/'.$imgGet['image'];
                @unlink($file);
            }


            if ($title == '' || $subject == '' || $isbn == '' || $author == '' || $price == '' || $image == '') {
                $_SESSION['error'] = 'Please fill all the required field';
                header('location:' . $table . '.php?action=edit&id=' . $id);
                exit;
            }
            $sql = "SELECT * FROM $table where id != '$id' AND title = '$title'";
            $results = $conn->query($sql);
            if ($results->num_rows == 1) {
                $_SESSION['error'] = 'Your Title field is already added.';
                header('location:' . $table . '.php?action=edit&id=' . $id);
                exit;
            }
            $sql = "UPDATE $table SET title = '$title', subject = '$subject', isbn = '$isbn', author = '$author',price = '$price',sort_order = '$sort_order',image = '$image',description = '$description', status = '$status' WHERE id = $id";
           

            $results = $conn->query($sql);
            if ($results === TRUE) {
                 $temp_path = $_FILES['image']['tmp_name'];
                $picture = 'public/images/';
                move_uploaded_file($temp_path,$picture.$image);
                $_SESSION['success'] = 'Data Updated Successfully';
                header('location:' . $table . '.php');
                exit;
            }
        }
    }
    elseif (isset($_GET['action']) && $_GET['action'] == 'edit'){
        $data = array();
        $id = $_GET['id'];
        $sql = "SELECT * FROM $table where id = $id";
        $results = $conn->query($sql);
        $data = $results->fetch_assoc();
    }
    elseif (isset($_GET['action']) && $_GET['action'] == 'delete'){

        $id = $_GET['id'];
        $img = "SELECT image FROM $table where id='$id'";
        $results = $conn->query($img);
        $imgGet = $results->fetch_assoc();

        if($imgGet!='')
        {
            $file = 'public/images/'.$imgGet['image'];
            @unlink($file);
        }
        $sql = "DELETE FROM $table where id = $id";
        $results = $conn->query($sql);
        if ($results === True) {
            $_SESSION['success'] = 'Data deleted successfully';
            header('location:' . $table . '.php');
            exit;
        }
    }
    else {
        $sql = "SELECT * FROM $table";
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



