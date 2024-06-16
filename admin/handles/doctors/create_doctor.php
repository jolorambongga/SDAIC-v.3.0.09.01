<?php

require_once('../../../includes/config.php');

try {
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $first_name = $_POST['first_name'];
    $middle_name = $_POST['middle_name'];
    $last_name = $_POST['last_name'];
    $contact = $_POST['contact'];
    

    $sql = "INSERT INTO tbl_Doctors (first_name, middle_name, last_name, contact)
    VALUES (?, ?, ?, ?);";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(1, $first_name, PDO::PARAM_STR);
    $stmt->bindParam(2, $middle_name, PDO::PARAM_STR);
    $stmt->bindParam(3, $last_name, PDO::PARAM_STR);
    $stmt->bindParam(4, $contact, PDO::PARAM_STR);

    $stmt->execute();


    $doctor_id = $pdo->lastInsertId();

    $avail_dates = json_decode($_POST['avail_dates'], true);

    foreach ($avail_dates as $availability) {
        
        $avail_day = $availability['avail_day'];
        $avail_start_time = $availability['avail_start_time'];
        $avail_end_time = $availability['avail_end_time'];

        $query = "INSERT INTO tbl_DoctorAvailability (doctor_id, avail_date, avail_start_time, avail_end_time) VALUES (?, ?, ?, ?)";

        $stmt = $pdo->prepare($query);

        $stmt->execute([$doctor_id, $avail_day, $avail_start_time, $avail_end_time]);
    }


    header('Content-Type: application/json');
    echo json_encode(array("status" => "success", "process" => "add doctor and availability", "avail_dates_data" => $avail_dates));

} catch (PDOException $e) {

    header('Content-Type: application/json');
    echo json_encode(array("status" => "error", "message" => $e->getMessage(), "process" => "add doctor and availability", "data" => $avail_dates));

}
