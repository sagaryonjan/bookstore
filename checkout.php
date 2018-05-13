<?php
session_start();

include 'admin/config/config.php';
include 'admin/config/db-connection.php';
include 'includes/function.php';

if($_SESSION['logged_in_customer']){

}else{
header('location:login.php');
exit;
}
include 'includes/header.php';
?>
   <!-- Start Main Content Holder -->
  <section id="content-holder" class="container-fluid container">
    <section class="row-fluid">
      <div class="heading-bar">
        <h2>Checkout</h2>
        <span class="h-line"></span> </div>
      <!-- Start Main Content -->
      <section class="checkout-holder">
        <section class="span9 first">
          <!-- Start Accordian Section -->
          <div class="accordion" id="accordion2">

               
            <div class="accordion-group">
              <div class="accordion-heading"> <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne"> Checkout Method </a></div>
              <div id="collapseOne" class="accordion-body collapse in">
                <div class="accordion-inner no-p">
                  <table width="100%" border="0" cellpadding="14">
                    <tr class="heading-bar-table">
                      <th width="47%" align="left">Product Name</th>
                      <th width="18%">Price</th>
                      <th width="19%">Quantity</th>
                      <th width="16%">Subtotal </th>
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
                              
                                ?>
                    <tr>
                      <td width="47%" align="left"><a href="#"><?php echo $product_title; ?></td>
                      <td width="18%">$1,680.00 </td>
                      <td width="19%">1 </td>
                      <td width="16%">$<?php echo $single_price; ?></td>
                    </tr>
                    <?php }
                        } ?>

                    <tr>
                      <td colspan="3" align="left">Forgot an items? Edit your cart</td>
                      <td><a href="#" class="more-btn">Place Order</a> </td>
                    </tr>
                  </table>
                </div>
              </div>
            </div>
 

            </div>
             
          <!-- End Accordian Section -->
        </section>
       
      </section>
      <!-- End Main Content -->
    </section>
  </section>
  <!-- End Main Content Holder -->
<?php
include 'includes/footer.php';
?>