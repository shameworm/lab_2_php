<?php

session_start();

$servername = "localhost";
$username = "root";
$password = "";
$database = "lab_2";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn -> connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$currentUserId = $_GET['id'];

$sql = "DELETE FROM users WHERE id='$currentUserId'";

$conn->query($sql);

header('Location: main_adm.php');
?>