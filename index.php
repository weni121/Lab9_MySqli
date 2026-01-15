<?php
include 'db_connect.php';

// เช็คว่า Connection มาไหม?
if (!isset($conn)) {
    die("Error: ตัวแปร \$conn ไม่มีค่า ตรวจสอบไฟล์ db_connect.php");
}
if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
}

// เช็ค Query
$sql = "SELECT * FROM users";
$result = $conn->query($sql);

if (!$result) {
    // ถ้า Query พัง ให้บอกสาเหตุ
    die("SQL Error: " . $conn->error);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>MySqli</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">

<h2 class="mb-3">Users</h2>
<a href="form.php" class="btn btn-primary mb-3">+ Add User</a>

<table class="table table-bordered">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Sex</th>
        <th>Phone</th>
        <th>Email</th>
        <th>Birthday</th>
        <th>Action</th>
    </tr>

    <?php while($row = $result->fetch_assoc()): ?>
    <tr>
        <td><?= $row['id'] ?></td>
        <td><?= $row['name'] ?></td>
        <td><?= $row['sex'] ?></td>
        <td><?= $row['phone'] ?></td>
        <td><?= $row['email'] ?></td>
        <td><?= $row['birthday'] ?></td>
        <td>
            <a href="form.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
            <a href="delete.php?id=<?= $row['id'] ?>" 
               class="btn btn-danger btn-sm"
               onclick="return confirm('ยืนยันการลบข้อมูล?')">Delete</a>
        </td>
    </tr>
    <?php endwhile; ?>
</table>

</body>
</html>
