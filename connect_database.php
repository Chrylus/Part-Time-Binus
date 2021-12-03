<?php
    $connection = mysqli_connect('localhost', 'root', '', 'form_it');
    if(!$connection) {
        die("Database connection failed");
    }
?>