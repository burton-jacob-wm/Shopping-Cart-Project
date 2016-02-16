<!DOCTYPE html PUBLIC>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <title>ComputerWare Cart</title>

    <link href="twoColLiqRtHdr.css" rel="stylesheet" type="text/css" />
    <link href="SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400italic" rel="stylesheet" type="text/css">


    <script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>


</head>
<?php
session_start();
include_once 'databaseconnect.php';

$stmt = $con->prepare("SELECT * FROM cart c WHERE c.userId = :carts");
$stmt->execute(array(':productId'=>$_SESSION['userName']['usersId']));
$results = $stmt->fetchAll();

?>
<style>
    #cart{
        background-color: #f7c888;
    }
</style>
<body>
<div class="header-cont">
    <div class="header">
        <ul id="MenuBar2" class="MenuBarHorizontal">
            <li><a href="index.php">Home</a></li>
            <li>
                <a href="about.php">About</a>
                <ul>
                    <li><a href="faq.php">FAQ</a></li>
                    <li><a href="contact.php">Contact</a></li>
                </ul>
            </li>
            <li>
                <a href="products.php">Products</a>
                <ul>
                    <li><a href="filter.php?category=all">Browse</a></li>
                    <li><a href="creation.php">Create</a></li>
                </ul>
            </li>
            <li><a href="cart.php" id="cart">Cart</a></li>
            <li><a href="profile.php">Profile</a></li>
        </ul>
        <h1><span id="headertext">ComputerWare</span></h1>
    </div>
</div>
<div class="container">
    <div class="sidebar1">
        <h2>Proceed to Checkout</h2>
        <hr class="sidebar1hr"/>
        <p><?php echo $_SESSION['totalPrice']; ?></p>
        <br>
        <p>Continue</p>
        <p>Cancel</p>

    </div>
    <div class="content">
        <h1><b>Your	Cart</b></h1>
        <h3><?php echo $_SESSION['inCart']; ?> Items</h3>
        <hr />
        <div id="cartItems">
            <table id="cartTable">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                </tr>
                </thead>
                <tbody>
                <?php
                if (count($results) > 0) {
                    foreach ($results as $carts) {

                        $itemname = $carts['productName'];
                        $itemquantity = $carts['quantity'];
                        $itemprice = $carts['productPrice'];

                        echo '<tr>';
                        echo "<td>{$itemname}</td>";
                        echo "<td>{$itemquantity} x</td>";
                        echo "<td class='cartPrice'>{$itemprice}</td>";
                        echo '</tr>';
                    }
                } else {
                    echo '<tr>';
                    echo '<td>There is nothing in your cart!</td>';
                    echo '</tr>';
                }
                ?>
                </tbody>
            </table>
            <?php

            ?>
        </div>
        <hr />
        <p><button name="remove" value="1">Remove All From Cart</button></p>
    </div>
</div>
<div class="footer-cont">
    <div class="footer">
        <p>Jacob Burton &copy; 2016</p>
    </div>
</div>
<script type="text/javascript">
    var MenuBar2 = new Spry.Widget.MenuBar("MenuBar2", {imgDown:"SpryAssets/SpryMenuBarDownHover.gif", imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
</script>
</body>
</html>
