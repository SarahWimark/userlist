<?php

function OpenConnection()
 {
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpassword = "kGAiQpsqXu6TW9gk";
    $db = "test";
    $conn = new mysqli($dbhost, $dbuser, $dbpassword, $db) or die("Connect failed: %s\n". $conn -> error);
    
    return $conn;
 }
 
function CloseConnection($conn){
     $conn -> close();
    }
   
?>