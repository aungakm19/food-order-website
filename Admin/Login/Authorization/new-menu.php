<?php

include 'akm/config.php';
include 'akm/auth.php';
$result=mysqli_query($conn,"SELECT * FROM category");
?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Admin-add menu
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <!-- CSS Files -->
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="../assets/css/paper-dashboard.css?v=2.0.0" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../assets/demo/demo.css" rel="stylesheet" />
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="white" data-active-color="danger">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
      <div class="logo">
        <a href="#" class="simple-text logo-mini">
          <div class="logo-image-small">
            <img src="../assets/img/logo-small.png">
          </div>
        </a>
        <a href="#" class="simple-text logo-normal">
          Creative Tim
          <!-- <div class="logo-image-big">
            <img src="../assets/img/logo-big.png">
          </div> -->
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li>
            <a href="./dashboard.php">
              <i class="nc-icon nc-bank"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li  class="active ">
            <a href="./menu.php">
              <i class="nc-icon nc-paper"></i>
              <p>Menus</p>
            </a>
          </li>
          <li>
            <a href="./feedbacktb.php">
              <i class="nc-icon nc-chat-33"></i>
              <p>Feedback</p>
            </a>
          </li>
          <li>
            <a href="./categorytb.php">
              <i class="nc-icon nc-bullet-list-67"></i>
              <p>Category</p>
            </a>
          </li>
          <li>
            <a href="./orders.php">
              <i class="nc-icon nc-cart-simple"></i>
              <p>Order</p>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="#pablo">Add New Menu</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            
            <ul class="navbar-nav">
              
              <li class="nav-item btn-rotate dropdown">
                <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="nc-icon nc-single-02"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Some Actions</span>
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="logout.php">Log Out</a>
                  
                </div>
              </li>
              
            </ul>
          </div>
      </nav>
      <!-- End Navbar -->
      <!-- <div class="panel-header panel-header-sm">


</div> -->
      <div class="content">
        <div class="row">
          <div class="col-md-9  ml-auto mr-auto">
            <div class="card card-user">
              <div class="card-body">
                <form action="add-new-menu.php" method="post" enctype="multipart/form-data">
                  <div class="row">
                    <div class="col-md-11 pr-1">
                      <div class="form-group">
                        <label>Food Name</label>
                        <input type="text" name="name" class="form-control" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-11 pr-1">
                      <div class="form-group">
                        <label>Price</label>
                        <input type="text" name="price" class="form-control" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-11 pr-1">
                      <div class="form-group">
                        <label>Supplier</label><br>
                        <input type="text" name="supplier" class="form-control" required>
                      </div>  
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-11 pr-1">
                      <div class="file-field">
                        <label>Cover</label>
                        <div class="custom-file">
                          <input type="file" name="cover" class="custom-file-input" id="customFileLang" lang="pl-Pl" required>
                          <label class="custom-file-label" for="customFileLang">Choose File</label>
                        </div>
                    </div>
                  </div>
                  </div>
                  <br>
                  <div class="row">
                    
                    <div class="col-md-11 pr-1">
                      <label>Category</label>
                      <select  name="category_id" class="browser-default custom-select" required>
                          <option selected>--------------Choose--------------</option>
                          <?php while($row=mysqli_fetch_assoc($result)): ?>
                          <option value="<?php echo $row['id']; ?>">
                            <?php echo $row['Name']; ?>
                            </option>
                          <?php endwhile; ?>
                      </select> 
                    </div>
                  </div>
                  
                  
                  <div class="row">
                    <div class="update ml-auto mr-auto">
                      <button type="submit" class="btn btn-primary btn-round">Add Menu</button>
                    </div>
                  </div>
                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
      <footer class="footer footer-black  footer-white ">
        <div class="container-fluid">
          <div class="row">
            
            <div class="credits ml-auto">
              <span class="copyright">
                ??
                <script>
                  document.write(new Date().getFullYear())
                </script>, made with <i class="fa fa-heart heart"></i> by Aung Kaung Myat
              </span>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="../assets/js/core/jquery.min.js"></script>
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
  <script src="../assets/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="../assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/paper-dashboard.min.js?v=2.0.0" type="text/javascript"></script>
  <!-- Paper Dashboard DEMO methods, don't include it in your project! -->
  <script src="../assets/demo/demo.js"></script>
</body>

</html>
