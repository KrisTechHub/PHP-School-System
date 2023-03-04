<?php

    function connection() {
        
        $host = "localhost";
        $username = "root";
        $password = "Tiggy.143";
        $databse = "student_system";
    
        $con = new mysqli($host, $username, $password, $databse);
    
        if($con->connect_error) {
            echo $con->connect_error;
        } else {
            return $con;
        };

    };