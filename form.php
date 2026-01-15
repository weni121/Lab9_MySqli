<?php
include 'db_connect.php';

$id = $_GET['id'] ?? null;
$data = ['name'=>'','sex'=>'','phone'=>'','email'=>'','birthday'=>''];

if ($id) {
    $stmt = $conn->prepare("SELECT * FROM users WHERE id=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $data = $stmt->get_result()->fetch_assoc();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">

<h2><?= $id ? 'Edit User' : 'Add User' ?></h2>

<form method="post" action="save.php">
    <input type="hidden" name="id" value="<?= $id ?>">

    <div class="mb-2">
        <label>Name</label>
        <input type="text" name="name" class="form-control" required
               value="<?= $data['name'] ?>">
    </div>

    <div class="mb-2">
        <label>Sex</label>
        <select name="sex" class="form-control" required>
            <option value="">-- Select --</option>
            <option value="male"   <?= $data['sex']=='male'?'selected':'' ?>>Male</option>
            <option value="female" <?= $data['sex']=='female'?'selected':'' ?>>Female</option>
            <option value="other"  <?= $data['sex']=='other'?'selected':'' ?>>Other</option>
        </select>
    </div>

    <div class="mb-2">
        <label>Phone</label>
        <input type="text" name="phone" class="form-control"
               value="<?= $data['phone'] ?>">
    </div>

    <div class="mb-2">
        <label>Email</label>
        <input type="email" name="email" class="form-control"
               value="<?= $data['email'] ?>">
    </div>

    <div class="mb-3">
        <label>Birthday</label>
        <input type="date" name="birthday" class="form-control"
               value="<?= $data['birthday'] ?>">
    </div>

    <button class="btn btn-success">Save</button>
    <a href="index.php" class="btn btn-secondary">Back</a>
</form>

</body>
</html>
