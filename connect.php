<?php
$conn = null;
try{
    //Establish PDO Connection to the Database
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'dolphin_crm';
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
}catch(Exception $e){
    echo "Server Error 500: Failed to Execute Operatiion";
    die();
}catch(Error $s){
    echo "Server Error 501: Failed to Execute Operation";
    die();
}
?>