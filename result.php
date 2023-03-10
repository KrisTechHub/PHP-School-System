<?php


        //use sesion to log in page (way to program to store all data to all part of the web/app)
    if (!isset($_SESSION)){ //check if session is set
        session_start();  //if detected that no sessin is started yet, function will run
    }

    if(isset($_SESSION['UserLogin'])) {
        echo "Welcome " .$_SESSION['UserLogin'];
    } else {
        echo "Welcome Guest";
    }

    include_once("connections/connection.php"); //call other php file
    $con = connection(); //to call connection

    $search = $_GET['search']; //listen to user action(search)

    $sql = "SELECT * FROM student_list WHERE first_name LIKE '%$search%' || last_name LIKE '%$search%' ORDER  BY id DESC"; //use LIKE to show all data with same info, use % prefix to show all containing with searched word
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

    <form action="result.php" method="get">
        <input type="text" name="search" id="search">
        <button type="submit">Search</button>
    </form>

    <?php if(isset($_SESSION['UserLogin'])){?>
        <a href="logout.php">Logout</a>
        <a href="add.php">Add New</a>
    <?php } else { ?>   
        <a href="login.php">Login</a>
    <?php } ?> 

    <?php if($row > 0) { ?> <!--if searching with result, SHOW -->
    <table>
        <thead>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <form action="delete.php" method="post">

            <?php do { ?>
            <tr>
                <td><?php echo $row['first_name']; ?></td>
                <td><?php echo $row['last_name']; ?></td>
                <td>
                    <a href="details.php?ID=<?php echo $row['id'];?>">View</a>
                        
                    <?php if(isset($_SESSION['Access']) && $_SESSION['Access'] == "administrator") {?> <!--own code -->
                        <button type="submit" name="delete">Delete</button>
                    <?php };?> <!--own code -->
                </td> 
                
            </tr>
            <?php } while ($row = $students -> fetch_assoc()) ?>         
            
            </form>
        </tbody>
    </table>
    <?php }else{ ?> <!--if searching without result, say no result -->
        <h1>No result</h1>
    <?php } ?>
</body>
</html>