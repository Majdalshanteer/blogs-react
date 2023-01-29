<?php


include 'config.php';
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Origin", "*");
header("Access-Control-Allow-Credentials", "true");
header("Access-Control-Allow-Methods", "GET,HEAD,OPTIONS,POST,PUT");
header("Access-Control-Allow-Headers", "Access-Control-Allow-Headers, Origin,Accept, X-Requested-With, Content-Type, Access-Control-Request-Method, Access-Control-Request-Headers");

$blog = json_decode(file_get_contents('php://input'));

$sql = "INSERT INTO blogs (title, content, img)
VALUES ('" . $blog->title . "', '" . $blog->content . "', '" . $blog->img . "')" ;

    if (mysqli_query($conn, $sql)) {
        $messgae = " updated successfully.";
        $status = 1;
    } else {
        $messgae = "update failed.";
        $status = 0;
    }
    $empResponse = array(
        'status' => $status,
        'status_message' => $messgae
    );
    header('Content-Type: application/json');
    echo json_encode($empResponse);


?>

