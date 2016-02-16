<?php
session_start();
$userName = $_SESSION["userName"];

include_once 'databaseconnect.php';

$stmt = $con->prepare("SELECT * FROM users u WHERE u.userName = :userName");
$stmt->execute(array(':userName'=>$userName));
$results = $stmt->fetchAll();

?>

<!DOCTYPE html PUBLIC>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <title>ComputerWare - Your Account</title>

    <link href="twoColLiqRtHdr.css" rel="stylesheet" type="text/css" />
    <link href="SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400italic" rel="stylesheet" type="text/css">


    <script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>


</head>
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
foreach($results as $userInfo) {
    ?>
    <div class="container">
        <div class="sidebar1">
            <h2>Hello, <?php echo $userInfo['firstName'] ?></h2>
            <hr class="sidebar1hr"/>
            <br>
            <a href="logout.php">
                <button>Log Out</button>
            </a>
            <br>
        </div>
        <div class="content">
            <h1><b>Welcome <?php echo $userInfo['userName'] ?></b></h1>

            <h3></h3>
            <hr/>
            <p></p>
            <hr/>
        </div>
    </div>
    <?php
}
?>
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

