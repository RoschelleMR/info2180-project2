<?php
session_start();

$host = 'localhost';
$username = 'project2';
$password = 'password123';
$dbname = 'dolphin_crm';

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);



$user_input1 = $_POST['email'];
$user_email = htmlspecialchars($user_input1);
$user_input2 = $_POST['password'];
$user_pass = htmlspecialchars($user_input2);


check($conn, $user_email,$user_pass);


function check($conn, $user_email, $user_pass){

    $hashedPass = MD5($user_pass); //hash user's entered password first (same as sql)

    $stmt = $conn->query("SELECT * FROM Users WHERE email='$user_email' AND password='$hashedPass'"); 
    //since password alr hashed in sql, search for the newly hashed user input to the hashed sql password

    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if(!empty($results)) {

        foreach($results as $row){
            
            if ($row['email'] === $user_email && $row['password'] === $hashedPass) {
                //checks if the hashed user input equal to the sql password in phpmyadmin 
                //(which is hashed as well with the same algorithm[MD5])
            echo "Login Successful!";

            $user_name = $row["firstname"]. ' '.$row["lastname"];

            $_SESSION['id'] = $row['id']; //saves global variable to be used in other pages
            $_SESSION['email'] = $row['email'];
            $_SESSION['name'] = $user_name;

            header ("Location: index.php?success=Login was correct");
            //this is temporary, wanted to test out redirecting with php and using GET (like a handshake, pree index.php)
            exit();

        }}

    }
}

?>
