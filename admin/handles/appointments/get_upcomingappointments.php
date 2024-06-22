<?php
// Include the config.php file
require_once('../../../includes/config.php');

try {
    // Query to get the count of accepted appointments that are not past due
    $currentDate = date('Y-m-d');
    $sql = "SELECT COUNT(*) AS count FROM tbl_Appointments WHERE status = 'APPROVED' AND appointment_date >= :currentDate";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(':currentDate' => $currentDate));
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $count = $row["count"];

    // Return the count as JSON response
    header('Content-Type: application/json');
    echo json_encode(array("count" => $count));
} catch (PDOException $e) {
    // If an error occurs, handle it gracefully
    echo json_encode(array("error" => "Error: " . $e->getMessage()));
}
?>
