<?php
require_once('../../../includes/config.php');

try {
    // Set PDO attributes
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Retrieve POST data
    $user_id = $_POST['user_id'];
    $category = $_POST['category'];
    $action = $_POST['action'];
    $details = $_POST['details'];
    $device = $_POST['device'];
    $browser = $_POST['browser'];

    // Prepare SQL statement
    $sql = "INSERT INTO tbl_Logs (user_id, category, action, details, device, browser)
            VALUES (:user_id, :category, :action, :details, :device, :browser)";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $stmt->bindParam(':category', $category, PDO::PARAM_STR);
    $stmt->bindParam(':action', $action, PDO::PARAM_STR);
    $stmt->bindParam(':details', $details, PDO::PARAM_STR);
    $stmt->bindParam(':device', $device, PDO::PARAM_STR);
    $stmt->bindParam(':browser', $browser, PDO::PARAM_STR);

    $stmt->execute();

    $sql = "SELECT * FROM tbl_Logs WHERE user_id = :user_id;";

    $stmt = $pdo->prepare($sql);

    $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);

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
