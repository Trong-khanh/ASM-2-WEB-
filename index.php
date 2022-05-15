<?php

include 'config.php';

session_start();
$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
};

if(isset($_GET['logout'])){
   unset($user_id);
   session_destroy();
   header('location:login.php');
};

if(isset($_POST['add_to_cart'])){
   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_image = $_POST['product_image'];
   $product_quantity = $_POST['product_quantity'];

   $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name' AND user_id = '$user_id'") or die('query error');

   if(mysqli_num_rows($select_cart) > 0){
      $message[] = 'product already added to cart!';
   }else{
      mysqli_query($conn, "INSERT INTO `cart`(user_id, name, price, img, quantity) VALUES 
      ('$user_id', '$product_name', '$product_price', '$product_image', '$product_quantity')") or die('query error');
      $message[] = 'product added to cart!';
   }
};
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>ASM 2</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
        <!-- link css -->
        <link rel="stylesheet" href="./assets/css/style.css">
        <link rel="stylesheet" href="./assets/css/footer.css">
    </head>

    <body>

        <?php
         if (isset($message)){
         foreach ($message as $message){
         echo '<div class="message" onclick = "this.remove();">'.$message.'</div>';
        }
    }
        ?>

            <div class="container">
                <!-- Navigation bar -->
                <div class="nav">
                    <div class="logo">Food Order</div>
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="about.php">About</a></li>
                        <li><a href="#">Menu</a></li>
                        <li><a href="#">Contact</a></li>
                        <li><a href="cart.php"><i class="fa-solid fa-cart-shopping"></i></a></i>
                        </li>
                        <li> <a href="profile_user.php"><i class="fa-solid fa-user"></i></a></li>
                    </ul>
                </div>

                <!-- All Products -->
                <div class="products">

                    <h1 class="heading">All Products</h1>

                    <div class="box-container">

                        <?php
                         $select_product = mysqli_query($conn, "SELECT * FROM `products`") or die('query faild');
                          if(mysqli_num_rows($select_product) > 0){
                        while($fetch_product = mysqli_fetch_assoc($select_product)){
                         ?>
                            <form method="post" class="box" action="">
                                <img src="<?php echo $fetch_product['img']; ?>" alt="">
                                <div class="name">
                                    <?php echo $fetch_product['name']; ?>
                                </div>
                                <div class="price">$
                                    <?php echo $fetch_product['price']; ?>/-</div>
                                <input type="number" min="1" name="product_quantity" value="1">
                                <input type="hidden" name="product_image" value="<?php echo $fetch_product['img']; ?>">
                                <input type="hidden" name="product_name" value="<?php echo $fetch_product['name']; ?>">
                                <input type="hidden" name="product_price" value="<?php echo $fetch_product['price']; ?>">
                                <input type="submit" value="Buys" name="add_to_cart" class="btn">
                            </form>
                            <?php
                               };
                                };
                                  ?>
                                <!-- Footer -->
                                <footer class="footer-distributed">

                                    <div class="footer-left">

                                        <h3>Food<span>order</span></h3>

                                        <p class="footer-links">
                                            <a href="#" class="link-1">Home</a>

                                            <a href="#">About</a>

                                            <a href="#">Menu</a>

                                            <a href="#">Contact</a>
                                        </p>

                                        <p class="footer-company-name">Company Name © 2015</p>
                                    </div>

                                    <div class="footer-center">

                                        <div>
                                            <i class="fa fa-map-marker"></i>
                                            <p><span>444 S. Cedros Ave</span> Solana Beach, California</p>
                                        </div>

                                        <div>
                                            <i class="fa fa-phone"></i>
                                            <p>+1.555.555.5555</p>
                                        </div>

                                        <div>
                                            <i class="fa fa-envelope"></i>
                                            <p><a href="mailto:support@company.com">support@company.com</a></p>
                                        </div>

                                    </div>

                                    <div class="footer-right">

                                        <p class="footer-company-about">
                                            <span>About the company</span> Lorem ipsum dolor sit amet, consectateur adispicing elit. Fusce euismod convallis velit, eu auctor lacus vehicula sit amet.
                                        </p>

                                        <div class="footer-icons">

                                            <a href="#"><i class="fa fa-facebook"></i></a>
                                            <a href="#"><i class="fa fa-twitter"></i></a>
                                            <a href="#"><i class="fa fa-linkedin"></i></a>

                                        </div>

                                    </div>

                                </footer>
                    </div>
    </body>

    </html>