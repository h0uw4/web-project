<?php
session_start();

$validUser = 'user';
$validPass = '12345';

$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

if ($username === $validUser && $password === $validPass) {
    $_SESSION['username'] = $username;
    header('Location: ../index.html');
    exit;
}

header('Location: ../pages/login.html?error=1');
exit;