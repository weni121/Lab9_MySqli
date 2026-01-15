<?php
include 'db_connect.php';

$id = $_GET['id'] ?? 0;

$stmt = $conn->prepare("SELECT * FROM users WHERE id=?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

if (!$user) {
    die("Data not found");
}
?>

<h2>User Detail</h2>
Name: <?= htmlspecialchars($user['name']) ?><br>
Sex: <?= htmlspecialchars($user['sex']) ?><br>
Phone: <?= htmlspecialchars($user['phone']) ?><br>
Email: <?= htmlspecialchars($user['email']) ?><br>
Birthday: <?= htmlspecialchars($user['birthday']) ?><br>

<a href="index.php">Back</a>
