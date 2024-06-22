<?php
// Include the config.php file
require_once('../../../includes/config.php');

try {
    // Prepare and execute the SQL statement to fetch service data
    $stmt = $pdo->query("SELECT service_name, cost FROM tbl_Services");
    $services = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Prepare the response data
    $response = [
        'labels' => [], // Array to store service names
        'data' => []    // Array to store service costs
    ];

    // Iterate through the fetched services
    foreach ($services as $service) {
        // Add service name to labels array
        $response['labels'][] = $service['service_name'];
        // Add service cost to data array
        $response['data'][] = $service['cost'];
    }

    // Set the appropriate headers and echo the JSON response
    header('Content-Type: application/json');
    echo json_encode($response);
} catch (PDOException $e) {
    // If an error occurs, handle it gracefully
    echo json_encode(array("error" => "Error: " . $e->getMessage()));
}
?>
