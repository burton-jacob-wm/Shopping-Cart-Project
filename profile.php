<?php

session_start();

$registered = $_SESSION["registered"];
$UserName = $_SESSION["userName"];

if(isset($_SESSION['userName'])){
    header('location: account.php');
}

require_once('databaseconnect.php');


//START Login
$error = false;
$success = false;

if(@$_POST['login']) {

    if(!$_POST['user']){
        $error .= '<p>Username is a required field!</p>';
    }

    if(!$_POST['pass']){
        $error .= '<p>Password is a required field!</p>';
    }

    $query = $con->prepare("SELECT * FROM users WHERE userName = :username AND password = :password");
    $result = $query->execute(
        array(
            'username' => $_POST['user'],
            'password' => $_POST['pass']
        )
    );
    $userinfo = $query->fetch();

    if ($userinfo) {

        $success = "User, " . $_POST['user'] . " was successfully logged in.";

        $_SESSION["firstName"] = $userinfo['firstName'];
        $_SESSION["userName"] = $userinfo['userName'];

        header("Location: account.php");
    } else {
        $success = "There was an error logging into the account.";
    }
}

?>

<!DOCTYPE html PUBLIC>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <title>eStore Home</title>

    <link href="twoColLiqRtHdr.css" rel="stylesheet" type="text/css" />
    <link href="SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400italic" rel="stylesheet" type="text/css">


    <script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>


</head>
<style>
    #profile{
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
            <li><a href="cart.php">Cart</a></li>
            <li><a href="profile.php" id="profile">Profile</a></li>
        </ul>
        <h1><span id="headertext">ComputerWare</span></h1>
    </div>
</div>
<div class="container">
    <div class="contentlogin">
        <h1><b>Login</b></h1>
        <hr />
        <form id="login" method="POST" >
            Username: <input type="text" id="username" name="user" required><br>
            Password: <input type="password" id="password" name="pass" required><br>
            <button type="submit" name="login" value="1">Sign In</button>
            <a href="register.php">
                <button type="button">Register Here!</button>
            </a>
            <?php
            if(isset($_SESSION['registered'])){
                echo '<p id="registered">Successfully Registered</p>';
                unset($_SESSION['registered']);
            }
            ?>
            <?php
            if($error){
                echo '<br>';
                echo $error;
            }
            if($success){
                echo '<br>';
                echo $success;
            }
            ?>
        </form>
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
