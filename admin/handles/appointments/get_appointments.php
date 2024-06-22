<?php
// Include the config.php file
require_once('../../../includes/config.php');

// Fetch the appointment data for the given date
function fetchAppointmentsForDate($date) {
  global $pdo;
  $stmt = $pdo->prepare("SELECT COUNT(*) as count FROM tbl_Appointments WHERE date(time_stamp) = :date");
  $stmt->bindValue(':date', date('Y-m-d', $date->getTimestamp()));
  $stmt->execute();
  $result = $stmt->fetch(PDO::FETCH_ASSOC);
  return $result['count'];
}

// Get the last 30 days
$currentDate = new DateTime();
$appointmentData = [];
for ($i = 0; $i < 30; $i++) {
  $date = new DateTime($currentDate->format('Y-m-d'), $currentDate->getTimezone());
  $date->sub(new DateInterval('P' . $i . 'D'));
  $appointmentsForDate = fetchAppointmentsForDate($date);
  $appointmentData[] = $appointmentsForDate;
}

// Return the appointment data as JSON
echo json_encode($appointmentData);