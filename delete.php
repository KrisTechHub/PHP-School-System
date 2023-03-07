<?php

include_once("connections/connection.php"); //call other php file
$con = connection(); //to call connection

    if(isset($_POST['delete'])) {

        $id = $_POST['ID'];
        $sql = "DELETE from student_list WHERE id = '$id'";
        $con -> query($sql) or die ($con -> error);
        echo header("Location: index.php");
    }

?>