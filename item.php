<!DOCTYPE html PUBLIC>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <title>ComputerWare Products</title>

    <link href="twoColLiqRtHdr.css" rel="stylesheet" type="text/css" />
    <link href="SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400italic" rel="stylesheet" type="text/css">


    <script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>


</head>

<?php
session_start();
include_once 'databaseconnect.php';

$stmt = $con->prepare("SELECT * FROM products WHERE productId = " . $_GET['productId'] );
$stmt->execute();
$product = $stmt->fetchAll();

if (@$_POST['addToCart']) {
    $errorMessage = false;

    $sql = $con->prepare("INSERT INTO cart (cartId, productName, productPrice, quantity, productId, userId) VALUES (:id, :productName, :productPrice, :quantity, :productid, :userid)  on duplicate key update quantity = :quantity");

    $result = $sql->execute(
        array(
            'id' => NULL,
            'productName' => $products['productName'],
            'productPrice' => $products['productPrice'],
            'quantity' => $_POST['quantity'],
            'productid' => $products['productId'],
            'userid' => $_SESSION['userName']['usersId']
        )
    );

    if (!$result) {
        echo ("<p>There was an error adding the item to the cart!</p>");
        echo ("<ul>" . $errorMessage . "</ul>");
    }
    else{

    }

}

?>

<style>
    #products{
        background-color: #f7c888;
    }
    #creation{
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
                    <li><a href="filter.php?category=all">Browse</a></li>
                    <li><a href="creation.php" id="creation">Create</a></li>
                </ul>
            </li>
            <li><a href="cart.php">Cart</a></li>
            <li><a href="profile.php">Profile</a></li>
        </ul>
        <h1><span id="headertext">ComputerWare</span></h1>
    </div>
</div>
<?php
foreach($product as $products){

    $productName = $products['productName'];

    if($products['category'] == "gpu"){
        $category = "Graphics Card";
    }
    else if($products['category'] == "cpu"){
        $category = "Central Processing Unit";
    }
    else if($products['category'] == "psu"){
        $category = "Power Supply Unit";
    }
    else if($products['category'] == "tower"){
        $category = "Computer Tower";
    }
    else if($products['category'] == "hdd"){
        $category = "Hard Disk Drive";
    }
    else if($products['category'] == "mbd"){
        $category = "Motherboard";
    }
    else if($products['category'] == "ram"){
        $category = "RAM";
    }
    else if($products['category'] == "fan"){
        $category = "Computer Fan";
    }
    else if($products['category'] == "key"){
        $category = "Keyboard";
    }
    else if($products['category'] == "mouse"){
        $category = "Mouse";
    }
    else if($products['category'] == "spk"){
        $category = "External Speaker";
    }
    else if($products['category'] == "mon"){
        $category = "Computer Monitor";
    }
}

?>

<div class="container">
    <div class="sidebar1">
        <h2>Item Description</h2>
        <hr class="sidebar1hr"/>
        <br>
        <p><?php echo $products['productDescription']?></p>
        <br>
    </div>
    <div class="content">
        <h1><b><?php echo $products['productName']?></b></h1>
        <h3><?php echo $category ?></h3>
        <hr />
        <form method="post">
            Quantity: <input type="number" name="quantity" id="quantity" value="1">
            <br>
            <button type="submit" name="addToCart" value="<?php echo $products['productId'] ?>">Add To Cart</button>
        </form>
        <?php
        if (@$_POST['addToCart']) {
            echo "Added to Cart.";
        }
        ?>
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
