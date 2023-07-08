<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container" align = "center">
    <h1>Insert data one to one relationship</h1>
    <form action="" method="post">
        Name: <input type="text" name = "name" required><br><br>
        Address: <input type="text" name = "address"  required><br><br>
        Phone: <input type="text" name = "phone" required><br><br>
        <input type="submit">
    </form>
    </div>
</body>
</html>
<?php
//connection to the database
require('connection.php');
//handle request 
if($_SERVER["REQUEST_METHOD"]=== "POST"){
    $name = $_POST["name"];
    $address = $_POST["address"];
    $phone = $_POST["phone"];
    //prepare for insert data to the student table
    $sql1 = $conn->prepare("insert into student (Name) values(?)");
    $sql1->bind_param("s",$name);
    $sql1->execute();
    //return insert id
    $id = mysqli_insert_id($conn);
    //prepare for insert data to the details table
    $sql2 = $conn->prepare("insert into details (StudentId,Address,Phone) values(?,?,?)");
    $sql2->bind_param("iss",$id,$address,$phone);
    $sql2->execute();
    //redirect
    header("location:display.php");
    exit();
    
}


?>