<?php
include 'Admin/confs/config.php';
session_start();
$cart = 0;
if(isset($_SESSION['cart'])) {
foreach($_SESSION['cart'] as $qty) {
$cart += $qty;
}
}

$searchq=$_POST['name'];


$query=mysqli_query($conn,"SELECT * FROM menu WHERE food_name LIKE '%$searchq%' or supplier LIKE '%$searchq%' or price LIKE '%$searchq%'");

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
        <title>Foodie - Our Menus</title>
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
                    <h1>Our Menus</h1>
                    <p>You can order here!</p>
                </div>
            </div>
        </div>
    </section>

<section class="contact-us">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    
                    <form id="contact" action="search_menu.php" method="post">
                        <div class="row">
                            <div class="col-md-3">
                            </div>    
                            <div class="col-md-5">
                                <fieldset>
                                    <input name="name" type="text" class="form-control" id="name" placeholder="Search............." required>
                                </fieldset>
                                
                                
                            </div>
                            <div class="col-md-1">
                                
                                <fieldset>
                                    <button type="submit" id="form-submit" class="btn">>></button>
                                </fieldset>
                            </div>
                            <div class="col-md-3">
                            </div> 
                        </div>
                    </form>
                </div>
                
            </div>
        </div>
    </section>




    <section class="breakfast-menu">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="breakfast-menu-content">
                        <div class="row">
                            
                            <div class="col-md-7">
                                <h2>Searched Menu</h2>
                               <?php 
                                  $count=mysqli_num_rows($query);
                                 if ($count==0) {?>
                                <div id="owl-breakfast" class="owl-carousel owl-theme">
                                    <div class="item col-md-12">
                                    
                                        <h4><?php echo "There is no result!"; ?></h4>
                                    
                                    </div>
                                </div>
                                <?php }
                                else {
                                ?>
                                <div id="owl-breakfast" class="owl-carousel owl-theme">
                                <?php while($row = mysqli_fetch_assoc($query)): ?>
                                 <div class="item col-md-12">
                                    <div class="food-item">

                                    
                                    <img src="Admin/Login/Authorization/covers/<?php echo $row['cover'] ?>" >
                                    <div class="price">
                                        <?php echo $row['price'] ?>Ks
                                    </div>
                                    <div class="text-content">
                                         <h4><?php echo $row['food_name'] ?></h4>
                                         <p><?php echo $row['supplier'] ?></p>
                                         <div class="primary-button">
                                               <a href="add-to-cart.php?id=<?php echo $row['id'] ?>">Add to Cart</a>
                                         </div>
                                    </div>
                                    </div>
                                 </div>
                                 <?php endwhile; 
                                  }
                                 ?>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <br><br><br>


   

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