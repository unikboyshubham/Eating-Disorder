<?php
session_start();
$server='localhost';
$database='bio_db';
$conn = mysqli_connect($server, 'root', '', $database) or die("Couldn't connect the database");
?>