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

try {
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection

} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
$user = json_decode(file_get_contents('php://input'));

$sql = "INSERT INTO users (email, name, password)
VALUES ('" . $user->email . "', '" . $user->username . "', '" . $user->password. "')";

echo $sql;

    if (mysqli_query($conn, $sql)) {
        $messgae = "Employee updated successfully.";
        $status = 1;
    } else {
        $messgae = "Employee update failed.";
        $status = 0;
    }
    $empResponse = array(
        'status' => $status,
        'status_message' => $messgae
    );
    header('Content-Type: application/json');
    echo json_encode($empResponse);
