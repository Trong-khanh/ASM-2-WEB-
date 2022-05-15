<?php 
    include 'config.php';
    session_start();
if(isset($_POST['submit'])) {

        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $pass = mysqli_real_escape_string($conn, md5($_POST['password']));

        $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE email = '$email' AND password = '$pass'") 
        or die('query failed');

        if(mysqli_num_rows($select) > 0) {
            $row = mysqli_fetch_assoc($select);
            echo $_SESSION['user_id'] = $row['id'];
            header('location:index.php');
        } else {
            $message[] = 'Incorrect password or email!';
        }
}
    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
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
        <div class="form-container">
        <form action="" method="post">
            <h3>Login now </h3>
            <input type="email" name="email" required placeholder="enter email" class="box">
            <input type="password" name="password" required placeholder="enter password" class="box">
            <input type="submit" name="submit" class="btn" value="Login now">
            <p>Don't have account? <a href="register.php">Register</a></p>
        </form>
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