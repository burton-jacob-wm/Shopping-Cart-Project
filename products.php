<!DOCTYPE html PUBLIC>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <title>ComputerWare Products</title>

    <link href="twoColLiqRtHdr.css" rel="stylesheet" type="text/css" />
    <link href="SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400italic" rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="list.js" type="text/javascript"></script>


    <script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>


</head>
<?php
session_start();
include_once 'databaseconnect.php';

$stmt = $con->prepare("SELECT * FROM products p");
$stmt->execute(array(':category'=>$_GET['category']));
$results = $stmt->fetchAll();
?>
<style>
    #products{
        background-color: #f7c888;
    }
    #filter{
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
                <a href="products.php" id="products">Products</a>
                <ul>
                    <li><a href="filter.php?category=all" id="filter">Browse</a></li>
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
        <h1><b>Our Products</b></h1>
        <hr />
        <table class="filters">
            <tr>
                <td>
                    <a href="filter.php?category=gpu">
                        <img src="images/graphics.png">
                        <br>
                        <div class="filterText">Graphics Cards</div>
                    </a>
                </td>
                <td>
                    <a href="filter.php?category=cpu">
                        <img src="images/processor.png">
                        <br>
                        <div class="filterText">Processor</div>
                    </a>
                </td>
                <td>
                    <a href="filter.php?category=psu">
                        <img src="images/powersupply.png">
                        <br>
                        <div class="filterText">Power Supplies</div>
                    </a>
                </td>
                <td>
                    <a href="filter.php?category=tower">
                        <img src="images/tower.png">
                        <br>
                        <div class="filterText">Towers</div>
                    </a>
                </td>
                <td>
                    <a href="filter.php?category=hdd">
                        <img src="images/harddrive.png">
                        <br>
                        <div class="filterText">Hard Disk Drives</div>
                    </a>
                </td>
                <td>
                    <a href="filter.php?category=mbd">
                        <img src="images/motherboard.png">
                        <br>
                        <div class="filterText">Motherboards</div>
                    </a>
                </td>
            </tr>
            <!--Next Row-->
            <tr>
                <td>
                    <a href="filter.php?category=ram">
                        <img src="images/ram.png">
                        <br>
                        <div class="filterText">RAM</div>
                    </a>
                </td>
                <td>
                    <a href="filter.php?category=fan">
                        <img src="images/fans.png">
                        <br>
                        <div class="filterText">Computer Fans</div>
                    </a>
                </td>
                <td>
                    <a href="filter.php?category=key">
                        <img src="images/keyboards.png">
                        <br>
                        <div class="filterText">Keyboards</div>
                    </a>
                </td>
                <td>
                    <a href="filter.php?category=mouse">
                        <img src="images/mouse.png">
                        <br>
                        <div class="filterText">Mice</div>
                    </a>
                </td>
                <td>
                    <a href="filter.php?category=spk">
                        <img src="images/speakers.png">
                        <br>
                        <div class="filterText">External Speakers</div>
                    </a>
                </td>
                <td>
                    <a href="filter.php?category=mon">
                        <img src="images/monitor.png">
                        <br>
                        <div class="filterText">Computer Monitors</div>
                    </a>
                </td>
            </tr>
        </table>

        <div id="searchContainer">
            <button id="list">List View</button> <button id="grid">Grid View</button>
            <br>
            <h1><?php echo $_GET['product'];?></h1>
            <?php
            if(count($results) > 0) {
                foreach($results as $product){

                    $productName = $product['productName'];

                    echo "<div class='search'><a href='item.php?productId=" . $product['productId'] . "'>{$productName}</a></div>";
                }
            }
            else{
                echo "<div>0 Results Found.</div>";
            }
            echo "<hr />";
            ?>
        </div>
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
