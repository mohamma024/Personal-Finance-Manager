<?php
session_start();
require_once 'dbconnect.php';

if (!isset($_SESSION["user_id"])) {
    header("Location: login.html");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_SESSION["user_id"];
    $category = $_POST["category"];
    $amount = $_POST["amount"];

    $sql = "INSERT INTO budgets (user_id, category, amount) VALUES ('$user_id', '$category', '$amount')";
    if ($conn->query($sql) === TRUE) {
        echo "Budget added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
