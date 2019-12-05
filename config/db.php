<?php

// Open a connection to MySQL database
function OpenConnection()
 {
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpassword = "kGAiQpsqXu6TW9gk";
    $db = "test";
    $conn = new mysqli($dbhost, $dbuser, $dbpassword, $db) or die("Connect failed: %s\n". $conn -> error);
    
    return $conn;
 }
 
// Close the connection to MySQL database
function CloseConnection($conn){
     $conn -> close();
    }
   
?>