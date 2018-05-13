<?php
session_start();

include 'admin/config/config.php';
include 'admin/config/db-connection.php';
include 'includes/function.php';
$sql = "SELECT * FROM book WHERE status=1 ";
$results = $conn->query($sql);

delete_cart();
$datas = array();
if ($results->num_rows > 0) {

    while ($tmp = $results->fetch_assoc()) {
        $datas[] = $tmp;
    }
}
include 'includes/header.php';
?>
    <section id="content-holder" class="container-fluid container" xmlns="http://www.w3.org/1999/html">
        <section class="row-fluid">
            <!-- Start Main Content -->
            <section class="span12 cart-holder">
                <div class="heading-bar">
                    <h2>SHOPPING CART</h2>
                    <span class="h-line"></span>
                    <a href="checkout.php" class="more-btn">proceed to checkout</a>
                </div>
                <div class="cart-table-holder">

                    <table width="100%" border="0" cellpadding="10">
                        <tr>
                            <th width="14%">&nbsp;</th>
                            <th width="43%" align="left">Product Name</th>
                            <th width="6%"></th>
                            <th width="10%">Unit Price</th>
                            <th width="10%">Quantity</th>
                            <th width="12%">Subtota</th>
                            <th width="5%">&nbsp;</th>
                        </tr>
                        <?php
                        $total = 0;
                        global $conn;

                        $ip = getIp();

                        $sel_price = "select * from cart where ip_add='$ip'";
                        $results = $conn->query($sel_price);

                        while ($p_price = mysqli_fetch_array($results)) {
                            $pro_id = $p_price['isbn'];
                            $pro_price = "select * from book where isbn=$pro_id";
                            $run_pro_price = $conn->query($pro_price);

                            while ($pp_price = mysqli_fetch_array($run_pro_price)) {
                                $product_price = array($pp_price['price']);
                                $product_isbn = $pp_price['isbn'];
                                $product_title = $pp_price['title'];
                                $single_price = $pp_price['price'];
                                $values = array_sum($product_price);

                                $total += $values;
                                echo $total;
                                ?>
                                <tr bgcolor="#FFFFFF" class=" product-detail">
                                    <td valign="top"><img src="<?php echo FRONTENED_URL; ?>images/image07.jpg"/></td>
                                    <td valign="top"><?php echo $product_title; ?></td>
                                    <td align="center" valign="top">$295.00</td>
                                    <td align="center" valign="top">
                                       <input type="text" name="qty" value="">
                                        <?php
                                      /*  if(isset($_POST['update_cart'])) {
                                            die;
                                            $qty = $_POST['qty'];
                                            $update_qty = "update cart set qty='$qty'";
                                            $results = $conn->query($update_qty);
                                            $_SESSION['qty'] = $qty;

                                            $total = $total*$qty;
                                        }*/
                                        ?>
                                    </td>

                                    <td align="center" valign="top">$<?php echo $single_price; ?></td>
                                    <td align="center" valign="top">
                                        <a href="<?php echo 'cart.php?delete_cart='.$product_isbn; ?>">
                                            <i class="icon-trash"></i></a></td>
                                </tr>
                                <a href="<?php echo 'cart.php?update_cart='.$product_isbn; ?>">Update</a>
                            <?php }
                        } ?>
                    </table>





                </div>
                <figure class="span4 price-total">
                    <div class="cart-option-box">
                        <table width="100%" border="0" cellpadding="10" class="total-payment">
                            <tr>
                                <td width="55%" align="right"><strong>Subtotal</strong></td>
                                <td width="45%" align="left">$<?php total_price(); ?></td>
                            </tr>
                            <tr>
                                <td align="right"><strong class="large-f">GRAND TOTAL</strong></td>
                                <td align="left"><strong class="large-f">$<?php total_price(); ?></strong></td>
                            </tr>
                        </table>
                        <hr/>
                        <a href="#" class="more-btn">proceed to checkout</a>

                        <p>Checkout with Multiple Addresses</p>
                    </div>
                </figure>
            </section>
            <!-- End Main Content -->
        </section>
    </section>

<?php
include 'includes/footer.php';
?>