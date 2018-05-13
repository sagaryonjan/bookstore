<?php

//Getting the user Ip address
function getIp() {
    $ip = $_SERVER['REMOTE_ADDR'];

    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }

    return $ip;
}

//createing the shoping shop
function cart(){

    if(isset($_GET['add_cart'])){

        global $conn;

        $ip = getIp();
        $isbn = $_GET['add_cart'];

        $check_pro = "select * from cart where ip_add ='$ip' AND isbn = '$isbn'";
         $results = $conn->query($check_pro);
        
        if(mysqli_num_rows($results)>0){
            echo "";
        }else{

            $insert_pro = "insert into cart (isbn,ip_add) values('$isbn','$ip')";

             $results = $conn->query($insert_pro);

            echo "<script>window.open('index.php','_self')</script>";

        }
    }
}


function total_items(){
    if(isset($_GET['add_cart'])){
        global $conn;
        $ip = getIp();

        $get_items = "select * from cart where ip_add = '$ip'";

          $results = $conn->query($get_items);

        $count_items = mysqli_num_rows($results);
    }else{
        global $conn;
        $ip = getIp();

        $get_items = "select * from cart where ip_add = '$ip'";

          $results = $conn->query($get_items);

        $count_items = mysqli_num_rows($results);
    }
    echo $count_items;
}

//getting the total price in the cart
function total_price(){
    $total = 0 ;
    global $conn;

    $ip = getIp();

    $sel_price = "select * from cart where ip_add='$ip'";
    $results = $conn->query($sel_price);

    while($p_price=mysqli_fetch_array($results)){
        $pro_id = $p_price['isbn'];
        $pro_price = "select * from book where isbn=$pro_id";
        $run_pro_price = $conn->query($pro_price);

        while($pp_price = mysqli_fetch_array($run_pro_price)){
            $product_price = array($pp_price['price']);
            $values = array_sum($product_price);

            $total +=$values;
        }
    }
    echo $total;
}

//deleting the cart
function delete_cart(){
    if(isset($_GET['delete_cart'])){
        global $conn;
        $ip = getIp();
        $isbn = $_GET['delete_cart'];

        $delete_pro = "delete from cart where ip_add ='$ip' AND isbn = '$isbn'";
        $results = $conn->query($delete_pro);

        if($results){
            echo "<script>window.open('cart.php','_self')</script>";
        }
    }
    if(isset($_POST['continue'])){
        echo "<script>window.open('index;.php','_self')</script>";
    }
}

