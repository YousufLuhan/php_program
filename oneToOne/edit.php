<?php 
//connection to the database
require("connection.php");
if($_SERVER["REQUEST_METHOD"]==="GET"){
    $id = $_GET["id"];
    $sql = "select student.ID,student.Name,details.Address,details.Phone
     from student inner join details on student.ID = details.StudentID where student.ID = '$id'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $name = $row["Name"];
    $address = $row["Address"];
    $phone = $row["Phone"];
    
}
if($_SERVER["REQUEST_METHOD"]==="POST"){
    $id = $_GET["id"];

    $name = $_POST["Name"];
    $address = $_POST["Address"];
    $phone = $_POST["Phone"];
    
    $sql1 = "update student set Name = '$name' where ID = '$id'";
    $sql2 = "update details set Address = '$address',Phone = '$phone' where StudentID = '$id'";
    $conn->query($sql1);
    $conn->query($sql2);
    echo $name,$address,$phone;
    header("location:display.php");
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        Name: <input type="text" name="Name" value ="<?php echo $name?>"><br><br>
        Address: <input type="text" name="Address" value ="<?php echo $address?>"><br><br>
        Phone: <input type="text" name="Phone" value ="<?php echo $phone?>"><br><br>
        <input type="submit" name="">
    </form>
    
</body>
</html>