<?php
$host = 'localhost';
$username = 'project2';
$password = 'password123';
$dbname = 'dolphin_crm';

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);

$filtered = $_GET["filter"];

if($filtered == "All"){
    echo all_contacts($conn);
}

else if ($filtered == "SalesLead"){
    $lookup = "Sales Lead";
    echo only_type($conn, $lookup);
}

else if ($filtered == "Support"){
    $lookup = "Support";
    echo only_type($conn, $lookup);
}


function all_contacts($conn){
    $stmt = $conn->query("SELECT * FROM Contacts");
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    echo "<table>";
    echo "<tr>";
    echo "<th>Name</th>";
    echo "<th>Email</th>";
    echo "<th>Company</th>";
    echo "<th>Type</th>";
    echo "</tr>";

    foreach($results as $row){
        $name = $row["title"]. ' ' . $row["firstname"]. ' '.$row["lastname"];
        echo "<tr>";
        echo "<td>".$name."</td>";
        echo "<td>".$row["email"]."</td>";
        echo "<td>".$row["company"]."</td>";
        echo "<td>".$row["type"]."</td>";
        echo "</tr>";
    }

    echo "</table>";

}

// displays one one type of contract (Sales Lead or Support)
function only_type($conn, $lookup){
    $stmt = $conn->query("SELECT * FROM Contacts WHERE type LIKE '%$lookup%'");
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo "<table>";
    echo "<tr>";
    echo "<th>Name</th>";
    echo "<th>Email</th>";
    echo "<th>Company</th>";
    echo "<th>Type</th>";
    echo "</tr>";

    foreach($results as $row){
        $name = $row["title"]. ' ' . $row["firstname"]. ' '.$row["lastname"];
        echo "<tr>";
        echo "<td>".$name."</td>";
        echo "<td>".$row["email"]."</td>";
        echo "<td>".$row["company"]."</td>";
        echo "<td>".$row["type"]."</td>";
        echo "</tr>";
    }

    echo "</table>";
}

?>