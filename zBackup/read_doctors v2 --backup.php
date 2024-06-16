<?php

require_once('../../../includes/config.php');

try {

	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$sql = "SELECT d.doctor_id, d.first_name, d.middle_name, d.last_name, d.contact, a.avail_date,
			a.avail_start_time, a.avail_end_time, a.doctor_avail_id
			FROM tbl_Doctors AS d
			LEFT JOIN tbl_DoctorAvailability AS a
			ON d.doctor_id = a.doctor_id
			GROUP BY d.doctor_id, d.first_name, d.middle_name, d.last_name, d.contact;";

	$stmt = $pdo->query($sql);

	$doctors = array();

	while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
		$doctors[] = array(
			'doctor_id' => $row['doctor_id'],
			'first_name' => $row['first_name'],
			'middle_name' => $row['middle_name'],
			'last_name' => $row['last_name'],
			'contact' => $row['contact'],
			'avail_date' => $row['avail_date'],
			'avail_start_time' => $row['avail_start_time'],
			'avail_end_time' => $row['avail_end_time'],
			'doctor_avail_id' => $row['doctor_avail_id'],
		);
	}

	header('Content-Type: application/json');

	echo json_encode(array("status" => "success", "process" => "read doctors", "data_doctor" => $doctors));


} catch (PDOException $e) {
	echo json_encode(["status" => "error", "message" => $e->getMessage(), "report" => "catch reached"]);
}