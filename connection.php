<?php
$servername="localhost";
$username="root";
$password="";
$dbname="haven of the world";

//creat connecttion
$conn=new mysqli($servername,$username,$password,$dbname);

//chek connection
if($conn->connect_error) {
    die("Connection failed:". $conn->connect_error);
   } 
    // else{ echo"Connected  successfully";
//  }
?> 
