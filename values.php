<?php 
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'dolphin_crm';

if(isset($_POST['save'])){
    /*$title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
    $firstname = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_STRING);
    $lastname = filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $telephone = filter_input(INPUT_POST, 'telephone', FILTER_VALIDATE_INT);
    $company = filter_input(INPUT_POST, 'company', FILTER_SANITIZE_STRING);
    $type = filter_input(INPUT_POST, 'type', FILTER_SANITIZE_STRING);
    $assign = filter_input(INPUT_POST, 'assign', FILTER_SANITIZE_STRING).split(' ');
    $assign = parseInt($assign[0]);*/

    $title = $_POST['title'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $telephone = $_POST['telephone'];
    $company = $_POST['company'];
    $type = $_POST['type'];
    //$type = '(contacts) VALUE ($type)';
    $assign = $_POST['assign'].split(' ');
    $assign = $assign = parseInt($assign[0]);

    echo "<script> User Submitted $title $firstname $lastname $email $telephone $company $type $assign </script>";
    echo "<script> console.log('I am working') </script>";

    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO contacts (title, firstname, lastname, email, telephone, company, type, assigned_to, created_by,	created_at,	updated_at) 
        VALUES('$title', '$firstname', '$lastname', '$email',' $telephone', '$company', '$type', '$assign', 1, NOW(), NOW())";

        $conn->exec($sql);
        echo "User was added to database";
        echo "User Submitted $title $firstname $lastname $email $telephone $company $type $assign";
        echo "<script> console.log('I am working') </script>";

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