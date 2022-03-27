<?php
$server ="localhost";
$username="root";
$password="";
$database="users";



//create connection

$conn=mysqli_connect($server,$username,$password,$database);

if($conn){
//    echo "successfully database connected";
}
else {
    die("Error". mysqli_connect_error());
}
?>