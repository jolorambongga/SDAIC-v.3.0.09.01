<?php
require_once('../../includes/config.php');

try {
    // Set PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Retrieve user_id and service_id from GET parameters
    $user_id = $_GET['user_id'];
    $service_id = isset($_GET['service_id']) ? $_GET['service_id'] : 'All';

    // Base SQL query
    $sql = "SELECT *,
            DATE_FORMAT(a.appointment_date, '%M %d, %Y <br> (%W)') as formatted_date,
            TIME_FORMAT(a.appointment_time, '%h:%i %p') as formatted_time
            FROM tbl_Appointments as a
            LEFT JOIN tbl_Services as s ON s.service_id = a.service_id
            WHERE a.user_id = :user_id";

    // Add a condition to filter by service if service_id is not 'All'
    if ($service_id !== 'All') {
        $sql .= " AND s.service_id = :service_id";
    }

    $stmt = $pdo->prepare($sql);

    // Bind parameters
    $stmt->bindParam(':user_id', $user_id, PDO::PARAM_STR);
    if ($service_id !== 'All') {
        $stmt->bindParam(':service_id', $service_id, PDO::PARAM_STR);
    }

    // Execute the query
    $stmt->execute();

    // Fetch all results
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Encode images in base64 if they exist
    foreach ($data as &$row) {
        if ($row['request_image'] !== null) {
            $row['request_image'] = base64_encode($row['request_image']);
        }
    }

    // Set response header to JSON
    header('Content-Type: application/json');

    // Output JSON-encoded response
    echo json_encode(array(
        "status" => "success",
        "process" => "read appointments",
        "data" => $data,
        "service ID" => $service_id
    ));

} catch (PDOException $e) {
    // Output error message as JSON
    echo json_encode(array(
        "status" => "error",
        "message" => $e->getMessage(),
        "process" => "read appointments",
        "report" => "catch reached"
    ));
}
?>
