<?php
include 'db_connect.php';

$id = $_POST['id'];
$name = $_POST['name'];
$sex = $_POST['sex'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$birthday = $_POST['birthday'];

if ($id) {
    $stmt = $conn->prepare(
        "UPDATE users SET name=?, sex=?, phone=?, email=?, birthday=? WHERE id=?"
    );
    $stmt->bind_param("sssssi", $name, $sex, $phone, $email, $birthday, $id);
} else {
    $stmt = $conn->prepare(
        "INSERT INTO users (name, sex, phone, email, birthday)
         VALUES (?,?,?,?,?)"
    );
    $stmt->bind_param("sssss", $name, $sex, $phone, $email, $birthday);
}

$stmt->execute();
header("Location: index.php");
