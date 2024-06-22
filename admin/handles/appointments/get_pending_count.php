<?php
// Include the config.php file
require_once('../../../includes/config.php');

try {
    // Query to get the count of pending appointments
    $sql = "SELECT COUNT(*) AS pending_count FROM tbl_appointments WHERE status = 'PENDING'";
    $stmt = $pdo->query($sql);

    // Fetch the result
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $pendingCount = $row["pending_count"];

    // Return the pending count
    echo $pendingCount;
} catch (PDOException $e) {
    // If an error occurs, handle it gracefully
    echo "Error: " . $e->getMessage();
}

// Close connection (not necessary for PDO)
//$pdo = null;
?>