<?php 

//connect to database
$conn = mysqli_connect('localhost', 'Muwahib', 'Muwahib@521409', 'pizza');

//check connection
if (!$conn) {
    echo 'connection error: ' . mysqli_connect_error();
}

?>