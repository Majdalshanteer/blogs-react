<?php


header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Origin", "*");
header("Access-Control-Allow-Credentials", "true");
header("Access-Control-Allow-Methods", "GET,HEAD,OPTIONS,POST,PUT");
header("Access-Control-Allow-Headers", "Access-Control-Allow-Headers, Origin,Accept, X-Requested-With, Content-Type, Access-Control-Request-Method, Access-Control-Request-Headers");

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "blogs-redux-test";

$user = json_decode(file_get_contents('php://input'));

try {
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection

} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

$sql = "SELECT * FROM users WHERE name='" . $user->username . "'";

$result = $conn->query($sql);
            header("Access-Control-Allow-Origin: *");

$row = $result->fetch_assoc();
            header('Content-Type: application/json');
            echo json_encode($row);	
?>
