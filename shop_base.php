<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "baza_db";

// creating connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// start session
session_start();

// if(isset($_POST['id'])) {
//   $_SESSION['id_product'] = $_POST['id'];
//   echo $_SESSION['id_product'];
//   echo "Siema";
// }

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
            <li> <!-- <li class="has-children"> -->
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
            <li> <!-- <li class="has-children"> -->
              <a href="about.html">About us</a>
              <!-- <ul class="dropdown">
                <li><a href="#">Menu One</a></li>
                <li><a href="#">Menu Two</a></li>
                <li><a href="#">Menu Three</a></li>
              </ul> -->
            </li>
            <li class="active"><a href="shop_base.php">Shop</a></li>
            <!-- <li><a href="#">Catalogue</a></li> -->
            <!-- <li><a href="#">New Arrivals</a></li> -->
            <li><a href="contact.html">Contact</a></li>
          </ul>
        </div>
      </nav>
    </header>

    <div class="bg-light py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-0"><a href="index.html">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Shop</strong></div>
        </div>
      </div>
    </div>

    <div class="site-section">
      <div class="container">

        <div class="row mb-5">
          <div class="col-md-9 order-2">

            <div class="row">
              <div class="col-md-12 mb-5">
                <div class="float-md-left mb-4"><h2 class="text-black h5">Shop all</h2></div>
                <div class="d-flex">
                  <div class="dropdown mr-1 ml-md-auto">
                    <button type="button" class="btn btn-secondary btn-sm dropdown-toggle" id="dropdownMenuOffset" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Latest
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuOffset">
                      <a class="dropdown-item" href="#">CPU</a>
                      <a class="dropdown-item" href="#">GPU</a>
                      <a class="dropdown-item" href="#">Motherboard</a>
                    </div>
                  </div>
                  <div class="btn-group">
                    <button type="button" class="btn btn-secondary btn-sm dropdown-toggle" id="dropdownMenuReference" data-toggle="dropdown">Reference</button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuReference">
                      <a class="dropdown-item" href="#">Relevance</a>
                      <a class="dropdown-item" href="#">Name, A to Z</a>
                      <a class="dropdown-item" href="#">Name, Z to A</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">Price, low to high</a>
                      <a class="dropdown-item" href="#">Price, high to low</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row mb-5">

                <?php
                $query ="SELECT * FROM produkty";
                $stmt = mysqli_query($conn, $query);
                while( $row = mysqli_fetch_assoc($stmt) ) {
                    echo '
                        <div class="col-sm-6 col-lg-4 mb-4" data-aos="fade-up">
                            <div class="block-4 text-center border">
                                <form method="post" action="product.php">
                                    <figure class="block-4-image">
                                        <button value="'.$row["id_produkt"].'" name="id"><img src='.$row["fotografia"].' alt="Image placeholder" class="img-fluid"></button>
                                    </figure>
                                    <div class="block-4-text p-4">
                                        <h3><button value="'.$row["id_produkt"].'" name="id">'.$row["nazwa_produktu"].'</button></h3>
                                        <p class="mb-0">'.$row["kategoria"].'</p>
                                        <p class="text-primary font-weight-bold">$'.$row["cena"].'</p>
                                    </div>
                                </form>
                            </div>
                        </div>';
                }
                ?>
                <!-- <div class="col-sm-6 col-lg-4 mb-4" data-aos="fade-up">
                    <div class="block-4 text-center border">
                    <figure class="block-4-image">
                        <a href="msi_gtx_1660_ventus.html"><img src="images/gtx_1660.jpg" alt="Image placeholder" class="img-fluid"></a>
                    </figure>
                    <div class="block-4-text p-4">
                        <h3><a href="msi_gtx_1660_ventus.html">MSI GTX 1660 VENTUS</a></h3>
                        <p class="mb-0">GPU</p>
                        <p class="text-primary font-weight-bold">$700</p>
                    </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4 mb-4" data-aos="fade-up">
                    <div class="block-4 text-center border">
                    <figure class="block-4-image">
                        <a href="intel_i5_11.html"><img src="images/intel_i5_11.jpg" alt="Image placeholder" class="img-fluid"></a>
                    </figure>
                    <div class="block-4-text p-4">
                        <h3><a href="intel_i5_11.html">Intel Core i5-11400</a></h3>
                        <p class="mb-0">CPU</p>
                        <p class="text-primary font-weight-bold">$215</p>
                    </div>
                    </div>
                </div>

                <div class="col-sm-6 col-lg-4 mb-4" data-aos="fade-up">
                    <div class="block-4 text-center border">
                    <figure class="block-4-image">
                        <a href="msi_mpg_z490_gaming.html"><img src="images/msi_z490.jpg" alt="Image placeholder" class="img-fluid"></a>
                    </figure>
                    <div class="block-4-text p-4">
                        <h3><a href="msi_mpg_z490_gaming.html">MSI MPG Z490 GAMING</a></h3>
                        <p class="mb-0">Motherboard</p>
                        <p class="text-primary font-weight-bold">$215</p>
                    </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4 mb-4" data-aos="fade-up">
                    <div class="block-4 text-center border">
                    <figure class="block-4-image">
                        <a href="amd_ryzen7_5800x.html"><img src="images/amd_ryzen7.jpg" alt="Image placeholder" class="img-fluid"></a>
                    </figure>
                    <div class="block-4-text p-4">
                        <h3><a href="amd_ryzen7_5800x.html">AMD Ryzen 7 5800X</a></h3>
                        <p class="mb-0">CPU</p>
                        <p class="text-primary font-weight-bold">$447</p>
                    </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4 mb-4" data-aos="fade-up">
                    <div class="block-4 text-center border">
                    <figure class="block-4-image">
                        <a href="ibox_aurora_k6.html"><img src="images/ibox_k6.jpg" alt="Image placeholder" class="img-fluid"></a>
                    </figure>
                    <div class="block-4-text p-4">
                        <h3><a href="ibox_aurora_k6.html">iBOX Aurora K-6</a></h3>
                        <p class="mb-0">Keyboard</p>
                        <p class="text-primary font-weight-bold">$67</p>
                    </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4 mb-4" data-aos="fade-up">
                    <div class="block-4 text-center border">
                    <figure class="block-4-image">
                        <a href="geforce_rtx_3060.html"><img src="images/rtx_3060.jpg" alt="Image placeholder" class="img-fluid"></a>
                    </figure>
                    <div class="block-4-text p-4">
                        <h3><a href="geforce_rtx_3060.html">GeForce RTX 3060</a></h3>
                        <p class="mb-0">GPU</p>
                        <p class="text-primary font-weight-bold">$951</p>
                    </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4 mb-4" data-aos="fade-up">
                    <div class="block-4 text-center border">
                    <figure class="block-4-image">
                        <a href="ibox_aurora_k5.html"><img src="images/ibox_k5.jpg" alt="Image placeholder" class="img-fluid"></a>
                    </figure>
                    <div class="block-4-text p-4">
                        <h3><a href="ibox_aurora_k5.html">iBOX Aurora K-5</a></h3>
                        <p class="mb-0">Keyboard</p>
                        <p class="text-primary font-weight-bold">$50</p>
                    </div>
                    </div>
                </div>

                <div class="col-sm-6 col-lg-4 mb-4" data-aos="fade-up">
                    <div class="block-4 text-center border">
                    <figure class="block-4-image">
                        <a href="intel_i5_10.html"><img src="images/intel_i5_10.jpg" alt="Image placeholder" class="img-fluid"></a>
                    </figure>
                    <div class="block-4-text p-4">
                        <h3><a href="intel_i5_10.html">Intel Core i5-10400F</a></h3>
                        <p class="mb-0">CPU</p>
                        <p class="text-primary font-weight-bold">$162</p>
                    </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4 mb-4" data-aos="fade-up">
                    <div class="block-4 text-center border">
                    <figure class="block-4-image">
                        <a href="silentiumpc_vero_l3.html"><img src="images/silentiumpc_vero.jpg" alt="Image placeholder" class="img-fluid"></a>
                    </figure>
                    <div class="block-4-text p-4">
                        <h3><a href="silentiumpc_vero_l3.html">SilentiumPC Vero L3</a></h3>
                        <p class="mb-0">Power supply</p>
                        <p class="text-primary font-weight-bold">$53</p>
                    </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4 mb-4" data-aos="fade-up">
                    <div class="block-4 text-center border">
                    <figure class="block-4-image">
                        <a href="corsair_vengeance.html"><img src="images/corsair_vengeance.jpg" alt="Image placeholder" class="img-fluid"></a>
                    </figure>
                    <div class="block-4-text p-4">
                        <h3><a href="corsair_vengeance.html">Corsair Vengeance</a></h3>
                        <p class="mb-0">RAM</p>
                        <p class="text-primary font-weight-bold">$98</p>
                    </div>
                    </div>
                </div>

                <div class="col-sm-6 col-lg-4 mb-4" data-aos="fade-up">
                    <div class="block-4 text-center border">
                    <figure class="block-4-image">
                        <a href="crucial_mx500.html"><img src="images/ssd_crucial.jpg" alt="Image placeholder" class="img-fluid"></a>
                    </figure>
                    <div class="block-4-text p-4">
                        <h3><a href="crucial_mx500.html">Crucial MX500</a></h3>
                        <p class="mb-0">SSD drive</p>
                        <p class="text-primary font-weight-bold">$64</p>
                    </div>
                    </div>
                </div> -->


            </div>
            <div class="row" data-aos="fade-up">
              <div class="col-md-12 text-center">
                <div class="site-block-27">
                  <ul>
                    <li><a href="#">&lt;</a></li>
                    <li class="active"><span>1</span></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                    <li><a href="#">&gt;</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-3 order-1 mb-5 mb-md-0">
            <div class="border p-4 rounded mb-4">
              <h3 class="mb-3 h6 text-uppercase text-black d-block">Categories</h3>
              <ul class="list-unstyled mb-0">
                <li class="mb-1"><a href="#" class="d-flex"><span>CPUs</span> <span class="text-black ml-auto">(154)</span></a></li>
                <li class="mb-1"><a href="#" class="d-flex"><span>Video graphic devices</span> <span class="text-black ml-auto">(134)</span></a></li>
                <li class="mb-1"><a href="#" class="d-flex"><span>Motherboards</span> <span class="text-black ml-auto">(123)</span></a></li>
                <li class="mb-1"><a href="#" class="d-flex"><span>Memory</span> <span class="text-black ml-auto">(163)</span></a></li>
                <li class="mb-1"><a href="#" class="d-flex"><span>Power supplies</span> <span class="text-black ml-auto">(111)</span></a></li>
                <li class="mb-1"><a href="#" class="d-flex"><span>Storage</span> <span class="text-black ml-auto">(102)</span></a></li>
                <li class="mb-1"><a href="#" class="d-flex"><span>Computer cases</span> <span class="text-black ml-auto">(97)</span></a></li>
                <li class="mb-1"><a href="#" class="d-flex"><span>PC cooling</span> <span class="text-black ml-auto">(84)</span></a></li>
                <li class="mb-1"><a href="#" class="d-flex"><span>Optical drives</span> <span class="text-black ml-auto">(77)</span></a></li>
                <li class="mb-1"><a href="#" class="d-flex"><span>Earphones</span> <span class="text-black ml-auto">(56)</span></a></li>
                <li class="mb-1"><a href="#" class="d-flex"><span>Keyboards</span> <span class="text-black ml-auto">(102)</span></a></li>
              </ul>
            </div>

            <div class="border p-4 rounded mb-4">
              <div class="mb-4">
                <h3 class="mb-3 h6 text-uppercase text-black d-block">Filter by Price</h3>
                <div id="slider-range" class="border-primary"></div>
                <input type="text" name="text" id="amount" class="form-control border-0 pl-0 bg-white" disabled="" />
              </div>

              <!-- <div class="mb-4">
                <h3 class="mb-3 h6 text-uppercase text-black d-block">Size</h3>
                <label for="s_sm" class="d-flex">
                  <input type="checkbox" id="s_sm" class="mr-2 mt-1"> <span class="text-black">Small (2,319)</span>
                </label>
                <label for="s_md" class="d-flex">
                  <input type="checkbox" id="s_md" class="mr-2 mt-1"> <span class="text-black">Medium (1,282)</span>
                </label>
                <label for="s_lg" class="d-flex">
                  <input type="checkbox" id="s_lg" class="mr-2 mt-1"> <span class="text-black">Large (1,392)</span>
                </label>
              </div>

              <div class="mb-4">
                <h3 class="mb-3 h6 text-uppercase text-black d-block">Color</h3>
                <a href="#" class="d-flex color-item align-items-center" >
                  <span class="bg-danger color d-inline-block rounded-circle mr-2"></span> <span class="text-black">Red (2,429)</span>
                </a>
                <a href="#" class="d-flex color-item align-items-center" >
                  <span class="bg-success color d-inline-block rounded-circle mr-2"></span> <span class="text-black">Green (2,298)</span>
                </a>
                <a href="#" class="d-flex color-item align-items-center" >
                  <span class="bg-info color d-inline-block rounded-circle mr-2"></span> <span class="text-black">Blue (1,075)</span>
                </a>
                <a href="#" class="d-flex color-item align-items-center" >
                  <span class="bg-primary color d-inline-block rounded-circle mr-2"></span> <span class="text-black">Purple (1,075)</span>
                </a>
              </div> -->

            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-12">
            <div class="site-section site-blocks-2">
                <div class="row justify-content-center text-center mb-5">
                  <div class="col-md-7 site-section-heading pt-4">
                    <h2>Categories</h2>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-6 col-md-6 col-lg-4 mb-4 mb-lg-0" data-aos="fade" data-aos-delay="">
                    <a class="block-2-item" href="#">
                      <figure class="image">
                        <img src="images/procesor.jpg" alt="" class="img-fluid">
                      </figure>
                      <div class="text">
                        <span class="text-uppercase">Products</span>
                        <h3>CPU</h3>
                      </div>
                    </a>
                  </div>
                  <div class="col-sm-6 col-md-6 col-lg-4 mb-5 mb-lg-0" data-aos="fade" data-aos-delay="100">
                    <a class="block-2-item" href="#">
                      <figure class="image">
                        <img src="images/grafika.jpg" alt="" class="img-fluid">
                      </figure>
                      <div class="text">
                        <span class="text-uppercase">Products</span>
                        <h3>GPU</h3>
                      </div>
                    </a>
                  </div>
                  <div class="col-sm-6 col-md-6 col-lg-4 mb-5 mb-lg-0" data-aos="fade" data-aos-delay="200">
                    <a class="block-2-item" href="#">
                      <figure class="image">
                        <img src="images/plyta_glowna.png" alt="" class="img-fluid">
                      </figure>
                      <div class="text">
                        <span class="text-uppercase">Products</span>
                        <h3>Motherboard</h3>
                      </div>
                    </a>
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
              <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
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
    
  </body>
</html>