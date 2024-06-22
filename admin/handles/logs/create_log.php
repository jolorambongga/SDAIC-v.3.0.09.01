<?php
require_once('../../../includes/config.php');

try {
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $user_id = $_POST['user_id'];
    $category = $_POST['category'];
    $action = $_POST['action'];
    $details = $_POST['details'];
    $device = $_POST['device'];
    $device_model = $_POST['device_model'];
    $browser = $_POST['browser'];

    $sql = "INSERT INTO tbl_Logs (user_id, category, action, details, device, device_model, browser)
            VALUES (:user_id, :category, :action, :details, :device, :device_model, :browser)";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $stmt->bindParam(':category', $category, PDO::PARAM_STR);
    $stmt->bindParam(':action', $action, PDO::PARAM_STR);
    $stmt->bindParam(':details', $details, PDO::PARAM_STR);
    $stmt->bindParam(':device', $device, PDO::PARAM_STR);
    $stmt->bindParam(':device_model', $device_model, PDO::PARAM_STR);
    $stmt->bindParam(':browser', $browser, PDO::PARAM_STR);

    $stmt->execute();

    $log_id = $pdo->lastInsertId();

    $sql = "SELECT * FROM tbl_Logs WHERE log_id = :log_id;";

    $stmt = $pdo->prepare($sql);

    $stmt->bindParam(':log_id', $log_id, PDO::PARAM_INT);

    $stmt->execute();

    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Return success response
    header('Content-Type: application/json');
    echo json_encode(array("status" => "success", "process" => "create log", "data" => $data));

} catch (PDOException $e) {
    // Return error response
    echo json_encode(array("status" => "error", "message" => $e->getMessage(), "process" => "create log", "report" => "catch reached"));
}
?>
