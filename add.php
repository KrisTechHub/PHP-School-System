<?php

    include_once("connections/connection.php"); //call other php file

    $con = connection(); //to call connection

    if(isset($_POST['submit'])) { //check if submit is posted

        $fname = $_POST['firstname'];
        $lname = $_POST['lastname'];
        $gender = $_POST['gender'];

        $sql = "INSERT INTO `student_list`(`first_name`, `last_name`, 
         `gender`) VALUES ('$fname','$lname','$gender')";
        
        $con -> query($sql) or die ($con -> error); //put data to database

        echo header("Location: index.php");//redirect to home after log in

    }

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
    
    <form action="" method="post"> <!--use POST to capture all submitted information -->

        <label for="">First Name</label>
        <input type="text" name="firstname" id="firstname">

        <label for="">Last Name</label>
        <input type="text" name="lastname" id="lastname">

        <label for="">Gender</label>
        <select name="gender" id="gender">
            <option value="Male">Male</option>
            <option value="Female">Female</option>

        <input type="submit" name="submit" value="Enter">

    </form>

</body>
</html>