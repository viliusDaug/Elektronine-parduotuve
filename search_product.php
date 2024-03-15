<!--connect file-->
<?php
  include('includes/conneect.php');
  include('functions/common_function.php');
  session_start();
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE-=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ecommerce Website</title>

    <!-- bootstrap CSS link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" 
    crossorigin="anonymous">

    <!-- font awesome link-->
    <link rel="stylesheet" 
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" 
    integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
    crossorigin="anonymous"
    referrerpolicy="no-referrer" />

    <!--css file -->
    <link rel="stylesheet" href="style.css">

    <style>
      .card-img-top{
        width: 100%;
        height: 200px;
        object-fit: contain;
      }
    </style>

  </head>

  <body>

    <!--navbar-->
    <div class="container-fluid p-0">
        <!--first child-->
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <img src="./images/logo.jpg" alt="" class="logo">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./user_area/user_registration.php">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php cart_item(); ?></sup></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Total Price: <?php total_cart_price();?></a>
        </li>
        
      </ul>
      <form class="d-flex" action="" method="get">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
        <input type="submit" value="Search" class="btn btn-outline-light" name="search_data_product">
      </form>
    </div>
  </div>
</nav>

<!-- calling cart function -->
<?php
  cart();
?>


<!--second child-->
<nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
  <ul class="navbar-nav me-auto">
  <?php
      if(!isset($_SESSION['username'])){
        echo "<li class='nav-item'>
                <a class='nav-link' href='#'>Welcome Guest</a>
              </li>";
      }else{
        echo "<li class='nav-item'>
                <a class='nav-link' href='#'>Welcome ".$_SESSION['username']."</a>
              </li>";
      }

      if(!isset($_SESSION['username'])){
        echo "<li class='nav-item'>
                <a class='nav-link' href='./user_area./user_login.php'>Login</a>
              </li>";
      }else{
        echo "<li class='nav-item'>
                <a class='nav-link' href='./user_area./logout.php'>Logout</a>
              </li>";
      }
    ?>
  </ul>
</nav>


<!--third child-->
<div class="bg-light">
  <h3 class="text-center">Hidden Store</h3>
  <p class="text-center"> Communications is at the heart of e-commerce and community</p>
</div>

<!--fourth child-->
<div class="row px-1">
  <div class="col-md-10">
    <!--products-->
    <div class="row px-3">

      <!--fetching products-->
    <?php
     
      search_product();
      get_unique_categories();
      get_unique_brands();
      
    ?>

    </div>
  </div>

    <div class="col-md-2 bg-secondary p-0">
      <!--brands to be displayed-->
      <ul class="navbar-nav me-auto text-center">
        <li class="nav-item bg-info">
          <a href="#" class="nav-link text-light"><h4>Delivery Brands</h4></a>
        </li>

      <?php
       getbrands();
      ?>
      </ul>

      <!--categories to be displayed-->
      <ul class="navbar-nav me-auto text-center">
        <li class="nav-item bg-info">
          <a href="#" class="nav-link text-light"><h4>Categories</h4></a>
        </li>
        
      <?php
       getcategories();
      ?>


        <li class="nav-item">
          <a href="#" class="nav-link text-light">Categories1</a>
        </li>

      </ul>

    </div>

</div>



<!--last child-->
<div class="bg-info p-3 text-center">
  <p>All rights reserved Design by Cook - 2024</p>
</div>
    </div>



    <!-- bootstrap js link-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>

  </body>
</html>