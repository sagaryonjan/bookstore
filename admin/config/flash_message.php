<?php
if(isset($_SESSION['error'])) {
    echo "<div class ='alert alert-danger'>";
    echo $_SESSION['error'];
    echo "</div>";
    unset($_SESSION['error']);
}
if(isset($_SESSION['success'])) {
    echo "<div class ='alert alert-success'>";
    echo $_SESSION['success'];
    echo "</div>";
    unset($_SESSION['success']);
}
?>