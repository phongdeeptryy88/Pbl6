<?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $db="pbl";
        global $conn;
        $conn = mysqli_connect($servername,$username,$password);
        if(!$conn){
            dei('k connect'.mysqli_error($conn));
        }
        mysqli_select_db($conn,$db);
?>