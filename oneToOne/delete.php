<?php
//connection to the database
require("connection.php");
//handle request
if($_SERVER["REQUEST_METHOD"]==="GET"){
    $id = $_GET["id"];
    $sql1 = "delete from student where ID = $id";
    $sql2 = "delete from details  where StudentID = $id";
    $conn->query($sql1);
    $conn->query($sql2);
    header("location:display.php");
    exit();
}




?>