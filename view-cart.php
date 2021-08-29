<?php
session_start();
if(!isset($_SESSION['cart'])) {
header("location: menu.php");
exit();
}
include("Admin/confs/config.php");
$cart = 0;
if(isset($_SESSION['cart'])) {
foreach($_SESSION['cart'] as $qty) {
$cart += $qty;
}
}
?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<!--
Victory Template
http://www.templatemo.com/tm-507-victory
-->
        <title>Foodie - View Item Page</title>
        
        <link rel="stylesheet" type="text/css" href="css/akm.css">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">

        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="css/fontAwesome.css">
        <link rel="stylesheet" href="css/hero-slider.css">
        <link rel="stylesheet" href="css/owl-carousel.css">
        <link rel="stylesheet" href="css/templatemo-style.css">

        <link href="https://fonts.googleapis.com/css?family=Spectral:200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">

        <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
    </head>

<body>
    <div class="header">
        <div class="container">
            <a href="#" class="navbar-brand scroll-top">Foodie</a>
            <nav class="navbar navbar-inverse" role="navigation">
                <div class="navbar-header">
                    <button type="button" id="nav-toggle" class="navbar-toggle" data-toggle="collapse" data-target="#main-nav">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <!--/.navbar-header-->
                <div id="main-nav" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="menu.php">Our Menus</a></li>
                        <li><a href="blog.php">Suppliers</a></li>
                        <li><a href="contact.php">Contact Us</a></li>
                        <li><a href="view-cart.php">(<?php echo $cart ?>) items in your cart</a></li>
                        <li>&nbsp</li>
                        <li>&nbsp</li>
                        <li><a href="Admin/Login/Authorization/login.php">Admin Login</a></li>
                    </ul>
                </div>
                <!--/.navbar-collapse-->
            </nav>
            <!--/.navbar-->
        </div>
        <!--/.container-->
    </div>
    <!--/.header-->


    <section class="page-heading">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>(<?php echo $cart ?>) items in your cart</h1>
                    
                </div>
            </div>
        </div>
    </section>
    <br><br><br><br><br>

     <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <table border="1px solid">
                    <tr>
                    <th class="col-md-4">Photo</th>   
                    <th class="col-md-4">Food Name</th>
                    <th class="col-md-4">Quantity</th>
                    <th class="col-md-4">Unit Price</th>
                    <th class="col-md-4">Price</th>
                    </tr>
    <?php
    $total = 0;
    foreach($_SESSION['cart'] as $id => $qty):
      $result = mysqli_query($conn, "SELECT food_name, price, cover FROM menu WHERE id=$id");
      $row = mysqli_fetch_assoc($result);
      $total += $row['price'] * $qty;
    ?>
        <tr >
         <td class="col-md-2"><img src="Admin/Login/Authorization/covers/<?php echo $row['cover'] ?>" ></td>
         <td class="col-md-2"><?php echo $row['food_name'] ?></td>
         <td class="col-md-2"><?php echo $qty ?></td>
         <td class="col-md-2"><?php echo $row['price'] ?>Ks</td>
         <td class="col-md-2"><?php echo $row['price'] * $qty ?>Ks</td>
        </tr>
    <?php endforeach; ?>
                 <tr>
                    <td colspan="4" align="right"><b>Total:</b></td>
                    <td class="col-md-2"><?php echo $total; ?>Ks</td>
                </tr>
                </table>
                </div>
                <div class="primary-button">
                            <a href="clear-cart.php" class="del">&times; Clear Cart</a>
                        </div>
                 
            </div>
            
        </div>
<br><br>

        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-5">
                        <form id="contact" action="submit-order.php" method="post">
                        <div class="row">
                            
                                
                        </div>
                        
                    </form>
                        
                </div>
            </div>
        </div>

        <section class="contact-us">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-4">
                    <div class="section-heading">
                        <h2>Order Now!</h2>
                    </div>
                    <form id="contact" action="submit-order.php" method="post">
                        <div class="row">
                            <div class="col-md-8 ">
                                <fieldset>
                                    <input name="name" type="text" class="form-control" id="name" placeholder="Your name..." required>
                                </fieldset>
                                <fieldset>
                                    <input name="email" type="text" class="form-control" id="email" placeholder="Your email..." required>
                                </fieldset>
                                <fieldset>
                                    <input name="phone" type="text" class="form-control" id="phone" placeholder="Your phone..." required>
                                </fieldset>
                                <fieldset>
                                    <textarea name="address" rows="6" class="form-control" id="message" placeholder="Your address..." required></textarea>
                                </fieldset>
                                <fieldset>
                                    <button type="submit" id="form-submit" class="btn">Submit Order</button>
                                </fieldset>
                            </div>
                            
                                
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
            

<br><br>
            
                
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <p>Copyright &copy; Aung Kaung Myat</p>
                </div>
                <div class="col-md-4">
                    <ul class="social-icons">
                        <li><a rel="nofollow" href="http://www.facebook.com/templatemo" target="_parent"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        <li><a href="#"><i class="fa fa-rss"></i></a></li>
                        <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <p>Designed by <em>Aung Kaung Myat</em></p>
                </div>
            </div>
        </div>
    </footer>


    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>

    <script src="js/vendor/bootstrap.min.js"></script>

    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
    <script type="text/javascript">
    $(document).ready(function() {
        // navigation click actions 
        $('.scroll-link').on('click', function(event){
            event.preventDefault();
            var sectionID = $(this).attr("data-id");
            scrollToID('#' + sectionID, 750);
        });
        // scroll to top action
        $('.scroll-top').on('click', function(event) {
            event.preventDefault();
            $('html, body').animate({scrollTop:0}, 'slow');         
        });
        // mobile nav toggle
        $('#nav-toggle').on('click', function (event) {
            event.preventDefault();
            $('#main-nav').toggleClass("open");
        });
    });
    // scroll function
    function scrollToID(id, speed){
        var offSet = 0;
        var targetOffset = $(id).offset().top - offSet;
        var mainNav = $('#main-nav');
        $('html,body').animate({scrollTop:targetOffset}, speed);
        if (mainNav.hasClass("open")) {
            mainNav.css("height", "1px").removeClass("in").addClass("collapse");
            mainNav.removeClass("open");
        }
    }
    if (typeof console === "undefined") {
        console = {
            log: function() { }
        };
    }
    </script>
</body>
</html>