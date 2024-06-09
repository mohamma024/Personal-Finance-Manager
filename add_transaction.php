<?php
session_start();
require_once 'dbconnect.php';

if (!isset($_SESSION["user_id"])) {
    header("Location: login.html");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_SESSION["user_id"];
    $description = $_POST["description"];
    $amount = $_POST["amount"];

    $sql = "INSERT INTO transactions (user_id, description, amount) VALUES ('$user_id', '$description', '$amount')";
    if ($conn->query($sql) === TRUE) {
        echo "Transaction added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
