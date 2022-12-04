<?php
$host = 'localhost';
$username = 'project2';
$password = 'password123';
$dbname = 'dolphin_crm';

$link = mysqli_connect($host, $username, $password, $dbname);
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
else{
    $email = $_POST["email"];
    $sql = "SELECT * FROM users WHERE email='$email'"; // SQL with parameters and password =:ps
    $result = $link->query($sql);
    $user = $result->fetch_assoc();
    
}
mysqli_close($link);
?>