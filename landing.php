<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
    <!-- link css -->
    <link rel="stylesheet" href="./assets/css/landing.css">
    <link rel="stylesheet" href="./assets/css/footer.css">
    <title>Landing page</title>
</head>

<body>

    <body>
        <div class="container">
            <!-- Navigation bar -->
            <div class="nav">
                <div class="logo">Food Order</div>
                <ul>
                    <li><a href="index.php">Home</a></li>
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

                <div class="box-container">
                    <form method="post" class="box" action="">
                        <img src="./assets/img/Banh.jpg" alt="">
                        <div class="name">
                            
                        </div>
                        <div class="price">$ 10
                            /-</div>
                        <input type="hidden" name="product_image" value="">
                        <input type="hidden" name="product_name" value="">
                        <a href="login.php" type="submit" name="add_to_cart" class="btn">Buys</a>
                    </form>

                    <form method="post" class="box" action="">
                        <img src="./assets/img/sinh to xoai.jpg" alt="">
                        <div class="name">
                            
                        </div>
                        <div class="price">$ 8
                            /-</div>
                        <input type="hidden" name="product_image" value="">
                        <input type="hidden" name="product_name" value="">
                        <a href="login.php" type="submit" name="add_to_cart" class="btn">Buys</a>
                    </form>

                    
                    <form method="post" class="box" action="">
                        <img src="./assets/img/Tra dao cam sa.jpg" alt="">
                        <div class="name">
                            
                        </div>
                        <div class="price">$ 3
                            /-</div>
                        <input type="hidden" name="product_image" value="">
                        <input type="hidden" name="product_name" value="">
                        <a href="login.php" type="submit" name="add_to_cart" class="btn">Buys</a>
                    </form>

                    <form method="post" class="box" action="">
                        <img src="./assets/img/milo dam.jpg" alt="">
                        <div class="name">
                            
                        </div>
                        <div class="price">$ 5
                            /-</div>
                        <input type="hidden" name="product_image" value="">
                        <input type="hidden" name="product_name" value="">
                        <a href="login.php" type="submit" name="add_to_cart" class="btn">Buys</a>
                    </form>

                    <form method="post" class="box" action="">
                        <img src="./assets/img/banh-hanh-nhan-thom-ngon.jpg" alt="">
                        <div class="name">
                            
                        </div>
                        <div class="price">$ 20
                            /-</div>
                        <input type="hidden" name="product_image" value="">
                        <input type="hidden" name="product_name" value="">
                        <a href="login.php" type="submit" name="add_to_cart" class="btn">Buys</a>
                    </form>

                    <form method="post" class="box" action="">
                        <img src="./assets/img/capuchino.jpg" alt="">
                        <div class="name">
                            
                        </div>
                        <div class="price">$ 10
                            /-</div>
                        <input type="hidden" name="product_image" value="">
                        <input type="hidden" name="product_name" value="">
                        <a href="login.php" type="submit" name="add_to_cart" class="btn">Buys</a>
                    </form>

                    

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
</body>

</html>