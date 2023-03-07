<?php

    include_once("connections/connection.php"); //call other php file
    $con = connection(); //to call connection
    $id = $_GET['ID'];

        $sql = "SELECT * FROM student_list WHERE id = '$id'";
        $students = $con -> query($sql) or die ($con -> error);
        $row = $students -> fetch_assoc();


    if(isset($_POST['submit'])) { //check if submit is posted

        $fname = $_POST['firstname'];
        $lname = $_POST['lastname'];
        $gender = $_POST['gender'];

        $sql = "UPDATE student_list SET first_name = '$fname', last_name = '$lname', 
        gender = '$gender' WHERE id = '$id'";
        
        $con -> query($sql) or die ($con -> error); //put data to database

        echo header("Location: details.php?ID=".$id);//redirect to home after log in

    }


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

        <label>First Name</label>
        <input type="text" name="firstname" id="firstname" value="<?php echo $row['first_name'];?>">

        <label>Last Name</label>
        <input type="text" name="lastname" id="lastname" value="<?php echo $row['last_name'];?>">

        <label>Gender</label>
        <select name="gender" id="gender">
            <option value="Male" <?php echo ($row['gender'] == "Male") ? 'selected' : '';?>>Male</option>
            <option value="Female" <?php echo ($row['gender'] == "Female") ? 'selected' : '';?>>Female</option>

        <input type="submit" name="submit" value="Update">

    </form>

</body>
</html>