<?php

session_start();
unset($_SESSION['UserLogin']); //end S_SESSION login
unset($_SESSION['Access']);
echo header("Location: index.php"); //go back to home page



?>