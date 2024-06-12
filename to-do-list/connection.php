<?php 
     $servername = "localhost";
     $name = "root";
     $pass = "";
     $dbname = "user_db";

     $connection = new mysqli($servername, $name, $pass, $dbname);

     if($connection->connect_error){
       die("Connection failed:" .$connection->connect_error);
     }


?>