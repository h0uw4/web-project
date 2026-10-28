<?php
session_start();
header("Content-Type: application/json");

$username = $_POST["username"] ?? "";
$password = $_POST["password"] ?? "";

$pdo = new PDO("mysql:host=localhost;dbname=attendancedb", "root", "");
$stmt = $pdo->prepare("SELECT * FROM accounts WHERE username = ?");
$stmt->execute([$username]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if ($user && password_verify($password, $user["password"])) {
    $_SESSION["username"] = $user["username"];
    echo json_encode(["success" => true]);
} else {
    echo json_encode(["success" => false, "message" => "Invalid username or password."]);
}