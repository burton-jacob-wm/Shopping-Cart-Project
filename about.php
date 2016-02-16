<!DOCTYPE html PUBLIC>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <title>ComputerWare About</title>

    <link href="twoColLiqRtHdr.css" rel="stylesheet" type="text/css" />
    <link href="SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400italic" rel="stylesheet" type="text/css">


    <script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>


</head>
<style>
    #about{
        background-color: #f7c888;
    }
</style>
<body>
<div class="header-cont">
    <div class="header">
        <ul id="MenuBar2" class="MenuBarHorizontal">
            <li><a href="index.php">Home</a></li>
            <li>
                <a href="about.php" id="about">About</a>
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
    <div class="sidebar1">
        <h2>Our Philosphy</h2>
        <hr class="sidebar1hr"/>
        <br>
        <p>We want to bring cheap prices to computer makers and users for any use of their own personal machines.</p>
        <br>
        <h3></h3>
    </div>
    <div class="content">
        <h1><b>About Us</b></h1>
        <hr />
        <p>We offer cheap but high quality computer components from graphics cards to motherboards and the likes of which.
        We promise to work hard and continue to bring these prices low to encourage others to create a viable investment in their home computing
        needs.</p>
        <p>Any questions that have been answered are on our <a href="faq.php">FAQ</a> page.</p>
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
