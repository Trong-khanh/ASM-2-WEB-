<?php
include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id )){
    header('Location: login.php');
}

if (isset($_GET['logout'])){
    unset($user_id);
    session_destroy();
    header('Location:landing.php');
}
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>profile user</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
        <!-- link css -->
        <link rel="stylesheet" href="./assets/css/style.css">
        <link rel="stylesheet" href="./assets/css/footer.css">
    </head>

    <body>
        <!-- nav -->
        <div class="nav">
            <div class="logo">Food Order</div>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="#">Menu</a></li>
                <li><a href="#">Contact</a></li>
                <li><a href="index.php"><i class="fa-solid fa-cart-shopping"></i></a></i>
                </li>
                <li> <a href="Profile_user.php"><i class="fa-solid fa-user"></i></a></li>
            </ul>
        </div>

        <!-- User profile -->
        <div class="container">
            <h1 class="heading">User Profile</h1>
            <div class="user-profile">
                <?php 
$select_user = mysqli_query($conn, "SELECT * FROM `user_form` WHERE id = '$user_id'")
or die ('query failed ');
if(mysqli_num_rows($select_user) > 0 ){
$fetch_user = mysqli_fetch_assoc($select_user);    
};
?>

                <p> User Name : <span><?php echo $fetch_user['name']; ?></span> </p>
                <p> Email : <span><?php echo $fetch_user['email']; ?></span> </p>
                <div class="flex">
                    <a href="login.php " class="btn">login </a>
                    <a href="register.php" class="option-btn">register</a>
                    <a href="Profile_user.php?logout=<?php echo $user_id;?> " onclick="return confirm
('are you sure you want to logout?');" class="delete-btn"> logout </a>
                </div>
            </div>
        </div>

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

    </body>

    </html>