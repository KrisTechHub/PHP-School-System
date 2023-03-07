<?php


        //use sesion to log in page (way to program to store all data to all part of the web/app)
    if (!isset($_SESSION)){ //check if session is set
        session_start();  //if detected that no sessin is started yet, function will run
    }

    if(isset($_SESSION['Access']) && $_SESSION['Access'] == "administrator") {
        echo "Signed on as " .$_SESSION['UserLogin'];
    } else {
        echo header("Location: index.php");
    }

    include_once("connections/connection.php"); //call other php file
    $con = connection(); //to call connection

    $id = $_GET['ID'];

    $sql = "SELECT * FROM student_list WHERE id = '$id'";
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
    <br/>
    <a href="index.php"><-Back</a>
    <a href="edit.php?ID=<?php echo $row['id'];?>">Edit</a>

    <form action="delete.php" method="post" >
        <button type="submit"> Delete</button> <!--When using delete capability, never use GET method, always use POST to avoid deleting all data in database -->
    </form>

   <h2><?php echo $row['first_name'];?> <?php echo $row['last_name'];?></h2>
   <p>is a <?php echo $row['gender']; ?></p>
</body>
</html>