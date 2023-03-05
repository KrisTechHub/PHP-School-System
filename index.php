<?php


        //use sesion to log in page (way to program to store all data to all part of the web/app)
    if (!isset($_SESSION)){ //check if session is set
        session_start();  //if detected that no sessin is started yet, function will run
    }

    if(isset($_SESSION['UserLogin'])){
        echo "Welcome " . $_SESSION['UserLogin'];
    } else {
        echo "Welcome";
    }

    include_once("connections/connection.php"); //call other php file
    $con = connection(); //to call connection


    $sql = "SELECT * FROM student_list ORDER  BY id DESC";
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