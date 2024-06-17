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
    $time_stamp = $_POST['time_stamp'];


    $sql = "INSERT INTO tbl_Logs (user_id, category, action, details, device, browser)
            VALUES (:user_id, :category, :action, :details, :device, :browser)";


    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $stmt->bindParam(':category', $category, PDO::PARAM_STR);
    $stmt->bindParam(':action', $action, PDO::PARAM_STR);
    $stmt->bindParam(':details', $details, PDO::PARAM_STR);
    $stmt->bindParam(':device', $device, PDO::PARAM_STR);
    $stmt->bindParam(':browser', $browser, PDO::PARAM_STR);
    // $stmt->bindParam(':time_stamp', $time_stamp, PDO::PARAM_STR);

    $stmt->execute();


    $sql_fetch = "SELECT * FROM tbl_Logs WHERE user_id = :user_id";
    $stmt_fetch = $pdo->prepare($sql_fetch);
    $stmt_fetch->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $stmt_fetch->execute();
    $data = $stmt_fetch->fetch(PDO::FETCH_ASSOC);


    header('Content-Type: application/json');
    echo json_encode(array("status" => "success", "process" => "PROCESS", "data" => $data));

} catch (PDOException $e) {
    // Return error response
    echo json_encode(array("status" => "error", "message" => $e->getMessage(), "process" => "PROCESS", "report" => "catch reached"));
}
?>
