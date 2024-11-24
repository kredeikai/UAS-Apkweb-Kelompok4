<?php
include '../../utils/auth.php';
include '../../config/db.php';
redirectIfNotLoggedIn();

$stmt = $pdo->query("SELECT * FROM film WHERE status = 'Tayang'");
$films = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Daftar Film</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1 class="text-center mb-4">Daftar Film Tayang</h1>
    <div class="row">
        <?php foreach ($films as $film): ?>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo htmlspecialchars($film['judul_film']); ?></h5>
                        <p class="card-text">
                            Genre: <?php echo htmlspecialchars($film['genre']); ?><br>
                            Durasi: <?php echo htmlspecialchars($film['durasi']); ?> menit<br>
                            Rilis: <?php echo htmlspecialchars($film['tanggal_rilis']); ?>
                        </p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
