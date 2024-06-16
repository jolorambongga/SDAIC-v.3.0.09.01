<?php
session_start();

require_once('../../includes/config.php');

try {

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $login = $_POST['login']; // This can be either email or username
    $password = $_POST['password'];

    $sql = "SELECT * FROM tbl_Users WHERE email = :login OR username = :login";

    $stmt = $pdo->prepare($sql);

    $stmt->bindParam(':login', $login, PDO::PARAM_STR);

    $stmt->execute();

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        if (($password == $user['password'])) {
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['first_name'] = $user['first_name'];
            $_SESSION['middle_name'] = $user['middle_name'];
            $_SESSION['last_name'] = $user['last_name'];

            echo json_encode(array("message" => "Login successful. Welcome, " . $user['first_name'] . " " . $user['last_name'], "status" => "success"));
        } else {
            echo json_encode(array("message" => "Wrong email/username or password!", "status" => "error"));
        }
    } else {
        echo json_encode(array("message" => "Wrong email/username or password!", "status" => "error"));
    }
} catch (PDOException $e) {
    echo json_encode(array("message" => "Error: " . $e->getMessage(), "status" => "error"));
}

$conn = null;
?>
