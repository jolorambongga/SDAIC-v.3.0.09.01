<?php
require_once('../../../includes/config.php');

try {
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "SELECT 
                a.appointment_id,
                u.first_name,
                u.last_name,
                s.service_name,
                DATE_FORMAT(a.appointment_date, '%M %d, %Y <br> (%W)') as formatted_date,
                TIME_FORMAT(a.appointment_time, '%h:%i %p') as formatted_time,
                a.notes,
                a.request_image,
                a.status,
                a.completed
            FROM tbl_Appointments as a
            JOIN tbl_Services as s ON a.service_id = s.service_id
            LEFT JOIN tbl_Users as u ON a.user_id = u.user_id";

    $stmt = $pdo->query($sql);

    $appointments = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Convert binary request_image to base64 before JSON encoding
    foreach ($appointments as &$appointment) {
        if ($appointment['request_image'] !== null) {
            $appointment['request_image'] = base64_encode($appointment['request_image']);
        }
    }

    header('Content-Type: application/json');

    echo json_encode(array("status" => "success", "process" => "read appointments", "data" => $appointments));

} catch (PDOException $e) {
    echo json_encode(array("status" => "error", "message" => $e->getMessage(), "process" => "read appointments"));
}
?>
