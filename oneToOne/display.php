<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1 align = 'center'>Update & Delete One to One relationship</h1>
    <table border = "1" align="center">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Address</th>
                <th>Phone</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            //connection to the database
            require("connection.php");
            $sql = "select student.ID,student.Name,details.Address,details.Phone
             from student inner join details on student.ID = details.StudentID  order by student.ID";
            $result = $conn->query($sql);
            while($row = $result->fetch_assoc()){
                echo "
                <tr>
                    <td>$row[ID]</td>
                    <td>$row[Name]</td>
                    <td>$row[Address]</td>
                    <td>$row[Phone]</td>
                    <td>
                    <a href='edit.php?id=$row[ID]'>Edit</a>
                    <a href='delete.php?id=$row[ID]'>Delete</a>
                    </td>
                </tr>
                ";
            }
            ?>     
        </tbody>

    </table>
</body>
</html>
