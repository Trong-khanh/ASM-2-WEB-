<?php
include 'config.php';
session_start();
$user_id = $_SESSION['user_id'];

if(isset($_POST['update_cart'])){
    $update_quantity = $_POST['cart_quantity'];
    $update_id = $_POST['cart_id'];
    mysqli_query($conn, "UPDATE `cart` SET quantity = '$update_quantity' WHERE id = '$update_id'") or die('query failed');
    $message[] = 'cart quantity updated successfully!';
 }
 
 if(isset($_GET['remove'])){
    $remove_id = $_GET['remove'];
    echo (log ( $remove_id));
    mysqli_query($conn, "DELETE FROM `cart` WHERE id = '$remove_id'") or die('query failed');
    header('location:cart.php');
 }
   
 if(isset($_GET['delete_all'])){
    mysqli_query($conn, "DELETE FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
    header('location:cart.php');
 }
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cart</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
        <!-- link css -->
        <link rel="stylesheet" href="./assets/css/style.css">
    </head>

    <body>
        <div class="container">
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
                <li> <a href="profile_user.php"><i class="fa-solid fa-user"></i></a></li>
            </ul>
        </div>

                <!-- cart -->
            <div class="shopping-cart">
            <h1 class="heading">shopping cart</h1>
                <table>
                    <thead>
                        <th>image</th>
                        <th>name</th>
                        <th>price</th>
                        <th>quantity</th>
                        <th>total price</th>
                        <th>action</th>
                    </thead>
                    <tbody>
                        <?php
$cart_query = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
$grand_total = 0;
if(mysqli_num_rows($cart_query) > 0){
while($fetch_cart = mysqli_fetch_assoc($cart_query)){
?>
                            <tr>
                                <td>
                                    <img src="<?php echo $fetch_cart['img'];?>" height="100" alt="product">
                                </td>
                                <td>
                                    <?php echo $fetch_cart['name']; ?>
                                </td>
                                <td>$
                                    <?php echo $fetch_cart['price']; ?>/-</td>
                                <td>
                                    <form action="" method="post">
                                        <input type="hidden" name="cart_id" value="<?php echo $fetch_cart['id']; ?>">
                                        <input type="number" min="1" name="cart_quantity" value="<?php echo $fetch_cart['quantity']; ?>">
                                        <input type="submit" name="update_cart" value="update" class="option-btn">
                                    </form>
                                </td>
                                <td>$
                                    <?php echo $sub_total = ($fetch_cart['price'] * $fetch_cart['quantity']); ?>/-</td>
                                <td><a href="cart.php?remove=<?php echo $fetch_cart['id']; ?>" class="delete-btn" onclick="return confirm('remove item from cart?');">remove</a></td>
                            </tr>
                            <?php
$grand_total += $sub_total;
}
}else{
echo '<tr><td style="padding:20px; text-transform:capitalize;" colspan="6">no item added</td></tr>';
}
?>
                                <tr class="table-bottom">
                                    <td colspan="4">grand total :</td>
                                    <td>$
                                        <?php echo $grand_total; ?>/-</td>
                                    <td><a href="index.php?delete_all" onclick="return confirm('delete all from cart?');" class="delete-btn <?php echo ($grand_total > 1)?'':'disabled'; ?>">delete all</a></td>
                                </tr>
                    </tbody>
                </table>

                <div class="cart-btn">
                    <a href="#" class="btn <?php echo ($grand_total > 1)?'':'disabled'; ?>">proceed to checkout</a>
                </div>

            </div>
        </div>
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