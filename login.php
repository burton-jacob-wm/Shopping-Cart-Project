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