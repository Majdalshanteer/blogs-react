<?php

?>

<?php
include 'config.php';
 header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Origin", "*");
header("Access-Control-Allow-Credentials", "true");
header("Access-Control-Allow-Methods", "GET,HEAD,OPTIONS,POST,PUT");
header("Access-Control-Allow-Headers", "Access-Control-Allow-Headers, Origin,Accept, X-Requested-With, Content-Type, Access-Control-Request-Method, Access-Control-Request-Headers");        


$empData  = $_POST;

	if($_POST["id"]) {
		$empName=$empData["employee_name"];
		$empAddrese=$empData["Address"];
		$empemails=$empData["email"];
        $empSalary=$empData["Salary"];
    $empposition=$empData["position"];
		$empQuery= "
			UPDATE  employees set
			employee_name='".$empName. "', Address='". $empAddrese. "', email='". $empemails. "', Salary='". $empSalary. "', position='". $empposition."' 
			WHERE id = '".$empData["id"]."'";

			echo $empQuery;
		if( mysqli_query($conn, $empQuery)) {
			$messgae = "Employee updated successfully.";
			$status = 1;			
		} else {
			$messgae = "Employee update failed.";
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
