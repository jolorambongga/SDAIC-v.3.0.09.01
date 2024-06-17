<?php

require_once('../../../includes/config.php');

try {

	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$user_id = $_POST['user_id'];
	$category = $_POST['category'];
	$action = $_POST['action'];
	$details = $_POST['details'];
	$device = $_POST['device'];
	$browser = $_POST['browser'];

	$sql = "INSERT INTO tbl_Logs (user_id, category, action, details, device, browser)
			VALUES (:user_id, :category, :action, :details, :device, :browser);";

	$stmt = $pdo->prepare($sql);

	$stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
	$stmt->bindParam(':category', $category, PDO::PARAM_INT);
	$stmt->bindParam(':action', $action, PDO::PARAM_INT);
	$stmt->bindParam(':details', $details, PDO::PARAM_INT);
	$stmt->bindParam(':device', $device, PDO::PARAM_INT);
	$stmt->bindParam(':browser', $browser, PDO::PARAM_INT);

	$stmt->execute();

	$sql = "SELECT * FROM tbl_Logs
			WHERE user_id = :user_id";

	$stmt = $pdo->prepare($sql);

	$stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);

	$stmt->execute();

	$data = $stmt->fetch(PDO::FETCH_ASSOC);

	header('Content-Type: application/json');

	echo json_encode(array("status" => "success", "process" => "PROCESS", "data" => $data));

} catch (PDOException $e) {
	echo json_encode(array("status" => "error", "message" => $e->getMessage(), "process" => "PROCESS", "report" => "catch reached"));
}
?>
