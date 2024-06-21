<?php

require_once('../../includes/config.php');

try {

	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$user_id = $_POST['user_id'];
	$username = $_POST['username'];	
	$email = $_POST['email'];
	$first_name = $_POST['first_name'];
	$middle_name = $_POST['middle_name'];
	$last_name = $_POST['last_name'];
	$contact = $_POST['contact'];
	$address = $_POST['address'];
	$birthday = $_POST['birthday'];

	$sql = "SELECT * FROM tbl_Users WHERE user_id = :user_id;";

	$stmt = $pdo->prepare($sql);

	$stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);

	$stmt->execute();

	if ($stmt->fetchAll(PDO::FETCH_ASSOC) > 1) {
		
	}

	$sql = "UPDATE tbl_Users WHERE user_id = :user_id;";

	$stmt = $pdo->prepare($sql);

	$stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);

	$stmt->execute();

	$data = $stmt->fetch(PDO::FETCH_ASSOC);

	header('Content-Type: application/json');

	echo json_encode(array("status" => "success", "process" => "read profile", "data" => $data));

} catch (PDOException $e) {
	echo json_encode(array("status" => "error", "message" => $e->getMessage(), "process" => "read profile", "report" => "catch reached"));
}
?>
