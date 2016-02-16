<!DOCTYPE html PUBLIC>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <title>ComputerWare Home</title>

    <link href="homepage.css" rel="stylesheet" type="text/css" />
    <link href="SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400italic" rel="stylesheet" type="text/css">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="icon" href="favicon.ico" type="image/x-icon">


    <script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>


</head>
<?php
    session_start();
    try {
        $con = new PDO('mysql:host=127.0.0.1;dbname=estore', 'root', 'root');
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        die();
    }
    $query = "search * from products";

    foreach($con->query($query) as $search){
        echo $search['catergory'];
    }

?>
<style>
    #index{
        background-color: #f7c888;
    }
</style>
<body>
<div class="header-cont">
    <div class="header">
        <ul id="MenuBar2" class="MenuBarHorizontal">
            <li><a href="index.php" id="index">Home</a></li>
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
            <li><a href="cart.php">Cart</a></li>
            <li><a href="profile.php">Profile</a></li>
        </ul>
        <h1><span id="headertext">ComputerWare</span></h1>
    </div>
</div>
<div class="container">
    <div class="content">
        <h1><b>ComputerWare</b></h1>
        <h3>Create your new computer today!</h3>
        <hr />
        <h4>Current Deals</h4>
        <table class="currentDeals">
            <tr>
                <td>
                    <a href="filter.php?category=gpu">
                        <img src="images/graphics.png">
                        <br>
                        <div class="deal">Graphics Cards</div>
                    </a>
                </td>
                <td>
                    <a href="filter.php?category=cpu">
                        <img src="images/processor.png">
                        <br>
                        <div class="deal">Processor</div>
                    </a>
                </td>
                <td>
                    <a href="filter.php?category=psu">
                        <img src="images/powersupply.png">
                        <br>
                        <div class="deal">Power Supplies</div>
                    </a>
                </td>
                <td>
                    <a href="filter.php?category=tower">
                        <img src="images/tower.png">
                        <br>
                        <div class="deal">Towers</div>
                    </a>
                </td>
            </tr>
        </table>
        <hr />
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
