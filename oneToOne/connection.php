<?php 
$conn = new mysqli("localhost","root","","details");
if($conn->connect_error){
    die("Connection Failed!");
}
?>