<?php

require_once('../../../includes/config.php');

try {

	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$sql = "SELECT d.doctor_id, d.first_name, d.middle_name, d.last_name, d.contact, a.avail_date,
			a.avail_start_time, a.avail_end_time, a.doctor_avail_id
			FROM tbl_Doctors AS d
			LEFT JOIN tbl_DoctorAvailability AS a
			ON d.doctor_id = a.doctor_id;";

	$stmt = $pdo->query($sql);

	$doctors = $stmt->fetchAll(PDO::FETCH_ASSOC);

	header('Content-Type: application/json');

	echo json_encode(array("status" => "success", "process" => "read doctors", "data" => $doctors));


} catch (PDOException $e) {
	echo json_encode(["status" => "error", "message" => $e->getMessage(), "report" => "catch reached"]);
}