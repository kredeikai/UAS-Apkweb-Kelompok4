<?php
include '../../utils/auth.php';
redirectIfNotLoggedIn();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Customer</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../styles.css">
</head>
<body>
<div class="container mt-5">
    <h1 class="text-center">Selamat Datang, <?php echo $_SESSION['nama']; ?></h1>
    <a href="../logout.php" class="btn btn-danger mb-3">Logout</a>
    <div class="list-group">
        <a href="view_films.php" class="list-group-item list-group-item-action">Lihat Film</a>
        <a href="transactions.php" class="list-group-item list-group-item-action">Riwayat Transaksi</a>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

