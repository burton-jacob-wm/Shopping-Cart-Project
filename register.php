<?php
session_start();
include_once('databaseconnect.php');

$error = false;
$success = false;

if(@$_POST['signup']) {

    if(!$_POST['username']){
        $error .= '<p>Username is a required field!</p>';
    }

    if(!$_POST['firstName']){
        $error .= '<p>First Name is a required field!</p>';
    }

    if($_POST['username'] == mysql_query("SELECT * FROM Users WHERE userName = '$_POST[username]'")){
        $error .= '<p>Username Already in Use.</p>';
    }

    if($_POST['password'] !== $_POST['checkpassword']){
        $error .= '<p>Passwords do not Match.</p>';
    }

    $query = $con->prepare("INSERT INTO users (usersId, userName, password, email, firstName, lastName) VALUES (:id, :username, :password, :email, :firstname, :lastname)");
    $result = $query->execute(
        array(
            'id' => NULL,
            'username' => $_POST['username'],
            'password' => $_POST['password'],
            'email' => $_POST['email'],
            'firstname' => $_POST['firstName'],
            'lastname' => $_POST['lastName']
        )
    );

    if ($result) {
        $success = "User, " . $_POST['username'] . " was successfully saved.";
        $_SESSION['registered'] = 1;
        header("Location: profile.php");
    } else {
        $success = "There was an error creating the account.";
    }
}
?>


<!DOCTYPE html PUBLIC>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <title>ComputerWare Register</title>

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
        <h1><b>Register!</b></h1>
        <hr />
        <form name="signup" method="POST" >
            <table id="loginTable">
                <tr>
                    <td colspan="2">Username: <input type="text" id="username" name="username"></td>
                </tr>
                <tr>
                    <td colspan="2">Email: <input type="text" name="email" required/></td>
                </tr>
                <tr>
                    <td>First Name: <input type="text" name="firstName" required/></td>
                    <td>Password: <input type="password" id="password" name="password" required></td>
                </tr>
                <tr>
                    <td>Last Name: <input type="text" name="lastName" /></td>
                    <td>Confirm Password: <input type="password" id="password" name="checkpassword" required></td>
                </tr>
            </table>
            <button type="submit" name="signup" value="1">Register</button>
            <a href="profile.php">
                <button type="button">Already have an account?</button>
            </a>
            <br>
            <?php
            if($error){
                echo $error;
                echo '<br>';
            }
            if($success){
                echo $success;
                echo '<br>';
            }
            ?>
            <br>
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
