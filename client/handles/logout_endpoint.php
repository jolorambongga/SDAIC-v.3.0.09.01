<?php
try {
    session_start();

    // Unset all session variables
    $_SESSION = array();

    // Destroy the session
    session_destroy();

    // Return success response
    echo json_encode(array("status" => "success"));
} catch (Exception $e) {
    // Return error response
    echo json_encode(array("status" => "error", "message" => $e->getMessage()));
}
?>
