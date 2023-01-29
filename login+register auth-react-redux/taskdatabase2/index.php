<?php


include 'config.php';


if($_GET) {
    $sql = "SELECT * FROM blogs Where title like '%$_GET[name]%' ";
} else {
    $sql = "SELECT * FROM blogs ";
}


$result = $conn->query($sql);

        header("Access-Control-Allow-Origin: *");

        if ($result->num_rows > 0) {
         

            $empData = array();
            while ($empRecord = mysqli_fetch_assoc($result)) {
                $empData[] = $empRecord;
            }
            header('Content-Type: application/json');
            echo json_encode($empData);	
        }

?>