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
    
    <form action="" method="post">

        <label for="">First Name</label>
        <input type="text" name="firstname" id="firstname">

        <label for="">Last Name</label>
        <input type="text" name="lastname" id="lastname">

        <input type="submit" name="submit" value="Enter">

    </form>

</body>
</html>