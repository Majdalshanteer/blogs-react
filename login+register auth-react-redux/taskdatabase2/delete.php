<?php

include 'config.php';

$employee_id = $_GET['id'];

if ($employee_id) {
    $empQuery = "
			DELETE FROM employees
			WHERE id = '" . $employee_id . "'	ORDER BY id DESC";
            
    if (mysqli_query($conn, $empQuery)) {
        $messgae = "Employee delete Successfully.";
        $status = 1;
    } else {
        $messgae = "Employee delete failed.";
        $status = 0;
    }
} else {
    $messgae = "Invalid request.";
    $status = 0;
}
$empResponse = array(
    'status' => $status,
    'status_message' => $messgae
);
header('Content-Type: application/json');
echo json_encode($empResponse);	




?>