<?php
include '../../utils/auth.php';
redirectIfNotLoggedIn();

if (!isAdmin()) {
    header('Location: ../customer/index.php');
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Admin</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../styles.css">
</head>
<body>
<div class="container mt-5">
    <h1 class="text-center">Selamat Datang, Admin <?php echo $_SESSION['nama']; ?></h1>
    <a href="../logout.php" class="btn btn-danger mb-3">Logout</a>
    <div class="list-group">
        <a href="manage_customers.php" class="list-group-item list-group-item-action">Kelola Pelanggan</a>
        <a href="manage_films.php" class="list-group-item list-group-item-action">Kelola Film</a>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

