<?php
// mysql_connect("localhost","root","") or die (mysql_error());
// mysql_select_db("reg") or die (mysql_error());

//connecting to database
$servername="localhost";
$username ="root";
$password = "";

//create a conncetion table
$conn=  mysqli_connect($servername,$username,$password);
if(!$con){
    die("sorry we failed to connect :". mysqli_connect_error());
}
echo "connection was successful";
?>