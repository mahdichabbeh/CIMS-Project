<?php
    $conn = mysqli_connect('localhost','mahdi','mahdii123321','CIMS');
    if(!$conn){
        echo 'connection error: ' . mysqli_connect_error();
    }
?>