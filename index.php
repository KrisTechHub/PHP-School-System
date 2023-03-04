<?php

    include_once("connections/connection.php"); //call other php file

    $con = connection(); //to call connection


    $sql = "SELECT * FROM student_list";
    $students = $con -> query($sql) or die ($con -> error);
    $row = $students -> fetch_assoc();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./CSS/styles.css">
    <title>Student Management System</title>


</head>
<body>
    <h1>Student Management System</h1>
    <br/>
    <br/>

    <a href="add.php">Add New</a>
    <table>
        <thead>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
            </tr>
        </thead>
        <tbody>
            <?php do { ?>
            <tr>
                <td><?php echo $row['first_name']; ?></td>
                <td><?php echo $row['last_name']; ?></td>
            </tr>
            <?php } while ($row = $students -> fetch_assoc()) ?>
        </tbody>
    </table>
</body>
</html>