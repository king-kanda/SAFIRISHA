<?php
// connect to database safirisha2.1
    $host = 'localhost';
    $username = 'root' ;
    $password = '';
    $db_name = 'safirisha';

    $conn = new mysqli($host, $username, $password ,$db_name);

    if($conn === $conn->error){
        echo "an error occured ".$conn->error;
    }
    // else{
    //     echo "ok";
    // }

?>