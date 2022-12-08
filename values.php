<?php 
session_start();
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'dolphin_crm';

if(isset($_POST)){

    $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
    $firstname = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_STRING);
    $lastname = filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $telephone = filter_input(INPUT_POST, 'telephone', FILTER_VALIDATE_INT);
    $company = filter_input(INPUT_POST, 'company', FILTER_SANITIZE_STRING);
    $type = filter_input(INPUT_POST, 'type', FILTER_SANITIZE_STRING);
    $assign = explode(' ', filter_input(INPUT_POST, 'assign', FILTER_SANITIZE_STRING));
    $assign = settype($assign[0], 'integer');
    //require 'login.php';
    $id = settype($_SESSION['id'], 'integer');

    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO contacts (title, firstname, lastname, email, telephone, company, type, assigned_to, created_by,	created_at,	updated_at) 
        VALUES('$title', '$firstname', '$lastname', '$email',' $telephone', '$company', '$type', '$assign', '$id', NOW(), NOW())";

        $conn->exec($sql);
        echo "User was added to database";
        echo "User Submitted $title $firstname $lastname $email $telephone $company $type $assign";
    } 
    catch(PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }
    $conn = null;
}
else{
    echo "No data was recieved from user";
}

?>