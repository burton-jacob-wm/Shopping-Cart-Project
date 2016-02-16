<?php
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