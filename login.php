<?php
    
            //use sesion to log in page (way to program to store all data to all part of the web/app)
    if (!isset($_SESSION)){ //check if session is set
        session_start();  //if detected that no sessin is started yet, function will run
    }

    include_once("connections/connection.php"); //call other php file
    $con = connection(); //to call connection

    if(isset($_POST['login'])){ //capture admin login

        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM `student_users` WHERE username = '$username' AND password = '$password'";
        
        $user = $con -> query($sql) or die ($con -> error);
        $row =  $user -> fetch_assoc();
        $total = $user -> num_rows; //total users stored in databse

        if ($total > 0) {
            $_SESSION['UserLogin'] = $row['username'];
            $_SESSION['Access'] = $row['access'];
            echo header("Location: index.php");
        } else {
            echo "No user found.";
        }
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
    <h1>Admin Log in</h1>
    <br/>

    <form action="" method="post"> <!--use POST to capture all submitted information -->
        <label>Username</label>
            <input type="text" name="username" id="username" >

        <label>Password</label>
            <input type="password" name="password" id="passwrod" >

        <button type="submit" name="login">Login</button>
    </form>

</body>
</html>