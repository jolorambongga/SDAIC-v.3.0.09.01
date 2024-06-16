<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once('../../includes/config.php');

    $user_id = $_POST['user_id'];
    $service_id = $_POST['service_id'];
    $appointment_date = $_POST['appointment_date'];
    $appointment_time = $_POST['appointment_time'];
    $request_image = file_get_contents($_FILES['request_image']['tmp_name']);

    try {
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query = "INSERT INTO tbl_appointments
                  (user_id, service_id, appointment_date, appointment_time, request_image)
                  VALUES (:user_id, :service_id, :appointment_date, :appointment_time, :request_image);";

        $stmt = $pdo->prepare($query);

        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->bindParam(':service_id', $service_id, PDO::PARAM_STR);
        $stmt->bindParam(':appointment_date', $appointment_date, PDO::PARAM_STR);
        $stmt->bindParam(':appointment_time', $appointment_time, PDO::PARAM_STR);
        $stmt->bindParam(':request_image', $request_image, PDO::PARAM_LOB);

        if ($stmt->execute()) {
            echo json_encode(["message" => "Appointment submitted successfully!", "status" => "success"]);
        } else {
            echo json_encode(["error" => "Error submitting appointment."]);
        }
    } catch (PDOException $e) {
        echo json_encode(["error" => "Database error: " . $e->getMessage()]);
    }
}
?>