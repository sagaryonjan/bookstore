<?php
session_start();

include 'admin/config/config.php';
include 'admin/config/db-connection.php';
include 'includes/function.php';
  $sql = "SELECT * FROM book WHERE status=1 ";
                $results = $conn->query($sql);

                $datas = array();
                if ($results->num_rows > 0) {

                    while ($tmp = $results->fetch_assoc()) {
                        $datas[] = $tmp;
                    }
                }
cart();
include 'includes/header.php';
?>
  <!-- Start Main Content Holder -->

  <section id="content-holder" class="container-fluid container">
    <section class="row-fluid">
      <section class="book-box">
        <div class="book-outer">
          <div id="mybook">
            <div title="first page">
              <div class="left-page">
                <div class="frame"><img src="images/image01.jpg" alt="img"></div>
                <div class="bottom">
                  <div class="cart-price"> <span class="cart">&nbsp;</span> <strong class="price">$149.50</strong> </div>
                </div>
              </div>
            </div>
            <div title="second page">
              <div class="right-page">
                <div class="text">
                  <h1>Parenting - For Early Years</h1>
                  <strong class="name">by Bonnier</strong>
                  <div class="rating-box"><img src="images/rating-img.png" alt="img"></div>
                  <a href="#" class="btn-shop">SHOP NOW</a> </div>
                <div class="bottom">
                  <div class="text">
                    <div class="inner">
                      <p>Curabitur lreaoreet nisl lorem in pellente e vidicus pannel impirus sadintas velisurabitur lreaoreet nisl lorem in pellente vidicus pannel.</p>
                      <a href="#" class="readmore">Read More</a> </div>
                    <div class="batch-icon"><img src="images/batch-img.png" alt="img"></div>
                  </div>
                </div>
              </div>
            </div>
            <div title="third page">
              <div class="left-page">
                <div class="frame"><img src="images/image01.jpg" alt="img"></div>
                <div class="bottom">
                  <div class="cart-price"> <span class="cart">&nbsp;</span> <strong class="price">$149.50</strong> </div>
                </div>
              </div>
            </div>
            <div title="fourth page">
              <div class="right-page">
                <div class="text">
                  <h1>Parenting - For Early</h1>
                  <strong class="name">by Bonnier</strong>
                  <div class="rating-box"><img src="images/rating-img.png" alt="img"></div>
                  <a href="#" class="btn-shop">SHOP NOW</a> </div>
                <div class="bottom">
                  <div class="text">
                    <div class="inner">
                      <p>Curabitur lreaoreet nisl lorem in pellente e vidicus pannel impirus sadintas velisurabitur lreaoreet nisl lorem in pellente vidicus pannel.</p>
                      <a href="#" class="readmore">Read More</a> </div>
                    <div class="batch-icon"><img src="images/batch-img.png" alt="img"></div>
                  </div>
                </div>
              </div>
            </div>
            <div title="fifth page">
              <div class="left-page">
                <div class="frame"><img src="images/image01.jpg" alt="img"></div>
                <div class="bottom">
                  <div class="cart-price"> <span class="cart">&nbsp;</span> <strong class="price">$149.50</strong> </div>
                </div>
              </div>
            </div>
            <div title="sixth page">
              <div class="right-page">
                <div class="text">
                  <h1>For Early Years</h1>
                  <strong class="name">by Bonnier</strong>
                  <div class="rating-box"><img src="images/rating-img.png" alt="img"></div>
                  <a href="#" class="btn-shop">SHOP NOW</a> </div>
                <div class="bottom">
                  <div class="text">
                    <div class="inner">
                      <p>Curabitur lreaoreet nisl lorem in pellente e vidicus pannel impirus sadintas velisurabitur lreaoreet nisl lorem in pellente vidicus pannel.</p>
                      <a href="#" class="readmore">Read More</a> </div>
                    <div class="batch-icon"><img src="images/batch-img.png" alt="img"></div>
                  </div>
                </div>
              </div>
            </div>
            <div title="seventh page">
              <div class="left-page">
                <div class="frame"><img src="images/image01.jpg" alt="img"></div>
                <div class="bottom">
                  <div class="cart-price"> <span class="cart">&nbsp;</span> <strong class="price">$149.50</strong> </div>
                </div>
              </div>
            </div>
            <div title="eighth page">
              <div class="right-page">
                <div class="text">
                  <h1>Parenting </h1>
                  <strong class="name">by Bonnier</strong>
                  <div class="rating-box"><img src="images/rating-img.png" alt="img"></div>
                  <a href="#" class="btn-shop">SHOP NOW</a> </div>
                <div class="bottom">
                  <div class="text">
                    <div class="inner">
                      <p>Curabitur lreaoreet nisl lorem in pellente e vidicus pannel impirus sadintas velisurabitur lreaoreet nisl lorem in pellente vidicus pannel.</p>
                      <a href="#" class="readmore">Read More</a> </div>
                    <div class="batch-icon"><img src="images/batch-img.png" alt="img"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="span12 wellcome-msg m-bottom first">
        <h2>WELCOME TO BookShoppe’.</h2>
        <p>Offering a wide selection of books on thousands of topics at low prices to satisfy any book-lover!</p>
      </section>
    </section>
    <section class="row-fluid ">

 <?php foreach ($datas as $data) {
 ?>
      <figure class="span4 s-product">
        <div class="s-product-img"><a href="book-detail.html"><img src="admin/public/images/<?php echo $data['image']; ?>" alt="Image02"/></a></div>
        <article class="s-product-det">
          <h3><a href="book-detail.html"><?php echo $data['title']; ?></a></h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod dolore magna aliqua.</p>
          <div class="cart-price"> <a href="<?php echo 'index.php?add_cart='. $data['isbn']; ?>" class="cart-btn2">Add to Cart</a> <span class="price">Nrs:<?php echo $data['price']; ?></span> </div>
          <span class="sale-icon">Sale</span> </article>
      </figure>
 <?php }?>
    </section>
  </section>
 
  <!-- End Main Content Holder -->
<?php
include 'includes/footer.php';
?>
  