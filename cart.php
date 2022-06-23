<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "baza_db";

// creating connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// start session
session_start();

if(isset($_POST['id'])) {
  $_SESSION['id_array'][] = $_POST['id'];
}

if(isset($_POST['clear_value'])) {
  clear();
} 

function clear() {
  unset($_SESSION['id_array'][$_POST['clear_value']]);
}

if(isset($_SESSION['id_array'])) {
  $_SESSION['id_array'] = array_unique($_SESSION['id_array']);
}


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Computer-Tech</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mukta:300,400,700"> 
    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">


    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/style.css">
    
    
  </head>
  <body>
  
  <div class="site-wrap">
    <header class="site-navbar" role="banner">
      <div class="site-navbar-top">
        <div class="container">
          <div class="row align-items-center">

            <div class="col-6 col-md-4 order-2 order-md-1 site-search-icon text-left">
              <form action="" class="site-block-top-search">
                <span class="icon icon-search2"></span>
                <input type="text" class="form-control border-0" placeholder="Search">
              </form>
            </div>

            <div class="col-12 mb-3 mb-md-0 col-md-4 order-1 order-md-2 text-center">
              <div class="site-logo">
                <a href="index.html" class="js-logo-clone">Computer-Tech</a>
              </div>
            </div>

            <div class="col-6 col-md-4 order-3 order-md-3 text-right">
              <div class="site-top-icons">
                <ul>
                  <li>
                    <a href="logged.php">
                      <span class="icon icon-person_outline"></span>
                    </a>
                  </li>
                  <!-- <li>
                    <a href="#">
                      <span class="icon icon-heart-o"></span>
                    </a>
                  </li> -->
                  <li>
                    <a href="cart.php" class="site-cart">
                      <span class="icon icon-shopping_cart"></span>
                      <!-- <span class="count">2</span> -->
                    </a>
                  </li> 
                  <li> <!-- class="d-inline-block d-md-none ml-md-0" -->
                    <a href="#" class="site-menu-toggle js-menu-toggle">
                      <span class="icon-menu"></span>
                    </a>
                  </li>
                </ul>
              </div> 
            </div>

          </div>
        </div>
      </div> 
      <nav class="site-navigation text-right text-md-center" role="navigation">
        <div class="container">
          <ul class="site-menu js-clone-nav d-none d-md-block">
            <li> <!-- class="has-children" -->
              <a href="index.html">Home</a>
              <!-- <ul class="dropdown">
                <li><a href="#">Menu One</a></li>
                <li><a href="#">Menu Two</a></li>
                <li><a href="#">Menu Three</a></li>
                <li class="has-children">
                  <a href="#">Sub Menu</a>
                  <ul class="dropdown">
                    <li><a href="#">Menu One</a></li>
                    <li><a href="#">Menu Two</a></li>
                    <li><a href="#">Menu Three</a></li>
                  </ul>
                </li>
              </ul> -->
            </li>
            <li> <!-- class="has-children" -->
              <a href="about.html">About us</a>
              <!-- <ul class="dropdown">
                <li><a href="#">Menu One</a></li>
                <li><a href="#">Menu Two</a></li>
                <li><a href="#">Menu Three</a></li>
              </ul> -->
            </li>
            <li>
              <a href="shop_base.php">Shop</a>
            </li>
            <!-- <li><a href="#">Catalogue</a></li> -->
            <!-- <li><a href="#">New Arrivals</a></li> -->
            <li>
              <a href="contact.html">Contact</a>
            </li>
          </ul>
        </div>
      </nav>
    </header>

    <div class="bg-light py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-0"><a href="index.html">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Cart</strong></div>
        </div>
      </div>
    </div>

    <div class="site-section">
      <div class="container">
        <div class="row mb-5">
          <form class="col-md-12" method="post">
            <div class="site-blocks-table">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th class="product-thumbnail">Image</th>
                    <th class="product-name">Product</th>
                    <th class="product-price">Price [$]</th>
                    <th class="product-quantity">Quantity</th>
                    <th class="product-total">Total [$]</th>
                    <th class="product-remove">Remove</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    if(isset($_SESSION['id_array'])){
                      $query ="SELECT * FROM produkty";

                      $stmt = mysqli_query($conn, $query);

                      while( $row = mysqli_fetch_assoc($stmt) ) {
                        foreach ($_SESSION['id_array'] as $key=>$value) {
                          if($row["id_produkt"] == $value) {
                            echo'
                            <tr>
                              <form method="post">
                                <td class="product-thumbnail">
                                  <img src="'.$row["fotografia"].'" alt="Image" class="img-fluid">
                                </td>
                                <td class="product-name">
                                  <h2 class="h5 text-black">'.$row["nazwa_produktu"].'</h2>
                                </td>
                                <td class="cost">'.$row["cena"].'</td>
                                <td>
                                  <div class="input-group mb-3" style="max-width: 120px;">
                                    <div class="input-group-prepend">
                                      <button onclick="calculateTotal()" class="btn btn-outline-primary js-btn-minus" type="button">&minus;</button>
                                    </div>
                                    <input type="text" class="form-control text-center" value="1" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
                                    <div class="input-group-append">
                                      <button onclick="calculateTotal()" class="btn btn-outline-primary js-btn-plus" type="button">&plus;</button>
                                    </div>
                                  </div>
                                </td>
                                <td class="total">'.$row["cena"].'</td>
                                <td>
                                  <button onclick="calculateTotal()" class="btn btn-primary btn-sm" name="clear_value" value="'.$key.'">X</button>
                                </td>
                              </form>
                            </tr>
                            ';
                            // $_SESSION['count_cart'] = $value;
                          }
                        }
                      }
                    }
                  ?>

                  <!-- // <tr>
                  //   <td class="product-thumbnail">
                  //     <img src="images/intel_i5_10.jpg" alt="Image" class="img-fluid">
                  //   </td>
                  //   <td class="product-name">
                  //     <h2 class="h5 text-black">Intel Core i5-10400F</h2>
                  //   </td>
                  //   <td class="cost">162</td>
                  //   <td>
                  //     <div class="input-group mb-3" style="max-width: 120px;">
                  //       <div class="input-group-prepend">
                  //         <button onclick="calculateTotal()" class="btn btn-outline-primary js-btn-minus" type="button">&minus;</button>
                  //       </div>
                  //       <input type="text" class="form-control text-center" value="1" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
                  //       <div class="input-group-append">
                  //         <button onclick="calculateTotal()" class="btn btn-outline-primary js-btn-plus" type="button">&plus;</button>
                  //       </div>
                  //     </div>

                  //   </td>
                  //   <td class="total">162</td>
                  //   <td><button onclick="calculateTotal()" class="btn btn-primary btn-sm">X</button></td>
                  // </tr> -->
                  
                </tbody>
              </table>
            </div>
          </form>
        </div>

        <div class="row">
          <div class="col-md-6">
            <div class="row mb-5">
              <div class="col-md-6 mb-3 mb-md-0">
                <button onclick="calculateTotal()" class="btn btn-primary btn-sm btn-block">Update Cart</button>
              </div>
              <div class="col-md-6">
                <button class="btn btn-outline-primary btn-sm btn-block" onclick="window.location='shop_base.php'">Continue Shopping</button>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <label class="text-black h4" for="coupon">Coupon</label>
                <p>Enter your coupon code if you have one.</p>
              </div>
              <div class="col-md-8 mb-3 mb-md-0">
                <input type="text" class="form-control py-3" id="coupon" placeholder="Coupon Code">
              </div>
              <div class="col-md-4">
                <button class="btn btn-primary btn-sm">Apply Coupon</button>
              </div>
            </div>
          </div>
          <div class="col-md-6 pl-5">
            <div class="row justify-content-end">
              <div class="col-md-7">
                <div class="row">
                  <div class="col-md-12 text-right border-bottom mb-5">
                    <h3 class="text-black h4 text-uppercase">Cart Totals</h3>
                  </div>
                </div>
                <!-- <div class="row mb-3">
                  <div class="col-md-6">
                    <span class="text-black">Subtotal</span>
                  </div>
                  <div class="col-md-6 text-right">
                    <strong class="text-black">$230.00</strong>
                  </div>
                </div> -->
                <div class="row mb-5">
                  <div class="col-md-6">
                    <span class="text-black">Total</span>
                  </div>
                  <div class="col-md-6 text-right">
                    <strong class="text-black" id="cart_total"></strong>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-12">
                    <button class="btn btn-primary btn-lg py-3 btn-block" onclick="window.location='checkout.php'">Proceed To Checkout</button> <!-- onclick="window.location='checkout.php'" -->
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <footer class="site-footer border-top">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 mb-5 mb-lg-0">
            <div class="row">
              <div class="col-md-12">
                <h3 class="footer-heading mb-4">Navigations</h3>
              </div>
              <div class="col-md-6 col-lg-4">
                <ul class="list-unstyled">
                  <li><a href="#">Sell online</a></li>
                  <li><a href="#">Features</a></li>
                  <li><a href="#">Shopping cart</a></li>
                  <li><a href="#">Store builder</a></li>
                </ul>
              </div>
              <div class="col-md-6 col-lg-4">
                <ul class="list-unstyled">
                  <li><a href="#">Mobile commerce</a></li>
                  <li><a href="#">Dropshipping</a></li>
                  <li><a href="#">Website development</a></li>
                </ul>
              </div>
              <div class="col-md-6 col-lg-4">
                <ul class="list-unstyled">
                  <li><a href="#">Point of sale</a></li>
                  <li><a href="#">Hardware</a></li>
                  <li><a href="#">Software</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">
            <h3 class="footer-heading mb-4">Promo</h3>
            <a href="shop_base.php" class="block-6">
              <img src="images/hero_1.jpg" alt="Image placeholder" class="img-fluid rounded mb-4">
              <h3 class="font-weight-light  mb-0">Finding your perfect set up</h3>
              <p>Promo from January 15 &mdash; 25, 2022</p>
            </a>
          </div>
          <div class="col-md-6 col-lg-3">
            <div class="block-5 mb-5">
              <h3 class="footer-heading mb-4">Contact info</h3>
              <ul class="list-unstyled">
                <li class="address">St. Zielona 23a, Lodz, Poland</li>
                <li class="phone"><a href="tel://48999999999">+48 999 999 999</a></li>
                <li class="email">computer-tech@gmail.com</li>
              </ul>
            </div>

            <!-- <div class="block-7">
              <form action="#" method="post">
                <label for="email_subscribe" class="footer-heading">Subscribe</label>
                <div class="form-group">
                  <input type="text" class="form-control py-4" id="email_subscribe" placeholder="Email">
                  <input type="submit" class="btn btn-sm btn-primary" value="Send">
                </div>
              </form>
            </div> -->
          </div>
        </div>
        <div class="row pt-5 mt-5 text-center">
          <div class="col-md-12">
            <p>
              Copyright &copy;
              <script data-cfasync="false"
                src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
              <script>document.write(new Date().getFullYear());</script> All rights reserved | This website was made by Mateusz Kapka
            </p>
          </div>
          
        </div>
      </div>
    </footer>
  </div>

  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>

  <script src="js/main.js"></script>

  <script src="js/cart.js"></script>
    
  </body>
</html>