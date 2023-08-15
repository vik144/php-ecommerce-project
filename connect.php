<?php
$server="localhost";
$username="root";
$password="";
$db="ecommerce_watches";

$conn=mysqli_connect($server,$username,$password,$db);
if(!$conn){
        // echo"not connected"+mysqli_connect_error();
}


?>